<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    use HasFactory;
    protected $table = "galleries";
    protected $guard = [];
    public static function createRules()
    {
        return [
            'category' => 'required|string|in:home_banner, galleries',
            'image' => 'required',
        ];
    }
}
