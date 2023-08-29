<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::view('/about', 'about');

Route::resource('mahasiswa', MahasiswaController::class);
