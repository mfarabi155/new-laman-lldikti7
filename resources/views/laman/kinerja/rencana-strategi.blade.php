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
                            <span class="hover:text-secondary cursor-pointer transition">Kinerja</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center text-secondary font-bold">
                            <i class="fas fa-chevron-right text-xs mx-2 text-slate-400"></i>
                            <span>Rencana Strategi</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Rencana <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Strategi</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Dokumen perencanaan strategis LLDIKTI Wilayah VII sebagai pedoman pelaksanaan program dan kegiatan.
            </p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="flex flex-col lg:flex-row gap-10">
                
                <div class="w-full lg:w-2/3">
                    
                    <div class="bg-white rounded-3xl shadow-soft border border-slate-100 p-6 md:p-8 mb-10 group" data-aos="fade-up">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-primary mb-2">Rencana Strategis LLDIKTI VII</h2>
                                <a href="#" class="text-secondary font-semibold hover:text-blue-800 flex items-center text-sm md:text-base group-hover:underline">
                                    <i class="fas fa-file-pdf mr-2 text-red-500 text-lg"></i> RENCANA STRATEGIS 2020-2024 LLDIKTI WILAYAH VII (Revisi)
                                </a>
                            </div>
                            <a href="#" class="inline-flex items-center justify-center bg-sky-50 hover:bg-secondary text-secondary hover:text-white px-5 py-2.5 rounded-xl transition-colors font-bold text-sm border border-sky-100 hover:border-secondary shadow-sm flex-shrink-0">
                                <i class="fas fa-download mr-2"></i> Unduh File
                            </a>
                        </div>
                        
                        <div class="w-full bg-slate-100 rounded-2xl overflow-hidden border border-slate-200 shadow-inner relative flex items-center justify-center h-[500px] md:h-[700px]">
                            <div class="text-center text-slate-400 p-6">
                                <i class="fas fa-file-pdf text-6xl mb-4 text-slate-300"></i>
                                <p class="font-medium text-lg text-slate-500">Area Pratinjau Dokumen PDF</p>
                                <p class="text-sm">Dokumen akan dimuat di dalam bingkai ini.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-soft border border-slate-100 p-6 md:p-8 mb-10 group" data-aos="fade-up">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-primary mb-2">Rencana Strategis LLDIKTI VII</h2>
                                <a href="#" class="text-secondary font-semibold hover:text-blue-800 flex items-center text-sm md:text-base group-hover:underline">
                                    <i class="fas fa-file-pdf mr-2 text-red-500 text-lg"></i> RENCANA STRATEGIS 2020-2024 LLDIKTI WILAYAH VII
                                </a>
                            </div>
                            <a href="#" class="inline-flex items-center justify-center bg-sky-50 hover:bg-secondary text-secondary hover:text-white px-5 py-2.5 rounded-xl transition-colors font-bold text-sm border border-sky-100 hover:border-secondary shadow-sm flex-shrink-0">
                                <i class="fas fa-download mr-2"></i> Unduh File
                            </a>
                        </div>
                        
                        <div class="w-full bg-slate-100 rounded-2xl overflow-hidden border border-slate-200 shadow-inner relative flex items-center justify-center h-[500px] md:h-[700px]">
                            <div class="text-center text-slate-400 p-6">
                                <i class="fas fa-file-pdf text-6xl mb-4 text-slate-300"></i>
                                <p class="font-medium text-lg text-slate-500">Area Pratinjau Dokumen PDF</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-full lg:w-1/3">
                    <div class="sticky top-32" data-aos="fade-left" data-aos-duration="1000">
                        
                        <div class="flex items-center space-x-3 mb-6 bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
                            <div class="w-1.5 h-6 bg-accent rounded-full"></div>
                            <h3 class="text-xl font-bold text-primary uppercase tracking-wide">Pengumuman Terkini</h3>
                        </div>

                        <div class="space-y-4">
                            
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group border-l-4 border-l-secondary">
                                <h4 class="font-bold text-primary mb-3 leading-snug group-hover:text-secondary transition-colors">
                                    Pembukaan Rekrutmen Calon Asesor JAD Nasional Tahun 2026
                                </h4>
                                <p class="text-sm text-slate-500 mb-4 line-clamp-2 leading-relaxed">
                                    Menindaklanjuti Surat Direktur Sumber Daya Direktorat Jenderal Pendidikan Tinggi Kementerian Pendidikan...
                                </p>
                                <div class="flex flex-wrap items-center text-xs text-slate-400 gap-y-2 mb-4">
                                    <span class="mr-4 flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> March 18, 2026</span>
                                    <span class="flex items-center"><i class="fas fa-user-tie mr-1.5 text-sky-500"></i> Tim Kerja Sumber Daya PT</span>
                                </div>
                                <a href="#" class="text-sm font-semibold text-secondary group-hover:text-blue-800 flex items-center transition-colors">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ml-1.5 text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>

                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group border-l-4 border-l-secondary">
                                <h4 class="font-bold text-primary mb-3 leading-snug group-hover:text-secondary transition-colors">
                                    Penyelenggaraan Seleksi Pemilihan Mahasiswa Berprestasi (Pilmapres) Tingkat Wilayah 2026
                                </h4>
                                <p class="text-sm text-slate-500 mb-4 line-clamp-2 leading-relaxed">
                                    Yth. Rektor/ Ketua/ Direktur Perguruan Tinggi Negeri/Swasta di Lingkungan LLDIKTI Wilayah VII Bersama...
                                </p>
                                <div class="flex flex-wrap items-center text-xs text-slate-400 gap-y-2 mb-4">
                                    <span class="mr-4 flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> March 18, 2026</span>
                                    <span class="flex items-center"><i class="fas fa-users mr-1.5 text-sky-500"></i> Tim Kerja Kemahasiswaan</span>
                                </div>
                                <a href="#" class="text-sm font-semibold text-secondary group-hover:text-blue-800 flex items-center transition-colors">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ml-1.5 text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>

                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-300 group border-l-4 border-l-secondary">
                                <h4 class="font-bold text-primary mb-3 leading-snug group-hover:text-secondary transition-colors">
                                    Penyerahan Kontrak dan Laporan Program Insentif Artikel dan Jurnal Tahun 2026
                                </h4>
                                <p class="text-sm text-slate-500 mb-4 line-clamp-2 leading-relaxed">
                                    Yth. Pimpinan Perguruan Tinggi Swasta Di lingkungan LLDIKTI Wilayah VII (terlampir) Menindaklanjuti...
                                </p>
                                <div class="flex flex-wrap items-center text-xs text-slate-400 gap-y-2 mb-4">
                                    <span class="mr-4 flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> Dec 29, 2025</span>
                                    <span class="flex items-center"><i class="fas fa-book-open mr-1.5 text-sky-500"></i> Tim Kerja Akademik & Risbang</span>
                                </div>
                                <a href="#" class="text-sm font-semibold text-secondary group-hover:text-blue-800 flex items-center transition-colors">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ml-1.5 text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection