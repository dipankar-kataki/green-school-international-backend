<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $guarded = [];
    public static function createRules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Adjust validation rules for the image
        ];
    }
}
