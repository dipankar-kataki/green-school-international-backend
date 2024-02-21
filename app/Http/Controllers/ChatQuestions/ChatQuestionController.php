<?php

namespace App\Http\Controllers\ChatQuestions;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\ChatQuestions;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $blogs = Blogs::get();

        if ($blogs->isEmpty()) {
            return $this->error('Oops! no blogs found', null, null, 400);
        }
        return $this->success("Blogs list", $blogs, null, 200);
    }


    public function updateBlog(Request $request)
    {
        try {
            $blogs = Blogs::find($request->id);
            if (!$blogs) {
                return $this->error('Oops! no blogs found', null, null, 400);
            }
            if ($request->has("title")) {
                $blogs->title = $request->title;
            }
            if ($request->has("content")) {
                $blogs->content = $request->content;
            }
            if ($request->has("banner")) {
                $oldFilePath = $blogs->image;
                if ($oldFilePath && Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
                $data = $request->file('image')->store('image');
                $blogs->banner = $data;
            }

            $blogs->save();
            return $this->success("Blog modified.", null, null, 200);
        } catch (\Exception $e) {
            return $this->error('Oops! Something Went Wrong.' . $e->getMessage(), null, null, 500);
        }
    }

    public function deleteBlog(Request $request)
    {
        try {
            $galleryItem = Galleries::find($request->id);
            if (!$galleryItem) {
                return $this->error('Oops! no blogs found', null, null, 400);
            }
            $oldFilePath = $galleryItem->image;
            if ($oldFilePath && Storage::exists($oldFilePath)) {
                Storage::delete($oldFilePath);
            }
            return $this->success("Blog Deleted.", null, null, 200);
        } catch (\Exception $e) {
            return $this->error('Oops! Something Went Wrong.' . $e->getMessage(), null, null, 500);
        }
    }
}
