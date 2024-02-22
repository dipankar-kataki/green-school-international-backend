<?php

use App\Http\Controllers\Blogs\BlogController;
use App\Http\Controllers\ChatAnswers\ChatAnswersController;
use App\Http\Controllers\ChatQuestions\ChatQuestionController;
use App\Http\Controllers\Galleries\GalleryController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
