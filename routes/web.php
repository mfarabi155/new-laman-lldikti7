<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PenggunaController;

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

Route::prefix('profil')->group(function () {
    Route::get('/sambutan', function () { return view('laman.profil.sambutan'); });
    Route::get('/sejarah', function () { return view('laman.profil.sejarah'); });
    Route::get('/visi-misi', function () { return view('laman.profil.visimisi'); });
    Route::get('/tupoksi', function () { return view('laman.profil.tupoksi'); });
    Route::get('/struktur-organisasi', function () { return view('laman.profil.struktur'); });
});

Route::prefix('layanan')->group(function () {
    Route::get('/standar-pelayanan', function () { 
        return view('laman.layanan.standar'); 
    });
});

Route::get('/peraturan', function () {
    return view('laman.peraturan.index');
});

Route::prefix('kinerja')->group(function () {
    Route::get('/rencana-strategi', function () { 
        return view('laman.kinerja.rencana-strategi'); 
    });
    Route::get('/perjanjian-kinerja', function () { 
        return view('laman.kinerja.perjanjian'); 
    });
    Route::get('/laporan-kinerja', function () { 
        return view('laman.kinerja.laporan'); 
    });
    Route::get('/ikm', function () { 
        return view('laman.kinerja.ikm'); 
    });
});

Route::get('/spi', function () { 
    return view('laman.spi.index'); 
});

//Route::get('/berita', [BeritaController::class, 'index']);


// Route untuk melihat halaman login Back Office
Route::prefix('admin')->group(function () {
    Route::get('/login', function () { return view('admin.auth.login'); })->name('admin.login');
    
    // Rute Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // Pengguna CRUD
    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create']);
    Route::post('/pengguna', [PenggunaController::class, 'store']);
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit']);
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update']);
    //Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy']);
    Route::post('/pengguna/{id}/disable', [PenggunaController::class, 'disable']);
});