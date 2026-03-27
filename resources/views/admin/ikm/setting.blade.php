@extends('admin.layouts.master') 

@section('title', 'Setting Survey IKM')

@section('content')
{{-- HEADER SECTION --}}
<div class="relative bg-gradient-to-r from-primary to-indigo-600 pt-12 pb-24 px-4 -mt-4 mb-4 rounded-b-[2.5rem] shadow-lg">
    <div class="container mx-auto">
        <nav class="flex text-white/70 text-sm mb-4 font-medium">
            <ol class="flex items-center space-x-2">
                <li><a href="#" class="hover:text-white transition">Halaman</a></li>
                <li><i class="fas fa-chevron-right text-[10px] mx-2 opacity-50"></i></li>
                <li class="text-white">Setting Survey IKM</li>
            </ol>
        </nav>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">
                    Setting <span class="text-accent">Survey</span>
                </h1>
                <p class="text-white/80 mt-2 max-w-xl">
                    Kelola master data kuesioner meliputi pertanyaan, rentang usia, tingkat pendidikan, dan kategori profesi.
                </p>
            </div>
            <div class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/20 hidden md:block">
                <i class="fas fa-cog text-accent text-3xl animate-spin-slow"></i>
            </div>
        </div>
    </div>
</div>

{{-- KONTAINER UTAMA --}}
<div class="container mx-auto px-4 -mt-16 relative z-10">
    @if(session('success'))
        <div class="bg-white border-l-4 border-green-500 text-slate-700 p-4 mb-8 rounded-r-2xl shadow-xl flex items-center gap-3">
            <i class="fas fa-check-circle text-green-500 text-xl"></i>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        
        {{-- 1. DAFTAR PERTANYAAN (BARIS BELANG) --}}
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden flex flex-col">
            <div class="p-6 border-b border-slate-50 flex justify-between items-center bg-[#f8fafc]">
                <h3 class="font-bold text-slate-800 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                        <i class="fas fa-list-check"></i>
                    </div>
                    Daftar Pertanyaan
                </h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.ikm.setting.pertanyaan.store') }}" method="POST" class="flex gap-2 mb-6">
                    @csrf
                    <input type="text" name="pertanyaan" required placeholder="Tulis pertanyaan..." class="w-full bg-[#f1f5f9] border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary focus:bg-white outline-none">
                    {{-- TOMBOL TAMBAH DENGAN WARNA TETAP --}}
                    <button type="submit" class="hover:opacity-90 text-white w-12 h-12 rounded-xl transition shrink-0 shadow-md flex items-center justify-center" style="background-color: #5e72e4;">
                        <i class="fas fa-plus text-white" style="font-size: 1.25rem;"></i>
                    </button>
                </form>
                <div class="max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                    <table class="w-full text-left text-sm border-collapse">
                        <tbody class="divide-y divide-slate-100">
                            @php $no = 1; @endphp
                            @forelse($pertanyaan as $item)
                            <tr class="transition" style="background-color: {{ $no % 2 == 0 ? '#f8fafc' : '#ffffff' }};">
                                <td class="py-4 px-3 text-slate-400 font-bold w-10 text-center">{{ $no++ }}</td>
                                <td class="py-4 px-3 text-slate-600 leading-relaxed">{{ $item->pertanyaan }}</td>
                                <td class="py-4 px-3 text-right w-16">
                                    <form action="{{ route('admin.ikm.setting.pertanyaan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="text-slate-300 hover:text-red-500 transition-colors"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="p-6 text-center text-slate-400 italic">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- 2. KATEGORI USIA --}}
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden self-start">
            <div class="p-6 border-b border-slate-50 flex justify-between items-center bg-[#f8fafc]">
                <h3 class="font-bold text-slate-800 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    Kategori Usia
                </h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.ikm.setting.usia.store') }}" method="POST" class="flex gap-2 mb-6">
                    @csrf
                    <input type="text" name="usia" required placeholder="Cth: 20-30 Tahun" class="w-full bg-[#f1f5f9] border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary focus:bg-white outline-none">
                    <button type="submit" class="hover:opacity-90 text-white w-12 h-12 rounded-xl transition shrink-0 shadow-md flex items-center justify-center" style="background-color: #5e72e4;">
                        <i class="fas fa-plus text-white" style="font-size: 1.25rem;"></i>
                    </button>
                </form>
                <div class="grid grid-cols-2 gap-4">
                    @foreach($usia as $item)
                    <div class="flex justify-between items-center p-4 bg-[#f1f5f9] rounded-2xl border border-transparent hover:border-primary/20 hover:bg-white transition shadow-sm group">
                        <span class="text-sm font-semibold text-slate-700">{{ $item->usia }}</span>
                        <form action="{{ route('admin.ikm.setting.usia.destroy', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-slate-300 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100"><i class="fas fa-times-circle"></i></button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- 3. MASTER PENDIDIKAN (HIJAU FIXED) --}}
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-50 flex justify-between items-center bg-[#f8fafc]">
                <h3 class="font-bold text-slate-800 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    Master Pendidikan
                </h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.ikm.setting.pendidikan.store') }}" method="POST" class="flex gap-2 mb-6">
                    @csrf
                    <input type="text" name="pendidikan" required placeholder="Cth: S1" class="w-full bg-[#f1f5f9] border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary focus:bg-white outline-none">
                    <button type="submit" class="hover:opacity-90 text-white w-12 h-12 rounded-xl transition shrink-0 shadow-md flex items-center justify-center" style="background-color: #5e72e4;">
                        <i class="fas fa-plus text-white" style="font-size: 1.25rem;"></i>
                    </button>
                </form>
                <div class="flex flex-wrap gap-3">
                    @foreach($pendidikan as $item)
                    <div class="flex items-center gap-3 px-5 py-2.5 rounded-xl text-sm font-bold shadow-sm" style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0;">
                        {{ $item->pendidikan }}
                        <form action="{{ route('admin.ikm.setting.pendidikan.destroy', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="hover:text-red-600 transition-colors"><i class="fas fa-times-circle"></i></button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- 4. KATEGORI PROFESI (UNGU FIXED) --}}
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-50 flex justify-between items-center bg-[#f8fafc]">
                <h3 class="font-bold text-slate-800 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    Kategori Profesi
                </h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.ikm.setting.profesi.store') }}" method="POST" class="flex gap-2 mb-6">
                    @csrf
                    <input type="text" name="nama_profesi" required placeholder="Cth: Dosen" class="w-full bg-[#f1f5f9] border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary focus:bg-white outline-none">
                    <button type="submit" class="hover:opacity-90 text-white w-12 h-12 rounded-xl transition shrink-0 shadow-md flex items-center justify-center" style="background-color: #5e72e4;">
                        <i class="fas fa-plus text-white" style="font-size: 1.25rem;"></i>
                    </button>
                </form>
                <div class="space-y-3">
                    @foreach($profesi as $item)
                    <div class="flex justify-between items-center p-4 rounded-2xl shadow-sm group" style="background-color: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff;">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full" style="background-color: #a855f7;"></div>
                            <span class="text-sm font-bold">{{ $item->nama_profesi }}</span>
                        </div>
                        <form action="{{ route('admin.ikm.setting.profesi.destroy', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-purple-300 hover:text-red-500 transition-colors"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .animate-spin-slow { animation: spin 8s linear infinite; }
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
</style>
@endsection