<?php

use App\Http\Controllers\Blogs\BlogController;
use App\Http\Controllers\ChatAnswers\ChatAnswersController;
use App\Http\Controllers\ChatQuestions\ChatQuestionController;
use App\Http\Controllers\Galleries\GalleryController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post("login", [UserController::class, "login"])->name("login");
Route::post('forgotpassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('resetpassword', [UserController::class, 'resetPassword'])->name('resetpassword');
Route::post('create', [UserController::class, 'create'])->name("create");


Route::get('galleries/list', [GalleryController::class, 'index'])->name("galleryList");
Route::get('galleries/get/{id}', [GalleryController::class, 'show'])->name("galleryShow");
Route::get('chat_questions/list', [ChatQuestionController::class, 'index'])->name("chatqList");
Route::get('chat_questions/get/{id}', [ChatQuestionController::class, 'show'])->name("chatAshow");
Route::get('blogs/list', [BlogController::class, 'index'])->name("blogsList");
Route::get('blogs/get/{id}', [BlogController::class, 'show'])->name("blogsShow");

Route::group(["middleware" => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('list', [UserController::class, 'index']);
        Route::get('get/{id}', [UserController::class, 'show']);
        Route::put('update/{id}', [UserController::class, 'update']);
        Route::delete('delete/{id}', [UserController::class, 'destroy']);
        Route::put('changepassword', [UserController::class, 'changePassword']);
        Route::post('logout', [UserController::class, 'logout']);
    });
    Route::group(['prefix' => 'galleries'], function () {
        Route::post('create', [GalleryController::class, 'create']);

        Route::put('update/{id}', [GalleryController::class, 'update']);
        Route::delete('delete/{id}', [GalleryController::class, 'destroy']);
    });
    Route::group(['prefix' => 'blogs'], function () {
        Route::post('create', [BlogController::class, 'create']);
        Route::put('update/{id}', [BlogController::class, 'update']);
        Route::delete('delete/{id}', [BlogController::class, 'destroy']);
    });
    Route::group(['prefix' => 'chat_questions'], function () {
        Route::post('create', [ChatQuestionController::class, 'create']);
        Route::get('list', [ChatQuestionController::class, 'index']);
        Route::get('get/{id}', [ChatQuestionController::class, 'show']);
        Route::put('update/{id}', [ChatQuestionController::class, 'update']);
        Route::delete('delete/{id}', [ChatQuestionController::class, 'destroy']);
    });
    Route::group(['prefix' => 'chat_answers'], function () {
        Route::post('create', [ChatAnswersController::class, 'create']);
        Route::get('list', [ChatAnswersController::class, 'index']);
        Route::put('update/{id}', [ChatAnswersController::class, 'update']);
        Route::delete('delete/{id}', [ChatAnswersController::class, 'destroy']);
    });
});
