<footer id="footer" class="bg-primary text-slate-300 pt-20 pb-10 relative overflow-hidden rounded-t-3xl shadow-soft">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-20 bg-repeat-x scale-125 scale-x-150"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-primary/10 via-primary/70 to-primary"></div>
    
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-slate-800 pb-16 mb-10 relative z-10 flex flex-col items-center">
        
        {{-- KOLOM 1: Tentang LLDIKTI --}}
        <div class="md:col-span-1">
            {{-- Background putih dihapus, ukuran logo diperbesar (h-14) --}}
            <a href="{{ route('home') ?? url('/') }}" class="inline-block mb-6 transition hover:opacity-80">
                <img src="{{ asset('laman/img/logo_lldikti.png') }}" class="h-14 w-auto object-contain" alt="Logo LLDIKTI Wilayah VII">
            </a>
            
            <p class="text-slate-400 text-sm leading-relaxed mb-6">Fasilitasi peningkatan mutu pendidikan tinggi di Jawa Timur.</p>
            <div class="flex space-x-3 mt-4 relative">
                <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fab fa-facebook-f text-sm text-slate-400 group-hover:text-primary transition"></i></a>
                <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fas fa-x text-sm text-slate-400 group-hover:text-primary transition shadow-soft"></i></a>
                <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fab fa-instagram text-sm text-slate-400 group-hover:text-primary transition shadow-soft"></i></a>
                <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fab fa-tiktok text-sm text-slate-400 group-hover:text-primary transition shadow-soft"></i></a>
                <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fab fa-youtube text-sm text-slate-400 group-hover:text-primary transition shadow-soft"></i></a>
            </div>
            <p class="text-slate-500 text-xs mt-4 relative">@lldikti7</p>
        </div>

        {{-- KOLOM 2: Kontak --}}
        <div class="md:col-span-1 flex flex-col items-start">
            <div class="flex items-center space-x-2 mb-6 pb-2 border-b border-slate-800">
                <div class="w-2 h-8 bg-accent rounded-full shadow-inner shadow-soft"></div>
                <h3 class="text-xl font-bold mb-0 text-white tracking-wide">Kontak</h3>
            </div>
            <ul class="text-slate-400 text-sm space-y-4">
                {{-- Alamat dengan Link Google Maps --}}
                <li class="flex items-start group">
                    <i class="fas fa-map-marker-alt mt-1 mr-3.5 text-accent flex-shrink-0 text-xl shadow-soft"></i>
                    <a href="https://www.google.com/maps/search/?api=1&query=LLDIKTI+Wilayah+VII,+Jl.+Dr.+Ir.+H.+Soekarno+No.177,+Klampis+Ngasem,+Kec.+Sukolilo,+Surabaya" target="_blank" rel="noopener noreferrer" class="hover:text-accent transition-colors leading-relaxed">
                        Jl. Dr. Ir. H. Soekarno No.177, Klampis Ngasem, Kec. Sukolilo, Surabaya, Jawa Timur 60117
                    </a>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-phone-alt mr-3.5 text-accent text-xl shadow-soft"></i>
                    <span>(031) 5925418-19</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-envelope mr-3.5 text-accent text-xl shadow-soft"></i>
                    <span>ult.lldikti7@kemdikbud.go.id</span>
                </li>
            </ul>
        </div>

        {{-- KOLOM 3: Link Layanan --}}
        <div class="md:col-span-1 flex flex-col items-start">
            <div class="flex items-center space-x-2 mb-6 pb-2 border-b border-slate-800">
                <div class="w-2 h-8 bg-accent rounded-full shadow-inner shadow-soft"></div>
                <h3 class="text-xl font-bold mb-0 text-white tracking-wide">Link Layanan</h3>
            </div>
            <ul class="text-slate-400 text-sm space-y-3">
                <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-university text-xs mr-2 text-culture_sky shadow-soft"></i> PDDikti</a></li>
                <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-book-open text-xs mr-2 text-culture_green shadow-soft"></i> SISTER</a></li>
                <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-award text-xs mr-2 text-culture_red shadow-soft"></i> BIMA Riset</a></li>
                <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-chalkboard-teacher text-xs mr-2 text-culture_sky shadow-soft"></i> Jafung Dosen</a></li>
                <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-question-circle text-xs mr-2 text-culture_green shadow-soft"></i> FAQ & Bantuan</a></li>
            </ul>
        </div>

        {{-- KOLOM 4: Slogan & Logo Tut Wuri --}}
        <div class="md:col-span-1 flex flex-col items-center">
            {{-- Background putih dihapus, ukuran logo diperbesar (h-20) --}}
            <div class="mb-2 transition hover:opacity-90">
                <img src="{{ asset('laman/img/Logo-Tut-Wuri-Handayani.png') }}" class="h-20 w-auto object-contain" alt="Tut Wuri Handayani">
            </div>
            
            <p class="text-slate-400 text-xs leading-relaxed border border-slate-800 p-4 rounded-xl bg-slate-900/30 shadow-inner mt-4 shadow-soft">"Melayani Perguruan Tinggi dengan Integritas, Profesional, Tanpa KKN."</p>
            <p class="text-slate-500 text-xs mt-4 relative shadow-soft">LAYANAN HUMANIS BERINTEGRITAS</p>
        </div>
    </div>

    {{-- COPYRIGHT BAWAH --}}
    <div class="container mx-auto px-6 mt-8 text-center text-slate-600 text-xs flex flex-col items-center relative z-10">
        {{-- Logo diperbesar sedikit menjadi h-8 agar seimbang --}}
        <img src="{{ asset('laman/img/Logo-Tut-Wuri-Handayani.png') }}" class="h-8 w-auto mb-3 opacity-80 hover:opacity-100 transition object-contain" alt="Kemdikbudristek">
        <span class="shadow-soft">&copy; {{ date('Y') }} LLDIKTI Wilayah VII Jawa Timur. Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi.</span>
    </div>
</footer>