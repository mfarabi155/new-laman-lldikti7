<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MenuService;
use Illuminate\Support\Facades\View;
use App\Traits\HasSettings;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    use HasSettings;

    public function register()
    {
        // $this->app->singleton(MenuService::class, function ($app) {
        //     return new MenuService();
        // });
    }

    public function boot()
    {
        // Cek dulu apakah tabelnya ada, agar tidak error saat 'php artisan migrate'
        if (Schema::hasTable('setting_variable')) {
            
            $settings = [
                'getSettingJenisBerita'              => 'JENIS_BERITA',
                'getSettingJenisPengumuman'          => 'JENIS_PENGUMUMAN',
                'getSettingURLGambarBerita'          => 'URL_GAMBAR_BERITA',
                'getSettingPATHGambarBerita'         => 'PATH_GAMBAR_BERITA',
                'getSettingPATHGambarBeritaDefault'  => 'PATH_GAMBAR_BERITA_DEFAULT',
                'getSettingTotalPerguruanTinggi'     => 'TOTAL_PERGURUAN_TINGGI',
                'getSettingTotalProgramStudi'        => 'TOTAL_PROGRAM_STUDI',
                'getSettingTotalDosen'               => 'TOTAL_DOSEN',
                'getSettingTotalMahasiswa'           => 'TOTAL_MAHASISWA',
                'getSettingTextKritik'               => 'TEXT_KRITIK',
                'getSettingTextSaran'                => 'TEXT_SARAN',
                'getSettingSumberDataPDDikti'        => 'SUMBER_DATA_PDDIKTI',
                'getSettingUrlStatisticPtLldikti7'   => 'URL_STATISTIC_PT_LLDIKTI7',
            ];

            foreach ($settings as $viewVar => $dbKey) {
                View::share($viewVar, $this->getSetting($dbKey));
            }
        }
    }
}