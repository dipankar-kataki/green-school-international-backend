<?php

namespace App\Http\Controllers\ChatQuestions;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\ChatQuestions;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ChatQuestionController extends Controller
{
    use ApiResponse;
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ChatQuestions::createRules());
        if ($validator->fails()) {
            return $this->error('Oops!' . $validator->errors()->first(), null, null, 400);
        }
        try {
            $data = $validator->validated();
            DB::beginTransaction();
            $question = ChatQuestions::create(
                $data
            );
            DB::commit();
            return $this->success("Chat question added successfully", $question->id(), null, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('Oops! Something Went Wrong.' . $e->getMessage(), null, null, 500);
        }
    }


    public function index(Request $request)
    {
        $blogs = ChatQuestions::get();

        if ($blogs->isEmpty()) {
            return $this->error('Oops! no Question found', null, null, 400);
        }

        $groupedQuestions = $blogs->groupBy('category');

        $formattedData = [];

        // Iterate over each category
        foreach ($groupedQuestions as $category => $questions) {
            $items = [];

            // Format each question in the category
            foreach ($questions as $question) {
                $items[] = [
                    'id' => $question->id,
                    'question' => $question->question,
                    'answer' => $question->answer,
                    'created_at' => $question->created_at->toIso8601String(),
                    'updated_at' => $question->updated_at->toIso8601String(),
                ];
            }

            // Build the category structure
            $formattedData[] = [
                'category' => $category,
                'items' => $items,
            ];
        }
        return $this->success("Blogs list", ['data' => $formattedData], null, 200);
    }


    public function updateQuestion(Request $request)
    {
        try {
            $blogs = ChatQuestions::find($request->id);
            if (!$blogs) {
                return $this->error('Oops! no question found', null, null, 400);
            }
            if ($request->has('question')) {
                $blogs->question = $request->question;
            }
            if ($request->has('category')) {
                $blogs->category = $request->category;
            }
            if ($request->has('answer')) {
                $blogs->answer = $request->answer;
            }

            $blogs->save();
            return $this->success("Question modified.", null, null, 200);
        } catch (\Exception $e) {
            return $this->error('Oops! Something Went Wrong.' . $e->getMessage(), null, null, 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $galleryItem = ChatQuestions::find($request->id);
            if (!$galleryItem) {
                return $this->error('Oops! no questions found', null, null, 400);
            }
            $galleryItem->delete();

            return $this->success("Questions Deleted.", null, null, 200);
        } catch (\Exception $e) {
            return $this->error('Oops! Something Went Wrong.' . $e->getMessage(), null, null, 500);
        }
    }
}
