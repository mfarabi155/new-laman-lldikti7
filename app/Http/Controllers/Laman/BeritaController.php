<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        // Hapus filter where info_judul_file karena di DB lama kolom ini ternyata kosong
        $query = Info::with(['details'])
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
        // Ambil detail berita beserta semua gambarnya (hapus filter info_judul_file)
        $berita = Info::with('details')
            ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->where('id_info_jenis', 1)
            ->where('info_status', 0)
            ->where('slug', $slug)
            ->firstOrFail();

        // Ambil 4 berita terbaru untuk sidebar (hapus filter info_judul_file)
        $beritaTerbaru = Info::with('details')
            ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->where('id_info_jenis', 1)
            ->where('info_status', 0)
            ->where('info_id', '!=', $berita->info_id) // Kecualikan berita yang sedang dibaca
            ->orderBy('info_tanggal', 'desc')
            ->take(4)
            ->get();

        return view('laman.berita.show', compact('berita', 'beritaTerbaru'));
    }
}
