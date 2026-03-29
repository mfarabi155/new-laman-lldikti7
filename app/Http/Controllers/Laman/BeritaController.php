<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        // Hapus filter where info_judul_file karena di DB lama kolom ini ternyata kosong
        $query = Info::with(['details'])
            ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->where('id_info_jenis', 1)
            ->where('info_status', 0);

        if ($request->has('cari') && $request->cari != '') {
            $query->where('info_judul', 'like', '%' . $request->cari . '%');
        }

        $berita = $query->orderBy('info_tanggal', 'desc')->paginate(9);
        $berita->appends(['cari' => $request->cari]);

        return view('laman.berita.index', compact('berita'));
    }

    public function show($slug)
    {
        // Cari berita berdasarkan slug ATAU info_id (untuk data lama)
        $berita = Info::with('details')
            ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->where('id_info_jenis', 1)
            ->where('info_status', 0)
            ->where(function ($query) use ($slug) {
                // Mengecek ke kolom slug ATAU kolom info_id
                $query->where('slug', $slug)
                    ->orWhere('info_id', $slug);
            })
            ->firstOrFail();

        $infoId = $berita->info_id;
        $ipAddress = request()->ip(); // Ambil IP pengunjung
        $today = Carbon::today();

        $hasVisited = DB::table('t_info_ip_logs')
            ->where('info_id', $infoId)
            ->where('ip_address', $ipAddress)
            ->whereDate('accessed_at', $today)
            ->exists();
        
        if (!$hasVisited) {
            DB::table('t_info_ip_logs')->insert([
                'info_id'     => $infoId,
                'ip_address'  => $ipAddress,
                'accessed_at' => Carbon::now(),
            ]);
        
        $statistik = DB::table('t_info_statistik')->where('info_id', $infoId)->first();
            
        if ($statistik) {
            DB::table('t_info_statistik')->where('info_id', $infoId)->increment('views');
        } else {
            DB::table('t_info_statistik')->insert([
                'info_id'    => $infoId,
                'views'      => 1,
                'shares'     => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
            }
        }

        // 3. Ambil Total View Terbaru untuk dikirim ke Blade
        $dataStatistik = DB::table('t_info_statistik')->where('info_id', $infoId)->first();
        $totalViews = $dataStatistik ? $dataStatistik->views : 0;

        // Ambil 4 berita terbaru untuk sidebar
        $beritaTerbaru = Info::with('details')
            ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->where('id_info_jenis', 1)
            ->where('info_status', 0)
            ->where('info_id', '!=', $berita->info_id)
            ->orderBy('info_tanggal', 'desc')
            ->take(4)
            ->get();

        return view('laman.berita.show', compact('berita', 'beritaTerbaru', 'totalViews'));
    }
}
