@extends('laman.layouts.master')

@section('content')

    {{-- HEADER SECTION --}}
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
                            <span class="hover:text-secondary cursor-pointer transition">Layanan</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center text-secondary font-bold">
                            <i class="fas fa-chevron-right text-xs mx-2 text-slate-400"></i>
                            <span>Standar Pelayanan</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Standar <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Pelayanan</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Akses cepat dokumen persyaratan dan prosedur standar operasional (SOP) layanan LLDIKTI Wilayah VII.
            </p>
        </div>
    </section>

    {{-- KONTEN SECTION --}}
    <section class="py-16 md:py-24 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            
            {{-- Form Pencarian --}}
            <div class="max-w-2xl mx-auto mb-16" data-aos="fade-up">
                <form action="{{ route('layanan.standar') }}" method="GET" class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search text-slate-400 group-focus-within:text-secondary transition-colors"></i>
                    </div>
                    <input type="text" name="cari" value="{{ request('cari') }}" class="block w-full pl-11 pr-4 py-4 bg-white border border-slate-200 rounded-full text-sm shadow-soft focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all placeholder-slate-400" placeholder="Cari nama layanan... (contoh: Pangkat, Ijazah)">
                    <button type="submit" class="absolute inset-y-1.5 right-1.5 bg-secondary hover:bg-blue-800 text-white px-6 rounded-full text-sm font-semibold transition-colors shadow-sm">
                        Cari
                    </button>
                </form>
            </div>

            {{-- Grid Kartu Standar Pelayanan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @php
                    // Array ikon untuk memberikan variasi visual pada kartu
                    $icons = ['fa-user-tie', 'fa-university', 'fa-file-signature', 'fa-award', 'fa-id-card', 'fa-id-badge', 'fa-wallet', 'fa-level-up-alt', 'fa-certificate', 'fa-hand-holding-usd'];
                @endphp

                @forelse($standar as $key => $item)
                    @php
                        // Memilih ikon secara berputar (loop)
                        $iconClass = $icons[$loop->index % count($icons)];
                        // Membuat format penomoran berlanjut antar halaman (01, 02, dst)
                        $nomorUrut = str_pad($standar->firstItem() + $key, 2, '0', STR_PAD_LEFT);
                    @endphp

                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 50 }}">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                                <i class="fas {{ $iconClass }}"></i>
                            </div>
                            <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">{{ $nomorUrut }}</span>
                        </div>
                        
                        <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors line-clamp-3">
                            {{ $item->sp_uraian }}
                        </h3>
                        
                        {{-- Logika jika link Google Drive ada atau kosong --}}
                        @if($item->sp_link)
                            <a href="{{ $item->sp_link }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                                <i class="fas fa-external-link-alt mr-2"></i> Buka Tautan
                            </a>
                        @else
                            <button disabled class="inline-flex items-center justify-center w-full bg-slate-50 text-slate-400 font-semibold py-2.5 rounded-xl border border-slate-100 text-sm cursor-not-allowed opacity-70">
                                <i class="fas fa-times-circle mr-2"></i> Tautan Kosong
                            </button>
                        @endif
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
                        <i class="fas fa-folder-open text-slate-200 text-6xl mb-4 block"></i>
                        <p class="text-slate-500 font-medium">Standar layanan tidak ditemukan.</p>
                        @if(request('cari'))
                            <a href="{{ route('layanan.standar') }}" class="inline-block mt-4 text-secondary font-semibold hover:underline">Tampilkan Semua Layanan</a>
                        @endif
                    </div>
                @endforelse

            </div>
            
            {{-- Paginasi --}}
            @if($standar->hasPages())
                <div class="mt-12 flex justify-center" data-aos="fade-up">
                    <div class="bg-white px-4 py-3 rounded-xl shadow-sm border border-slate-100 inline-block">
                        {{ $standar->links('pagination::tailwind') }}
                    </div>
                </div>
            @endif

            <div class="mt-8 text-center" data-aos="fade-up">
                <p class="text-slate-400 text-sm mb-4">Menampilkan total {{ $standar->total() }} standar layanan</p>
            </div>

        </div>
    </section>

@endsection