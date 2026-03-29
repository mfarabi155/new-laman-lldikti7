@extends('admin.layouts.master')

@section('title', 'Dashboard Utama')

@section('content')
    
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">
        
        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wide mb-1">Total Peraturan</p>
                    <h3 class="text-2xl font-bold text-argon-dark">124 Data</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-gavel text-xl"></i>
                </div>
            </div>
            <p class="text-sm mt-4"><span class="text-emerald-500 font-bold"><i class="fas fa-arrow-up"></i> 3.4%</span> <span class="text-slate-400">Bulan ini</span></p>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wide mb-1">Pengunjung Web</p>
                    <h3 class="text-2xl font-bold text-argon-dark">2,300</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
            <p class="text-sm mt-4"><span class="text-red-500 font-bold"><i class="fas fa-arrow-down"></i> 1.2%</span> <span class="text-slate-400">Sejak kemarin</span></p>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wide mb-1">Dokumen Kinerja</p>
                    <h3 class="text-2xl font-bold text-argon-dark">45</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-chart-bar text-xl"></i>
                </div>
            </div>
            <p class="text-sm mt-4"><span class="text-emerald-500 font-bold"><i class="fas fa-plus"></i> 2</span> <span class="text-slate-400">Data baru</span></p>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wide mb-1">Survei IKM</p>
                    <h3 class="text-2xl font-bold text-argon-dark">85%</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-cyan-400 to-cyan-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-smile text-xl"></i>
                </div>
            </div>
            <p class="text-sm mt-4"><span class="text-emerald-500 font-bold"><i class="fas fa-arrow-up"></i> Sangat Baik</span></p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 min-h-[400px]">
        <h2 class="text-lg font-bold text-argon-dark mb-4">Aktivitas Terbaru</h2>
        <p class="text-slate-500"></p>
    </div>

@endsection