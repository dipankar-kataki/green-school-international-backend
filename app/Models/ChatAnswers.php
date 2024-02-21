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
            'question_id' => 'required|integer|exists:chat_bot_questions,id',
            'answer' => 'required|string',
        ];
    }
}
