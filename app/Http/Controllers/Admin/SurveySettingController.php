<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveyUsia;
use App\Models\SurveyPertanyaan;
use App\Models\SurveyPendidikan; // Pastikan model ini sudah dibuat
use App\Models\SurveyProfesi;   // Pastikan model ini sudah dibuat
use Illuminate\Http\Request;

class SurveySettingController extends Controller
{
    // Menampilkan halaman utama Setting Survey
    public function index()
    {
        $usia = SurveyUsia::all();
        $pertanyaan = SurveyPertanyaan::all();
        $pendidikan = SurveyPendidikan::all();
        $profesi = SurveyProfesi::all();
        
        return view('admin.ikm.setting', compact('usia', 'pertanyaan', 'pendidikan', 'profesi'));
    }

    // --- CRUD UNTUK USIA ---
    public function storeUsia(Request $request)
    {
        $request->validate(['usia' => 'required|string|max:255']);
        SurveyUsia::create(['usia' => $request->usia]);
        return back()->with('success', 'Rentang usia berhasil ditambahkan.');
    }

    public function destroyUsia($id)
    {
        SurveyUsia::findOrFail($id)->delete();
        return back()->with('success', 'Rentang usia berhasil dihapus.');
    }

    // --- CRUD UNTUK PERTANYAAN ---
    public function storePertanyaan(Request $request)
    {
        $request->validate(['pertanyaan' => 'required|string']);
        SurveyPertanyaan::create(['pertanyaan' => $request->pertanyaan]);
        return back()->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function destroyPertanyaan($id)
    {
        SurveyPertanyaan::findOrFail($id)->delete();
        return back()->with('success', 'Pertanyaan berhasil dihapus.');
    }

    // --- CRUD UNTUK PENDIDIKAN ---
    public function storePendidikan(Request $request)
    {
        $request->validate(['pendidikan' => 'required|string|max:255']);
        SurveyPendidikan::create(['pendidikan' => $request->pendidikan]);
        return back()->with('success', 'Data pendidikan berhasil ditambahkan.');
    }

    public function destroyPendidikan($id)
    {
        SurveyPendidikan::findOrFail($id)->delete();
        return back()->with('success', 'Data pendidikan berhasil dihapus.');
    }

    // --- CRUD UNTUK PROFESI ---
    public function storeProfesi(Request $request)
    {
        // Sesuaikan nama kolom dengan database Anda: 'nama_profesi'
        $request->validate(['nama_profesi' => 'required|string|max:255']);
        SurveyProfesi::create(['nama_profesi' => $request->nama_profesi]);
        return back()->with('success', 'Data profesi berhasil ditambahkan.');
    }

    public function destroyProfesi($id)
    {
        SurveyProfesi::findOrFail($id)->delete();
        return back()->with('success', 'Data profesi berhasil dihapus.');
    }
}