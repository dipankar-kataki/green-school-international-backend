<?php

use App\Http\Controllers\Blogs\BlogController;
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

Route::group(["middleware" => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::post('create', [UserController::class, 'create']);
        Route::get('list', [UserController::class, 'index']);
        Route::get('get/{id}', [UserController::class, 'show']);
        Route::put('update/{id}', [UserController::class, 'update']);
        Route::delete('delete/{id}', [UserController::class, 'destroy']);
        Route::put('changepassword', [UserController::class, 'changePassword']);
        Route::post('logout', [UserController::class, 'logout']);
    });
    Route::group(['prefix' => 'galleries'], function () {
        Route::post('create', [GalleryController::class, 'create']);
        Route::get('list', [GalleryController::class, 'index']);
        Route::get('get/{id}', [GalleryController::class, 'show']);
        Route::put('update/{id}', [GalleryController::class, 'update']);
        Route::delete('delete/{id}', [GalleryController::class, 'destroy']);
    });
    Route::group(['prefix' => 'blogs'], function () {
        Route::post('create', [BlogController::class, 'create']);
        Route::get('list', [BlogController::class, 'index']);
        Route::get('get/{id}', [BlogController::class, 'show']);
        Route::put('update/{id}', [BlogController::class, 'update']);
        Route::delete('delete/{id}', [BlogController::class, 'destroy']);
    });    
    Route::group(['prefix' => 'chat_questions'], function () {
        Route::post('create', [GalleryController::class, 'create']);
        Route::get('list', [GalleryController::class, 'index']);
        Route::get('get/{id}', [GalleryController::class, 'show']);
        Route::put('update/{id}', [GalleryController::class, 'update']);
        Route::delete('delete/{id}', [GalleryController::class, 'destroy']);
    });    
    Route::group(['prefix' => 'chat_answers'], function () {
        Route::post('create', [GalleryController::class, 'create']);
        Route::get('list', [GalleryController::class, 'index']);
        Route::get('get/{id}', [GalleryController::class, 'show']);
        Route::put('update/{id}', [GalleryController::class, 'update']);
        Route::delete('delete/{id}', [GalleryController::class, 'destroy']);
    });
});
