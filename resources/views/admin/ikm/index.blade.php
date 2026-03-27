@extends('admin.layouts.master') 

@section('title', 'Manajemen IKM')

@section('content')
{{-- HEADER SECTION SEDERHANA --}}
<div class="bg-primary pt-12 pb-24 px-4 -mt-4 mb-4">
    <div class="container mx-auto">
        <nav class="flex text-white/70 text-sm mb-4 font-medium">
            <ol class="flex items-center space-x-2">
                <li><a href="#" class="hover:text-white transition">Halaman</a></li>
                <li><i class="fas fa-chevron-right text-[10px] mx-2 opacity-50"></i></li>
                <li class="text-white">Data Responden IKM</li>
            </ol>
        </nav>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight">
                    Data Responden IKM
                </h1>
                <p class="text-white/80 mt-2 text-sm">
                    Manajemen hasil survei Indeks Kepuasan Masyarakat (IKM).
                </p>
            </div>
            {{-- Tombol Export --}}
            <button class="bg-white/20 hover:bg-white/30 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm border border-white/10 flex items-center gap-2">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 -mt-16 relative z-10">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-xs uppercase tracking-widest font-bold">
                        <th class="p-5">No</th>
                        <th class="p-5">Tgl Isi</th>
                        <th class="p-5">Nama Responden</th>
                        <th class="p-5">Profesi</th>
                        <th class="p-5">Usia</th>
                        <th class="p-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
                    @forelse($responden as $key => $item)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-5 font-medium text-slate-400">{{ $responden->firstItem() + $key }}</td>
                        <td class="p-5">
                            <span class="text-slate-600 font-medium">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                            <span class="block text-[10px] text-slate-400 font-bold uppercase">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB</span>
                        </td>
                        <td class="p-5">
                            {{-- LOGIKA MASKING NAMA --}}
                            @php
                                $name = $item->nama;
                                $maskedName = substr($name, 0, 1) . str_repeat('*', strlen($name) - 1);
                            @endphp
                            <p class="font-bold text-slate-800">{{ $maskedName }}</p>
                            
                            {{-- Email disembunyikan total untuk keamanan data di index --}}
                            <p class="text-[10px] text-slate-400 italic">Email Tersembunyi</p>
                            
                            <span class="inline-block mt-1 text-[9px] font-black uppercase px-2 py-0.5 rounded {{ $item->jenis_kelamin == 'L' ? 'bg-blue-50 text-blue-600 border border-blue-100' : 'bg-pink-50 text-pink-600 border border-pink-100' }}">
                                {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </span>
                        </td>
                        <td class="p-5">
                            <div class="flex items-center gap-2 text-slate-600">
                                <i class="fas fa-briefcase text-[10px] text-slate-300"></i>
                                {{ $item->profesi->nama_profesi ?? '-' }}
                            </div>
                        </td>
                        <td class="p-5">
                            <div class="flex items-center gap-2 text-slate-600">
                                <i class="fas fa-clock text-[10px] text-slate-300"></i>
                                {{ $item->usia->usia ?? '-' }}
                            </div>
                        </td>
                        <td class="p-5 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.ikm.show', $item->id) }}" class="inline-block bg-sky-50 text-sky-600 w-9 h-9 rounded-xl flex items-center justify-center hover:bg-sky-600 hover:text-white transition shadow-sm" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.ikm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data responden ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-50 text-red-600 w-9 h-9 rounded-xl flex items-center justify-center hover:bg-red-600 hover:text-white transition shadow-sm" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-search text-slate-200 text-5xl mb-4"></i>
                                <p class="text-slate-400 italic">Belum ada data responden survei IKM.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="p-6 border-t border-slate-100 bg-slate-50/30">
            {{ $responden->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection