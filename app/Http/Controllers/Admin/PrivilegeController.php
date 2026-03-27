<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privilege;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class PrivilegeController extends Controller
{
    public function index()
    {
        // UBAH 'users' MENJADI NAMA TABEL PENGGUNA ANDA (misal: 't_user' atau 'pengguna')
        // Asumsi kolom primary key-nya adalah 'id' dan ada kolom 'name' atau 'username'
        $users = DB::table('t_user')->get(); 

        return view('admin.privilege.index', compact('users'));
    }

    public function edit($id)
    {
        // UBAH 'users' MENJADI NAMA TABEL PENGGUNA ANDA
        $user = DB::table('t_user')->where('t_user_id', $id)->first(); 

        // Ambil semua menu Parent beserta Child-nya
        $menus = Menu::with('childMenus')
                    ->where('menu_type', 0)
                    ->orderBy('menu_index', 'asc')
                    ->get();

        // Ambil hak akses menu yang saat ini dimiliki user (bentuk array ID)
        $userPrivileges = Privilege::where('t_user_id', $id)
                            ->where('priv_status', 1)
                            ->pluck('s_menu_id')
                            ->toArray();

        return view('admin.privilege.form', compact('user', 'menus', 'userPrivileges'));
    }

    public function update(Request $request, $id)
    {
        // Daftar menu_id yang dicentang oleh admin
        $selectedMenus = $request->input('menus', []);

        // 1. Hapus semua hak akses lama untuk user ini (Biar bersih)
        Privilege::where('t_user_id', $id)->delete();

        // 2. Siapkan data baru untuk di-insert
        $dataToInsert = [];
        foreach ($selectedMenus as $menuId) {
            $dataToInsert[] = [
                't_user_id'   => $id,
                's_menu_id'   => $menuId,
                'priv_status' => 1 // 1 = Punya Akses
            ];
        }

        // 3. Insert data hak akses yang baru
        if (count($dataToInsert) > 0) {
            Privilege::insert($dataToInsert);
        }

        return redirect()->route('admin.privilege.index')->with('success', 'Hak akses pengguna berhasil diperbarui!');
    }
}