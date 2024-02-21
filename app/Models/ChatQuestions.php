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
            'question' => 'required|string',
            'question_number' => 'required|integer', 
            "type"=>"required|string|in:choices,subjective"
        ];
    }
}
