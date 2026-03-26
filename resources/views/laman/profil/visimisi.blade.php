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
                            <span>Visi & Misi</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Visi & <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Misi Lembaga</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Arah kebijakan dan tujuan utama Lembaga Layanan Pendidikan Tinggi Wilayah VII.
            </p>
        </div>
    </section>

    <section class="py-20 bg-[#F8FAFC] relative overflow-hidden">
        <i class="fas fa-eye absolute text-culture_sky text-8xl opacity-5" style="top: 15%; right: 10%;"></i>
        <i class="fas fa-bullseye absolute text-culture_green text-8xl opacity-5" style="bottom: 15%; left: 5%;"></i>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            
            <div class="mb-20" data-aos="fade-up" data-aos-duration="1000">
                <div class="text-center mb-8">
                    <span class="bg-sky-100 text-secondary font-bold px-4 py-1.5 rounded-full text-sm uppercase tracking-widest shadow-sm">Visi LLDIKTI VII</span>
                </div>
                
                <div class="bg-primary rounded-3xl p-10 md:p-16 shadow-2xl relative overflow-hidden group border border-slate-700 transform transition-transform duration-500 hover:scale-[1.02]">
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-accent opacity-20 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-secondary opacity-30 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mb-8 border border-white/20 shadow-inner group-hover:bg-accent transition-colors duration-500">
                            <i class="fas fa-eye text-4xl text-white"></i>
                        </div>
                        <h2 class="text-3xl md:text-5xl font-extrabold text-white leading-tight md:leading-snug">
                            "Menjadi lembaga layanan pendidikan tinggi yang <span class="text-accent">akuntabel</span> dan <span class="text-culture_sky">kredibel</span>."
                        </h2>
                    </div>
                </div>
            </div>

            <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-300 to-transparent my-16"></div>

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="text-center mb-12">
                    <span class="bg-amber-100 text-accent font-bold px-4 py-1.5 rounded-full text-sm uppercase tracking-widest shadow-sm">Misi LLDIKTI VII</span>
                    <h3 class="text-3xl font-bold text-primary mt-6">Langkah Strategis Lembaga</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="bg-white p-10 rounded-3xl shadow-soft border-t-4 border-secondary hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-sky-50 rounded-bl-full -z-0 transition-transform duration-500 group-hover:scale-110"></div>
                        <div class="relative z-10">
                            <div class="text-5xl font-extrabold text-slate-100 absolute top-2 right-4 -z-10 group-hover:text-sky-100 transition-colors">01</div>
                            <div class="w-16 h-16 bg-sky-100 text-secondary rounded-2xl flex items-center justify-center mb-8 text-3xl shadow-inner">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <p class="text-xl text-primary font-semibold leading-relaxed">
                                Memberikan layanan pendidikan tinggi yang akuntabel, kredibel, dan berbasis <span class="text-secondary font-bold border-b-2 border-accent">TIK (Teknologi Informasi dan Komunikasi)</span>.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white p-10 rounded-3xl shadow-soft border-t-4 border-accent hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-bl-full -z-0 transition-transform duration-500 group-hover:scale-110"></div>
                        <div class="relative z-10">
                            <div class="text-5xl font-extrabold text-slate-100 absolute top-2 right-4 -z-10 group-hover:text-amber-100 transition-colors">02</div>
                            <div class="w-16 h-16 bg-amber-100 text-accent rounded-2xl flex items-center justify-center mb-8 text-3xl shadow-inner">
                                <i class="fas fa-university"></i>
                            </div>
                            <p class="text-xl text-primary font-semibold leading-relaxed">
                                Melaksanakan pengawasan, pengendalian, dan pembinaan <span class="text-accent font-bold">Perguruan Tinggi Swasta</span> di Provinsi Jawa Timur termasuk pengembangannya.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection