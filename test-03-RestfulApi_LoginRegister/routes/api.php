<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArticleController;






Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class);

Route::get('user', UserController::class);

// --------------------------------------------------------------

Route::get('articles', [ArticleController::class, 'index']);
Route::post('create-new-article', [ArticleController::class, 'store'])->middleware('auth:api');
Route::get('articles/{article}', [ArticleController::class, 'show']);
Route::patch('update-articles/{article}', [ArticleController::class, 'update'])->middleware('auth:api');;
Route::delete('delete-articles/{article}', [ArticleController::class, 'destroy'])->middleware('auth:api');;
