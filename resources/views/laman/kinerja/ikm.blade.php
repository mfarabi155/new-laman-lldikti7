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
                            <span>Indeks Kepuasan Masyarakat</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Indeks Kepuasan <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Masyarakat</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Transparansi hasil survei dan evaluasi layanan publik di lingkungan LLDIKTI Wilayah VII.
            </p>
        </div>
    </section>

    <section class="py-12 md:py-20 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-[1400px] relative z-10">
            
            <div class="flex flex-col lg:flex-row gap-8">
                
                <div class="w-full lg:w-1/3 flex flex-col gap-8">
                    
                    <div class="bg-white rounded-3xl p-8 shadow-soft border border-slate-100" data-aos="fade-right">
                        <h3 class="text-lg font-bold text-primary text-center mb-6">Persentase Jawaban Survei</h3>
                        
                        <div class="flex flex-wrap justify-center gap-3 mb-8 text-xs font-medium text-slate-600">
                            <div class="flex items-center"><span class="w-3 h-3 rounded-sm bg-secondary mr-1.5"></span> Sangat Sesuai</div>
                            <div class="flex items-center"><span class="w-3 h-3 rounded-sm bg-sky-400 mr-1.5"></span> Sesuai</div>
                            <div class="flex items-center"><span class="w-3 h-3 rounded-sm bg-accent mr-1.5"></span> Kurang Sesuai</div>
                            <div class="flex items-center"><span class="w-3 h-3 rounded-sm bg-red-500 mr-1.5"></span> Tidak Sesuai</div>
                        </div>

                        <div class="flex justify-center mb-4">
                            <div class="w-48 h-48 rounded-full shadow-inner border-[6px] border-white relative" 
                                 style="background: conic-gradient(#1D4ED8 0% 85%, #38BDF8 85% 95%, #F59E0B 95% 98%, #EF4444 98% 100%);">
                                 <div class="absolute inset-0 m-auto w-24 h-24 bg-white rounded-full shadow-sm flex items-center justify-center flex-col">
                                     <span class="text-2xl font-black text-primary">85%</span>
                                     <span class="text-[10px] text-slate-400">Sangat Sesuai</span>
                                 </div>
                            </div>
                        </div>
                        <p class="text-center text-xs text-slate-400 mt-4">*Data divisualisasikan dari rata-rata seluruh pertanyaan.</p>
                    </div>

                    <div class="bg-white rounded-3xl p-8 shadow-soft border border-slate-100" data-aos="fade-right" data-aos-delay="100">
                        <h3 class="text-lg font-bold text-primary text-center mb-6">Jumlah Responden</h3>
                        <div class="flex items-center justify-center mb-6 text-xs font-medium text-slate-600">
                            <span class="w-3 h-3 rounded-sm bg-secondary mr-2"></span> Jumlah Responden
                        </div>

                        <div class="h-48 flex items-end justify-between gap-2 border-b border-l border-slate-200 pb-2 pl-2 relative">
                            <div class="absolute inset-0 flex flex-col justify-between z-0 pointer-events-none">
                                <div class="border-t border-slate-100 w-full h-0"></div>
                                <div class="border-t border-slate-100 w-full h-0"></div>
                                <div class="border-t border-slate-100 w-full h-0"></div>
                                <div class="border-t border-slate-100 w-full h-0"></div>
                            </div>

                            <div class="flex flex-col items-center w-full z-10 group">
                                <div class="w-full bg-secondary rounded-t-sm h-[5%] group-hover:bg-blue-800 transition-colors relative cursor-pointer" title="0 Responden">
                                    <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-bold text-slate-500 opacity-0 group-hover:opacity-100 transition-opacity">0</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center w-full z-10 group">
                                <div class="w-full bg-secondary rounded-t-sm h-[10%] group-hover:bg-blue-800 transition-colors relative cursor-pointer" title="0 Responden">
                                    <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-bold text-slate-500 opacity-0 group-hover:opacity-100 transition-opacity">0</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center w-full z-10 group">
                                <div class="w-full bg-secondary rounded-t-sm h-[5%] group-hover:bg-blue-800 transition-colors relative cursor-pointer" title="0 Responden">
                                    <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-bold text-slate-500 opacity-0 group-hover:opacity-100 transition-opacity">0</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center w-full z-10 group">
                                <div class="w-full bg-secondary rounded-t-sm h-[5%] group-hover:bg-blue-800 transition-colors relative cursor-pointer" title="0 Responden">
                                    <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-bold text-slate-500 opacity-0 group-hover:opacity-100 transition-opacity">0</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center w-full z-10 group">
                                <div class="w-full bg-secondary rounded-t-sm h-[95%] group-hover:bg-blue-800 transition-colors relative cursor-pointer" title="1 Responden">
                                    <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-bold text-primary opacity-0 group-hover:opacity-100 transition-opacity">1</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between mt-3 text-[9px] sm:text-[10px] text-slate-500 font-medium text-center">
                            <div class="w-full">Dosen</div>
                            <div class="w-full">Mhs</div>
                            <div class="w-full">Staf PT</div>
                            <div class="w-full">Pimp. PT</div>
                            <div class="w-full">Lainnya</div>
                        </div>
                        <p class="text-center font-bold text-primary mt-6 text-sm">Total Responden: <span class="text-secondary">1</span></p>
                    </div>

                </div>

                <div class="w-full lg:w-2/3 flex flex-col gap-6" data-aos="fade-left">
                    
                    <div class="bg-white rounded-3xl p-6 md:p-8 shadow-soft border border-slate-100">
                        <div class="flex items-center space-x-3 mb-6 border-b border-slate-100 pb-4">
                            <div class="w-1.5 h-6 bg-accent rounded-full"></div>
                            <h2 class="text-xl font-bold text-primary">Statistik Hasil Survei</h2>
                        </div>
                        
                        <form action="#" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
                            <div class="w-full md:w-5/12">
                                <label class="block text-xs font-semibold text-slate-500 mb-2">Tanggal Mulai</label>
                                <div class="relative">
                                    <input type="date" name="start_date" class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all text-slate-700 font-medium cursor-pointer">
                                </div>
                            </div>
                            
                            <div class="w-full md:w-5/12">
                                <label class="block text-xs font-semibold text-slate-500 mb-2">Tanggal Akhir</label>
                                <div class="relative">
                                    <input type="date" name="end_date" class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all text-slate-700 font-medium cursor-pointer">
                                </div>
                            </div>

                            <div class="w-full md:w-2/12">
                                <button type="submit" class="w-full bg-secondary hover:bg-blue-800 text-white py-3 rounded-xl text-sm font-bold transition-all shadow-sm flex items-center justify-center gap-2">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-3xl shadow-soft border border-slate-100 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse whitespace-nowrap md:whitespace-normal">
                                <thead>
                                    <tr class="bg-slate-50 text-slate-600 text-xs uppercase tracking-wider border-b border-slate-200">
                                        <th class="px-6 py-4 font-bold w-12 text-center">No</th>
                                        <th class="px-6 py-4 font-bold">Pertanyaan Survei</th>
                                        <th class="px-4 py-4 font-bold w-20 text-center text-secondary leading-tight">Sangat<br>Sesuai (%)</th>
                                        <th class="px-4 py-4 font-bold w-20 text-center text-sky-500 leading-tight">Sesuai<br>(%)</th>
                                        <th class="px-4 py-4 font-bold w-20 text-center text-accent leading-tight">Kurang<br>Sesuai (%)</th>
                                        <th class="px-4 py-4 font-bold w-20 text-center text-red-500 leading-tight">Tidak<br>Sesuai (%)</th>
                                    </tr>
                                </thead>
                                
                                <tbody class="text-slate-700 text-sm divide-y divide-slate-100">
                                    <tr class="hover:bg-sky-50/50 transition-colors">
                                        <td class="px-6 py-4 text-center font-medium text-slate-400">1</td>
                                        <td class="px-6 py-4 font-medium text-primary leading-relaxed">
                                            Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?
                                        </td>
                                        <td class="px-4 py-4 text-center font-bold text-slate-800">100.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                    </tr>
                                    
                                    <tr class="hover:bg-sky-50/50 transition-colors">
                                        <td class="px-6 py-4 text-center font-medium text-slate-400">2</td>
                                        <td class="px-6 py-4 font-medium text-primary leading-relaxed">
                                            Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan unit ini?
                                        </td>
                                        <td class="px-4 py-4 text-center font-bold text-slate-800">100.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                    </tr>

                                    <tr class="hover:bg-sky-50/50 transition-colors">
                                        <td class="px-6 py-4 text-center font-medium text-slate-400">3</td>
                                        <td class="px-6 py-4 font-medium text-primary leading-relaxed">
                                            Bagaimana pendapat Saudara tentang ketepatan waktu dalam memberikan pelayanan?
                                        </td>
                                        <td class="px-4 py-4 text-center font-bold text-slate-800">100.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                    </tr>

                                    <tr class="hover:bg-sky-50/50 transition-colors">
                                        <td class="px-6 py-4 text-center font-medium text-slate-400">4</td>
                                        <td class="px-6 py-4 font-medium text-primary leading-relaxed">
                                            Bagaimana pendapat Saudara tentang kepastian biaya (ada pungutan tambahan tidak resmi)?
                                        </td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center font-bold text-red-500 bg-red-50/50">100.00</td>
                                    </tr>

                                    <tr class="hover:bg-sky-50/50 transition-colors">
                                        <td class="px-6 py-4 text-center font-medium text-slate-400">5</td>
                                        <td class="px-6 py-4 font-medium text-primary leading-relaxed">
                                            Bagaimana kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan...
                                        </td>
                                        <td class="px-4 py-4 text-center font-bold text-slate-800">100.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                    </tr>
                                    
                                    <tr class="hover:bg-sky-50/50 transition-colors">
                                        <td class="px-6 py-4 text-center font-medium text-slate-400">6</td>
                                        <td class="px-6 py-4 font-medium text-primary leading-relaxed">
                                            Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?
                                        </td>
                                        <td class="px-4 py-4 text-center font-bold text-slate-800">100.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                    </tr>

                                    <tr class="hover:bg-sky-50/50 transition-colors">
                                        <td class="px-6 py-4 text-center font-medium text-slate-400">7</td>
                                        <td class="px-6 py-4 font-medium text-primary leading-relaxed">
                                            Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?
                                        </td>
                                        <td class="px-4 py-4 text-center font-bold text-slate-800">100.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                        <td class="px-4 py-4 text-center text-slate-500">0.00</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </section>

@endsection