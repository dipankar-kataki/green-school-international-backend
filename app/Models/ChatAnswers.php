<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatAnswers extends Model
{
    use HasFactory;
    protected $table = "chat_bot_answers";
    protected $guarded = [];
    public static function createRules()
    {
        return [
            'category' => 'required|string|in:home_banner,galleries',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for the image
        ];
    }
}
