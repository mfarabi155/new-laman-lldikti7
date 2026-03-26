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
                            <span>Kedudukan, Tugas & Fungsi</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Kedudukan, Tugas & <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Fungsi</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Landasan operasional dan peran strategis LLDIKTI Wilayah VII Jawa Timur.
            </p>
        </div>
    </section>

    <section class="py-20 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-20">
                
                <div class="bg-white rounded-3xl p-10 shadow-soft border-t-4 border-secondary group hover:shadow-xl transition-all duration-300 relative overflow-hidden" data-aos="fade-right">
                    <i class="fas fa-sitemap absolute text-sky-50 text-8xl -bottom-4 -right-4 transform group-hover:scale-110 transition duration-500"></i>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-sky-100 text-secondary rounded-2xl flex items-center justify-center mb-6 text-2xl shadow-inner">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-primary mb-4">Kedudukan Lembaga</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Lembaga Layanan Pendidikan Tinggi (LLDIKTI) dipimpin oleh pejabat Eselon II yaitu seorang Kepala dibantu oleh Sekretaris, dan dalam melaksanakan tugas kedudukannya bertanggungjawab kepada <span class="font-semibold text-primary">Menteri Riset, Teknologi, dan Pendidikan Tinggi</span>.
                        </p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-primary to-slate-800 rounded-3xl p-10 shadow-lg border-t-4 border-accent group hover:shadow-2xl transition-all duration-300 relative overflow-hidden" data-aos="fade-left" data-aos-delay="100">
                    <i class="fas fa-hands-helping absolute text-white/5 text-8xl -bottom-4 -right-4 transform group-hover:scale-110 transition duration-500"></i>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/10 backdrop-blur-sm text-accent rounded-2xl flex items-center justify-center mb-6 text-2xl border border-white/20 shadow-inner">
                            <i class="fas fa-flag"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Tugas Utama</h3>
                        <p class="text-slate-300 leading-relaxed text-lg">
                            Melaksanakan fasilitasi peningkatan mutu penyelenggaraan pendidikan tinggi di wilayah <span class="text-accent font-bold">Provinsi Jawa Timur</span>.
                        </p>
                    </div>
                </div>

            </div>

            <div class="text-center mb-16" data-aos="fade-up">
                <span class="bg-sky-100 text-secondary font-bold px-4 py-1.5 rounded-full text-sm uppercase tracking-widest shadow-sm">Rincian Fungsi</span>
                <h2 class="text-3xl font-bold text-primary mt-6 mb-4">Fungsi LLDIKTI Wilayah VII</h2>
                <div class="w-16 h-1 bg-accent mx-auto rounded-full shadow-inner"></div>
                <p class="text-slate-500 mt-6 max-w-2xl mx-auto">Dalam melaksanakan tugas fasilitasi peningkatan mutu tersebut, LLDIKTI Wilayah VII menyelenggarakan fungsi-fungsi berikut:</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center mb-5 text-xl group-hover:bg-secondary group-hover:text-white transition-colors shadow-inner">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <p class="text-primary font-semibold leading-snug">Melaksanakan pemetaan mutu Pendidikan tinggi.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center mb-5 text-xl group-hover:bg-secondary group-hover:text-white transition-colors shadow-inner">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <p class="text-primary font-semibold leading-snug">Melaksanakan fasilitasi peningkatan mutu penyelenggaraan Pendidikan tinggi.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center mb-5 text-xl group-hover:bg-secondary group-hover:text-white transition-colors shadow-inner">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <p class="text-primary font-semibold leading-snug">Melaksanakan fasilitasi peningkatan mutu pengelolaan perguruan tinggi.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center mb-5 text-xl group-hover:bg-secondary group-hover:text-white transition-colors shadow-inner">
                        <i class="fas fa-shield-check"></i>
                    </div>
                    <p class="text-primary font-semibold leading-snug">Melaksanakan fasilitasi kesiapan perguruan tinggi dalam penjaminan mutu eksternal.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center mb-5 text-xl group-hover:bg-secondary group-hover:text-white transition-colors shadow-inner">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <p class="text-primary font-semibold leading-snug">Melaksanakan evaluasi dan pelaporan pelaksanaan fasilitasi peningkatan mutu perguruan tinggi.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center mb-5 text-xl group-hover:bg-secondary group-hover:text-white transition-colors shadow-inner">
                        <i class="fas fa-database"></i>
                    </div>
                    <p class="text-primary font-semibold leading-snug">Mengelola data dan informasi di bidang mutu Pendidikan tinggi.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group lg:col-start-2" data-aos="fade-up" data-aos-delay="700">
                    <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center mb-5 text-xl group-hover:bg-secondary group-hover:text-white transition-colors shadow-inner">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <p class="text-primary font-semibold leading-snug">Melaksanakan administrasi LLDIKTI.</p>
                </div>

            </div>
        </div>
    </section>

@endsection