<nav x-data="{ atTop: true }" 
     @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)"
     :class="{ 'bg-transparent py-5': atTop, 'bg-primary/90 backdrop-blur-md shadow-lg py-3': !atTop }"
     class="fixed w-full z-50 transition-all duration-500 top-0 left-0">
    <div class="absolute inset-0 h-1 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10"></div>
    
    <div class="container mx-auto px-6 flex justify-between items-center relative">
        
        <div class="flex items-center space-x-5" data-aos="fade-right" data-aos-duration="1000">
            <div class="flex items-center justify-center space-x-2 p-2.5 bg-white rounded-xl shadow-inner border border-slate-100">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg" class="h-8 w-auto" alt="Logo Kemdikbud">
                <div class="w-px h-8 bg-slate-200"></div>
                <span class="font-bold text-primary text-xl">LLDIKTI VII</span>
            </div>
            
            <div class="hidden lg:flex items-center space-x-2 border-l border-white/20 pl-4 transition-opacity duration-300" :class="{ 'opacity-100': !atTop, 'opacity-90 hover:opacity-100': atTop }">
                <a href="https://www.lapor.go.id/" target="_blank" rel="noopener noreferrer" 
                   class="bg-[#E52B20] hover:bg-red-700 text-white text-[10px] tracking-wider font-bold px-3 py-1.5 rounded-md shadow-sm transition flex items-center border border-red-500/50 hover:-translate-y-0.5" title="Layanan Aspirasi dan Pengaduan Online Rakyat">
                    <i class="fas fa-bullhorn mr-1.5 text-white/90"></i> LAPOR!
                </a>
                
                <a href="https://wbs.kemdikbud.go.id/" target="_blank" rel="noopener noreferrer" 
                   class="bg-emerald-600 hover:bg-emerald-700 text-white text-[10px] tracking-wider font-bold px-3 py-1.5 rounded-md shadow-sm transition flex items-center border border-emerald-500/50 hover:-translate-y-0.5" title="Whistleblowing System Kemdikbud - No Korupsi">
                    <i class="fas fa-shield-alt mr-1.5 text-white/90"></i> WBS NO KORUPSI
                </a>
            </div>
        </div>

        <div class="hidden xl:flex space-x-8 text-white font-medium text-sm" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
            <a href="#" class="relative group py-1"> Beranda <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
            <a href="#" class="relative group py-1"> Profil <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
            <a href="#" class="relative group py-1"> Layanan <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
            <a href="#" class="relative group py-1"> Informasi Publik <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
            <a href="#" class="relative group py-1"> PPID <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
        </div>

        <div class="flex items-center space-x-4" data-aos="fade-left" data-aos-duration="1000">
            <button class="w-10 h-10 rounded-full flex items-center justify-center text-white border border-white/30 hover:bg-white/10 hover:border-white transition">
                <i class="fas fa-search text-sm"></i>
            </button>
            <button class="bg-accent hover:bg-amber-600 text-primary font-semibold text-sm px-5 py-2 rounded-full transition shadow-md">Portal</button>
        </div>
    </div>
</nav>