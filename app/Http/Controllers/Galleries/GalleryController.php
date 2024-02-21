<?php

namespace App\Http\Controllers\Galleries;

use App\Http\Controllers\Controller;
use App\Models\Galleries;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    use ApiResponse;
    public function create(Request $request)
    {
        try {
            $uploadedFiles = $request->file('images');
    
            if (!$uploadedFiles) {
                return $this->error("No files uploaded.", null, null, 400);
            }
    
            DB::beginTransaction();
    
            foreach ($uploadedFiles as $file) {
                // Adjust validation based on your requirements
                $validator = Validator::make(
                    [
                        'image' => $file,
                        'category' => $request->input('category'), // Assuming category is in the request
                    ],
                    Galleries::createRules()
                );
    
                if ($validator->fails()) {
                    return $this->error('Oops!' . $validator->errors()->first(), null, null, 400);
                }
    
                // Store the file in the 'public/images' directory
                $data = $file->store('public/images');
    
                Galleries::create([
                    "category" => $request->input('category'), // Assuming category is in the request
                    "image" => $data,
                ]);
            }
    
            DB::commit();
    
            return $this->success("Files uploaded successfully", null, null, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('Oops! Something Went Wrong.' . $e->getMessage(), null, null, 500);
        }
    }


    public function index(Request $request)
    {
        $galleries = Galleries::where("category", $request->category)->get();

        if ($galleries->isEmpty()) {
            return $this->error('Oops! no galleries found', null, null, 400);
        }
        return $this->success("Galleries list", $galleries, null, 201);
    }


    public function updateSpecificGalleryImage(Request $request)
    {
        try {
            $galleryItem = Galleries::find($request->id);
            if (!$galleryItem) {
                return $this->error('Oops! no galleries found', null, null, 400);
            }
            $oldFilePath = $galleryItem->image;
            if ($oldFilePath && Storage::exists($oldFilePath)) {
                Storage::delete($oldFilePath);
            }
            $galleryItem->image = $request->file('image')->store('image');
            $galleryItem->save();
            return $this->success("Gallery Image Modified Successfully.", null, null, 200);

        } catch (\Exception $e) {
            return $this->error('Oops! Something Went Wrong.' . $e->getMessage(), null, null, 500);
        }
    }

    public function deleteSpecificGalleryImage(Request $request)
    {
        try {
            $galleryItem = Galleries::find($request->id);
            if (!$galleryItem) {
                return response()->json(["message" => "No Gallery Item found for the specified Id", "status" => 404]);
            }
            $oldFilePath = $galleryItem->image;
            if ($oldFilePath && Storage::exists($oldFilePath)) {
                Storage::delete($oldFilePath);
            }
            return $this->success("Gallery Image deleted Successfully.", null, null, 200);
        } catch (\Exception $e) {
            return $this->error('Oops! Something Went Wrong.' . $e->getMessage(), null, null, 500);
        }
    }

}
