@extends('laman.layouts.master')

@section('content')

    {{-- SECTION HEADER --}}
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

    {{-- SECTION STATISTIK --}}
    <section class="py-12 md:py-20 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125 z-0"></div>

        <div class="container mx-auto px-6 max-w-[1400px] relative z-10">
            
            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- KOLOM KIRI: GRAFIK --}}
                <div class="w-full lg:w-1/3 flex flex-col gap-8">
                    
                    {{-- PIE CHART: PERSENTASE JAWABAN --}}
                    <div class="bg-white rounded-3xl p-8 shadow-soft border border-slate-100" data-aos="fade-right">
                        <h3 class="text-lg font-bold text-primary text-center mb-6">Persentase Jawaban Survei</h3>
                        
                        <div class="flex flex-wrap justify-center gap-3 mb-8 text-xs font-medium text-slate-600">
                            <div class="flex items-center"><span class="w-3 h-3 rounded-sm bg-secondary mr-1.5"></span> Sangat Sesuai</div>
                            <div class="flex items-center"><span class="w-3 h-3 rounded-sm bg-sky-400 mr-1.5"></span> Sesuai</div>
                            <div class="flex items-center"><span class="w-3 h-3 rounded-sm bg-accent mr-1.5"></span> Kurang Sesuai</div>
                            <div class="flex items-center"><span class="w-3 h-3 rounded-sm bg-red-500 mr-1.5"></span> Tidak Sesuai</div>
                        </div>

                        {{-- LOGIKA CONIC GRADIENT DINAMIS --}}
                        @php
                            $percSS = $statsOverall['SS'] ?? 0;
                            $percS  = $percSS + ($statsOverall['S'] ?? 0);
                            $percKS = $percS + ($statsOverall['KS'] ?? 0);
                            $percTS = $percKS + ($statsOverall['TS'] ?? 0);
                        @endphp

                        <div class="flex justify-center mb-4">
                            <div class="w-48 h-48 rounded-full shadow-inner border-[6px] border-white relative" 
                                 style="background: conic-gradient(#1D4ED8 0% {{ $percSS }}%, #38BDF8 {{ $percSS }}% {{ $percS }}%, #F59E0B {{ $percS }}% {{ $percKS }}%, #EF4444 {{ $percKS }}% 100%);">
                                 <div class="absolute inset-0 m-auto w-24 h-24 bg-white rounded-full shadow-sm flex items-center justify-center flex-col">
                                     <span class="text-2xl font-black text-primary">{{ number_format($statsOverall['SS'] ?? 0, 0) }}%</span>
                                     <span class="text-[10px] text-slate-400">Sangat Sesuai</span>
                                 </div>
                            </div>
                        </div>
                        <p class="text-center text-xs text-slate-400 mt-4">*Data divisualisasikan dari rata-rata seluruh pertanyaan.</p>
                    </div>

                    {{-- BAR CHART: JUMLAH RESPONDEN PER PROFESI --}}
                    <div class="bg-white rounded-3xl p-8 shadow-soft border border-slate-100" data-aos="fade-right" data-aos-delay="100">
                        <h3 class="text-lg font-bold text-primary text-center mb-6">Jumlah Responden</h3>
                        <div class="flex items-center justify-center mb-6 text-xs font-medium text-slate-600">
                            <span class="w-3 h-3 rounded-sm bg-secondary mr-2"></span> Berdasarkan Profesi
                        </div>

                        <div class="h-48 flex items-end justify-between gap-2 border-b border-l border-slate-200 pb-2 pl-2 relative">
                            @foreach($profesiStats as $profesi)
                                @php 
                                    // Hitung tinggi bar (minimal 5% agar tetap terlihat jika data kecil)
                                    $height = ($totalResponden > 0) ? ($profesi->responden_count / $maxResponden) * 100 : 0;
                                @endphp
                                <div class="flex flex-col items-center w-full z-10 group">
                                    <div class="w-full bg-secondary rounded-t-sm transition-all duration-700 relative cursor-pointer group-hover:bg-blue-800" 
                                         style="height: {{ max($height, 2) }}%" title="{{ $profesi->responden_count }} Responden">
                                        <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-bold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
                                            {{ $profesi->responden_count }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="flex justify-between mt-3 text-[8px] sm:text-[9px] text-slate-500 font-bold text-center uppercase tracking-tighter">
                            @foreach($profesiStats as $profesi)
                                <div class="w-full">{{ $profesi->nama_profesi }}</div>
                            @endforeach
                        </div>
                        <p class="text-center font-bold text-primary mt-6 text-sm">Total Responden: <span class="text-secondary">{{ $totalResponden }}</span></p>
                    </div>

                </div>

                {{-- KOLOM KANAN: TABEL RINCIAN --}}
                <div class="w-full lg:w-2/3 flex flex-col gap-6" data-aos="fade-left">
                    
                    {{-- FILTER TANGGAL --}}
                    <div class="bg-white rounded-3xl p-6 md:p-8 shadow-soft border border-slate-100">
                        <div class="flex items-center space-x-3 mb-6 border-b border-slate-100 pb-4">
                            <div class="w-1.5 h-6 bg-accent rounded-full"></div>
                            <h2 class="text-xl font-bold text-primary">Statistik Hasil Survei</h2>
                        </div>
                        
                        <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
                            <div class="w-full md:w-5/12">
                                <label class="block text-xs font-semibold text-slate-500 mb-2 uppercase ml-1">Mulai Dari</label>
                                <input type="date" name="start_date" value="{{ $startDate }}" class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary focus:bg-white outline-none transition-all text-slate-700 font-bold">
                            </div>
                            
                            <div class="w-full md:w-5/12">
                                <label class="block text-xs font-semibold text-slate-500 mb-2 uppercase ml-1">Sampai Dengan</label>
                                <input type="date" name="end_date" value="{{ $endDate }}" class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary focus:bg-white outline-none transition-all text-slate-700 font-bold">
                            </div>

                            <div class="w-full md:w-2/12">
                                <button type="submit" class="w-full bg-secondary hover:bg-blue-800 text-white py-3.5 rounded-xl text-xs font-black uppercase tracking-widest transition-all shadow-md flex items-center justify-center gap-2 active:scale-95">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- TABEL DATA PERTANYAAN --}}
                    <div class="bg-white rounded-3xl shadow-soft border border-slate-100 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 text-slate-400 text-[10px] font-black uppercase tracking-[0.15em] border-b border-slate-100">
                                        <th class="px-6 py-5 w-12 text-center">No</th>
                                        <th class="px-6 py-5">Pertanyaan Survei</th>
                                        <th class="px-4 py-5 text-center text-secondary">SS (%)</th>
                                        <th class="px-4 py-5 text-center text-sky-500">S (%)</th>
                                        <th class="px-4 py-5 text-center text-accent">KS (%)</th>
                                        <th class="px-4 py-5 text-center text-red-500">TS (%)</th>
                                    </tr>
                                </thead>
                                
                                <tbody class="text-slate-700 text-sm divide-y divide-slate-100">
                                    @forelse($tableData as $index => $row)
                                    <tr class="hover:bg-sky-50/50 transition-colors group">
                                        <td class="px-6 py-5 text-center font-bold text-slate-300 group-hover:text-secondary">{{ $index + 1 }}</td>
                                        <td class="px-6 py-5 font-bold text-primary leading-relaxed">
                                            {{ $row['teks'] }}
                                        </td>
                                        <td class="px-4 py-5 text-center font-black text-slate-800 bg-blue-50/20">{{ number_format($row['ss'], 2) }}</td>
                                        <td class="px-4 py-5 text-center font-medium text-slate-500">{{ number_format($row['s'], 2) }}</td>
                                        <td class="px-4 py-5 text-center font-medium text-slate-500">{{ number_format($row['ks'], 2) }}</td>
                                        <td class="px-4 py-5 text-center {{ $row['ts'] > 0 ? 'font-black text-red-500 bg-red-50/50' : 'text-slate-500' }}">
                                            {{ number_format($row['ts'], 2) }}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-20 text-center">
                                            <i class="fas fa-database text-slate-200 text-5xl mb-4 block"></i>
                                            <span class="text-slate-400 italic">Data kuesioner tidak ditemukan untuk periode ini.</span>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </section>

    <style>
        .shadow-soft { box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.05); }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>

@endsection