<nav x-data="{ atTop: true }" @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)"
    :class="{ 'bg-transparent py-5': atTop, 'bg-primary/90 backdrop-blur-md shadow-lg py-3': !atTop }"
    class="fixed w-full z-50 transition-all duration-500 top-0 left-0">

    <div class="absolute inset-0 h-1 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10">
    </div>

    <div class="container mx-auto px-6 flex justify-between items-center relative">

        <div class="flex items-center space-x-5" data-aos="fade-right" data-aos-duration="1000">
            {{-- LOGO AREA LLDIKTI --}}
            <a href="{{ url('/') }}" class="flex items-center justify-center transition hover:opacity-80 p-1">
                {{-- Ukuran logo LLDIKTI diperbesar (h-14) --}}
                <img src="{{ asset('laman/img/logo_lldikti.png') }}" class="h-14 w-auto object-contain"
                    alt="Logo LLDIKTI VII">
            </a>

            <div class="hidden lg:block w-px h-10 bg-white/30 mx-2"></div>

            <div class="hidden lg:flex items-center space-x-4 transition-opacity duration-300"
                :class="{ 'opacity-100': !atTop, 'opacity-90 hover:opacity-100': atTop }">

                <a href="https://www.lapor.go.id/" target="_blank"
                    class="transition hover:-translate-y-0.5 hover:opacity-80" title="Lapor!">
                    {{-- Ukuran logo diperbesar (h-9) --}}
                    <img src="{{ asset('laman/img/logo_span_Lapor.png') }}" class="h-9 w-auto object-contain"
                        alt="Logo LAPOR!">
                </a>

                <a href="https://wbs.kemdikbud.go.id/" target="_blank"
                    class="transition hover:-translate-y-0.5 hover:opacity-80" title="WBS No Korupsi">
                    {{-- Ukuran logo diperbesar (h-10) --}}
                    <img src="{{ asset('laman/img/no-korupsi.png') }}" class="h-10 w-auto object-contain"
                        alt="Logo No Korupsi">
                </a>

                <a href="#" target="_blank" class="transition hover:-translate-y-0.5 hover:opacity-80"
                    title="Zona Integritas">
                    {{-- Ukuran logo bulat (h-12) --}}
                    <img src="{{ asset('laman/img/Logo-Tersier-Diktisaintek-Berdampak-1.png') }}" class="h-12 w-auto object-contain"
                        alt="Logo Zona Integritas">
                </a>

            </div>
        </div>

        <div class="hidden xl:flex items-center space-x-6 text-white font-medium text-sm" data-aos="fade-down"
            data-aos-duration="1000" data-aos-delay="200">

            <a href="{{ url('/') }}" class="relative group py-2">
                Beranda
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>

            <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false"
                class="relative group py-2">
                <button class="flex items-center gap-1.5 focus:outline-none hover:text-accent transition-colors">
                    Profil <i class="fas fa-chevron-down text-[10px] transition-transform duration-300"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300"
                    :class="open ? 'w-full' : 'group-hover:w-full'"></span>

                <div x-show="open" x-transition.opacity.duration.300ms
                    class="absolute top-full left-0 mt-2 w-64 bg-white rounded-2xl shadow-xl border border-slate-100 py-3 text-slate-700 z-50"
                    x-cloak>
                    <a href="{{ url('/profil/sambutan') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Sambutan
                        Kepala Lembaga</a>
                    <a href="{{ url('/profil/sejarah') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Sejarah
                        Lembaga</a>
                    <a href="{{ url('/profil/visi-misi') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Visi
                        & Misi</a>
                    <a href="{{ url('/profil/tupoksi') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Kedudukan,
                        Tugas, & Fungsi</a>
                    <a href="{{ url('/profil/struktur-organisasi') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Struktur
                        Organisasi</a>
                </div>
            </div>

            <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false"
                class="relative group py-2">
                <button class="flex items-center gap-1.5 focus:outline-none hover:text-accent transition-colors">
                    Layanan <i class="fas fa-chevron-down text-[10px] transition-transform duration-300"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300"
                    :class="open ? 'w-full' : 'group-hover:w-full'"></span>

                <div x-show="open" x-transition.opacity.duration.300ms
                    class="absolute top-full left-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-3 text-slate-700 z-50"
                    x-cloak>
                    <a href="{{ url('/layanan/standar-pelayanan') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Standar
                        Pelayanan</a>
                </div>
            </div>

            <a href="{{ url('/peraturan') }}" class="relative group py-2">
                Peraturan
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>

            <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false"
                class="relative group py-2">
                <button class="flex items-center gap-1.5 focus:outline-none hover:text-accent transition-colors">
                    Kinerja <i class="fas fa-chevron-down text-[10px] transition-transform duration-300"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300"
                    :class="open ? 'w-full' : 'group-hover:w-full'"></span>

                <div x-show="open" x-transition.opacity.duration.300ms
                    class="absolute top-full left-0 mt-2 w-64 bg-white rounded-2xl shadow-xl border border-slate-100 py-3 text-slate-700 z-50"
                    x-cloak>
                    <a href="{{ url('/kinerja/rencana-strategi') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Rencana
                        Strategi</a>
                    <a href="{{ url('/kinerja/perjanjian-kinerja') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Perjanjian
                        Kinerja</a>
                    <a href="{{ url('/kinerja/laporan-kinerja') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Laporan
                        Kinerja</a>
                    <a href="{{ url('/kinerja/ikm') }}"
                        class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all duration-300 font-medium">Indeks
                        Kepuasan Masyarakat</a>
                </div>
            </div>

            <a href="{{ url('/spi') }}" class="relative group py-2">
                SPI
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>

            <a href="https://ppid-lldikti7.id/" target="_blank" class="relative group py-2">
                PPID
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="#footer" class="relative group py-2">
                Kontak
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>
        </div>

        <div class="flex items-center space-x-4" data-aos="fade-left" data-aos-duration="1000">
            <button
                class="w-10 h-10 rounded-full flex items-center justify-center text-white border border-white/30 hover:bg-white/10 hover:border-white transition">
                <i class="fas fa-search text-sm"></i>
            </button>
            <button
                class="bg-accent hover:bg-amber-600 text-primary font-semibold text-sm px-5 py-2.5 rounded-full transition shadow-md hover:shadow-lg hover:-translate-y-0.5">Portal</button>
        </div>
    </div>
</nav>
