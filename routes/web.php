<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\AuthController;

use App\Http\Controllers\Laman\KinerjaController;
use App\Http\Controllers\Laman\BerandaController;
use App\Http\Controllers\Laman\PengumumanController as LamanPengumumanController;
use App\Http\Controllers\Laman\BeritaController as LamanBeritaController;
use App\Http\Controllers\Laman\IkmController as PublikIkm;
use App\Http\Controllers\Laman\PeraturanController;
use App\Http\Controllers\Laman\LayananController;

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\IkmController;
use App\Http\Controllers\Admin\SurveySettingController;

// ==========================================
// AREA LAMAN (Template Depan Publik)
// ==========================================
Route::get('/laman-old', function () {
    return view('laman.index'); 
})->name('laman.old');

Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\Laman\SearchController::class, 'index'])->name('search');

// Rute Pengumuman
Route::get('/pengumuman', [LamanPengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{slug}', [LamanPengumumanController::class, 'show'])->name('pengumuman.show');

// Rute Berita
Route::get('/berita', [LamanBeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [LamanBeritaController::class, 'show'])->name('berita.show');

Route::prefix('profil')->group(function () {
    Route::get('/sambutan', function () {
        return view('laman.profil.sambutan');
    })->name('profil.sambutan');
    
    Route::get('/sejarah', function () {
        return view('laman.profil.sejarah');
    })->name('profil.sejarah');
    
    Route::get('/visi-misi', function () {
        return view('laman.profil.visimisi');
    })->name('profil.visimisi');
    
    Route::get('/tupoksi', function () {
        return view('laman.profil.tupoksi');
    })->name('profil.tupoksi');
    
    Route::get('/struktur-organisasi', function () {
        return view('laman.profil.struktur');
    })->name('profil.struktur');
});

Route::prefix('layanan')->group(function () {
    Route::get('/standar-pelayanan', function () {
        return view('laman.layanan.standar');
    })->name('layanan.standar');
});

Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan.index');

Route::get('/layanan/standar-pelayanan', [LayananController::class, 'standar'])->name('layanan.standar');


Route::prefix('kinerja')->group(function () {
    // UBAH BARIS INI: dari closure ke Controller
    Route::get('/rencana-strategi', [KinerjaController::class, 'renstra'])->name('kinerja.renstra');
    Route::get('/perjanjian-kinerja', [KinerjaController::class, 'perjanjianKinerja'])->name('kinerja.perjanjian');
    Route::get('/laporan-kinerja', [KinerjaController::class, 'laporanKinerja'])->name('kinerja.laporan');
    
    Route::get('/ikm', function () {
        return view('laman.kinerja.ikm');
    })->name('kinerja.ikm');
    Route::get('/ikm', [PublikIkm::class, 'ikmResults'])->name('ikm.ikmResults');
});

Route::get('/spi', function () {
    return view('laman.spi.index');
})->name('spi.index');

Route::get('/form-ikm', [PublikIkm::class, 'index'])->name('ikm.index');
Route::post('/form-ikm', [PublikIkm::class, 'store'])->name('ikm.store');

// ==========================================
// AREA ADMIN
// ==========================================
Route::prefix('pangkalan')->group(function () {

    Route::get('/', function () {
        if (session()->has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])->name('admin.login.submit');

    Route::middleware('admin.session')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        // Pengguna
        Route::prefix('pengguna')->group(function () {
            Route::get('/', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
            Route::get('/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');
            Route::post('/', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
            Route::get('/{id}/edit', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
            Route::put('/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
            Route::post('/{id}/disable', [PenggunaController::class, 'disable'])->name('admin.pengguna.disable');
        });
        
        // Pengumuman Admin
        Route::prefix('pengumuman')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\PengumumanController::class, 'index'])->name('admin.pengumuman.index');
            Route::get('/tambah', [App\Http\Controllers\Admin\PengumumanController::class, 'create'])->name('admin.pengumuman.tambah');
            Route::post('/', [App\Http\Controllers\Admin\PengumumanController::class, 'store'])->name('admin.pengumuman.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\PengumumanController::class, 'update'])->name('admin.pengumuman.update');
            Route::post('/{id}/disable', [App\Http\Controllers\Admin\PengumumanController::class, 'disable'])->name('admin.pengumuman.disable');
        });

        // Berita Admin
        Route::prefix('berita')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\BeritaController::class, 'index'])->name('admin.berita.index');
            Route::get('/tambah', [App\Http\Controllers\Admin\BeritaController::class, 'create'])->name('admin.berita.tambah');
            Route::post('/', [App\Http\Controllers\Admin\BeritaController::class, 'store'])->name('admin.berita.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\BeritaController::class, 'edit'])->name('admin.berita.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\BeritaController::class, 'update'])->name('admin.berita.update');
            Route::post('/{id}/disable', [App\Http\Controllers\Admin\BeritaController::class, 'disable'])->name('admin.berita.disable');
        });

        // Manajemen Menu Admin
        Route::prefix('menu')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\MenuController::class, 'index'])->name('admin.menu.index');
            Route::get('/tambah', [App\Http\Controllers\Admin\MenuController::class, 'create'])->name('admin.menu.create');
            Route::post('/', [App\Http\Controllers\Admin\MenuController::class, 'store'])->name('admin.menu.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\MenuController::class, 'edit'])->name('admin.menu.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\MenuController::class, 'update'])->name('admin.menu.update');
            Route::delete('/{id}', [App\Http\Controllers\Admin\MenuController::class, 'destroy'])->name('admin.menu.destroy');
        });

        // Hak Akses (Privilege) Admin
        Route::prefix('privilege')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\PrivilegeController::class, 'index'])->name('admin.privilege.index');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\PrivilegeController::class, 'edit'])->name('admin.privilege.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\PrivilegeController::class, 'update'])->name('admin.privilege.update');
        });


        Route::prefix('ikm')->group(function () {
            
            // 1. Setting Survey (Posisikan di ATAS sebelum route {id})
            Route::prefix('setting')->group(function () {
                Route::get('/', [App\Http\Controllers\Admin\SurveySettingController::class, 'index'])->name('admin.ikm.setting.index');
                
                // Action Usia
                Route::post('/usia', [App\Http\Controllers\Admin\SurveySettingController::class, 'storeUsia'])->name('admin.ikm.setting.usia.store');
                Route::delete('/usia/{id}', [App\Http\Controllers\Admin\SurveySettingController::class, 'destroyUsia'])->name('admin.ikm.setting.usia.destroy');
                
                // Action Pertanyaan
                Route::post('/pertanyaan', [App\Http\Controllers\Admin\SurveySettingController::class, 'storePertanyaan'])->name('admin.ikm.setting.pertanyaan.store');
                Route::delete('/pertanyaan/{id}', [App\Http\Controllers\Admin\SurveySettingController::class, 'destroyPertanyaan'])->name('admin.ikm.setting.pertanyaan.destroy');

                // Action Pendidikan
                Route::post('/pendidikan', [SurveySettingController::class, 'storePendidikan'])->name('admin.ikm.setting.pendidikan.store');
                Route::delete('/pendidikan/{id}', [SurveySettingController::class, 'destroyPendidikan'])->name('admin.ikm.setting.pendidikan.destroy');

                // Action Profesi
                Route::post('/profesi', [SurveySettingController::class, 'storeProfesi'])->name('admin.ikm.setting.profesi.store');
                Route::delete('/profesi/{id}', [SurveySettingController::class, 'destroyProfesi'])->name('admin.ikm.setting.profesi.destroy');
            });

            // 2. Data Responden (IkmController)
            Route::get('/', [App\Http\Controllers\Admin\IkmController::class, 'index'])->name('admin.ikm.index');
            // Route dengan parameter {id} harus selalu diletakkan paling bawah
            Route::get('/{id}', [App\Http\Controllers\Admin\IkmController::class, 'show'])->name('admin.ikm.show');
            Route::delete('/{id}', [App\Http\Controllers\Admin\IkmController::class, 'destroy'])->name('admin.ikm.destroy');

        });

    });
});