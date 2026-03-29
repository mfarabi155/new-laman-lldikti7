<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info; // Sesuaikan dengan Model Anda

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('q');

        // Mencegah pencarian kosong
        if (empty($keyword)) {
            return redirect()->back();
        }

        // Cari Berita (Asumsi id_info_jenis = 1)
        $berita = Info::with('details')
            ->where('id_info_jenis', 1)
            ->where('info_status', 0)
            ->where(function($query) use ($keyword) {
                $query->where('info_judul', 'like', "%{$keyword}%")
                      ->orWhere('info_isi', 'like', "%{$keyword}%");
            })
            ->orderBy('info_tanggal', 'desc')
            ->get();

        // Cari Pengumuman (Asumsi id_info_jenis = 0)
        $pengumuman = Info::where('id_info_jenis', 0) // Ganti ID sesuai DB Anda
            ->where('info_status', 0)
            ->where(function($query) use ($keyword) {
                $query->where('info_judul', 'like', "%{$keyword}%")
                      ->orWhere('info_isi', 'like', "%{$keyword}%");
            })
            ->orderBy('info_tanggal', 'desc')
            ->get();

        $totalResults = $berita->count() + $pengumuman->count();

        return view('laman.search', compact('keyword', 'berita', 'pengumuman', 'totalResults'));
    }
}
