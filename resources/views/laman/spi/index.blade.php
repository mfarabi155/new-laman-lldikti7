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
                    <li aria-current="page">
                        <div class="flex items-center text-secondary font-bold">
                            <i class="fas fa-chevron-right text-xs mx-2 text-slate-400"></i>
                            <span>SPI</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Satuan Pengawasan <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Internal (SPI)</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Bagian integral dari sistem pengendalian intern pemerintah di lingkungan LLDIKTI Wilayah VII Jawa Timur.
            </p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 bg-white rounded-3xl p-8 md:p-10 shadow-soft border-t-4 border-secondary relative overflow-hidden group" data-aos="fade-right">
                    <i class="fas fa-shield-alt absolute text-sky-50 text-9xl -bottom-10 -right-4 transform group-hover:scale-110 transition duration-500"></i>
                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold text-primary mb-6 flex items-center">
                            <div class="w-12 h-12 bg-sky-100 text-secondary rounded-xl flex items-center justify-center mr-4 shadow-inner">
                                <i class="fas fa-search"></i>
                            </div>
                            Pengertian SPI
                        </h2>
                        <div class="text-slate-600 leading-relaxed space-y-4">
                            <p>
                                <strong class="text-primary">Satuan Pengawasan Intern</strong> yang selanjutnya disingkat SPI adalah satuan pengawasan yang dibentuk untuk membantu terselenggaranya pengawasan terhadap pelaksanaan tugas dan fungsi unit kerja di lingkungan Kementerian (Permendikbud Nomor 22 Tahun 2017).
                            </p>
                            <p>
                                Satuan Pengawasan Intern (SPI) di Lembaga Layanan Pendidikan Tinggi (LLDIKTI) merupakan bagian integral dari sistem pengendalian intern pemerintah di lingkungan Kementerian Pendidikan Tinggi, Sains, dan Teknologi (Kemendiktisaintek).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-primary to-slate-800 rounded-3xl p-8 md:p-10 shadow-lg border-t-4 border-accent relative overflow-hidden group" data-aos="fade-left" data-aos-delay="100">
                    <i class="fas fa-chalkboard-teacher absolute text-white/5 text-8xl -bottom-4 -right-4 transform group-hover:scale-110 transition duration-500"></i>
                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                            <div class="w-12 h-12 bg-white/10 backdrop-blur-sm text-accent rounded-xl flex items-center justify-center mr-4 border border-white/20 shadow-inner">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            Pembinaan SPI
                        </h2>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-accent/20 text-accent flex items-center justify-center font-bold mr-3 flex-shrink-0 text-sm border border-accent/30">1</div>
                                <span class="text-slate-200 font-medium mt-1">Pembinaan Teknis Pengawasan</span>
                            </li>
                            <li class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-accent/20 text-accent flex items-center justify-center font-bold mr-3 flex-shrink-0 text-sm border border-accent/30">2</div>
                                <span class="text-slate-200 font-medium mt-1">Pembinaan Administratif</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white relative">
        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="bg-sky-100 text-secondary font-bold px-4 py-1.5 rounded-full text-sm uppercase tracking-widest shadow-sm">Landasan Regulasi</span>
                <h2 class="text-3xl font-bold text-primary mt-6 mb-4">Dasar Hukum SPI</h2>
                <div class="w-16 h-1 bg-accent mx-auto rounded-full shadow-inner"></div>
            </div>

            <div class="bg-slate-50 rounded-3xl p-8 shadow-inner border border-slate-100" data-aos="fade-up" data-aos-delay="100">
                <ul class="space-y-3">
                    <li class="flex items-start p-4 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                        <i class="fas fa-balance-scale text-secondary mt-1 mr-4 group-hover:text-accent transition-colors"></i>
                        <span class="text-slate-700 font-medium">Undang-Undang Nomor 15 Tahun 2004 tentang Pemeriksaan, Pengelolaan dan Tanggung Jawab Keuangan Negara.</span>
                    </li>
                    <li class="flex items-start p-4 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                        <i class="fas fa-balance-scale text-secondary mt-1 mr-4 group-hover:text-accent transition-colors"></i>
                        <span class="text-slate-700 font-medium">Peraturan Pemerintah Nomor 60 Tahun 2008 tentang Sistem Pengendalian Intern Pemerintah.</span>
                    </li>
                    <li class="flex items-start p-4 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                        <i class="fas fa-balance-scale text-secondary mt-1 mr-4 group-hover:text-accent transition-colors"></i>
                        <span class="text-slate-700 font-medium">Peraturan Menteri Pendidikan dan Kebudayaan Nomor 85 Tahun 2014 tentang Sistim Pengendalian Intern Pemerintah.</span>
                    </li>
                    <li class="flex items-start p-4 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                        <i class="fas fa-balance-scale text-secondary mt-1 mr-4 group-hover:text-accent transition-colors"></i>
                        <span class="text-slate-700 font-medium">Peraturan Menteri Pendidikan dan Kebudayaan Nomor 11 Tahun 2015 tentang Organisasi dan Tata Kerja.</span>
                    </li>
                    <li class="flex items-start p-4 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                        <i class="fas fa-balance-scale text-secondary mt-1 mr-4 group-hover:text-accent transition-colors"></i>
                        <span class="text-slate-700 font-medium">Peraturan Menteri Pendidikan dan Kebudayaan Nomor 55 Tahun 2015 tentang Rincian Tugas Unit Kerja di Lingkungan Inspektorat Jenderal.</span>
                    </li>
                    <li class="flex items-start p-4 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                        <i class="fas fa-balance-scale text-secondary mt-1 mr-4 group-hover:text-accent transition-colors"></i>
                        <span class="text-slate-700 font-medium">Peraturan Menteri Pendidikan dan Kebudayaan Nomor 22 Tahun 2017 tentang Satuan Pengawasan Intern.</span>
                    </li>
                    <li class="flex items-start p-4 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                        <i class="fas fa-balance-scale text-secondary mt-1 mr-4 group-hover:text-accent transition-colors"></i>
                        <span class="text-slate-700 font-medium">Peraturan Inspektur Jenderal Kemdikbud Nomor 3205/F.F1/HK/2019 tentang Pedoman Teknis Pengawasan Bagi Satuan Pengawasan Intern.</span>
                    </li>
                    <li class="flex items-start p-4 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                        <i class="fas fa-balance-scale text-secondary mt-1 mr-4 group-hover:text-accent transition-colors"></i>
                        <span class="text-slate-700 font-medium">Permendikbudristek Nomor 35 Tahun 2021 tentang Organisasi dan Tata Kerja Lembaga Layanan Pendidikan Tinggi.</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-sky-50 relative">
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="bg-white text-secondary font-bold px-4 py-1.5 rounded-full text-sm uppercase tracking-widest shadow-sm border border-sky-100">Tupoksi SPI</span>
                <h2 class="text-3xl font-bold text-primary mt-6 mb-4">Tugas dan Fungsi SPI</h2>
                <div class="w-16 h-1 bg-accent mx-auto rounded-full shadow-inner"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @php
                    $tugas = [
                        ['icon' => 'fa-clipboard-list', 'text' => 'Menyusun program pengawasan'],
                        ['icon' => 'fa-eye', 'text' => 'Melakukan pengawasan kebijakan dan program'],
                        ['icon' => 'fa-boxes', 'text' => 'Melakukan pengawasan pengelolaan kepegawaian, keuangan, dan barang milik negara'],
                        ['icon' => 'fa-sync-alt', 'text' => 'Memantau dan mengkoordinasi tindak lanjut hasil pemeriksaan internal dan eksternal'],
                        ['icon' => 'fa-hands-helping', 'text' => 'Pendampingan dan reviu laporan keuangan'],
                        ['icon' => 'fa-comments', 'text' => 'Memberi saran dan rekomendasi'],
                        ['icon' => 'fa-file-alt', 'text' => 'Menyusun laporan hasil pengawasan'],
                        ['icon' => 'fa-chart-line', 'text' => 'Melakukan evaluasi hasil pengawasan'],
                        ['icon' => 'fa-bullhorn', 'text' => 'Melaporkan hasil pengawasan, evaluasi, dan reviu kepada kepala'],
                    ];
                @endphp

                @foreach($tugas as $index => $item)
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-secondary transition-all duration-300 group flex items-start" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                    <div class="w-12 h-12 bg-sky-50 text-secondary rounded-xl flex items-center justify-center text-xl flex-shrink-0 mr-5 shadow-inner group-hover:bg-secondary group-hover:text-white transition-colors">
                        <i class="fas {{ $item['icon'] }}"></i>
                    </div>
                    <p class="text-primary font-medium leading-snug mt-1 group-hover:text-secondary transition-colors">{{ $item['text'] }}</p>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="bg-amber-100 text-accent font-bold px-4 py-1.5 rounded-full text-sm uppercase tracking-widest shadow-sm">Periode 2025 - 2029</span>
                <h2 class="text-3xl font-bold text-primary mt-6 mb-4">Susunan Keanggotaan SPI</h2>
                <div class="w-16 h-1 bg-accent mx-auto rounded-full shadow-inner mb-6"></div>
                <p class="text-slate-500">Tim pengawasan internal LLDIKTI Wilayah VII Jawa Timur.</p>
            </div>

            <div class="flex flex-col md:flex-row justify-center gap-8 mb-12">
                <div class="bg-white rounded-3xl p-8 shadow-soft border-t-4 border-secondary text-center w-full md:w-72 transform hover:-translate-y-2 transition duration-300" data-aos="zoom-in">
                    <div class="w-24 h-24 mx-auto bg-gradient-to-br from-secondary to-blue-900 rounded-full flex items-center justify-center mb-6 shadow-md border-4 border-sky-50">
                        <i class="fas fa-user-tie text-3xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-1">Dr. Dewi Setyowati, S.H., M.H.</h3>
                    <p class="text-secondary font-semibold text-sm uppercase tracking-wider">Ketua SPI</p>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-soft border-t-4 border-accent text-center w-full md:w-72 transform hover:-translate-y-2 transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-24 h-24 mx-auto bg-gradient-to-br from-accent to-amber-600 rounded-full flex items-center justify-center mb-6 shadow-md border-4 border-amber-50">
                        <i class="fas fa-user text-3xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-1">Tri Yani, M.SE.</h3>
                    <p class="text-accent font-semibold text-sm uppercase tracking-wider">Sekretaris SPI</p>
                </div>
            </div>

            <div class="hidden md:block w-px h-12 bg-slate-200 mx-auto -mt-6 mb-6"></div>
            <div class="hidden md:block w-3/4 h-px bg-slate-200 mx-auto mb-8"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 text-center hover:shadow-md transition duration-300 relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="hidden md:block absolute -top-8 left-1/2 w-px h-8 bg-slate-200"></div>
                    <div class="w-16 h-16 mx-auto bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-400">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="font-bold text-primary text-sm mb-1">Vita Oktaviyanti, S.Si.</h3>
                    <p class="text-slate-500 text-xs font-medium">Anggota</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 text-center hover:shadow-md transition duration-300 relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="hidden md:block absolute -top-8 left-1/2 w-px h-8 bg-slate-200"></div>
                    <div class="w-16 h-16 mx-auto bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-400">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="font-bold text-primary text-sm mb-1">Yuliana Safitri, S.E.</h3>
                    <p class="text-slate-500 text-xs font-medium">Anggota</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 text-center hover:shadow-md transition duration-300 relative" data-aos="fade-up" data-aos-delay="400">
                    <div class="hidden md:block absolute -top-8 left-1/2 w-px h-8 bg-slate-200"></div>
                    <div class="w-16 h-16 mx-auto bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-400">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="font-bold text-primary text-sm mb-1">Resa Bayu A., S.Pd.</h3>
                    <p class="text-slate-500 text-xs font-medium">Anggota</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 text-center hover:shadow-md transition duration-300 relative" data-aos="fade-up" data-aos-delay="500">
                    <div class="hidden md:block absolute -top-8 left-1/2 w-px h-8 bg-slate-200"></div>
                    <div class="w-16 h-16 mx-auto bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-400">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="font-bold text-primary text-sm mb-1">Pebri Susanti, S.E.</h3>
                    <p class="text-slate-500 text-xs font-medium">Anggota</p>
                </div>

            </div>

        </div>
    </section>

@endsection