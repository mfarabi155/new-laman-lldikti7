<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\InfoDetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil Data t_bagian_id dari SESSION
        $userBagianId = session('admin_bagian_id');

        // SESUAIKAN ID DEVELOPER (0)
        $idDeveloper = 0;
        $isDeveloper = ($userBagianId == $idDeveloper);

        // 2. Tangkap parameter filter
        $search    = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');
        $status    = $request->input('status');
        $bagianId  = $request->input('bagian');
        $perPage   = $request->input('per_page', 10);

        // Ambil data Bagian untuk Dropdown (Hanya jika Developer yang login)
        $pilihanBagian = collect();
        if ($isDeveloper) {
            $pilihanBagian = \Illuminate\Support\Facades\DB::table('t_bagian')->get();
        }

        // 3. Siapkan Query Dasar (Jenis 1 = Berita)
        $query = \App\Models\Info::leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->where('id_info_jenis', 1);

        // =======================================================
        // 4. LOGIKA PEMBATASAN DATA BERDASARKAN BAGIAN
        // =======================================================
        if (!$isDeveloper) {
            // Jika BUKAN Developer, KUNCI query HANYA untuk bagiannya sendiri
            $query->where('t_info.t_bagian_id', $userBagianId);
        } else {
            // JIKA Developer, jalankan filter Dropdown Bagian (jika dipilih)
            if (!empty($bagianId)) {
                $query->where('t_info.t_bagian_id', $bagianId);
            }
        }

        // 5. Terapkan Filter Lainnya
        if (!empty($search)) {
            $query->where('info_judul', 'LIKE', '%' . $search . '%');
        }

        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('info_tanggal', [$startDate, $endDate]);
        } elseif (!empty($startDate)) {
            $query->where('info_tanggal', '>=', $startDate);
        } elseif (!empty($endDate)) {
            $query->where('info_tanggal', '<=', $endDate);
        }

        if (isset($status) && $status !== '') {
            $query->where('info_status', $status);
        }

        // 6. Eksekusi Query dan Paginasi
        $berita = $query->orderBy('info_tanggal', 'desc')
            ->paginate($perPage);

        // Pertahankan URL param saat pindah halaman
        $berita->appends($request->all());

        return view('admin.berita.index', compact('berita', 'pilihanBagian', 'isDeveloper'));
    }

    public function create()
    {
        return view('admin.berita.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'info_tanggal' => 'required|date',
            'info_judul'   => 'required|string|max:625',
            'info_isi'     => 'required',
            'gambar.*'     => 'image|mimes:jpeg,png,jpg,webp|max:5120', // Limit diubah ke 5120 (5MB)
        ], [
            // Pesan error kustom bahasa Indonesia
            'gambar.*.max'   => 'Maaf, ukuran maksimal setiap gambar adalah 5MB.',
            'gambar.*.image' => 'File yang diupload harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar yang diperbolehkan hanya JPG, JPEG, PNG, dan WEBP.',
        ]);

        $infoId = Str::random(22);
        $adminId = session('admin_id') ?? 'System';
        $bagianId = session('admin_bagian_id') ?? 1;

        Info::create([
            'info_id'       => $infoId,
            'id_info_jenis' => 1, // 1 = Berita
            't_bagian_id'   => $bagianId,
            'info_status'   => 0,
            'info_judul'    => $request->info_judul,
            'slug'          => Str::slug($request->info_judul . '-' . Str::random(5)),
            'info_isi'      => $request->info_isi,
            'info_tanggal'  => $request->info_tanggal,
            'id_created'    => $adminId,
        ]);

        // Proses Multi-Upload Gambar
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('berita', 'public');

                InfoDetail::create([
                    't_info_id'       => $infoId,
                    'info_judul_file' => 'Gambar Berita', // Penanda bahwa ini adalah gambar
                    'info_file'       => $path,
                ]);
            }
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Info::with('details')->findOrFail($id);
        // Cari gambar cover dari relasi details
        $cover = $berita->details->where('info_judul_file', 'Cover Berita')->first();

        return view('admin.berita.form', compact('berita', 'cover'));
    }

    public function update(Request $request, $id)
    {
        $berita = Info::findOrFail($id);

        $request->validate([
            'info_tanggal' => 'required|date',
            'info_judul'   => 'required|string|max:625',
            'info_isi'     => 'required',
            'gambar.*'     => 'image|mimes:jpeg,png,jpg,webp|max:5120', // Limit diubah ke 5120 (5MB)
        ], [
            // Pesan error kustom bahasa Indonesia
            'gambar.*.max'   => 'Maaf, ukuran maksimal setiap gambar adalah 5MB.',
            'gambar.*.image' => 'File yang diupload harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar yang diperbolehkan hanya JPG, JPEG, PNG, dan WEBP.',
        ]);

        $adminId = session('admin_id') ?? 'System';

        $berita->update([
            'info_judul'   => $request->info_judul,
            'slug'         => Str::slug($request->info_judul . '-' . Str::random(5)),
            'info_isi'     => $request->info_isi,
            'info_tanggal' => $request->info_tanggal,
            'id_updated'   => $adminId,
        ]);

        // Jika user mengunggah gambar baru, kita ganti/timpa gambar lamanya
        if ($request->hasFile('gambar')) {
            // 1. Cari dan hapus semua gambar lama terkait berita ini
            $gambarLama = InfoDetail::where('t_info_id', $id)->where('info_judul_file', 'Gambar Berita')->get();
            foreach ($gambarLama as $lama) {
                if (\Illuminate\Support\Facades\Storage::disk('public')->exists($lama->info_file)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($lama->info_file);
                }
                $lama->delete(); // Hapus dari database
            }

            // 2. Simpan gambar-gambar yang baru diupload
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('berita', 'public');
                InfoDetail::create([
                    't_info_id'       => $id,
                    'info_judul_file' => 'Gambar Berita',
                    'info_file'       => $path,
                ]);
            }
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function disable($id)
    {
        $info = Info::findOrFail($id);
        $info->info_status = $info->info_status == 0 ? 1 : 0;
        $info->save();

        return back()->with('success', 'Status berita berhasil diubah!');
    }
}
