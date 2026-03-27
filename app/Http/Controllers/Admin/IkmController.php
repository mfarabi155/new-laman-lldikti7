<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveyResponden;
use App\Models\SurveyJawaban;
use Illuminate\Http\Request;

class IkmController extends Controller
{
    public function index()
    {
        // Mengambil data responden beserta relasi profesi dan usia
        // Diurutkan dari yang terbaru
        $responden = SurveyResponden::with(['profesi', 'usia'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);

        return view('admin.ikm.index', compact('responden'));
    }

    public function show($id)
    {
        // Menampilkan detail jawaban dari satu responden
        $responden = SurveyResponden::with(['profesi', 'usia'])->findOrFail($id);
        
        $jawaban = SurveyJawaban::with('pertanyaan')
                        ->where('responden_id', $id)
                        ->get();

        return view('admin.ikm.show', compact('responden', 'jawaban'));
    }
}
