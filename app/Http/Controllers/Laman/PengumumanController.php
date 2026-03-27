<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;

class PengumumanController extends Controller
{
    /**
     * Menampilkan daftar semua pengumuman di halaman publik (laman)
     */
    public function index(Request $request)
    {
        // Query dasar: Ambil data pengumuman (id_info_jenis = 0) yang aktif (info_status = 0)
        $query = Info::leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 0)
                    ->where('info_status', 0);

        // Fitur Pencarian (Opsional, tapi sangat berguna untuk publik)
        if ($request->has('cari') && $request->cari != '') {
            $query->where('info_judul', 'like', '%' . $request->cari . '%');
        }

        // Urutkan dari yang terbaru dan paginasi (misal 9 item per halaman agar pas grid 3x3)
        $pengumuman = $query->orderBy('info_tanggal', 'desc')->paginate(9);

        // Jangan lupa sertakan query string saat pindah halaman paginasi
        $pengumuman->appends(['cari' => $request->cari]);

        // Mengembalikan view index (Anda perlu membuat view ini nanti jika belum ada)
        return view('laman.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Menampilkan detail isi satu pengumuman (berdasarkan slug)
     */
    public function show($slug)
    {
        // 1. Ambil data pengumuman utama beserta relasi lampirannya (details)
        $pengumuman = Info::with('details')
                    ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 0) // Pastikan ini pengumuman
                    ->where('info_status', 0)   // Pastikan statusnya Tampil
                    ->where('slug', $slug)
                    ->firstOrFail(); // Jika slug tidak ditemukan, otomatis error 404

        // 2. Ambil 4 informasi terbaru untuk ditaruh di Sidebar
        $informasiTerbaru = Info::leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 0)
                    ->where('info_status', 0)
                    ->where('info_id', '!=', $pengumuman->info_id) // Kecualikan pengumuman yang sedang dibaca
                    ->orderBy('info_tanggal', 'desc')
                    ->take(4)
                    ->get();

        // Mengembalikan view show yang sudah kita buat sebelumnya
        return view('laman.pengumuman.show', compact('pengumuman', 'informasiTerbaru'));
    }
}