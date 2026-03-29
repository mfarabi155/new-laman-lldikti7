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
    public function index()
    {
        // Join dengan t_bagian agar kita bisa menampilkan 'bagian_nama' di tabel HTML
        $pengguna = User::leftJoin('t_bagian', 't_user.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_user.*', 't_bagian.bagian_nama')
            ->orderBy('t_user.t_user_created_date', 'desc')
            ->paginate(10);
            
        return view('admin.pengguna.index', compact('pengguna'));
    }

    /**
     * Menampilkan form untuk menambah pengguna baru (Create)
     */
    public function create()
    {
        // Ambil data bagian dinamis dari tabel t_bagian (Asumsi status '1' adalah aktif)
        $pilihanBagian = DB::table('t_bagian')->where('status', '1')->get();
        
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