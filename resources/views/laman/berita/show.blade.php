@extends('laman.layouts.master')

@section('title', $berita->info_judul)

@section('content')

    <div class="bg-slate-50 min-h-screen pt-24 pb-16">
        <div class="container mx-auto px-4 lg:px-6">

            <nav class="flex text-sm text-slate-500 mb-6 font-medium">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('home') }}" class="hover:text-argon-blue transition"><i class="fas fa-home"></i>
                            Beranda</a></li>
                    <li><i class="fas fa-chevron-right text-[10px] opacity-50 mx-2"></i></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-argon-blue transition">Berita</a></li>
                    <li><i class="fas fa-chevron-right text-[10px] opacity-50 mx-2"></i></li>
                    <li class="text-slate-400 truncate max-w-[200px] md:max-w-xs">{{ $berita->info_judul }}</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 xl:gap-12">

                {{-- KOLOM KIRI (KONTEN ARTIKEL) --}}
                <div class="lg:col-span-2">

                    <article class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">

                        {{-- Judul dan Meta --}}
                        <div class="p-6 md:p-8 lg:p-10 pb-6 border-b border-slate-50">
                            <div
                                class="flex flex-wrap items-center gap-4 text-xs font-bold text-slate-500 uppercase tracking-wider mb-5">
                                <span
                                    class="bg-argon-blue/10 text-argon-blue py-1.5 px-3 rounded-lg flex items-center gap-2">
                                    <i class="fas fa-bookmark"></i> Berita
                                </span>
                                <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($berita->info_tanggal)->translatedFormat('d F Y') }}</span>
                                <span class="flex items-center gap-1.5"><i class="far fa-user"></i>
                                    {{ $berita->bagian_nama ?? 'Admin' }}</span>
                            </div>

                            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-slate-800 leading-tight">
                                {{ $berita->info_judul }}
                            </h1>
                        </div>

                        @php
                            // Pisahkan gambar pertama (Cover) dan gambar sisanya (Galeri)
                            $gambarUtama = $berita->details->first();
                            $galeriLainnya = $berita->details->skip(1);
                        @endphp

                        {{-- Gambar Cover Utama (Satu Gambar Paling Besar) --}}
                        @if ($gambarUtama)
                            <div class="w-full relative bg-slate-100 flex justify-center border-b border-slate-50">
                                <img src="{{ asset('storage/' . $gambarUtama->info_file) }}" alt="Cover Artikel"
                                    class="w-full h-auto max-h-[500px] object-contain">
                            </div>
                        @endif

                        {{-- Isi Teks Berita --}}
                        <div class="p-6 md:p-8 lg:p-10 text-slate-700 leading-relaxed text-base md:text-lg article-content">
                            {!! $berita->info_isi !!}
                        </div>

                        {{-- FITUR SHARE BERITA --}}
                        <div class="px-6 md:px-8 lg:px-10 pb-8 flex items-center gap-4">
                            <span class="text-sm font-bold text-slate-500 uppercase tracking-wider">Bagikan:</span>

                            {{-- Tombol WhatsApp --}}
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->info_judul . ' | Baca selengkapnya di: ' . url()->current()) }}"
                                target="_blank"
                                class="bg-[#25D366] text-white w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 hover:shadow-lg transition-all duration-300"
                                title="Bagikan ke WhatsApp">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </a>

                            {{-- Tombol Facebook --}}
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank"
                                class="bg-[#1877F2] text-white w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 hover:shadow-lg transition-all duration-300"
                                title="Bagikan ke Facebook">
                                <i class="fab fa-facebook-f text-lg"></i>
                            </a>
                        </div>

                        {{-- GALERI FOTO TAMBAHAN (Jika admin upload >1 gambar) --}}
                        @if ($galeriLainnya->count() > 0)
                            <div class="p-6 md:p-8 lg:p-10 bg-slate-50/50 border-t border-slate-100">
                                <h3 class="font-bold text-slate-800 mb-6 flex items-center gap-2 text-xl">
                                    <i class="fas fa-images text-argon-blue"></i> Galeri Kegiatan
                                </h3>

                                {{-- Grid Dinamis menyesuaikan jumlah gambar --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach ($galeriLainnya as $foto)
                                        <a href="{{ asset('storage/' . $foto->info_file) }}" target="_blank"
                                            class="group block overflow-hidden rounded-xl border border-slate-200 shadow-sm relative h-48 cursor-zoom-in">
                                            <img src="{{ asset('storage/' . $foto->info_file) }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                                alt="Galeri Berita">
                                            <div
                                                class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors flex items-center justify-center">
                                                <i
                                                    class="fas fa-expand text-white text-3xl opacity-0 group-hover:opacity-100 transition-opacity scale-50 group-hover:scale-100 duration-300"></i>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </article>
                </div>

                {{-- KOLOM KANAN (SIDEBAR BERITA TERBARU) --}}
                <div class="lg:col-span-1 space-y-8">

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-1.5 h-6 bg-argon-blue rounded-full"></div>
                            <h3 class="text-xl font-bold text-slate-800">Berita Lainnya</h3>
                        </div>

                        <div class="space-y-6">
                            @forelse($beritaTerbaru as $terbaru)
                                @php $coverSidebar = $terbaru->details->first(); @endphp
                                <a href="{{ route('berita.show', $terbaru->slug) }}" class="group flex gap-4 items-start">
                                    {{-- Thumbnail Kotak --}}
                                    <div
                                        class="w-20 h-20 shrink-0 rounded-xl overflow-hidden bg-slate-100 border border-slate-100">
                                        @if ($coverSidebar)
                                            <img src="{{ asset('storage/' . $coverSidebar->info_file) }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                                alt="">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center p-2 bg-slate-50">
                                                <img src="{{ asset('laman/img/logo_lldikti.png') }}"
                                                    class="w-full h-full object-contain opacity-60 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300"
                                                    alt="Logo LLDIKTI 7">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h4
                                            class="font-bold text-sm text-slate-700 leading-snug group-hover:text-argon-blue transition-colors mb-2 line-clamp-2">
                                            {{ $terbaru->info_judul }}
                                        </h4>
                                        <span class="text-xs text-slate-400 flex items-center gap-1"><i
                                                class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($terbaru->info_tanggal)->format('d M Y') }}</span>
                                    </div>
                                </a>
                            @empty
                                <p class="text-sm text-slate-400 italic">Belum ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- Widget Opsional LLDikti --}}
                    <div
                        class="bg-gradient-to-br from-blue-800 to-blue-500 rounded-2xl shadow-md p-6 text-white text-center">
                        {{-- Hapus brightness-0 dan invert di sini --}}
                        <img src="{{ asset('laman/img/Logo-Tut-Wuri-Handayani.png') }}"
                            class="h-16 w-auto mx-auto mb-4 object-contain" alt="Tut Wuri">

                        <h3 class="text-lg font-bold mb-2">Layanan LLDIKTI VII</h3>
                        <p class="text-sm text-white/80 mb-5 leading-relaxed">Dapatkan informasi lengkap mengenai standar
                            layanan dan prosedur kami.</p>
                        <a href="{{ route('layanan.standar') }}"
                            class="inline-block bg-white text-blue-800 font-bold text-sm px-6 py-2.5 rounded-xl shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                            Lihat Standar Layanan
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- CSS KHUSUS UNTUK FORMATTING ISI BERITA --}}
    <style>
        .article-content p {
            margin-bottom: 1.25rem;
        }

        .article-content a {
            color: #5e72e4;
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

        .article-content strong,
        .article-content b {
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
