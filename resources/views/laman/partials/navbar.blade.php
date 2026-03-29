<nav x-data="{ atTop: true, mobileMenuOpen: false }" 
    @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)"
    :class="{ 'bg-transparent py-5': atTop, 'bg-[#02275d]/95 backdrop-blur-md shadow-lg py-3': !atTop, 'bg-[#02275d] py-3': mobileMenuOpen }"
    class="fixed w-full z-50 transition-all duration-500 top-0 left-0">

    <div class="absolute inset-0 h-1 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10">
    </div>

    <div class="container mx-auto px-6 flex justify-between items-center relative z-20">

        {{-- LOGO AREA LLDIKTI --}}
        <div class="flex items-center space-x-4 md:space-x-6" data-aos="fade-right" data-aos-duration="1000">
            <a href="{{ url('/') }}" class="flex items-center justify-center transition hover:opacity-80 p-1">
                {{-- Ukuran logo LLDIKTI diperbesar drastis (h-14 di HP, h-20 di Desktop) --}}
                <img src="{{ asset('laman/img/logo_lldikti.png') }}" class="h-14 md:h-20 w-auto object-contain"
                    alt="Logo LLDIKTI VII">
            </a>

            <div class="hidden lg:block w-px h-12 bg-white/30 mx-2"></div>

            <div class="hidden lg:flex items-center space-x-5 transition-opacity duration-300"
                :class="{ 'opacity-100': !atTop, 'opacity-90 hover:opacity-100': atTop }">
                <a href="https://www.lapor.go.id/" target="_blank" class="transition hover:-translate-y-0.5 hover:opacity-80" title="Lapor!">
                    {{-- Logo Lapor diperbesar (h-12) --}}
                    <img src="{{ asset('laman/img/logo_span_Lapor.png') }}" class="h-12 w-auto object-contain" alt="Logo LAPOR!">
                </a>
                <a href="https://wbs.kemdikbud.go.id/" target="_blank" class="transition hover:-translate-y-0.5 hover:opacity-80" title="WBS No Korupsi">
                    {{-- Logo WBS diperbesar (h-14) --}}
                    <img src="{{ asset('laman/img/no-korupsi.png') }}" class="h-14 w-auto object-contain" alt="Logo No Korupsi">
                </a>
                <a href="#" target="_blank" class="transition hover:-translate-y-0.5 hover:opacity-80" title="Zona Integritas">
                    {{-- Logo ZI diperbesar (h-16) --}}
                    <img src="{{ asset('laman/img/Logo-Tersier-Diktisaintek-Berdampak-1.png') }}" class="h-16 w-auto object-contain" alt="Logo Zona Integritas">
                </a>
            </div>
        </div>

        {{-- DESKTOP MENU (Hanya muncul di layar Besar/XL) --}}
        <div class="hidden xl:flex items-center space-x-6 text-white font-medium text-sm" data-aos="fade-down"
            data-aos-duration="1000" data-aos-delay="200">
            
            <a href="{{ url('/') }}" class="relative group py-2">
                Beranda
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>

            <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative group py-2">
                <button class="flex items-center gap-1.5 focus:outline-none hover:text-accent transition-colors">
                    Profil <i class="fas fa-chevron-down text-[10px] transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300" :class="open ? 'w-full' : 'group-hover:w-full'"></span>

                <div x-show="open" x-transition.opacity.duration.300ms
                    class="absolute top-full left-0 mt-2 w-64 bg-white rounded-2xl shadow-xl border border-slate-100 py-3 text-slate-700 z-50" x-cloak>
                    <a href="{{ url('/profil/sambutan') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Sambutan Kepala Lembaga</a>
                    <a href="{{ url('/profil/sejarah') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Sejarah Lembaga</a>
                    <a href="{{ url('/profil/visi-misi') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Visi & Misi</a>
                    <a href="{{ url('/profil/tupoksi') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Kedudukan, Tugas, & Fungsi</a>
                    <a href="{{ url('/profil/struktur-organisasi') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Struktur Organisasi</a>
                </div>
            </div>

            <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative group py-2">
                <button class="flex items-center gap-1.5 focus:outline-none hover:text-accent transition-colors">
                    Layanan <i class="fas fa-chevron-down text-[10px] transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300" :class="open ? 'w-full' : 'group-hover:w-full'"></span>

                <div x-show="open" x-transition.opacity.duration.300ms
                    class="absolute top-full left-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-3 text-slate-700 z-50" x-cloak>
                    <a href="{{ url('/layanan/standar-pelayanan') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Standar Pelayanan</a>
                </div>
            </div>

            <a href="{{ url('/peraturan') }}" class="relative group py-2">
                Peraturan
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>

            <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative group py-2">
                <button class="flex items-center gap-1.5 focus:outline-none hover:text-accent transition-colors">
                    Kinerja <i class="fas fa-chevron-down text-[10px] transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300" :class="open ? 'w-full' : 'group-hover:w-full'"></span>

                <div x-show="open" x-transition.opacity.duration.300ms
                    class="absolute top-full left-0 mt-2 w-64 bg-white rounded-2xl shadow-xl border border-slate-100 py-3 text-slate-700 z-50" x-cloak>
                    <a href="{{ url('/kinerja/rencana-strategi') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Rencana Strategi</a>
                    <a href="{{ url('/kinerja/perjanjian-kinerja') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Perjanjian Kinerja</a>
                    <a href="{{ url('/kinerja/laporan-kinerja') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Laporan Kinerja</a>
                    <a href="{{ url('/kinerja/ikm') }}" class="block px-5 py-2.5 text-sm hover:bg-sky-50 hover:text-secondary hover:pl-6 transition-all font-medium">Indeks Kepuasan Masyarakat</a>
                </div>
            </div>

            <a href="{{ url('/spi') }}" class="relative group py-2">
                SPI
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>

            <a href="https://ppid-lldikti7.id/" target="_blank" class="relative group py-2">
                PPID
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="#footer" class="relative group py-2">
                Kontak
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
            </a>
        </div>

        {{-- AREA KANAN: SEARCH & TOMBOL MOBILE --}}
        <div class="flex items-center space-x-2 md:space-x-4" data-aos="fade-left" data-aos-duration="1000">
            {{-- SEARCH BOX INTERAKTIF --}}
            <div x-data="{ searchOpen: false }" class="relative flex items-center">
                <form action="{{ route('search') }}" method="GET"
                    class="flex items-center transition-all duration-300 overflow-hidden"
                    :class="searchOpen ? 'w-48 md:w-64 opacity-100' : 'w-10 opacity-100 bg-transparent'">

                    <input type="text" name="q" placeholder="Cari..."
                        class="bg-white/10 border border-white/30 text-white placeholder-white/70 text-sm rounded-full focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all pl-10 pr-4 py-2 w-full"
                        :class="searchOpen ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none absolute'">

                    <button type="button" @click="searchOpen = !searchOpen"
                        class="absolute left-0 w-10 h-10 rounded-full flex items-center justify-center text-white hover:text-accent transition z-10"
                        :class="searchOpen ? 'bg-transparent' : 'border border-white/30 hover:bg-white/10 hover:border-white'">
                        <i class="fas fa-search text-sm"></i>
                    </button>
                    <button type="submit" class="hidden"></button>
                </form>
            </div>

            {{-- TOMBOL HAMBURGER MENU (Hanya muncul di Layar HP/Tablet) --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" 
                class="xl:hidden w-10 h-10 rounded-full flex items-center justify-center text-white border border-white/30 hover:bg-white/10 transition">
                <i class="fas fa-bars" x-show="!mobileMenuOpen"></i>
                <i class="fas fa-times" x-show="mobileMenuOpen" x-cloak></i>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU DROPDOWN (Muncul saat tombol Hamburger diklik) --}}
    <div x-show="mobileMenuOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-5"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-5"
        class="xl:hidden absolute top-full left-0 w-full bg-[#02275d] border-t border-white/10 shadow-xl max-h-[85vh] overflow-y-auto pb-6 z-10" x-cloak>
        
        <div class="container mx-auto px-6 py-4 flex flex-col space-y-2 text-white font-medium">
            <a href="{{ url('/') }}" class="py-3 border-b border-white/10 hover:text-accent transition">Beranda</a>
            
            {{-- Profil Mobile Dropdown --}}
            <div x-data="{ subOpen: false }" class="border-b border-white/10">
                <button @click="subOpen = !subOpen" class="w-full text-left py-3 flex justify-between items-center hover:text-accent transition">
                    Profil <i class="fas fa-chevron-down text-[10px] transition-transform" :class="subOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="subOpen" class="flex flex-col pl-4 pb-3 space-y-3 text-sm text-sky-200" x-cloak>
                    <a href="{{ url('/profil/sambutan') }}" class="hover:text-white transition">Sambutan Kepala Lembaga</a>
                    <a href="{{ url('/profil/sejarah') }}" class="hover:text-white transition">Sejarah Lembaga</a>
                    <a href="{{ url('/profil/visi-misi') }}" class="hover:text-white transition">Visi & Misi</a>
                    <a href="{{ url('/profil/tupoksi') }}" class="hover:text-white transition">Kedudukan, Tugas, & Fungsi</a>
                    <a href="{{ url('/profil/struktur-organisasi') }}" class="hover:text-white transition">Struktur Organisasi</a>
                </div>
            </div>

            {{-- Layanan Mobile Dropdown --}}
            <div x-data="{ subOpen: false }" class="border-b border-white/10">
                <button @click="subOpen = !subOpen" class="w-full text-left py-3 flex justify-between items-center hover:text-accent transition">
                    Layanan <i class="fas fa-chevron-down text-[10px] transition-transform" :class="subOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="subOpen" class="flex flex-col pl-4 pb-3 space-y-3 text-sm text-sky-200" x-cloak>
                    <a href="{{ url('/layanan/standar-pelayanan') }}" class="hover:text-white transition">Standar Pelayanan</a>
                </div>
            </div>

            <a href="{{ url('/peraturan') }}" class="py-3 border-b border-white/10 hover:text-accent transition">Peraturan</a>

            {{-- Kinerja Mobile Dropdown --}}
            <div x-data="{ subOpen: false }" class="border-b border-white/10">
                <button @click="subOpen = !subOpen" class="w-full text-left py-3 flex justify-between items-center hover:text-accent transition">
                    Kinerja <i class="fas fa-chevron-down text-[10px] transition-transform" :class="subOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="subOpen" class="flex flex-col pl-4 pb-3 space-y-3 text-sm text-sky-200" x-cloak>
                    <a href="{{ url('/kinerja/rencana-strategi') }}" class="hover:text-white transition">Rencana Strategi</a>
                    <a href="{{ url('/kinerja/perjanjian-kinerja') }}" class="hover:text-white transition">Perjanjian Kinerja</a>
                    <a href="{{ url('/kinerja/laporan-kinerja') }}" class="hover:text-white transition">Laporan Kinerja</a>
                    <a href="{{ url('/kinerja/ikm') }}" class="hover:text-white transition">Indeks Kepuasan Masyarakat</a>
                </div>
            </div>

            <a href="{{ url('/spi') }}" class="py-3 border-b border-white/10 hover:text-accent transition">SPI</a>
            <a href="https://ppid-lldikti7.id/" target="_blank" class="py-3 border-b border-white/10 hover:text-accent transition">PPID</a>
            <a href="#footer" class="py-3 hover:text-accent transition">Kontak</a>
        </div>
    </div>
</nav>