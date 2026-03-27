<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class MenuService
{
    /**
     * Mengambil menu dinamis berdasarkan hak akses user.
     */
    public function getAdminMenu()
    {
        // Ganti 'admin_id' dengan nama session atau Auth yang Anda gunakan untuk menyimpan ID user.
        $userId = session('admin_id'); 

        if (!$userId) {
            return [];
        }

        // Ambil semua menu yang diizinkan (priv_status = 1) dan menu aktif (menu_status_aktif = 0)
        $menus = DB::table('s_menu')
            ->join('s_privilege', 's_menu.menu_id', '=', 's_privilege.s_menu_id')
            ->where('s_privilege.t_user_id', $userId)
            ->where('s_privilege.priv_status', 1)
            ->where('s_menu.menu_status_aktif', 0)
            ->orderBy('s_menu.menu_index', 'asc')
            ->select('s_menu.*')
            ->get();

        $groupedMenu = [];

        // 1. Pisahkan menu Parent (menu_type = 0)
        foreach ($menus as $menu) {
            if ($menu->menu_type == 0) {
                $groupedMenu[$menu->menu_id] = [
                    'header'   => $menu,
                    'children' => []
                ];
            }
        }

        // 2. Masukkan menu Child (menu_type = 1) ke dalam Parent-nya masing-masing
        foreach ($menus as $menu) {
            if ($menu->menu_type == 1 && isset($groupedMenu[$menu->menu_parent])) {
                $groupedMenu[$menu->menu_parent]['children'][] = $menu;
            }
        }

        return $groupedMenu;
    }
}