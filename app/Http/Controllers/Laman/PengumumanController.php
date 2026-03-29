<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $query = Info::leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 0)
                    ->where('info_status', 0);

        if ($request->has('cari') && $request->cari != '') {
            $query->where('info_judul', 'like', '%' . $request->cari . '%');
        }

        $pengumuman = $query->orderBy('info_tanggal', 'desc')->paginate(9);

        $pengumuman->appends(['cari' => $request->cari]);

        return view('laman.pengumuman.index', compact('pengumuman'));
    }


    public function show($slug)
    {
        $pengumuman = Info::with('details')
                    ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 0)
                    ->where('info_status', 0)
                    ->where('slug', $slug)
                    ->firstOrFail();

        $infoId = $pengumuman->info_id;
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

        // 2. Ambil 4 informasi terbaru untuk ditaruh di Sidebar
        $informasiTerbaru = Info::leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
                    ->select('t_info.*', 't_bagian.bagian_nama')
                    ->where('id_info_jenis', 0)
                    ->where('info_status', 0)
                    ->where('info_id', '!=', $pengumuman->info_id) // Kecualikan pengumuman yang sedang dibaca
                    ->orderBy('info_tanggal', 'desc')
                    ->take(4)
                    ->get();

        // Mengembalikan view show yang sudah kita buat sebelumnya
        return view('laman.pengumuman.show', compact('pengumuman', 'informasiTerbaru', 'totalViews'));
    }
}