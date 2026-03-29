@extends('laman.layouts.master')

@section('title', 'Berita Terkini')

@section('content')

<div class="bg-slate-50 min-h-screen pt-24 pb-16">
    <div class="container mx-auto px-4 lg:px-6">
        
        <nav class="flex text-sm text-slate-500 mb-8 font-medium" data-aos="fade-down">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="hover:text-argon-blue transition"><i class="fas fa-home"></i> Beranda</a></li>
                <li><i class="fas fa-chevron-right text-[10px] opacity-50 mx-2"></i></li>
                <li class="text-slate-700 font-bold">Berita</li>
            </ol>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10" data-aos="fade-up">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-2">Berita Terkini</h1>
                <p class="text-slate-500">Kumpulan kabar, liputan, dan kegiatan terbaru dari LLDIKTI Wilayah VII.</p>
            </div>
            
            <form action="{{ route('berita.index') }}" method="GET" class="w-full md:w-80 relative">
                <input type="text" name="cari" value="{{ request('cari') }}" 
                    class="w-full bg-white border border-slate-200 rounded-xl py-3 pl-11 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue shadow-sm transition-all" 
                    placeholder="Cari berita...">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                    <i class="fas fa-search"></i>
                </div>
                <button type="submit" class="hidden"></button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($berita as $item)
                @php 
                    $cover = $item->details->first(); 
                    $imageSrc = null;

                    if ($cover && !empty($cover->info_file)) {
                        $filename = basename($cover->info_file);
                        
                        if (file_exists(public_path('storage/berita/' . $filename))) {
                            $imageSrc = asset('storage/berita/' . $filename);
                        } 
                        elseif (file_exists(public_path('storage/oldberita/' . $filename))) {
                            $imageSrc = asset('storage/oldberita/' . $filename);
                        }
                        elseif (file_exists(public_path('storage/' . $cover->info_file))) {
                            $imageSrc = asset('storage/' . $cover->info_file);
                        }
                    }
                @endphp

                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 flex flex-col h-full group overflow-hidden hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    
                    {{-- Area Gambar Cover --}}
                    <div class="relative h-56 md:h-64 overflow-hidden bg-slate-100">
                        @if($imageSrc)
                            <img src="{{ $imageSrc }}" alt="{{ $item->info_judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @else
                            <div class="w-full h-full flex items-center justify-center p-8 bg-gradient-to-br from-slate-50 to-slate-200">
                                <img src="{{ asset('laman/img/logo_lldikti.png') }}" alt="Logo LLDIKTI 7" class="w-auto h-full max-h-28 object-contain opacity-60 group-hover:opacity-100 group-hover:scale-110 transition-all duration-500">
                            </div>
                        @endif
                        
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-argon-dark text-center rounded-xl shadow-lg border border-white/50 px-3 py-1.5 min-w-[3.5rem]">
                            <span class="block text-xl font-black leading-none">{{ \Carbon\Carbon::parse($item->info_tanggal)->format('d') }}</span>
                            <span class="block text-[10px] font-bold uppercase tracking-wider text-argon-blue">{{ \Carbon\Carbon::parse($item->info_tanggal)->translatedFormat('M') }}</span>
                        </div>
                    </div>

                    <div class="p-6 md:p-8 flex flex-col flex-grow relative">
                        
                        {{-- KATEGORI INFO & TOTAL VIEWS DIBUAT BERSEBELAHAN --}}
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[10px] font-bold text-argon-blue uppercase tracking-widest block">
                                <i class="fas fa-bookmark mr-1"></i> Liputan Berita
                            </span>
                            
                            @php
                                $statIndex = \Illuminate\Support\Facades\DB::table('t_info_statistik')->where('info_id', $item->info_id)->first();
                            @endphp
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-1.5">
                                <i class="far fa-eye text-argon-blue"></i>
                                {{ $statIndex ? number_format($statIndex->views, 0, ',', '.') : 0 }} Views
                            </span>
                        </div>

                        <a href="{{ route('berita.show', $item->slug ?: $item->info_id) }}" class="block mb-3">
                            <h2 class="text-xl font-bold text-slate-800 group-hover:text-argon-blue transition-colors line-clamp-2 leading-snug">
                                {{ $item->info_judul }}
                            </h2>
                        </a>

                        <p class="text-sm text-slate-500 line-clamp-3 leading-relaxed mb-6 flex-grow">
                            {{ Str::limit(strip_tags($item->info_isi), 120) }}
                        </p>

                        <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                            
                            <div class="flex items-center gap-2 text-xs font-semibold text-slate-400">
                                <i class="far fa-user"></i>
                                <span class="truncate max-w-[120px]">{{ $item->bagian_nama ?? 'Admin LLDIKTI' }}</span>
                            </div>
                            
                            <a href="{{ route('berita.show', $item->slug ?: $item->info_id) }}" class="flex items-center gap-2 text-sm font-bold text-argon-blue hover:text-argon-indigo transition-colors group/btn">
                                Baca <i class="fas fa-arrow-right text-[10px] transform group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-2xl shadow-sm border border-slate-100 p-16 text-center" data-aos="fade-up">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-5 text-slate-300">
                        <i class="fas fa-search text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-700 mb-2">Tidak Ada Berita</h3>
                    <p class="text-slate-500 mb-6">Pencarian atau data berita belum tersedia saat ini.</p>
                    <a href="{{ route('berita.index') }}" class="px-6 py-2.5 bg-argon-blue hover:bg-argon-indigo text-white font-bold rounded-lg transition-colors shadow-sm">Muat Ulang</a>
                </div>
            @endforelse

        </div>

        @if($berita->hasPages())
            <div class="mt-14 flex justify-center">
                <div class="bg-white px-4 py-3 rounded-xl shadow-sm border border-slate-100 inline-block">
                    {{ $berita->links('pagination::tailwind') }}
                </div>
            </div>
        @endif

    </div>
</div>

@endsection