<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use App\Models\SurveyPertanyaan;
use App\Models\SurveyUsia;
use App\Models\SurveyProfesi;
use App\Models\SurveyPendidikan;
use App\Models\SurveyResponden;
use App\Models\SurveyJawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IkmController extends Controller
{
    public function index()
    {
        $pertanyaan = SurveyPertanyaan::all();
        $usia = SurveyUsia::all();
        $profesi = SurveyProfesi::all();
        $pendidikan = SurveyPendidikan::all();

        return view('laman.kinerja.ikm-form', compact('pertanyaan', 'usia', 'profesi', 'pendidikan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'usia_id' => 'required',
            'pendidikan_id' => 'required',
            'profesi_id' => 'required',
            'jawaban' => 'required|array',
        ]);

        try {
            DB::beginTransaction();

            // 1. Simpan Data Responden
            $responden = SurveyResponden::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'usia_id' => $request->usia_id,
                'profesi_id' => $request->profesi_id,
                'pendidikan_id' => $request->pendidikan_id,
                'layanan_id' => 1, // Default atau sesuaikan jika ada pilihan layanan
                'kritik' => $request->kritik,
                'saran' => $request->saran,
                'created_at' => now(),
            ]);

            // 2. Simpan Jawaban Kuesioner
            foreach ($request->jawaban as $pertanyaanId => $nilai) {
                SurveyJawaban::create([
                    'responden_id' => $responden->id,
                    'pertanyaan_id' => $pertanyaanId,
                    'jawaban' => $nilai,
                ]);
            }

            DB::commit();
            return back()->with('success', 'Terima kasih! Kontribusi Anda sangat berharga bagi peningkatan layanan kami.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }

    public function ikmResults(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Filter Responden berdasarkan tanggal
        $query = SurveyResponden::query();
        if ($startDate) $query->whereDate('created_at', '>=', $startDate);
        if ($endDate) $query->whereDate('created_at', '<=', $endDate);

        $respondenIds = $query->pluck('id');
        $totalResponden = $respondenIds->count();

        // 1. Hitung Persentase Jawaban Keseluruhan (untuk Pie Chart)
        $allAnswers = SurveyJawaban::whereIn('responden_id', $respondenIds)->get();
        $totalAll = $allAnswers->count() ?: 1; // Hindari pembagian dengan nol

        $statsOverall = [
            'SS' => ($allAnswers->where('jawaban', 'Sangat Sesuai')->count() / $totalAll) * 100,
            'S'  => ($allAnswers->where('jawaban', 'Sesuai')->count() / $totalAll) * 100,
            'KS' => ($allAnswers->where('jawaban', 'Kurang Sesuai')->count() / $totalAll) * 100,
            'TS' => ($allAnswers->where('jawaban', 'Tidak Sesuai')->count() / $totalAll) * 100,
        ];

        // 2. Hitung Jumlah Responden per Profesi (untuk Bar Chart)
        $profesiStats = SurveyProfesi::withCount(['responden' => function ($q) use ($startDate, $endDate) {
            if ($startDate) $q->whereDate('created_at', '>=', $startDate);
            if ($endDate) $q->whereDate('created_at', '<=', $endDate);
        }])->get();

        $maxResponden = $profesiStats->max('responden_count') ?: 1;

        // 3. Hitung Statistik per Pertanyaan (untuk Tabel)
        $pertanyaan = SurveyPertanyaan::all();
        $tableData = [];
        foreach ($pertanyaan as $p) {
            $answers = SurveyJawaban::where('pertanyaan_id', $p->id)
                ->whereIn('responden_id', $respondenIds)->get();
            $count = $answers->count() ?: 1;

            $tableData[] = [
                'teks' => $p->pertanyaan,
                'ss' => ($answers->where('jawaban', 'Sangat Sesuai')->count() / $count) * 100,
                's'  => ($answers->where('jawaban', 'Sesuai')->count() / $count) * 100,
                'ks' => ($answers->where('jawaban', 'Kurang Sesuai')->count() / $count) * 100,
                'ts' => ($answers->where('jawaban', 'Tidak Sesuai')->count() / $count) * 100,
            ];
        }

        return view('laman.kinerja.ikm', compact('statsOverall', 'profesiStats', 'totalResponden', 'tableData', 'maxResponden', 'startDate', 'endDate'));
    }
}
