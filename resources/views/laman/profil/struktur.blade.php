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
                            <span>Struktur Organisasi</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Struktur <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Organisasi</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Bagan hierarki dan tata kerja Lembaga Layanan Pendidikan Tinggi Wilayah VII.
            </p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-[#F8FAFC] relative overflow-hidden">
        <i class="fas fa-sitemap absolute text-culture_sky text-8xl opacity-5" style="top: 15%; right: 10%;"></i>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 scale-125 z-0"></div>

        <div class="container mx-auto px-6 relative z-10">
            
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-primary">Bagan Formal LLDIKTI VII</h2>
                <div class="w-16 h-1 bg-accent mx-auto rounded-full shadow-inner mt-4"></div>
                <p class="text-slate-500 mt-6 max-w-2xl mx-auto">Klik pada gambar untuk memperbesar atau mengunduh bagan struktur organisasi.</p>
            </div>

            <div class="max-w-7xl mx-auto" data-aos="zoom-in" data-aos-duration="1200">
                <div class="bg-white p-4 md:p-6 rounded-3xl shadow-soft border border-slate-100 group overflow-hidden relative transition-all duration-500 hover:shadow-2xl hover:border-sky-100 hover:-translate-y-1">
                    
                    <div class="absolute inset-0 bg-gradient-to-tr from-sky-50 to-white opacity-50 z-0"></div>
                    
                    <a href="{{ asset('laman/img/struktur.jpg') }}" target="_blank" class="block relative z-10 rounded-2xl overflow-hidden cursor-zoom-in" title="Klik untuk memperbesar">
                        
                        <img src="{{ asset('laman/img/struktur.jpg') }}" 
                             alt="Bagan Struktur Organisasi LLDIKTI Wilayah VII" 
                             class="w-full h-auto object-contain transform group-hover:scale-[1.01] transition duration-700 ease-in-out">
                        
                        <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center text-white text-3xl shadow-lg">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ asset('laman/img/struktur.jpg') }}" download="Struktur-Organisasi-LLDIKTI-VII.webp" class="inline-flex items-center bg-secondary hover:bg-blue-800 text-white px-8 py-3 rounded-full font-bold transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5 group text-sm">
                        <i class="fas fa-download mr-2.5 transition-transform group-hover:translate-y-0.5"></i>
                        Unduh Bagan Versi HD
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection