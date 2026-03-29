<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ------------------------------------------------------------------
        // 1. DATA KARTU ATAS (Dibuat Statis Sementara Sesuai Permintaan)
        // ------------------------------------------------------------------
        $totalPeraturan  = 124; 
        $totalKinerja    = 45; 
        $totalPengunjung = 2300; 

        // ------------------------------------------------------------------
        // 2. DATA SURVEI IKM (DISTRIBUSI KEPUASAN)
        // ------------------------------------------------------------------
        // Menghitung total responden dari tabel survey_responden
        $totalResponden = DB::table('survey_responden')->count();

        // Karena data 'jawaban' berupa teks, kita buat rumus SQL untuk mengkonversinya ke angka
        $rumusKonversiNilai = "CASE 
            WHEN survey_jawaban.jawaban = 'Sangat Sesuai' THEN 4
            WHEN survey_jawaban.jawaban = 'Sesuai' THEN 3
            WHEN survey_jawaban.jawaban = 'Kurang Sesuai' THEN 2
            WHEN survey_jawaban.jawaban = 'Tidak Sesuai' THEN 1
            ELSE 0 END";

        // Mengambil rata-rata nilai per responden (menggunakan raw query karena ada CASE WHEN)
        $respondenAverages = DB::table('survey_jawaban')
            ->select('responden_id', DB::raw("AVG($rumusKonversiNilai) as avg_nilai"))
            ->groupBy('responden_id')
            ->get();

        $sangatPuas = 0; $puas = 0; $kurangPuas = 0; $tidakPuas = 0;
        $totalNilai = 0;

        foreach($respondenAverages as $res) {
            $avg = $res->avg_nilai;
            $totalNilai += $avg;

            // Klasifikasi kepuasan per responden
            if($avg >= 3.5) $sangatPuas++;
            elseif($avg >= 2.5) $puas++;
            elseif($avg >= 1.5) $kurangPuas++;
            else $tidakPuas++;
        }

        // Konversi skala 1-4 menjadi persentase 0-100%
        $avgIkmKeseluruhan = $totalResponden > 0 ? round(($totalNilai / $totalResponden) * 25, 2) : 0;

        $pctSangatPuas = $totalResponden > 0 ? round(($sangatPuas / $totalResponden) * 100) : 0;
        $pctPuas       = $totalResponden > 0 ? round(($puas / $totalResponden) * 100) : 0;
        $pctKurangPuas = $totalResponden > 0 ? round(($kurangPuas / $totalResponden) * 100) : 0;
        $pctTidakPuas  = $totalResponden > 0 ? round(($tidakPuas / $totalResponden) * 100) : 0;


        // ------------------------------------------------------------------
        // 3. DATA GRAFIK IKM BULANAN (Untuk Chart.js)
        // ------------------------------------------------------------------
        $tahunIni = Carbon::now()->year;
        $grafikBulan = [];
        $grafikNilai = [];
        
        for ($i = 1; $i <= 12; $i++) {
            $grafikBulan[] = Carbon::create()->month($i)->translatedFormat('M');
            
            // Kita harus men-JOIN tabel jawaban dan responden untuk mendapatkan kolom created_at
            $avgBulanIni = DB::table('survey_jawaban')
                ->join('survey_responden', 'survey_jawaban.responden_id', '=', 'survey_responden.id')
                ->whereYear('survey_responden.created_at', $tahunIni)
                ->whereMonth('survey_responden.created_at', $i)
                ->avg(DB::raw($rumusKonversiNilai));
                
            // Ubah ke skala 100 persen untuk grafik
            $nilai100 = $avgBulanIni ? round($avgBulanIni * 25, 1) : 0; 
            $grafikNilai[] = $nilai100;
        }

        return view('admin.dashboard', compact(
            'totalPeraturan', 'totalKinerja', 'totalPengunjung', 'totalResponden',
            'avgIkmKeseluruhan', 'pctSangatPuas', 'pctPuas', 'pctKurangPuas', 'pctTidakPuas',
            'grafikBulan', 'grafikNilai', 'tahunIni'
        ));
    }
}