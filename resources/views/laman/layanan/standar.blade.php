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

    <section class="py-16 md:py-24 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            
            <div class="max-w-2xl mx-auto mb-16" data-aos="fade-up">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search text-slate-400 group-focus-within:text-secondary transition-colors"></i>
                    </div>
                    <input type="text" class="block w-full pl-11 pr-4 py-4 bg-white border border-slate-200 rounded-full text-sm shadow-soft focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all placeholder-slate-400" placeholder="Cari nama layanan... (contoh: Pangkat, Ijazah)">
                    <button class="absolute inset-y-1.5 right-1.5 bg-secondary hover:bg-blue-800 text-white px-6 rounded-full text-sm font-semibold transition-colors shadow-sm">
                        Cari
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">01</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Alih Jabatan PNS Non Dosen ke PNS Dosen</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="150">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-university"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">02</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Alih Kelola Perguruan Tinggi Swasta</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">03</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Cetak Transkrip Ujian Negara</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="250">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-award"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">04</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Inpassing Kepangkatan Non PNS (Asisten Ahli & Lektor)</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">05</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Kartu Istri / Suami (KARIS / KARSU)</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="350">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-id-badge"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">06</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Kartu Pegawai Hilang</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">07</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Kartu TASPEN</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="450">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-level-up-alt"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">08</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Kenaikan Pangkat Penyetaraan Non PNS</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">09</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Klarifikasi Ijazah</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg hover:border-sky-200 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="550">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-300 group-hover:text-accent transition-colors">10</span>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-4 flex-grow group-hover:text-secondary transition-colors">Laporan Beasiswa PPA & BBP-PPA</h3>
                    <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-sky-100 text-secondary font-semibold py-2.5 rounded-xl border border-slate-100 transition-colors text-sm">
                        <i class="fas fa-file-download mr-2"></i> Lihat File
                    </a>
                </div>

            </div>
            
            <div class="mt-12 text-center" data-aos="fade-up">
                <p class="text-slate-400 text-sm mb-4">Menampilkan 10 standar layanan</p>
            </div>

        </div>
    </section>

@endsection