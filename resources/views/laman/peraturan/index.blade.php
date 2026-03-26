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
            
            <div class="bg-white p-4 md:p-6 rounded-2xl shadow-soft border border-slate-100 mb-10" data-aos="fade-up">
                <form action="#" method="GET" class="flex flex-col md:flex-row gap-4">
                    
                    <div class="w-full md:w-1/3 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-filter text-slate-400"></i>
                        </div>
                        <select name="kategori" class="block w-full pl-11 pr-10 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all appearance-none text-slate-700 font-medium">
                            <option value="">Semua Jenis Peraturan</option>
                            <option value="undang-undang">Undang - Undang</option>
                            <option value="peraturan-menteri">Peraturan Menteri</option>
                            <option value="keputusan-menteri">Keputusan Menteri</option>
                            <option value="surat-edaran">Surat Edaran</option>
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
                            <input type="text" name="search" class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all text-slate-700" placeholder="Cari Nama Peraturan... (cth: Standar Nasional)">
                        </div>
                        
                        <button type="submit" class="bg-secondary hover:bg-blue-800 text-white px-8 py-3.5 rounded-xl text-sm font-bold transition-all shadow-sm flex items-center gap-2 flex-shrink-0">
                            <i class="fas fa-search hidden md:block"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-3xl shadow-soft border border-slate-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap md:whitespace-normal">
                        <thead>
                            <tr class="bg-primary text-white text-sm uppercase tracking-wider">
                                <th class="px-6 py-5 font-bold w-16 text-center border-b border-primary">No</th>
                                <th class="px-6 py-5 font-bold border-b border-primary">Nama Peraturan</th>
                                <th class="px-6 py-5 font-bold w-56 border-b border-primary">Jenis</th>
                                <th class="px-6 py-5 font-bold w-24 text-center border-b border-primary">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-slate-700 text-sm divide-y divide-slate-100">
                            
                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">1</td>
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors leading-relaxed">
                                    Masa Belajar Penyelenggaraan Program Pendidikan sehubungan dengan Surat Edaran dari Menteri Pendidikan...
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200 whitespace-nowrap">
                                        Surat Edaran Sekjen
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-colors" title="Unduh File">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">2</td>
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors leading-relaxed">
                                    Pendirian, Perubahan, Pembubaran Perguruan Tinggi Negeri, dan Pendirian, Perubahan, Pencabutan Izin PTS
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200 whitespace-nowrap">
                                        Peraturan Menteri
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-colors" title="Unduh File">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">3</td>
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors leading-relaxed">
                                    Standar Nasional Pendidikan Tinggi
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200 whitespace-nowrap">
                                        Peraturan Menteri
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-colors" title="Unduh File">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">4</td>
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors leading-relaxed">
                                    Akreditasi Program Studi dan Perguruan Tinggi
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200 whitespace-nowrap">
                                        Peraturan Menteri
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-colors" title="Unduh File">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">5</td>
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors leading-relaxed">
                                    Tentang Standar Nasional Ilmu Pengetahuan Dan Teknologi
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 whitespace-nowrap">
                                        Undang - Undang
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-colors" title="Unduh File">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
                <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex items-center justify-between sm:px-6">
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-slate-500">
                                Menampilkan <span class="font-medium text-primary">1</span> sampai <span class="font-medium text-primary">5</span> dari <span class="font-medium text-primary">97</span> hasil
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-slate-200 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-secondary border-secondary text-white relative inline-flex items-center px-4 py-2 border text-sm font-bold">
                                    1
                                </a>
                                <a href="#" class="bg-white border-slate-200 text-slate-500 hover:bg-slate-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    2
                                </a>
                                <a href="#" class="bg-white border-slate-200 text-slate-500 hover:bg-slate-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    3
                                </a>
                                <span class="relative inline-flex items-center px-4 py-2 border border-slate-200 bg-white text-sm font-medium text-slate-700">
                                    ...
                                </span>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-slate-200 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection