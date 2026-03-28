<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use App\Models\StandarPelayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function standar(Request $request)
    {
        $query = StandarPelayanan::query();

        // Fitur Pencarian berdasarkan 'sp_uraian'
        if ($request->filled('cari')) {
            $query->where('sp_uraian', 'like', '%' . $request->cari . '%');
        }

        // Tampilkan 12 data per halaman dan urutkan berdasarkan ID
        $standar = $query->orderBy('sp_id', 'asc')->paginate(12);
        
        // Mempertahankan query pencarian saat pindah halaman paginasi
        $standar->appends(['cari' => $request->cari]);

        return view('laman.layanan.standar', compact('standar'));
    }
}