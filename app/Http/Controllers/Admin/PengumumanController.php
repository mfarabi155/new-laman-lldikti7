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
    public function index(Request $request)
    {
        // 1. Ambil Data User yang sedang Login
        $userBagianId = session('admin_bagian_id');

        // SESUAIKAN ID DEVELOPER MENJADI 0
        $idDeveloper = 0;
        $isDeveloper = ($userBagianId == $idDeveloper);

        // 2. Tangkap parameter filter
        $search    = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');
        $status    = $request->input('status');
        $bagianId  = $request->input('bagian');
        $perPage   = $request->input('per_page', 10);

        // Ambil data Bagian untuk Dropdown (Hanya diambil jika Developer yang login)
        $pilihanBagian = collect();
        if ($isDeveloper) {
            $pilihanBagian = \Illuminate\Support\Facades\DB::table('t_bagian')->get();
        }

        // 3. Siapkan Query Dasar
        $query = Info::leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->where('id_info_jenis', 0); // 0 untuk Pengumuman

        if (!$isDeveloper) {
            // Jika BUKAN Developer (bukan 0), KUNCI query HANYA untuk bagiannya sendiri
            $query->where('t_info.t_bagian_id', $userBagianId);
        } else {
            // JIKA Developer (ID 0), jalankan filter Dropdown Bagian (jika dia memilih filter)
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
        $pengumuman = $query->orderBy('info_tanggal', 'desc')
            ->paginate($perPage);

        $pengumuman->appends($request->all());

        // Kirim juga variabel $isDeveloper ke Blade
        return view('admin.pengumuman.index', compact('pengumuman', 'pilihanBagian', 'isDeveloper'));
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
            
            // Simpan Data Utama (Gunakan session, BUKAN Auth::user())
            Info::create([
                'info_id'       => $infoId,
                'id_info_jenis' => 0, // 0 = Pengumuman
                't_bagian_id'   => session('admin_bagian_id', 1), // Ambil dari session
                'info_status'   => 0, // 0 = Unhide/Aktif
                'info_judul'    => $request->info_judul,
                'slug'          => Str::slug($request->info_judul . '-' . Str::random(5)),
                'info_isi'      => $request->info_isi,
                'info_tanggal'  => $request->info_tanggal,
                'id_created'    => session('admin_id', 'System'), // Ambil dari session
            ]);

            // Simpan Lampiran Berkas (Jika ada)
            $this->simpanLampiran($request, $infoId);

            return redirect('pangkalan/pengumuman')->with('success', 'Pengumuman berhasil ditambahkan!');
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

            // Gunakan session untuk id_updated
            $info->update([
                'info_judul'   => $request->info_judul,
                'slug'         => Str::slug($request->info_judul . '-' . Str::random(5)),
                'info_isi'     => $request->info_isi,
                'info_tanggal' => $request->info_tanggal,
                'id_updated'   => session('admin_id', 'System'), // Ambil dari session
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
