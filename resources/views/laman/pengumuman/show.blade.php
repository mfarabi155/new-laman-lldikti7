@extends('laman.layouts.master')

@section('title', $pengumuman->info_judul)

@section('content')

{{-- Tambahkan padding-top ekstra jika navbar Anda fixed --}}
<div class="bg-slate-50 min-h-screen pt-24 pb-16">
    <div class="container mx-auto px-4 lg:px-6">
        
        {{-- BREADCRUMB --}}
        <nav class="flex text-sm text-slate-500 mb-6 font-medium">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ url('/') }}" class="hover:text-argon-blue transition"><i class="fas fa-home"></i> Beranda</a></li>
                <li><i class="fas fa-chevron-right text-[10px] opacity-50 mx-2"></i></li>
                <li><a href="{{ url('/pengumuman') }}" class="hover:text-argon-blue transition">Pengumuman</a></li>
                <li><i class="fas fa-chevron-right text-[10px] opacity-50 mx-2"></i></li>
                <li class="text-slate-400 truncate max-w-[200px] md:max-w-xs">{{ $pengumuman->info_judul }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 xl:gap-12">
            
            {{-- KOLOM KIRI (KONTEN UTAMA) --}}
            <div class="lg:col-span-2">
                
                {{-- KOTAK ARTIKEL UTAMA --}}
                <article class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                    
                    {{-- Meta Header Artikel --}}
                    <div class="p-6 md:p-8 lg:p-10 border-b border-slate-100">
                        <div class="flex flex-wrap items-center gap-4 text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">
                            <span class="bg-argon-blue/10 text-argon-blue py-1.5 px-3 rounded-lg flex items-center gap-2">
                                <i class="fas fa-bullhorn"></i> Pengumuman
                            </span>
                            <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($pengumuman->info_tanggal)->translatedFormat('d F Y') }}</span>
                            <span class="flex items-center gap-1.5"><i class="far fa-user"></i> {{ $pengumuman->bagian_nama ?? 'Tim Kerja LLDikti' }}</span>
                        </div>

                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-slate-800 leading-tight mb-6">
                            {{ $pengumuman->info_judul }}
                        </h1>
                    </div>

                    {{-- Isi Konten --}}
                    {{-- Class 'article-content' digunakan untuk styling CSS custom di bawah --}}
                    <div class="p-6 md:p-8 lg:p-10 text-slate-700 leading-relaxed text-base md:text-lg article-content">
                        {!! $pengumuman->info_isi !!}
                    </div>

                    {{-- BAGIAN LAMPIRAN (Jika Ada) --}}
                    @if(isset($pengumuman->details) && $pengumuman->details->count() > 0)
                    <div class="p-6 md:p-8 lg:p-10 bg-slate-50/50 border-t border-slate-100">
                        <h3 class="font-bold text-slate-800 mb-5 flex items-center gap-2 text-lg">
                            <i class="fas fa-paperclip text-argon-blue"></i> Lampiran Dokumen
                        </h3>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($pengumuman->details as $file)
                            <a href="{{ $file->info_file }}" target="_blank" class="group bg-white p-4 rounded-xl border border-slate-200 shadow-sm hover:shadow-md hover:border-argon-blue/30 transition-all flex items-start gap-4">
                                <div class="w-12 h-12 rounded-lg bg-red-100 text-red-500 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                                    {{-- Bisa dibuat dinamis iconnya berdasarkan format URL, tapi default PDF paling aman --}}
                                    <i class="fas fa-file-pdf text-xl"></i> 
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-slate-700 text-sm mb-1 group-hover:text-argon-blue transition-colors line-clamp-2">
                                        {{ $file->info_judul_file }}
                                    </p>
                                    <span class="text-xs font-semibold text-slate-400 group-hover:text-argon-blue flex items-center gap-1">
                                        Unduh <i class="fas fa-download text-[10px]"></i>
                                    </span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </article>
            </div>

            {{-- KOLOM KANAN (SIDEBAR) --}}
            <div class="lg:col-span-1 space-y-8">
                
                {{-- Widget Informasi Terbaru --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1.5 h-6 bg-argon-blue rounded-full"></div>
                        <h3 class="text-xl font-bold text-slate-800">Informasi Terbaru</h3>
                    </div>

                    <div class="space-y-5">
                        {{-- Looping Data Terbaru (Asumsi variabelnya $informasiTerbaru) --}}
                        @forelse($informasiTerbaru as $terbaru)
                        <div class="group">
                            <a href="{{ url('pengumuman/'.$terbaru->slug) }}" class="block">
                                <h4 class="font-bold text-sm text-slate-700 leading-snug group-hover:text-argon-blue transition-colors mb-2 line-clamp-2">
                                    {{ $terbaru->info_judul }}
                                </h4>
                            </a>
                            <div class="text-xs text-slate-500 flex items-center gap-3 mb-2">
                                <span class="flex items-center gap-1"><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($terbaru->info_tanggal)->format('d M Y') }}</span>
                                <span class="flex items-center gap-1"><i class="far fa-user"></i> {{ $terbaru->bagian_nama ?? 'Admin' }}</span>
                            </div>
                            {{-- Snippet Isi Artikel (strip_tags untuk membuang HTML) --}}
                            <p class="text-xs text-slate-500 line-clamp-2 mb-3 leading-relaxed">
                                {{ Str::limit(strip_tags($terbaru->info_isi), 100) }}
                            </p>
                            <a href="{{ url('pengumuman/'.$terbaru->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-argon-blue hover:text-argon-indigo transition-colors">
                                Baca Selengkapnya <i class="fas fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                        
                        {{-- Garis Pemisah (kecuali item terakhir) --}}
                        @if(!$loop->last)
                            <hr class="border-slate-100">
                        @endif

                        @empty
                            <p class="text-sm text-slate-400 italic">Belum ada informasi lainnya.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Widget Opsional: Layanan LLDikti --}}
                <div class="bg-gradient-to-br from-argon-indigo to-argon-blue rounded-2xl shadow-sm p-6 text-white text-center">
                    <i class="fas fa-headset text-4xl mb-4 opacity-80"></i>
                    <h3 class="text-lg font-bold mb-2">Pusat Layanan Terpadu</h3>
                    <p class="text-sm text-white/80 mb-5">Butuh bantuan terkait layanan kami? Silakan hubungi ULT LLDIKTI Wilayah VII.</p>
                    <a href="#" class="inline-block bg-white text-argon-dark font-bold text-sm px-6 py-2.5 rounded-xl shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                        Hubungi Kami
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

{{-- CSS KHUSUS UNTUK FORMATTING ISI BERITA (Agar tag HTML seperti <b>, <i>, <ol> dari editor terbaca rapi) --}}
<style>
    .article-content p {
        margin-bottom: 1.25rem;
    }
    .article-content a {
        color: #5e72e4; /* argon-blue */
        text-decoration: underline;
    }
    .article-content ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-bottom: 1.25rem;
    }
    .article-content ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
        margin-bottom: 1.25rem;
    }
    .article-content strong, .article-content b {
        font-weight: 700;
        color: #1e293b;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.75rem;
        margin: 1.5rem 0;
    }
</style>

@endsection