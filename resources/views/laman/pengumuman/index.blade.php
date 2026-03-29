@extends('laman.layouts.master')

@section('title', 'Daftar Pengumuman')

@section('content')

    <div class="bg-slate-50 min-h-screen pt-24 pb-16">
        <div class="container mx-auto px-4 lg:px-6">

            {{-- BREADCRUMB --}}
            <nav class="flex text-sm text-slate-500 mb-8 font-medium" data-aos="fade-down">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ url('/') }}" class="hover:text-argon-blue transition"><i class="fas fa-home"></i>
                            Beranda</a></li>
                    <li><i class="fas fa-chevron-right text-[10px] opacity-50 mx-2"></i></li>
                    <li class="text-slate-700 font-bold">Pengumuman</li>
                </ol>
            </nav>

            {{-- HEADER & PENCARIAN --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10" data-aos="fade-up">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-2">Pengumuman Terbaru</h1>
                    <p class="text-slate-500">Informasi dan pengumuman resmi dari LLDIKTI Wilayah VII.</p>
                </div>

                {{-- Form Pencarian --}}
                <form action="{{ url('/pengumuman') }}" method="GET" class="w-full md:w-80 relative">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        class="w-full bg-white border border-slate-200 rounded-xl py-3 pl-11 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue focus:border-transparent transition-shadow shadow-sm"
                        placeholder="Cari pengumuman...">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fas fa-search"></i>
                    </div>
                    {{-- Tombol submit tersembunyi agar bisa enter --}}
                    <button type="submit" class="hidden"></button>
                </form>
            </div>

            {{-- GRID PENGUMUMAN --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">

                @forelse($pengumuman as $item)
                    {{-- CARD PENGUMUMAN --}}
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg border border-slate-100 transition-all duration-300 flex flex-col h-full group"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            
                            {{-- KATEGORI INFO & TOTAL VIEWS (BERSEBELAHAN DI ATAS) --}}
                            <div class="flex justify-between items-center mb-4">
                                <span class="bg-argon-blue/10 text-argon-blue text-xs font-bold py-1 px-2.5 rounded-md flex items-center gap-1.5 uppercase tracking-wider">
                                    <i class="fas fa-bullhorn"></i> Info
                                </span>
                                
                                @php
                                    $statPengumuman = \Illuminate\Support\Facades\DB::table('t_info_statistik')
                                        ->where('info_id', $item->info_id)
                                        ->first();
                                @endphp
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-1.5">
                                    <i class="far fa-eye text-argon-blue"></i>
                                    {{ $statPengumuman ? number_format($statPengumuman->views, 0, ',', '.') : 0 }} Views
                                </span>
                            </div>

                            {{-- Tanggal --}}
                            <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                                <i class="far fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($item->info_tanggal)->translatedFormat('d M Y') }}
                            </div>

                            {{-- Judul --}}
                            <a href="{{ url('/pengumuman/' . $item->slug) }}" class="block mb-3">
                                <h2 class="text-xl font-bold text-slate-800 group-hover:text-argon-blue transition-colors line-clamp-2 leading-snug">
                                    {{ $item->info_judul }}
                                </h2>
                            </a>

                            {{-- Snippet Isi --}}
                            <p class="text-sm text-slate-500 line-clamp-3 leading-relaxed mb-6 flex-grow">
                                {{ Str::limit(strip_tags($item->info_isi), 150) }}
                            </p>

                            {{-- Footer Card (Penulis & Tombol Baca SAJA) --}}
                            <div class="mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                                <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 truncate pr-4">
                                    <i class="far fa-user text-slate-300"></i>
                                    <span class="truncate">{{ $item->bagian_nama ?? 'Admin LLDIKTI' }}</span>
                                </div>
                                
                                <a href="{{ url('/pengumuman/' . $item->slug) }}"
                                    class="shrink-0 flex items-center gap-1.5 text-sm font-bold text-argon-blue group-hover:text-argon-indigo transition-colors">
                                    Baca <i class="fas fa-arrow-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- KONDISI JIKA DATA KOSONG / TIDAK DITEMUKAN --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-2xl shadow-sm border border-slate-100 p-12 text-center"
                        data-aos="fade-up">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                            <i class="fas fa-search text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-700 mb-2">Tidak Ada Pengumuman</h3>
                        <p class="text-slate-500">
                            @if (request('cari'))
                                Pencarian untuk "<b>{{ request('cari') }}</b>" tidak ditemukan. Silakan coba kata kunci
                                lain.
                                <br><a href="{{ url('/pengumuman') }}"
                                    class="inline-block mt-4 text-argon-blue font-bold hover:underline">Reset Pencarian</a>
                            @else
                                Belum ada pengumuman yang diterbitkan saat ini.
                            @endif
                        </p>
                    </div>
                @endforelse

            </div>

            {{-- PAGINATION --}}
            @if ($pengumuman->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="bg-white px-4 py-3 rounded-xl shadow-sm border border-slate-100 inline-block">
                        {{ $pengumuman->links('pagination::tailwind') }}
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection