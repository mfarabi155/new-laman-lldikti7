<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        // Menampilkan menu, diurutkan berdasarkan parent dan urutannya
        $menus = Menu::with('parentMenu')
            ->orderBy('menu_type', 'asc')
            ->orderBy('menu_parent', 'asc')
            ->orderBy('menu_index', 'asc')
            ->get();

        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        // Hanya ambil menu bertipe Parent (0) untuk pilihan dropdown
        $parents = Menu::where('menu_type', 0)->orderBy('menu_index', 'asc')->get();
        return view('admin.menu.form', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_nama'  => 'required|string|max:255',
            'menu_type'  => 'required|in:0,1', // 0: Parent, 1: Child
            'menu_link'  => 'required|string',
            'menu_icon'  => 'nullable|string',
            'menu_index' => 'required|integer',
        ]);

        Menu::create([
            'menu_nama'         => $request->menu_nama,
            'menu_type'         => $request->menu_type,
            'menu_link'         => $request->menu_link,
            'menu_alias'        => \Illuminate\Support\Str::slug($request->menu_nama),
            'menu_icon'         => $request->menu_icon ?? '',
            'menu_parent'       => $request->menu_type == 0 ? 0 : $request->menu_parent,
            'menu_index'        => $request->menu_index,
            'menu_status_aktif' => $request->menu_status_aktif ?? 0, // 0: Aktif, 1: Tidak Aktif
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $parents = Menu::where('menu_type', 0)->orderBy('menu_index', 'asc')->get();
        return view('admin.menu.form', compact('menu', 'parents'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'menu_nama'  => 'required|string|max:255',
            'menu_type'  => 'required|in:0,1',
            'menu_link'  => 'required|string',
            'menu_icon'  => 'nullable|string',
            'menu_index' => 'required|integer',
        ]);

        $menu->update([
            'menu_nama'         => $request->menu_nama,
            'menu_type'         => $request->menu_type,
            'menu_link'         => $request->menu_link,
            'menu_alias'        => \Illuminate\Support\Str::slug($request->menu_nama),
            'menu_icon'         => $request->menu_icon ?? '',
            'menu_parent'       => $request->menu_type == 0 ? 0 : $request->menu_parent,
            'menu_index'        => $request->menu_index,
            'menu_status_aktif' => $request->menu_status_aktif ?? 0,
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        
        // Opsional: Hapus juga child menu jika parent dihapus
        if ($menu->menu_type == 0) {
            Menu::where('menu_parent', $menu->menu_id)->delete();
        }

        $menu->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}