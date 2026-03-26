<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// AREA FRONT OFFICE (Template Depan Publik)
// ==========================================
Route::get('/laman-old', function () {
    return view('laman.index'); // Menggunakan layouts.front
});

Route::get('/laman-new', function () {
    return view('laman.home');
});
//Route::get('/berita', [BeritaController::class, 'index']);


// ==========================================
// AREA BACK OFFICE (Template Argon Admin)
// ==========================================
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Menggunakan layouts.argon
    });
    // Rute admin lainnya di sini...
});