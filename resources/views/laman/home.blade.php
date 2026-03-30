@extends('laman.layouts.master')

@section('content')
    {{-- TAMBAHKAN CSS SWIPER DI SINI --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        /* Kustomisasi Khusus Galeri Swiper */
        .galeri-swiper {
            width: 100%;
            padding-top: 30px;
            padding-bottom: 70px;
        }

        .galeri-swiper .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 600px;
            max-width: 80%;
        }

        .galeri-swiper .slide-caption {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .galeri-swiper .swiper-slide-active .slide-caption {
            opacity: 1;
            transform: translateY(0);
        }

        .galeri-swiper .swiper-button-next,
        .galeri-swiper .swiper-button-prev {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            border: 1.5px solid rgba(255, 255, 255, 0.4);
            width: 45px;
            height: 45px;
            border-radius: 8px;
            backdrop-filter: blur(4px);
        }

        .galeri-swiper .swiper-button-next:after,
        .galeri-swiper .swiper-button-prev:after {
            font-size: 18px;
            font-weight: bold;
        }

        .galeri-swiper .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.4);
            opacity: 1;
        }

        .galeri-swiper .swiper-pagination-bullet-active {
            background: white;
        }
    </style>

    <section x-data="{
        activeSlide: 1,
        loop() { setInterval(() => { this.activeSlide = this.activeSlide === 3 ? 1 : this.activeSlide + 1 }, 6000) }
    }" x-init="loop"
        class="relative h-[60vh] md:h-screen w-full overflow-hidden bg-sky-100">

        <div x-show="activeSlide === 1" x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="absolute inset-0 w-full h-full">
            <img src="{{ asset('laman/img/carousel-1.webp') }}" class="w-full h-full object-cover md:object-fill"
                alt="Layanan Humanis Berintegritas 1">
        </div>

        <div x-show="activeSlide === 2" x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="absolute inset-0 w-full h-full" x-cloak>
            <img src="{{ asset('laman/img/carousel-2.webp') }}" class="w-full h-full object-cover md:object-fill"
                alt="Layanan Humanis Berintegritas 2">
        </div>

        <div x-show="activeSlide === 3" x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="absolute inset-0 w-full h-full" x-cloak>
            <img src="{{ asset('laman/img/carousel-3.webp') }}" class="w-full h-full object-cover md:object-fill"
                alt="Layanan Humanis Berintegritas 3">
        </div>

        <button @click="activeSlide = activeSlide === 1 ? 3 : activeSlide - 1"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center backdrop-blur-sm transition z-20">
            <i class="fas fa-chevron-left"></i>
        </button>

        <button @click="activeSlide = activeSlide === 3 ? 1 : activeSlide + 1"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center backdrop-blur-sm transition z-20">
            <i class="fas fa-chevron-right"></i>
        </button>
    </section>

    <div
        class="bg-white/70 backdrop-blur-sm text-primary py-3 overflow-hidden flex items-center marquee-container relative z-20 shadow-inner border-y border-slate-100">
        <div class="absolute inset-0 bg-blue-100 border-x-2 border-white rounded-full"></div>
        <div class="absolute inset-0 h-1 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10">
        </div>
        <div
            class="bg-accent/20 text-accent px-5 py-2 font-bold z-10 whitespace-nowrap text-xs rounded-r-full ml-4 relative border-r-2 border-white">
            INFO PENTING
        </div>
        <div class="w-full overflow-hidden relative">
            <div class="marquee-content font-medium text-sm text-slate-700">
                Selamat Datang di Laman Resmi LLDIKTI Wilayah VII Jawa Timur.
            </div>
        </div>
    </div>

    {{-- SECTION PENGUMUMAN --}}
    <section class="py-24 bg-white relative">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex justify-between items-center mb-12 pb-4 border-b border-slate-100" data-aos="fade-up">
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-8 bg-accent rounded-full shadow-inner"></div>
                    <h2 class="text-4xl font-extrabold text-primary tracking-tight">Pengumuman <span
                            class="font-light text-slate-500">Terbaru</span></h2>
                </div>
                <a href="{{ route('pengumuman.index') }}"
                    class="text-secondary font-semibold hover:text-blue-800 transition hidden md:block group">
                    Lihat Semua <span class="inline-block transition-transform group-hover:translate-x-1">&rarr;</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($pengumuman as $item)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}"
                        onclick="window.location='{{ route('pengumuman.show', $item->slug) }}'"
                        class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative overflow-hidden">

                        {{-- LOGIKA LABEL "NEW" (Jika usia pengumuman <= 2 hari) --}}
                        @if (\Carbon\Carbon::parse($item->info_tanggal)->diffInDays(now()) <= 2)
                            <span
                                class="absolute top-5 right-5 bg-red-500 text-white text-[10px] font-extrabold tracking-wider px-2.5 py-1 rounded-md animate-pulse shadow-sm z-10">
                                NEW
                            </span>
                        @endif

                        <div
                            class="w-14 h-14 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6 text-2xl border border-blue-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300 shadow-inner">
                            <i class="fas fa-bullhorn"></i>
                        </div>

                        {{-- TANGGAL & JUMLAH VIEWS PENGUMUMAN --}}
                        <div class="flex items-center justify-between mb-2 mt-auto pt-4 border-t border-slate-50">
                            <p class="text-[11px] text-slate-400 font-medium flex items-center">
                                <i class="far fa-calendar-alt mr-1.5 text-accent"></i>
                                {{ \Carbon\Carbon::parse($item->info_tanggal)->translatedFormat('d F Y') }}
                            </p>
                            @php
                                $statP = \Illuminate\Support\Facades\DB::table('t_info_statistik')
                                    ->where('info_id', $item->info_id)
                                    ->first();
                            @endphp
                            <p
                                class="text-[11px] text-slate-400 font-medium flex items-center bg-slate-50 px-2 py-0.5 rounded">
                                <i class="far fa-eye mr-1.5 text-secondary"></i>
                                {{ $statP ? number_format($statP->views, 0, ',', '.') : 0 }}
                            </p>
                        </div>

                        <h3
                            class="font-semibold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 flex-grow mt-1">
                            {{ $item->info_judul }}
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION BERITA --}}
    <section class="py-24 bg-[#F1F5F9] relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 max-w-2xl mx-auto flex flex-col items-center">
                <svg class="w-full h-20 mb-6" viewBox="0 0 500 120" data-aos="fade-down">
                    <path id="curve3" d="M0,60 C50,20 200,20 250,60 C300,100 450,100 500,60" fill="none" />
                    <text class="wavy-text" style="font-size: 26px; font-weight: 800; fill: #0F172A;">
                        <textPath xlink:href="#curve3" startOffset="50%" text-anchor="middle">
                            Kabar Pendidikan Tinggi
                        </textPath>
                    </text>
                </svg>
                <div class="flex items-center space-x-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-2 h-8 bg-accent rounded-full shadow-inner"></div>
                    <h2 class="text-4xl font-extrabold text-primary tracking-tight">di <span
                            class="font-light text-slate-500">Jawa Timur</span></h2>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                {{-- BERITA UTAMA --}}
                @if ($beritaUtama)
                    <div data-aos="fade-right" data-aos-duration="1000"
                        onclick="window.location='{{ route('berita.show', $beritaUtama->slug ?: $beritaUtama->info_id) }}'"
                        class="lg:col-span-2 bg-white rounded-3xl overflow-hidden shadow-soft group cursor-pointer border border-slate-100 relative flex flex-col">

                        {{-- LABEL NEW BERITA UTAMA --}}
                        @if(\Carbon\Carbon::parse($beritaUtama->info_tanggal)->diffInDays(now()) <= 2)
                            <div class="absolute top-6 right-6 z-20">
                                <span class="bg-red-500 text-white text-xs font-extrabold tracking-wider px-3 py-1.5 rounded-md animate-pulse shadow-lg">
                                    NEW
                                </span>
                            </div>
                        @endif

                        <div class="overflow-hidden relative h-96 bg-slate-100 flex items-center justify-center shrink-0">
                            @php
                                $coverUtama = $beritaUtama->details->first();
                                $utamaSrc = null;

                                if ($coverUtama && !empty($coverUtama->info_file)) {
                                    $filename = basename($coverUtama->info_file);
                                    if (file_exists(public_path('storage/berita/' . $filename))) {
                                        $utamaSrc = asset('storage/berita/' . $filename);
                                    } elseif (file_exists(public_path('storage/oldberita/' . $filename))) {
                                        $utamaSrc = asset('storage/oldberita/' . $filename);
                                    } elseif (file_exists(public_path('storage/' . $coverUtama->info_file))) {
                                        $utamaSrc = asset('storage/' . $coverUtama->info_file);
                                    } elseif (file_exists(public_path('gambar_berita/Berita/' . $filename))) {
                                        $utamaSrc = asset('gambar_berita/Berita/' . $filename);
                                    }
                                }
                            @endphp

                            <img src="{{ $utamaSrc ? $utamaSrc : asset('laman/img/logo_lldikti.png') }}"
                                class="w-full h-full transition duration-700 transform group-hover:scale-105 {{ $utamaSrc ? 'object-cover' : 'object-contain p-20 opacity-40' }}"
                                alt="{{ $beritaUtama->info_judul }}">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent p-10 flex flex-col justify-end">
                                <span
                                    class="absolute top-6 left-6 bg-accent text-primary text-xs font-bold px-4 py-1.5 rounded-full shadow-lg">TERBARU</span>

                                {{-- TANGGAL & JUMLAH VIEWS BERITA UTAMA --}}
                                <div class="flex items-center gap-4 mb-3">
                                    <p class="text-sm text-slate-300 flex items-center">
                                        <i class="far fa-calendar-alt mr-1.5 text-accent"></i>
                                        {{ \Carbon\Carbon::parse($beritaUtama->info_tanggal)->translatedFormat('d F Y') }}
                                    </p>
                                    @php
                                        $statU = \Illuminate\Support\Facades\DB::table('t_info_statistik')
                                            ->where('info_id', $beritaUtama->info_id)
                                            ->first();
                                    @endphp
                                    <p
                                        class="text-sm text-slate-300 flex items-center bg-black/20 px-2 py-0.5 rounded-md backdrop-blur-sm">
                                        <i class="far fa-eye mr-1.5 text-accent"></i>
                                        {{ $statU ? number_format($statU->views, 0, ',', '.') : 0 }} Views
                                    </p>
                                </div>

                                <h3
                                    class="text-3xl font-bold text-white mb-2 leading-tight group-hover:text-accent transition duration-300 line-clamp-2">
                                    {{ $beritaUtama->info_judul }}
                                </h3>
                            </div>
                        </div>

                        <div class="p-10 border-t border-slate-100 relative z-10 flex-grow flex flex-col justify-between">
                            <p class="text-slate-600 mb-6 leading-relaxed line-clamp-3">
                                {{ Str::limit(strip_tags($beritaUtama->info_isi), 200) }}
                            </p>
                            <span
                                class="text-secondary font-semibold group-hover:text-blue-800 transition flex items-center mt-auto">
                                Baca selengkapnya &nbsp; <i
                                    class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </div>
                    </div>
                @endif

                {{-- LIST BERITA SAMPING --}}
                <div class="flex flex-col space-y-5" data-aos="fade-left" data-aos-duration="1000">
                    @foreach ($beritaLainnya as $bt)
                        @php
                            $coverSamping = $bt->details->first();
                            $sampingSrc = null;

                            if ($coverSamping && !empty($coverSamping->info_file)) {
                                $filename = basename($coverSamping->info_file);
                                if (file_exists(public_path('storage/berita/' . $filename))) {
                                    $sampingSrc = asset('storage/berita/' . $filename);
                                } elseif (file_exists(public_path('storage/oldberita/' . $filename))) {
                                    $sampingSrc = asset('storage/oldberita/' . $filename);
                                } elseif (file_exists(public_path('storage/' . $coverSamping->info_file))) {
                                    $sampingSrc = asset('storage/' . $coverSamping->info_file);
                                } elseif (file_exists(public_path('gambar_berita/Berita/' . $filename))) {
                                    $sampingSrc = asset('gambar_berita/Berita/' . $filename);
                                }
                            }
                        @endphp

                        <div onclick="window.location='{{ route('berita.show', $bt->slug ?: $bt->info_id) }}'"
                            class="bg-white p-5 flex items-center space-x-5 rounded-2xl shadow-sm hover:shadow-md transition cursor-pointer group border border-slate-100 relative">

                            {{-- LABEL NEW BERITA SAMPING --}}
                            @if(\Carbon\Carbon::parse($bt->info_tanggal)->diffInDays(now()) <= 2)
                                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[9px] font-extrabold tracking-wider px-2 py-1 rounded-md animate-pulse shadow-md z-10 border-2 border-white">
                                    NEW
                                </span>
                            @endif

                            <div
                                class="w-24 h-24 flex-shrink-0 bg-slate-50 rounded-xl overflow-hidden border border-slate-100 flex items-center justify-center">
                                <img src="{{ $sampingSrc ? $sampingSrc : asset('laman/img/logo_lldikti.png') }}"
                                    class="w-full h-full transition duration-500 group-hover:scale-110 {{ $sampingSrc ? 'object-cover' : 'object-contain p-4 opacity-50' }}">
                            </div>

                            <div class="flex-1">
                                <h4
                                    class="font-semibold text-primary group-hover:text-secondary line-clamp-2 leading-snug text-sm mb-1">
                                    {{ $bt->info_judul }}
                                </h4>

                                {{-- TANGGAL & JUMLAH VIEWS BERITA SAMPING --}}
                                <div class="flex items-center gap-3 mt-2">
                                    <p class="text-[10px] text-slate-400 flex items-center">
                                        <i class="far fa-clock mr-1 text-accent"></i>
                                        {{ \Carbon\Carbon::parse($bt->info_tanggal)->diffForHumans() }}
                                    </p>
                                    @php
                                        $statS = \Illuminate\Support\Facades\DB::table('t_info_statistik')
                                            ->where('info_id', $bt->info_id)
                                            ->first();
                                    @endphp
                                    <p class="text-[10px] text-slate-400 flex items-center">
                                        <i class="far fa-eye mr-1 text-secondary"></i>
                                        {{ $statS ? number_format($statS->views, 0, ',', '.') : 0 }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <a href="{{ route('berita.index') }}"
                        class="w-full bg-secondary hover:bg-blue-800 text-white font-bold py-4 rounded-xl transition shadow hover:shadow-lg transform hover:-translate-y-0.5 text-sm text-center">
                        Lihat berita lainnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION STATISTIK & PENGAYAAN BAWAH (TETAP SAMA SEPERTI SEBELUMNYA) --}}
    <section
        class="py-28 relative bg-sky-100 text-primary overflow-hidden border-t-2 border-white rounded-t-3xl shadow-inner">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/az-subtle.png')] opacity-10">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-sky-100/10 via-sky-100/70 to-sky-100"></div>

        <div class="container mx-auto px-6 relative z-10 text-center flex flex-col items-center">
            <svg class="w-full h-24 mb-2" viewBox="0 0 500 150" data-aos="zoom-in">
                <path id="curve4" d="M0,70 C50,20 200,20 250,70 C300,120 450,120 500,70" fill="none" />
                <text class="wavy-text" style="font-size: 32px; font-weight: 800; fill: #0F172A;">
                    <textPath xlink:href="#curve4" startOffset="50%" text-anchor="middle">
                        LLDIKTI VII DALAM ANGKA
                    </textPath>
                </text>
            </svg>

            <p class="text-xs italic text-slate-500 mb-10 opacity-80" data-aos="fade-up">
                {{ $getSettingSumberDataPDDikti }}
            </p>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-16">
                {{-- Perguruan Tinggi --}}
                <div data-aos="flip-left" data-aos-delay="100"
                    class="p-8 bg-white rounded-3xl border border-slate-100 shadow-soft relative border-l-4 border-accent">
                    <i class="fas fa-university text-5xl text-accent mb-6"></i>
                    <h3 class="text-5xl font-extrabold text-primary mb-2 tracking-tighter" x-data="{ count: 0, target: {{ $getSettingTotalPerguruanTinggi ?? 0 }} }"
                        x-intersect.once="let start = null; const step = (ts) => { if(!start) start = ts; const prog = Math.min((ts - start) / 2000, 1); count = Math.floor(prog * target); if(prog < 1) window.requestAnimationFrame(step); }; window.requestAnimationFrame(step);">
                        <span x-text="count.toLocaleString('id-ID')">0</span>
                    </h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Perguruan Tinggi</p>
                </div>

                {{-- Program Studi --}}
                <div data-aos="flip-left" data-aos-delay="200"
                    class="p-8 bg-white rounded-3xl border border-slate-100 shadow-soft relative border-l-4 border-accent">
                    <i class="fas fa-book-open text-5xl text-accent mb-6"></i>
                    <h3 class="text-5xl font-extrabold text-primary mb-2 tracking-tighter" x-data="{ count: 0, target: {{ $getSettingTotalProgramStudi ?? 0 }} }"
                        x-intersect.once="let start = null; const step = (ts) => { if(!start) start = ts; const prog = Math.min((ts - start) / 2000, 1); count = Math.floor(prog * target); if(prog < 1) window.requestAnimationFrame(step); }; window.requestAnimationFrame(step);">
                        <span x-text="count.toLocaleString('id-ID')">0</span>
                    </h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Program Studi</p>
                </div>

                {{-- Dosen --}}
                <div data-aos="flip-left" data-aos-delay="300"
                    class="p-8 bg-white rounded-3xl border border-slate-100 shadow-soft relative border-l-4 border-accent">
                    <i class="fas fa-user-tie text-5xl text-accent mb-6"></i>
                    <h3 class="text-5xl font-extrabold text-primary mb-2 tracking-tighter" x-data="{ count: 0, target: {{ $getSettingTotalDosen ?? 0 }} }"
                        x-intersect.once="let start = null; const step = (ts) => { if(!start) start = ts; const prog = Math.min((ts - start) / 2000, 1); count = Math.floor(prog * target); if(prog < 1) window.requestAnimationFrame(step); }; window.requestAnimationFrame(step);">
                        <span x-text="count.toLocaleString('id-ID')">0</span>
                    </h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Dosen</p>
                </div>

                {{-- Mahasiswa --}}
                <div data-aos="flip-left" data-aos-delay="400"
                    class="p-8 bg-white rounded-3xl border border-slate-100 shadow-soft relative border-l-4 border-accent">
                    <i class="fas fa-users text-5xl text-accent mb-6"></i>
                    <h3 class="text-5xl font-extrabold text-primary mb-2 tracking-tighter" x-data="{ count: 0, target: {{ $getSettingTotalMahasiswa ?? 0 }} }"
                        x-intersect.once="let start = null; const step = (ts) => { if(!start) start = ts; const prog = Math.min((ts - start) / 2000, 1); count = Math.floor(prog * target); if(prog < 1) window.requestAnimationFrame(step); }; window.requestAnimationFrame(step);">
                        <span x-text="count.toLocaleString('id-ID')">0</span><span class="text-3xl ml-1">+</span>
                    </h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Mahasiswa</p>
                </div>
            </div>

            <a href="{{ $getSettingUrlStatisticPtLldikti7 }}" target="_blank" rel="noopener noreferrer"
                class="bg-secondary hover:bg-blue-800 text-white px-10 py-3 rounded-full font-semibold transition shadow-md hover:shadow-lg border border-secondary transform hover:-translate-y-0.5 text-sm"
                data-aos="fade-up">
                Lihat Selengkapnya PDDikti &nbsp; &rarr;
            </a>
        </div>
    </section>

    {{-- SECTION GALERI FOTO 3D COVERFLOW (SWIPER.JS) --}}
    <section class="py-24 relative overflow-hidden bg-[#0A2540]">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#041224] via-[#0A2540]/90 to-[#0A2540]"></div>

        <div class="container mx-auto px-0 md:px-6 relative z-10 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 tracking-wide drop-shadow-lg"
                data-aos="fade-down">
                Galeri Foto
            </h2>

            <div class="swiper galeri-swiper" data-aos="zoom-in" data-aos-duration="1000">
                <div class="swiper-wrapper">
                    @foreach ($galeriRandom as $g)
                        @php
                            $galeriSrc = null;
                            if (!empty($g->info_file)) {
                                $filename = basename($g->info_file);
                                if (file_exists(public_path('storage/berita/' . $filename))) {
                                    $galeriSrc = asset('storage/berita/' . $filename);
                                } elseif (file_exists(public_path('storage/oldberita/' . $filename))) {
                                    $galeriSrc = asset('storage/oldberita/' . $filename);
                                } elseif (file_exists(public_path('storage/' . $g->info_file))) {
                                    $galeriSrc = asset('storage/' . $g->info_file);
                                } elseif (file_exists(public_path('gambar_berita/Berita/' . $filename))) {
                                    $galeriSrc = asset('gambar_berita/Berita/' . $filename);
                                }
                            }
                        @endphp

                        <div class="swiper-slide">
                            <div class="rounded-xl md:rounded-3xl overflow-hidden border-[4px] md:border-[6px] border-white shadow-2xl aspect-video bg-slate-800 flex items-center justify-center relative cursor-pointer"
                                onclick="window.location='{{ route('berita.show', $g->info->slug ?? ($g->info->info_id ?? '')) }}'">
                                @if ($galeriSrc)
                                    <img src="{{ $galeriSrc }}" class="block w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('laman/img/logo_lldikti.png') }}"
                                        class="block w-1/3 opacity-30 object-contain">
                                @endif
                                <div class="absolute inset-0 bg-black/0 hover:bg-black/20 transition duration-300"></div>
                            </div>

                            <div class="slide-caption mt-6 md:mt-8 text-center px-6 max-w-2xl mx-auto">
                                <h3 class="text-white font-extrabold text-base md:text-xl line-clamp-2 drop-shadow-md">
                                    {{ $g->info->info_judul ?? 'Dokumentasi Kegiatan LLDIKTI' }}
                                </h3>
                                <p class="text-sky-300 text-xs md:text-sm mt-2 font-medium tracking-wider">
                                    {{ \Carbon\Carbon::parse($g->info->info_tanggal ?? now())->translatedFormat('d F Y') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination !-bottom-2"></div>
                <div class="swiper-button-prev !left-4 md:!left-[10%] lg:!left-[15%] hidden md:flex"></div>
                <div class="swiper-button-next !right-4 md:!right-[10%] lg:!right-[15%] hidden md:flex"></div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-[#F8FAFC] border-t border-slate-100 relative overflow-hidden rounded-t-3xl shadow-soft">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 scale-x-150">
        </div>
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 relative z-10">

            {{-- INSTAGRAM FEED NATIVE --}}
            <div data-aos="fade-right" data-aos-duration="1000"
                class="bg-white p-8 rounded-3xl border border-slate-100 shadow-soft relative group">
                <i class="fas fa-drum-bali absolute text-culture_sky text-xl opacity-20 group-hover:opacity-40"
                    style="top: 15px; right: 15px;"></i>
                <h3 class="text-2xl font-extrabold text-primary mb-8 flex items-center justify-between relative z-10">
                    <span><i class="fab fa-instagram text-pink-600 mr-3 text-3xl shadow-soft"></i> Instagram Feed</span>
                    <a href="https://www.instagram.com/lldikti7/" target="_blank"
                        class="text-xs text-secondary font-medium hover:text-blue-800">@lldikti7 &rarr;</a>
                </h3>
                <div class="w-full h-72 rounded-2xl overflow-hidden border border-slate-200 shadow-inner relative">
                    <iframe src="https://www.instagram.com/lldikti7/embed" class="w-full h-full border-0" frameborder="0"
                        scrolling="no" allowtransparency="true"></iframe>
                    <div class="absolute inset-0 pointer-events-none border-2 border-white/20 rounded-2xl"></div>
                </div>
            </div>

            {{-- YOUTUBE CHANNEL --}}
            <div data-aos="fade-left" data-aos-duration="1000"
                class="bg-white p-8 rounded-3xl border border-slate-100 shadow-soft relative group">
                <i class="fas fa-vihara absolute text-culture_green text-xl opacity-20 group-hover:opacity-40"
                    style="top: 15px; right: 15px;"></i>
                <h3 class="text-2xl font-extrabold text-primary mb-8 flex items-center justify-between relative z-10">
                    <span><i class="fab fa-youtube text-red-600 mr-3 text-3xl shadow-soft"></i> YouTube Channel</span>
                    <a href="https://www.youtube.com/@lldikti7" target="_blank"
                        class="text-xs text-secondary font-medium hover:text-blue-800">Official &rarr;</a>
                </h3>
                <div
                    class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-xl border-2 border-slate-100 relative group z-10">
                    <iframe class="w-full h-72 relative z-10"
                        src="https://www.youtube-nocookie.com/embed/oLQxBsb5xdA?start=5&origin={{ urlencode(url('/')) }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

        </div>
    </section>

    {{-- TAMBAHKAN SCRIPT SWIPER DI SINI --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".galeri-swiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                loop: true,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 100,
                    depth: 250,
                    modifier: 1.5,
                    slideShadows: true,
                },
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
            });
        });
    </script>
@endsection
