<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\PerjanjianKinerja;
use App\Models\LaporanKinerja;

class KinerjaController extends Controller
{
    public function renstra()
    {
        $pengumumanTerkini = Info::where('id_info_jenis', 0) // 0 = Pengumuman
            ->where('info_status', 0)
            ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->orderBy('info_tanggal', 'desc')
            ->take(3)
            ->get();

        return view('laman.kinerja.rencana-strategi', compact('pengumumanTerkini'));
    }

    public function perjanjianKinerja()
    {
        // Ambil data perjanjian kinerja, urutkan dari tahun terbaru ke terlama
        $perjanjian = PerjanjianKinerja::orderBy('pk_tahun', 'desc')->get();

        return view('laman.kinerja.perjanjian', compact('perjanjian'));
    }

    public function laporanKinerja()
    {
        // Ambil data Laporan Kinerja, urutkan dari tahun terbaru
        $laporan = LaporanKinerja::orderBy('lakin_tahun', 'desc')->get();

        return view('laman.kinerja.laporan', compact('laporan'));
    }

}