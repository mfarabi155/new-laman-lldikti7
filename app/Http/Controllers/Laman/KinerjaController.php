<?php

namespace App\Http\Controllers\Laman;

use App\Http\Controllers\Controller;
use App\Models\Info;

class KinerjaController extends Controller
{
    public function renstra()
    {
        $pengumumanTerkini = Info::where('id_info_jenis', 0) // 0 = Pengumuman
            ->where('info_status', 0)
            ->leftJoin('t_bagian', 't_info.t_bagian_id', '=', 't_bagian.bagian_id')
            ->select('t_info.*', 't_bagian.bagian_nama')
            ->orderBy('info_tanggal', 'desc')
            ->take(3)
            ->get();

        return view('laman.kinerja.rencana-strategi', compact('pengumumanTerkini'));
    }

}