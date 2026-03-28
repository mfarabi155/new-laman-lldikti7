<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use App\Models\Peraturan;
use App\Models\PeraturanJenis;
use Illuminate\Http\Request;

class PeraturanController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua data jenis peraturan untuk mengisi dropdown filter
        $jenisPeraturan = PeraturanJenis::all();

        // 2. Mulai query utama untuk mengambil data peraturan beserta relasi 'jenis'-nya
        $query = Peraturan::with('jenis');

        // 3. Logika Filter Berdasarkan Kategori (Dropdown)
        if ($request->filled('kategori')) {
            $query->where('peraturan_jenis', $request->kategori);
        }

        // 4. Logika Filter Berdasarkan Pencarian Teks (Kolom Input)
        if ($request->filled('search')) {
            $search = $request->search;
            // Gunakan closure (function) agar pencarian OR dibungkus dalam kurung () di query SQL
            $query->where(function($q) use ($search) {
                $q->where('peraturan_tentang', 'like', "%{$search}%")
                  ->orWhere('peraturan_nomor', 'like', "%{$search}%");
            });
        }

        // 5. Eksekusi query dengan paginasi
        // Diurutkan berdasarkan tahun terbaru, lalu ID terbaru
        $peraturan = $query->orderBy('peraturan_tahun', 'desc')
                           ->orderBy('peraturan_id', 'desc')
                           ->paginate(10);

        // 6. Kirim data ke view laman.peraturan (sesuaikan dengan nama file blade Anda)
        return view('laman.peraturan.index', compact('peraturan', 'jenisPeraturan'));
    }
}