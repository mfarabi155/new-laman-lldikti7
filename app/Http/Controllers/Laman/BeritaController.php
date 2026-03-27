<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil berita (jenis 1) yang berstatus tampil (0), sertakan relasi detail (untuk gambar cover)
        $query = Info::with(['details' => function($q) {
                        $q->where('info_judul_file', 'Gambar Berita');
                    }])
                    ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 1)
                    ->where('info_status', 0);

        if ($request->has('cari') && $request->cari != '') {
            $query->where('info_judul', 'like', '%' . $request->cari . '%');
        }

        $berita = $query->orderBy('info_tanggal', 'desc')->paginate(9);
        $berita->appends(['cari' => $request->cari]);

        return view('laman.berita.index', compact('berita'));
    }

    public function show($slug)
    {
        // Ambil detail berita beserta semua gambarnya
        $berita = Info::with(['details' => function($q) {
                        $q->where('info_judul_file', 'Gambar Berita');
                    }])
                    ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 1)
                    ->where('info_status', 0)
                    ->where('slug', $slug)
                    ->firstOrFail();

        // Ambil 4 berita terbaru untuk sidebar
        $beritaTerbaru = Info::with(['details' => function($q) {
                        $q->where('info_judul_file', 'Gambar Berita');
                    }])
                    ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 1)
                    ->where('info_status', 0)
                    ->where('info_id', '!=', $berita->info_id)
                    ->orderBy('info_tanggal', 'desc')
                    ->take(4)
                    ->get();

        return view('laman.berita.show', compact('berita', 'beritaTerbaru'));
    }
}