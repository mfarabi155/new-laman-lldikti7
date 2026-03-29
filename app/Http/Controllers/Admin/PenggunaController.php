<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk memanggil tabel t_bagian

class PenggunaController extends Controller
{
    /**
     * Menampilkan daftar pengguna (Read)
     */
    public function index(Request $request)
    {
        // 1. Tangkap parameter dari URL
        $search = $request->input('search');
        $bagianId = $request->input('bagian_id'); // Parameter baru untuk dropdown
        $perPage = $request->input('per_page', 10);

        // 2. Ambil data Bagian untuk ditampilkan di Dropdown Blade
        $pilihanBagian = DB::table('t_bagian')->where('status', '1')->get();

        // 3. Siapkan Query Dasar (Join)
        $query = User::leftJoin('t_bagian', 't_user.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_user.*', 't_bagian.bagian_nama');

        // 4. Logika Pencarian Username
        if (!empty($search)) {
            $query->where('t_user.t_user_username', 'LIKE', '%' . $search . '%');
        }

        // 5. Logika Filter Filter Bagian (Dropdown)
        if (!empty($bagianId)) {
            $query->where('t_user.t_bagian_id', $bagianId);
        }

        // 6. Eksekusi Query dengan Paginasi Dinamis
        $pengguna = $query->orderBy('t_user.t_user_created_date', 'desc')
            ->paginate($perPage);

        // 7. Pertahankan parameter URL saat pindah halaman paginasi
        $pengguna->appends([
            'search' => $search,
            'bagian_id' => $bagianId,
            'per_page' => $perPage
        ]);

        return view('admin.pengguna.index', compact('pengguna', 'pilihanBagian'));
    }

    /**
     * Menampilkan form untuk menambah pengguna baru (Create)
     */
    public function create()
    {
        // Ambil data bagian dinamis dari tabel t_bagian (Asumsi status '1' adalah aktif)
        $pilihanBagian = DB::table('t_bagian')->where('status', '0')->get();

        return view('admin.pengguna.form', compact('pilihanBagian'));
    }

    /**
     * Memproses penyimpanan data pengguna baru (Store)
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'  => 'required|string|max:100|unique:t_user,t_user_username',
            'password'  => 'required|string|min:6',
            'bagian_id' => 'required|integer',
        ], [
            'username.unique' => 'Username ini sudah digunakan, silakan pilih yang lain.'
        ]);

        $lastIdx = User::max('idx') ?? 0;

        User::create([
            't_user_id'           => Str::random(22),
            'idx'                 => $lastIdx + 1,
            't_user_username'     => $request->username,
            't_user_password'     => Hash::make($request->password),
            //'t_user_password'     => md5($request->password),
            't_bagian_id'         => $request->bagian_id,
            't_user_islogin'      => 0,
            't_user_status'       => 1,
            't_user_created_date' => now(),
            't_user_created_by'   => Auth::check() ? Auth::user()->t_user_username : 'System',
        ]);

        return redirect('/pangkalan/pengguna')->with('success', 'Pengguna baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengubah data pengguna (Edit)
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $pilihanBagian = DB::table('t_bagian')->where('status', '1')->get();

        return view('admin.pengguna.form', compact('user', 'pilihanBagian'));
    }

    /**
     * Memproses pembaruan data pengguna (Update)
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'username'  => 'required|string|max:100|unique:t_user,t_user_username,' . $id . ',t_user_id',
            'bagian_id' => 'required|integer',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6';
        }

        $request->validate($rules);

        $user->t_user_username = $request->username;
        $user->t_bagian_id     = $request->bagian_id;

        if ($request->filled('password')) {
            $user->t_user_password = Hash::make($request->password);
        }

        $user->t_user_updated_date = now();
        $user->t_user_updated_by   = Auth::check() ? Auth::user()->t_user_username : 'System';

        $user->save();

        return redirect('/pangkalan/pengguna')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    /**
     * Menonaktifkan / Mengaktifkan pengguna (Toggle Status) menggantikan fungsi Hapus
     */
    public function disable($id)
    {
        $user = User::findOrFail($id);

        // Logika Toggle: Jika status 1 (Aktif) jadikan 0 (Nonaktif). Sebaliknya.
        $newStatus = ($user->t_user_status == 1) ? 0 : 1;
        $user->t_user_status = $newStatus;

        $user->t_user_updated_date = now();
        $user->t_user_updated_by   = Auth::check() ? Auth::user()->t_user_username : 'System';

        $user->save();

        $pesan = $newStatus == 1 ? 'diaktifkan kembali!' : 'dinonaktifkan!';
        return redirect('/pangkalan/pengguna')->with('success', 'Status pengguna berhasil ' . $pesan);
    }
}
