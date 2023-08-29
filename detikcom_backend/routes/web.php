<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardBukuController;

Route::get('/', function () {
    return view('home',[
        'title' => 'Perpustakaan Digital '
    ]);
})->middleware('auth');

//  PAGE ======================
// BUKU
Route::get('bukus', [BukuController::class, 'index'])->name('buku');
Route::get('bukus/{buku:slug}', [BukuController::class, 'buku']);
// --------------------------------------------------------

// KATEGORI
Route::get('/kategori/{kategori:slug}', [KategoriController::class, 'index'])->name('kategori');
// ----------------------------------------------------------

// ==========================================================================================

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard.index',[
        'title' => 'Detikcom'
    ]);
})->middleware('auth');

Route::get('/dashboard/bukus/checkSlug', [DashboardBukuController::class, 'checkSlug']);

Route::get('/download/{file}', [DashboardBukuController::class, 'download'])->name('download');

Route::resource('dashboard/bukus', DashboardBukuController::class)->middleware('auth');
// -----------------------------------------------------------

// REGISTER
Route::get('register', [RegisterController::class, 'index'])->name('create')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('store');
// ------------------------------------------------------------

// LOGIN
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'auth'])->name('auth');
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
// -------------------------------------------------------------------------------------------

// ADMINISTRATOR POST CATEGORIES
Route::resource('/dashboard/kategoris', AdminController::class)->middleware('admin');
// -------------------------------------------------------------
