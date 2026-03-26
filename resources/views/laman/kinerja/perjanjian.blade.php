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
                            <span>Perjanjian Kinerja</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Perjanjian <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Kinerja</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Dokumen komitmen dan indikator kinerja LLDIKTI Wilayah VII Jawa Timur.
            </p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            
            <div class="bg-white rounded-3xl p-8 md:p-10 shadow-soft border-l-4 border-secondary mb-12 flex flex-col md:flex-row items-center md:items-start gap-6" data-aos="fade-up">
                <div class="w-16 h-16 bg-sky-50 text-secondary rounded-2xl flex items-center justify-center text-3xl flex-shrink-0 shadow-inner">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-2xl font-bold text-primary mb-3">Perjanjian Kinerja LLDIKTI Wilayah VII</h2>
                    <p class="text-slate-600 leading-relaxed">
                        Perjanjian kinerja adalah lembar/dokumen yang berisikan penugasan dari Menteri Ristekdikti dengan Kepala LLDIKTI Wilayah VII untuk melaksanakan program/kegiatan yang disertai dengan indikator kinerja.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-soft border border-slate-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap md:whitespace-normal">
                        <thead>
                            <tr class="bg-primary text-white text-sm uppercase tracking-wider">
                                <th class="px-6 py-5 font-bold w-16 text-center border-b border-primary">No</th>
                                <th class="px-6 py-5 font-bold border-b border-primary">Judul Dokumen</th>
                                <th class="px-6 py-5 font-bold w-40 text-center border-b border-primary">Tahun</th>
                                <th class="px-6 py-5 font-bold w-24 text-center border-b border-primary">File</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-slate-700 text-sm divide-y divide-slate-100">
                            
                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">1</td>
                                <td class="px-6 py-5 font-bold text-primary group-hover:text-secondary transition-colors">
                                    Perjanjian Kinerja
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-secondary text-white shadow-sm">
                                        2025
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
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors">
                                    Perjanjian Kinerja
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-sky-100 text-secondary border border-sky-200">
                                        2024
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
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors">
                                    Perjanjian Kinerja
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-sky-100 text-secondary border border-sky-200">
                                        2023
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
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors">
                                    Perjanjian Kinerja
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-sky-100 text-secondary border border-sky-200">
                                        2022
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
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors">
                                    Perjanjian Kinerja
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                        2021
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-colors" title="Unduh File">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">6</td>
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors">
                                    Perjanjian Kinerja
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                        2020
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-colors" title="Unduh File">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">7</td>
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors">
                                    Perjanjian Kinerja
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                        2019
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-100 text-secondary hover:bg-secondary hover:text-white transition-colors" title="Unduh File">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-sky-50 transition-colors duration-200 group">
                                <td class="px-6 py-5 text-center font-medium text-slate-400">8</td>
                                <td class="px-6 py-5 font-semibold text-primary group-hover:text-secondary transition-colors">
                                    Perjanjian Kinerja
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                        2018
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
            </div>

        </div>
    </section>

@endsection