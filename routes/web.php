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
Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::group(["middleware" => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::post('logout', [UserController::class, 'logout']);
    });
    Route::group(['prefix' => 'galleries'], function () {
        Route::post('create', [GalleryController::class, 'create'])->name("create_gallery");
        Route::get('list', [GalleryController::class, 'index'])->name("gallery_list");
        Route::get('get/{id}', [GalleryController::class, 'show'])->name("gallery_show");
        Route::put('update/{id}', [GalleryController::class, 'update'])->name("gallery_update");
        Route::delete('delete/{id}', [GalleryController::class, 'destroy'])->name("gallery_destroy");
    });
    Route::group(['prefix' => 'blogs'], function () {
        Route::post('create', [BlogController::class, 'create'])->name("blogs_create");
        Route::get('list', [BlogController::class, 'index'])->name("blogs_list");
        Route::get('get/{id}', [BlogController::class, 'show'])->name("blogs_show");
        Route::put('update/{id}', [BlogController::class, 'update'])->name("blogs_update");
        Route::delete('delete/{id}', [BlogController::class, 'destroy'])->name("blogs_destroy");
    });
    Route::group(['prefix' => 'chat_questions'], function () {
        Route::post('create', [ChatQuestionController::class, 'create'])->name("chatq_create");
        Route::get('list', [ChatQuestionController::class, 'index'])->name("chatq_list");
        Route::get('get/{id}', [ChatQuestionController::class, 'show'])->name("chatq_show");
        Route::put('update/{id}', [ChatQuestionController::class, 'update'])->name("chatq_update");
        Route::delete('delete/{id}', [ChatQuestionController::class, 'destroy'])->name("chatq_destroy");
    });
    Route::group(['prefix' => 'chat_answers'], function () {
        Route::post('create', [ChatAnswersController::class, 'create'])->name("chat_ans_create");
        Route::get('list', [ChatAnswersController::class, 'index'])->name("chat_ans_list");
        Route::get('get/{id}', [ChatAnswersController::class, 'show'])->name("chatq_show");
        Route::put('update/{id}', [ChatAnswersController::class, 'update'])->name("chat_ans_update");
        Route::delete('delete/{id}', [ChatAnswersController::class, 'destroy'])->name("chat_ans_destroy");
    });
}); 
