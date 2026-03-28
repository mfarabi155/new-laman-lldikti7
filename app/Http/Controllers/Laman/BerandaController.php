<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // // Ambil 4 Pengumuman Terbaru (id_info_jenis = 0)
        // $pengumuman = \App\Models\Info::where('id_info_jenis', 0)
        //                 ->where('info_status', 0)
        //                 ->orderBy('info_tanggal', 'desc')
        //                 ->take(4)
        //                 ->get();

        // // Ambil 1 Berita Utama (Terbaru)
        // $beritaUtama = \App\Models\Info::with('details')
        //                 ->where('id_info_jenis', 1)
        //                 ->where('info_status', 0)
        //                 ->orderBy('info_tanggal', 'desc')
        //                 ->first();

        // // Ambil 4 Berita Terbaru lainnya (untuk list samping)
        // $beritaLainnya = \App\Models\Info::with('details')
        //                 ->where('id_info_jenis', 1)
        //                 ->where('info_status', 0)
        //                 ->where('info_id', '!=', $beritaUtama->info_id ?? '')
        //                 ->orderBy('info_tanggal', 'desc')
        //                 ->take(4)
        //                 ->get();

        // // Ambil Gambar Random dari Berita untuk Galeri
        // $galeriRandom = \App\Models\InfoDetail::whereHas('info', function($q){
        //                     $q->where('id_info_jenis', 1)->where('info_status', 0);
        //                 })
        //                 ->where('info_judul_file', 'Gambar Berita')
        //                 ->inRandomOrder()
        //                 ->take(5)
        //                 ->get();

        $pengumuman = \App\Models\Info::where('id_info_jenis', 0)
            ->where('info_status', 0)
            ->orderBy('info_tanggal', 'desc')
            ->take(4)
            ->get();

        $beritaUtama = \App\Models\Info::with('details')
            ->where('id_info_jenis', 1)
            ->where('info_status', 0)
            ->orderBy('info_tanggal', 'desc')
            ->first();

        $beritaLainnya = \App\Models\Info::with('details')
            ->where('id_info_jenis', 1)
            ->where('info_status', 0)
            ->where('info_id', '!=', $beritaUtama->info_id ?? '')
            ->orderBy('info_tanggal', 'desc')
            ->take(4)
            ->get();

        // 1. Ambil 20 gambar random dari database (ambil lebih banyak dari 5 untuk cadangan)
        $potensiGaleri = \App\Models\InfoDetail::with('info')
            ->whereHas('info', function ($q) {
                $q->where('id_info_jenis', 1)->where('info_status', 0);
            })
            ->whereNotNull('info_file')
            ->where('info_file', '!=', '')
            ->inRandomOrder()
            ->take(20)
            ->get();

        // 2. Filter koleksi: Hanya simpan item yang file fisiknya benar-benar ADA di server
        $galeriRandom = $potensiGaleri->filter(function ($item) {
            $filename = basename($item->info_file);

            // Cek di ketiga kemungkinan lokasi
            $adaDiBerita = file_exists(public_path('storage/berita/' . $filename));
            $adaDiOldBerita = file_exists(public_path('storage/oldberita/' . $filename));
            $adaDiDefault = file_exists(public_path('storage/' . $item->info_file));

            // Kembalikan true (simpan data) HANYA JIKA salah satu file ada
            return $adaDiBerita || $adaDiOldBerita || $adaDiDefault;
        })
            ->take(5); // 3. Setelah difilter, barulah potong tepat 5 item untuk galeri

        return view('laman.home', compact('pengumuman', 'beritaUtama', 'beritaLainnya', 'galeriRandom'));
    }
}
