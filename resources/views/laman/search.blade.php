@extends('laman.layouts.master')

@section('content')
    {{-- HEADER SECTION --}}
    <section class="relative pt-36 pb-20 lg:pt-48 lg:pb-28 bg-[#02275d] overflow-hidden border-b border-white/10">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-30"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#02275d] to-transparent z-0"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <p class="text-accent font-semibold tracking-widest uppercase text-sm mb-4" data-aos="fade-down">Hasil Pencarian</p>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-6 drop-shadow-md" data-aos="fade-up">
                Menampilkan hasil untuk: <span class="text-accent border-b-2 border-accent border-dashed pb-1">"{{ $keyword }}"</span>
            </h1>
            <p class="text-sky-200 text-lg" data-aos="fade-up" data-aos-delay="100">
                Ditemukan total {{ $totalResults }} data yang sesuai dengan kata kunci Anda.
            </p>
        </div>
    </section>

    {{-- KONTEN PENCARIAN & TABS --}}
    <section class="py-20 bg-[#F8FAFC] relative overflow-hidden" 
             x-data="{ activeTab: 'semua' }"> {{-- Inisialisasi Alpine.js untuk Tabs --}}
        
        <div class="container mx-auto px-6 relative z-10">
            
            @if($totalResults > 0)
                {{-- NAVIGASI TABS --}}
                <div class="flex flex-wrap justify-center gap-4 mb-16" data-aos="fade-up">
                    <button @click="activeTab = 'semua'" 
                            :class="activeTab === 'semua' ? 'bg-[#02275d] text-white shadow-lg' : 'bg-white text-slate-500 hover:bg-sky-50'"
                            class="px-8 py-3 rounded-full font-semibold transition-all duration-300 border border-slate-200">
                        Semua Hasil ({{ $totalResults }})
                    </button>
                    <button @click="activeTab = 'berita'" 
                            :class="activeTab === 'berita' ? 'bg-[#02275d] text-white shadow-lg' : 'bg-white text-slate-500 hover:bg-sky-50'"
                            class="px-8 py-3 rounded-full font-semibold transition-all duration-300 border border-slate-200">
                        Berita ({{ $berita->count() }})
                    </button>
                    <button @click="activeTab = 'pengumuman'" 
                            :class="activeTab === 'pengumuman' ? 'bg-[#02275d] text-white shadow-lg' : 'bg-white text-slate-500 hover:bg-sky-50'"
                            class="px-8 py-3 rounded-full font-semibold transition-all duration-300 border border-slate-200">
                        Pengumuman ({{ $pengumuman->count() }})
                    </button>
                </div>

                {{-- TAB KONTEN: SEMUA & BERITA --}}
                <div x-show="activeTab === 'semua' || activeTab === 'berita'" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     style="display: none;" class="mb-12">
                    
                    <h2 x-show="activeTab === 'semua'" class="text-2xl font-bold text-primary mb-6 flex items-center border-b border-slate-200 pb-4">
                        <i class="far fa-newspaper text-accent mr-3"></i> Berita Terkait
                    </h2>

                    @if($berita->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($berita as $item)
                                <div onclick="window.location='{{ route('berita.show', $item->slug ?: $item->info_id) }}'"
                                     class="bg-white rounded-3xl p-5 border border-slate-100 shadow-soft hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group flex flex-col">
                                    <div class="w-full h-48 bg-slate-100 rounded-2xl mb-5 overflow-hidden relative">
                                        {{-- Terapkan fallback image path seperti sebelumnya --}}
                                        @php
                                            $cover = $item->details->first();
                                            $imgSrc = asset('laman/img/logo_lldikti.png'); // Default
                                            if ($cover && !empty($cover->info_file)) {
                                                $filename = basename($cover->info_file);
                                                if (file_exists(public_path('storage/berita/' . $filename))) {
                                                    $imgSrc = asset('storage/berita/' . $filename);
                                                } elseif (file_exists(public_path('gambar_berita/Berita/' . $filename))) {
                                                    $imgSrc = asset('gambar_berita/Berita/' . $filename);
                                                }
                                            }
                                        @endphp
                                        <img src="{{ $imgSrc }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                        <div class="absolute top-3 left-3 bg-accent text-primary text-[10px] font-bold px-3 py-1 rounded-full">BERITA</div>
                                    </div>
                                    <p class="text-xs text-slate-400 mb-2 flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> {{ \Carbon\Carbon::parse($item->info_tanggal)->translatedFormat('d F Y') }}</p>
                                    <h3 class="font-bold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 mb-4">{{ $item->info_judul }}</h3>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-slate-500 italic p-6 bg-white rounded-2xl border border-slate-100">Tidak ada berita yang cocok dengan kata kunci ini.</p>
                    @endif
                </div>

                {{-- TAB KONTEN: SEMUA & PENGUMUMAN --}}
                <div x-show="activeTab === 'semua' || activeTab === 'pengumuman'"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     style="display: none;">
                    
                    <h2 x-show="activeTab === 'semua'" class="text-2xl font-bold text-primary mb-6 flex items-center border-b border-slate-200 pb-4 mt-8">
                        <i class="fas fa-bullhorn text-accent mr-3"></i> Pengumuman Terkait
                    </h2>

                    @if($pengumuman->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($pengumuman as $item)
                                <div onclick="window.location='{{ route('pengumuman.show', $item->slug) }}'"
                                     class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 flex items-start space-x-4 group cursor-pointer">
                                    <div class="w-12 h-12 flex-shrink-0 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl border border-sky-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-slate-400 mb-1 font-medium"><i class="far fa-calendar-alt text-accent"></i> {{ \Carbon\Carbon::parse($item->info_tanggal)->translatedFormat('d M Y') }}</p>
                                        <h3 class="font-semibold text-sm text-primary leading-snug group-hover:text-secondary transition line-clamp-2">
                                            {{ $item->info_judul }}
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-slate-500 italic p-6 bg-white rounded-2xl border border-slate-100">Tidak ada pengumuman yang cocok dengan kata kunci ini.</p>
                    @endif
                </div>

            @else
                {{-- TAMPILAN JIKA DATA TIDAK DITEMUKAN --}}
                <div class="max-w-xl mx-auto text-center py-20" data-aos="zoom-in">
                    <img src="{{ asset('laman/img/not-found.svg') }}" onerror="this.src='https://cdn-icons-png.flaticon.com/512/7486/7486754.png'" class="w-48 h-48 mx-auto opacity-50 mb-8" alt="Not Found">
                    <h3 class="text-2xl font-bold text-primary mb-3">Oops! Hasil tidak ditemukan.</h3>
                    <p class="text-slate-500 mb-8">Kami tidak dapat menemukan berita atau pengumuman yang mengandung kata <strong>"{{ $keyword }}"</strong>. Silakan coba dengan kata kunci lain yang lebih umum.</p>
                    <a href="{{ route('home') }}" class="bg-[#02275d] hover:bg-blue-900 text-white px-8 py-3 rounded-full font-semibold transition shadow-md">
                        &larr; Kembali ke Beranda
                    </a>
                </div>
            @endif

        </div>
    </section>
@endsection