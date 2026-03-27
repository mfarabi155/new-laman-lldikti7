<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil 4 Pengumuman Terbaru (id_info_jenis = 0)
        $pengumuman = \App\Models\Info::where('id_info_jenis', 0)
                        ->where('info_status', 0)
                        ->orderBy('info_tanggal', 'desc')
                        ->take(4)
                        ->get();

        // Ambil 1 Berita Utama (Terbaru)
        $beritaUtama = \App\Models\Info::with('details')
                        ->where('id_info_jenis', 1)
                        ->where('info_status', 0)
                        ->orderBy('info_tanggal', 'desc')
                        ->first();

        // Ambil 4 Berita Terbaru lainnya (untuk list samping)
        $beritaLainnya = \App\Models\Info::with('details')
                        ->where('id_info_jenis', 1)
                        ->where('info_status', 0)
                        ->where('info_id', '!=', $beritaUtama->info_id ?? '')
                        ->orderBy('info_tanggal', 'desc')
                        ->take(4)
                        ->get();

        // Ambil Gambar Random dari Berita untuk Galeri
        $galeriRandom = \App\Models\InfoDetail::whereHas('info', function($q){
                            $q->where('id_info_jenis', 1)->where('info_status', 0);
                        })
                        ->where('info_judul_file', 'Gambar Berita')
                        ->inRandomOrder()
                        ->take(5)
                        ->get();

        return view('laman.home', compact('pengumuman', 'beritaUtama', 'beritaLainnya', 'galeriRandom'));
    }
}
