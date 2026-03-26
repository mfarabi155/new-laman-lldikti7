<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\AuthController;

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


Route::prefix('admin')->group(function () {

    // 1. RUTE UNTUK GUEST (Belum Login)
    // Menggunakan middleware 'guest' agar user yang sudah login tidak bisa masuk ke halaman login lagi
    Route::middleware('guest')->group(function () {
        Route::get('/login', function () { 
            return view('admin.auth.login'); 
        })->name('login'); // PENTING: Nama rute harus 'login' agar otomatis diredirect oleh Laravel
        
        Route::post('/login', [AuthController::class, 'authenticate'])->name('admin.login.submit');
    });

    // 2. RUTE TERPROTEKSI (Harus Login)
    // Semua rute di dalam grup ini hanya bisa diakses jika sudah melewati middleware 'auth'
    Route::middleware('auth')->group(function () {
        
        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // Pengguna CRUD
        Route::prefix('pengguna')->group(function () {
            Route::get('/', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
            Route::get('/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');
            Route::post('/', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
            Route::get('/{id}/edit', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
            Route::put('/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
            Route::post('/{id}/disable', [PenggunaController::class, 'disable'])->name('admin.pengguna.disable');
        });

        // Fitur Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});