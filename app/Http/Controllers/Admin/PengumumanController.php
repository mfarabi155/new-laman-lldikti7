<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\InfoDetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    // 1. Menampilkan Daftar Pengumuman
    public function index()
    {
        $pengumuman = Info::leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->where('id_info_jenis', 0)
            ->orderBy('info_tanggal', 'desc')
            ->paginate(10);

        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    // 2. Menampilkan Form Tambah
    public function create()
    {
        return view('admin.pengumuman.form');
    }

    // 3. Menyimpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'info_tanggal' => 'required|date',
            'info_judul'   => 'required|string|max:625',
            'info_isi'     => 'required',
            // Validasi array lampiran
            'judul_file.*' => 'nullable|string',
            'link_file.*'  => 'nullable|string',
        ]);

        $infoId = Str::random(22); // Sesuai tipe data varchar(22) di database
        dd(Auth::user()->t_bagian_id);
        // Simpan Data Utama
        Info::create([
            'info_id'       => $infoId,
            'id_info_jenis' => 0, // 0 = Pengumuman
            't_bagian_id'   => Auth::user()->t_bagian_id ?? 1, // Jika admin punya bagian
            'info_status'   => 0, // 0 = Unhide/Aktif
            'info_judul'    => $request->info_judul,
            'slug'          => Str::slug($request->info_judul . '-' . Str::random(5)),
            'info_isi'      => $request->info_isi,
            'info_tanggal'  => $request->info_tanggal,
            'id_created'    => Auth::user()->t_user_id ?? 'System',
        ]);

        // Simpan Lampiran Berkas (Jika ada)
        $this->simpanLampiran($request, $infoId);

        return redirect('k0p3rt1s4dm1n/pengumuman')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    // 4. Menampilkan Form Edit
    public function edit($id)
    {
        // Gunakan with('details') agar data lampiran ikut terpanggil
        $pengumuman = Info::with('details')->findOrFail($id);
        return view('admin.pengumuman.form', compact('pengumuman'));
    }

    // 5. Menyimpan Perubahan
    public function update(Request $request, $id)
    {
        $info = Info::findOrFail($id);

        $request->validate([
            'info_tanggal' => 'required|date',
            'info_judul'   => 'required|string|max:625',
            'info_isi'     => 'required',
        ]);

        $info->update([
            'info_judul'   => $request->info_judul,
            'slug'         => Str::slug($request->info_judul . '-' . Str::random(5)),
            'info_isi'     => $request->info_isi,
            'info_tanggal' => $request->info_tanggal,
            'id_updated'   => Auth::user()->t_user_id ?? 'System',
        ]);

        // Hapus lampiran lama, dan insert yang baru (Cara paling bersih & simpel)
        InfoDetail::where('t_info_id', $id)->delete();
        $this->simpanLampiran($request, $id);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    // 6. Mengubah Status (Hide/Unhide)
    public function disable($id)
    {
        $info = Info::findOrFail($id);
        $info->info_status = $info->info_status == 0 ? 1 : 0;
        $info->save();

        return back()->with('success', 'Status pengumuman berhasil diubah!');
    }

    // Fungsi Bantuan untuk Looping dan Menyimpan Lampiran
    private function simpanLampiran($request, $infoId)
    {
        if ($request->has('judul_file') && $request->has('link_file')) {
            foreach ($request->judul_file as $key => $judulFile) {
                // Hanya simpan jika judul dan link diisi
                if (!empty($judulFile) && !empty($request->link_file[$key])) {
                    InfoDetail::create([
                        't_info_id'       => $infoId,
                        'info_judul_file' => $judulFile,
                        'info_file'       => $request->link_file[$key],
                    ]);
                }
            }
        }
    }
}
