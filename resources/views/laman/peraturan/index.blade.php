@extends('laman.layouts.master')

@section('content')

    <section class="relative pt-36 pb-20 lg:pt-48 lg:pb-28 bg-sky-100 overflow-hidden border-b border-white/50">
        <div class="absolute inset-0 bg-gradient-to-b from-sky-200/50 via-sky-100 to-[#F8FAFC] z-0"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-30 bg-repeat-x scale-125 z-0 animate-[marquee_60s_linear_infinite]"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <nav class="flex justify-center mb-6" aria-label="Breadcrumb" data-aos="fade-down" data-aos-duration="800">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm font-medium">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-slate-500 hover:text-secondary transition flex items-center">
                            <i class="fas fa-home mr-2"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center text-slate-400">
                            <i class="fas fa-chevron-right text-xs mx-2"></i>
                            <span class="hover:text-secondary cursor-pointer transition">Profil</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center text-secondary font-bold">
                            <i class="fas fa-chevron-right text-xs mx-2 text-slate-400"></i>
                            <span>Peraturan</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Peraturan & <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Kebijakan</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Pusat pangkalan data peraturan perundang-undangan, kebijakan, dan pedoman pendidikan tinggi.
            </p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            
            {{-- FORM PENCARIAN DAN FILTER --}}
            <div class="bg-white p-4 md:p-6 rounded-2xl shadow-soft border border-slate-100 mb-10" data-aos="fade-up">
                <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    
                    <div class="w-full md:w-1/3 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-filter text-slate-400"></i>
                        </div>
                        <select name="kategori" class="block w-full pl-11 pr-10 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all appearance-none text-slate-700 font-medium">
                            <option value="">Semua Jenis Peraturan</option>
                            @foreach($jenisPeraturan as $jenis)
                                <option value="{{ $jenis->peraturan_jenis_id }}" {{ request('kategori') == $jenis->peraturan_jenis_id ? 'selected' : '' }}>
                                    {{ $jenis->peraturan_jenis }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="fas fa-chevron-down text-slate-400 text-xs"></i>
                        </div>
                    </div>

                    <div class="w-full md:w-2/3 flex gap-4">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-search text-slate-400"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all text-slate-700" placeholder="Cari Nama/Nomor Peraturan... (cth: Standar Nasional)">
                        </div>
                        
                        <button type="submit" class="bg-secondary hover:bg-blue-800 text-white px-8 py-3.5 rounded-xl text-sm font-bold transition-all shadow-sm flex items-center gap-2 flex-shrink-0">
                            <i class="fas fa-search hidden md:block"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            {{-- TABEL DATA PERATURAN --}}
            <div class="bg-white rounded-3xl shadow-soft border border-slate-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap md:whitespace-normal">
                        <thead>
                            <tr class="bg-primary text-white text-sm uppercase tracking-wider">
                                <th class="px-6 py-5 font-bold w-16 text-center border-b border-primary">No</th>
                                <th class="px-6 py-5 font-bold border-b border-primary">Nama / Judul Peraturan</th>
                                <th class="px-6 py-5 font-bold w-56 border-b border-primary">Jenis Peraturan</th>
                                <th class="px-6 py-5 font-bold w-24 text-center border-b border-primary">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-slate-700 text-sm divide-y divide-slate-100">
                            @forelse($peraturan as $key => $item)
                                <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                    <td class="px-6 py-5 text-center font-bold text-slate-400">{{ $peraturan->firstItem() + $key }}</td>
                                    
                                    <td class="px-6 py-5 leading-relaxed">
                                        {{-- Tampilkan Nomor/Tahun jika ada --}}
                                        @if($item->peraturan_nomor || $item->peraturan_tahun)
                                            <span class="inline-block px-2 py-1 bg-slate-100 text-slate-500 rounded text-[10px] font-bold mb-2">
                                                {{ $item->peraturan_nomor }} {{ $item->peraturan_tahun ? 'Tahun '.$item->peraturan_tahun : '' }}
                                            </span>
                                            <br>
                                        @endif
                                        <span class="font-semibold text-primary group-hover:text-secondary transition-colors">
                                            {{ $item->peraturan_tentang }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-5">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-sky-50 text-sky-700 border border-sky-100 whitespace-nowrap">
                                            {{ $item->jenis->peraturan_jenis ?? 'Lainnya' }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-5 text-center">
                                        {{-- Pastikan folder penyimpanan file Anda benar (contoh menggunakan folder public/storage/peraturan) --}}
                                        @if($item->peraturan_file)
                                            <a href="{{ asset('storage/peraturan/' . $item->peraturan_file) }}" target="_blank" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-all shadow-sm" title="Unduh / Lihat File">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                        @else
                                            <span class="text-slate-300 italic text-xs">No File</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-16 text-center">
                                        <i class="fas fa-folder-open text-slate-200 text-6xl mb-4 block"></i>
                                        <p class="text-slate-500 font-medium">Data peraturan tidak ditemukan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                {{-- PAGINASI DINAMIS --}}
                @if($peraturan->hasPages())
                    <div class="bg-slate-50 px-6 py-4 border-t border-slate-100">
                        {{-- withQueryString() digunakan agar saat pindah page, parameter pencarian (search/kategori) tidak hilang --}}
                        {{ $peraturan->withQueryString()->links('pagination::tailwind') }}
                    </div>
                @endif
                
            </div>
        </div>
    </section>

@endsection