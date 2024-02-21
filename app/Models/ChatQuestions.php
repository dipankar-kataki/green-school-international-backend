<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatQuestions extends Model
{
    use HasFactory;
    protected $table = "chat_bot_questions";
    protected $guarded = [];
    public static function createRules()
    {
        return [
            'category' => 'required|string|in:home_banner,galleries',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for the image
        ];
    }
}
