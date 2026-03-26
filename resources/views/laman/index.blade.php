<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LLDIKTI Wilayah VII - Layanan Humanis Berintegritas</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0F172A', // Slate 900
                        secondary: '#1D4ED8', // Blue 700
                        accent: '#F59E0B', // Amber 500 (Emas jenuh)
                        culture_sky: '#60A5FA', // Biru Langit jenuh (dari Patung)
                        culture_red: '#EE4444', // Merah jenuh (dari tarian)
                        culture_green: '#22C55E', // Hijau jenuh (dari tarian)
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        
        /* Animasi untuk Running Text */
        .marquee-content {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 25s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .marquee-container:hover .marquee-content {
            animation-play-state: paused;
        }

        /* Teks Melengkung (Warped Text) */
        .wavy-text {
            fill: #FFFFFF;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 30px;
            font-weight: 800;
        }
    </style>
</head>
<body class="bg-[#F8FAFC] font-sans antialiased text-slate-800">

    <nav x-data="{ atTop: true }" 
         @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)"
         :class="{ 'bg-transparent py-5': atTop, 'bg-primary/90 backdrop-blur-md shadow-lg py-3': !atTop }"
         class="fixed w-full z-50 transition-all duration-500 top-0 left-0">
        <div class="absolute inset-0 h-1 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10"></div>
        
        <div class="container mx-auto px-6 flex justify-between items-center relative">
            
            <div class="flex items-center space-x-2">
                <div class="flex items-center justify-center space-x-2 p-2.5 bg-white rounded-xl shadow-inner border border-slate-100">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg" class="h-8 w-auto" alt="Logo Kemdikbud">
                    <div class="w-px h-8 bg-slate-200"></div>
                    <span class="font-bold text-primary text-xl">LLDIKTI VII</span>
                </div>
            </div>

            <div class="hidden lg:flex space-x-8 text-white font-medium text-sm">
                <a href="#" class="relative group py-1"> Beranda <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
                <a href="#" class="relative group py-1"> Profil <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
                <a href="#" class="relative group py-1"> Layanan <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
                <a href="#" class="relative group py-1"> Informasi Publik <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
                <a href="#" class="relative group py-1"> PPID <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span></a>
            </div>

            <div class="flex items-center space-x-4">
                <button class="w-10 h-10 rounded-full flex items-center justify-center text-white border border-white/30 hover:bg-white/10 hover:border-white transition">
                    <i class="fas fa-search text-sm"></i>
                </button>
                <button class="bg-accent hover:bg-amber-600 text-primary font-semibold text-sm px-5 py-2 rounded-full transition shadow-md">Portal</button>
            </div>
        </div>
    </nav>

<section x-data="{ 
            activeSlide: 1, 
            slides: [1, 2],
            loop() {
                setInterval(() => { this.activeSlide = this.activeSlide === 2 ? 1 : 2 }, 5000)
            }
        }" 
        x-init="loop"
        class="relative h-[60vh] md:h-screen w-full overflow-hidden bg-sky-100 mt-16 md:mt-0">
        
        <div x-show="activeSlide === 1" 
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-1000"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full">
            <img src="{{ asset('laman/img/carousel-1.webp') }}" class="w-full h-full object-cover md:object-fill" alt="Layanan Humanis Berintegritas 1">
        </div>

        <div x-show="activeSlide === 2" 
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-1000"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full" x-cloak>
            <img src="{{ asset('laman/img/carousel-2.webp') }}" class="w-full h-full object-cover md:object-fill" alt="Layanan Humanis Berintegritas 2">
        </div>

        <button @click="activeSlide = activeSlide === 1 ? 2 : 1" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center backdrop-blur-sm transition z-20">
            <i class="fas fa-chevron-left"></i>
        </button>

        <button @click="activeSlide = activeSlide === 2 ? 1 : 2" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center backdrop-blur-sm transition z-20">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-3 z-20">
            <button @click="activeSlide = 1" :class="{'bg-accent w-8': activeSlide === 1, 'bg-white/50 w-3': activeSlide !== 1}" class="h-3 rounded-full transition-all duration-300"></button>
            <button @click="activeSlide = 2" :class="{'bg-accent w-8': activeSlide === 2, 'bg-white/50 w-3': activeSlide !== 2}" class="h-3 rounded-full transition-all duration-300"></button>
        </div>
    </section>

    <div class="bg-white/70 backdrop-blur-sm text-primary py-3 overflow-hidden flex items-center marquee-container relative z-20 shadow-inner border-y border-slate-100">
        <div class="absolute inset-0 bg-blue-100 border-x-2 border-white rounded-full"></div>
        <div class="absolute inset-0 h-1 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10"></div>
        
        <div class="bg-accent/20 text-accent px-5 py-2 font-bold z-10 whitespace-nowrap text-xs rounded-r-full ml-4 relative border-r-2 border-white">INFO PENTING</div>
        <div class="w-full overflow-hidden relative">
            <div class="marquee-content font-medium text-sm text-slate-700">
                Selamat Datang di Laman Resmi LLDIKTI Wilayah VII Jawa Timur. • Batas akhir pelaporan BKD Semester Ganjil 2025/2026 adalah tanggal 30 April 2026. • Sosialisasi Program Kedaireka akan dilaksanakan minggu depan. • Cek kuota sertifikasi dosen gelombang II di portal resmi.
            </div>
        </div>
    </div>

    <section class="py-24 bg-white relative">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex justify-between items-center mb-12 pb-4 border-b border-slate-100">
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-8 bg-accent rounded-full shadow-inner"></div>
                    <h2 class="text-4xl font-extrabold text-primary tracking-tight">Pengumuman <span class="font-light text-slate-500">Terbaru</span></h2>
                </div>
                <a href="#" class="text-secondary font-semibold hover:text-blue-800 transition hidden md:block group">Lihat Semua <span class="inline-block transition-transform group-hover:translate-x-1">&rarr;</span></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative">
                    <i class="fas fa-drum-bali absolute text-culture_sky text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                    
                    <div class="w-14 h-14 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6 text-2xl border border-blue-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300 shadow-inner">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <p class="text-xs text-slate-400 mb-2 font-medium flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> 24 Maret 2026</p>
                    <h3 class="font-semibold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 flex-grow">Surat Edaran Panduan Layanan Jabatan Akademik Dosen 2026</h3>
                </div>
                
                <div class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative">
                    <i class="fas fa-vihara absolute text-culture_green text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                    <div class="w-14 h-14 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6 text-2xl border border-blue-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300 shadow-inner">
                        <i class="fas fa-bell"></i>
                    </div>
                    <p class="text-xs text-slate-400 mb-2 font-medium flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> 20 Maret 2026</p>
                    <h3 class="font-semibold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 flex-grow">Undangan Bimbingan Teknis Aplikasi SISTER Versi Cloud</h3>
                </div>

                <div class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative">
                    <i class="fas fa-mask absolute text-culture_red text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                    <div class="w-14 h-14 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6 text-2xl border border-blue-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300 shadow-inner">
                        <i class="fas fa-award"></i>
                    </div>
                    <p class="text-xs text-slate-400 mb-2 font-medium flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> 15 Maret 2026</p>
                    <h3 class="font-semibold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 flex-grow">Hasil Seleksi Program Kompetisi Kampus Merdeka (PKKM)</h3>
                </div>

                <div class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative">
                    <i class="fas fa-mosque absolute text-culture_sky text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                    <div class="w-14 h-14 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6 text-2xl border border-blue-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300 shadow-inner">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <p class="text-xs text-slate-400 mb-2 font-medium flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> 10 Maret 2026</p>
                    <h3 class="font-semibold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 flex-grow">Pemberitahuan Sertifikasi Dosen Gelombang I Tahun 2026</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-[#F1F5F9] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 max-w-2xl mx-auto flex flex-col items-center">
                <svg class="w-full h-20 mb-6" viewBox="0 0 500 120">
                  <path id="curve3" d="M0,60 C50,20 200,20 250,60 C300,100 450,100 500,60" fill="none" />
                  <text class="wavy-text" style="font-size: 26px; font-weight: 800; fill: #0F172A;">
                    <textPath xlink:href="#curve3" startOffset="50%" text-anchor="middle">
                      Kabar Pendidikan Tinggi
                    </textPath>
                  </text>
                </svg>
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-8 bg-accent rounded-full shadow-inner"></div>
                    <h2 class="text-4xl font-extrabold text-primary tracking-tight">di <span class="font-light text-slate-500">Jawa Timur</span></h2>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 bg-white rounded-3xl overflow-hidden shadow-soft group cursor-pointer border border-slate-100 relative">
                    <i class="fas fa-university absolute text-culture_sky text-8xl opacity-10 group-hover:opacity-20" style="bottom: 20px; left: 20px;"></i>
                    
                    <div class="overflow-hidden relative h-96">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Berita Utama" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent p-10 flex flex-col justify-end">
                            <span class="absolute top-6 left-6 bg-accent text-primary text-xs font-bold px-4 py-1.5 rounded-full shadow-lg">SOROTAN</span>
                            <p class="text-sm text-slate-300 mb-2 flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> 25 Maret 2026</p>
                            <h3 class="text-3xl font-bold text-white mb-4 leading-tight group-hover:text-accent transition duration-300">Rapat Koordinasi Pimpinan Perguruan Tinggi Swasta se-Jawa Timur 2026</h3>
                        </div>
                    </div>
                    <div class="p-10 border-t border-slate-100 relative z-10">
                        <p class="text-slate-600 mb-6 leading-relaxed line-clamp-3">Kepala LLDIKTI Wilayah VII resmi membuka acara Rapat Koordinasi Pimpinan PTS. Acara ini bertujuan untuk menyelaraskan visi dan misi peningkatan mutu pendidikan tinggi serta implementasi MBKM secara menyeluruh di wilayah Jawa Timur demi melahirkan lulusan yang kompeten di era industri...</p>
                        <span class="text-secondary font-semibold group-hover:text-blue-800 transition flex items-center">Baca selengkapnya &nbsp; <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i></span>
                    </div>
                </div>

                <div class="flex flex-col space-y-5">
                    
                    <div class="bg-white p-5 flex items-center space-x-5 rounded-2xl shadow-sm hover:shadow-md transition cursor-pointer group border border-slate-100 relative">
                        <i class="fas fa-vihara absolute text-culture_green text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&w=150&q=80" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                        <div>
                            <h4 class="font-semibold text-primary group-hover:text-secondary line-clamp-2 leading-snug">Kunjungan Kerja LLDIKTI ke Universitas di Banyuwangi</h4>
                            <p class="text-xs text-slate-400 mt-2.5 flex items-center"><i class="far fa-clock mr-1.5 text-accent"></i> 2 weeks ago</p>
                        </div>
                    </div>
                    
                    <div class="bg-white p-5 flex items-center space-x-5 rounded-2xl shadow-sm hover:shadow-md transition cursor-pointer group border border-slate-100 relative">
                        <i class="fas fa-mask absolute text-culture_red text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                        <img src="https://images.unsplash.com/photo-1577415124269-fc1140a69e91?ixlib=rb-4.0.3&w=150&q=80" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                        <div>
                            <h4 class="font-semibold text-primary group-hover:text-secondary line-clamp-2 leading-snug">Penyerahan SK Guru Besar di Lingkungan LLDIKTI VII</h4>
                            <p class="text-xs text-slate-400 mt-2.5 flex items-center"><i class="far fa-clock mr-1.5 text-accent"></i> 1 month ago</p>
                        </div>
                    </div>

                    <div class="bg-white p-5 flex items-center space-x-5 rounded-2xl shadow-sm hover:shadow-md transition cursor-pointer group border border-slate-100 relative">
                        <i class="fas fa-mosque absolute text-culture_sky text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&w=150&q=80" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                        <div>
                            <h4 class="font-semibold text-primary group-hover:text-secondary line-clamp-2 leading-snug">Pelatihan Asesor Beban Kerja Dosen (BKD) Tahun 2026</h4>
                            <p class="text-xs text-slate-400 mt-2.5 flex items-center"><i class="far fa-clock mr-1.5 text-accent"></i> 2 months ago</p>
                        </div>
                    </div>

                    <div class="bg-white p-5 flex items-center space-x-5 rounded-2xl shadow-sm hover:shadow-md transition cursor-pointer group border border-slate-100 relative">
                        <i class="fas fa-drum-bali absolute text-culture_green text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&w=150&q=80" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                        <div>
                            <h4 class="font-semibold text-primary group-hover:text-secondary line-clamp-2 leading-snug">Sosialisasi Pendirian Program Studi Baru S1 dan S2</h4>
                            <p class="text-xs text-slate-400 mt-2.5 flex items-center"><i class="far fa-clock mr-1.5 text-accent"></i> 4 months ago</p>
                        </div>
                    </div>

                    <button class="w-full bg-secondary hover:bg-blue-800 text-white font-bold py-4 rounded-xl transition shadow hover:shadow-lg transform hover:-translate-y-0.5 text-sm">
                        Lihat berita lainnya
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-28 relative bg-sky-100 text-primary overflow-hidden border-t-2 border-white rounded-t-3xl shadow-inner">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/az-subtle.png')] opacity-10"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-sky-100/10 via-sky-100/70 to-sky-100"></div>
        
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-20 bg-repeat-x scale-125"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center flex flex-col items-center">
            <svg class="w-full h-24 mb-6" viewBox="0 0 500 150">
              <path id="curve4" d="M0,70 C50,20 200,20 250,70 C300,120 450,120 500,70" fill="none" />
              <text class="wavy-text" style="font-size: 32px; font-weight: 800; fill: #0F172A;">
                <textPath xlink:href="#curve4" startOffset="50%" text-anchor="middle">
                  LLDIKTI VII DALAM ANGKA
                </textPath>
              </text>
            </svg>
            
            <p class="text-lg font-light mb-16 max-w-xl mx-auto text-primary drop-shadow max-w-xl">Statistik Data Pendidikan Tinggi Terupdate di Jawa Timur.</p>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-16">
                
                <div class="p-8 bg-white p-7 rounded-3xl border border-slate-100 shadow-soft hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 relative border-l-4 border-accent">
                    <i class="fas fa-drum-bali absolute text-culture_sky text-xl opacity-20" style="top: 15px; right: 15px;"></i>
                    <i class="fas fa-university text-5xl text-accent mb-6"></i>
                    <h3 class="text-6xl font-extrabold text-primary mb-2 tracking-tighter shadow-inner">318</h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Perguruan Tinggi</p>
                </div>
                
                <div class="p-8 bg-white p-7 rounded-3xl border border-slate-100 shadow-soft hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 relative border-l-4 border-accent">
                    <i class="fas fa-vihara absolute text-culture_green text-xl opacity-20" style="top: 15px; right: 15px;"></i>
                    <i class="fas fa-book-open text-5xl text-accent mb-6"></i>
                    <h3 class="text-6xl font-extrabold text-primary mb-2 tracking-tighter shadow-inner">1.894</h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Program Studi</p>
                </div>

                <div class="p-8 bg-white p-7 rounded-3xl border border-slate-100 shadow-soft hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 relative border-l-4 border-accent">
                    <i class="fas fa-mask absolute text-culture_red text-xl opacity-20" style="top: 15px; right: 15px;"></i>
                    <i class="fas fa-user-tie text-5xl text-accent mb-6"></i>
                    <h3 class="text-6xl font-extrabold text-primary mb-2 tracking-tighter shadow-inner">24.5k</h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Dosen</p>
                </div>

                <div class="p-8 bg-white p-7 rounded-3xl border border-slate-100 shadow-soft hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 relative border-l-4 border-accent">
                    <i class="fas fa-mosque absolute text-culture_sky text-xl opacity-20" style="top: 15px; right: 15px;"></i>
                    <i class="fas fa-users text-5xl text-accent mb-6"></i>
                    <h3 class="text-6xl font-extrabold text-primary mb-2 tracking-tighter shadow-inner">680k+</h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Mahasiswa</p>
                </div>
                
            </div>

            <button class="bg-secondary hover:bg-blue-800 text-white hover:text-primary px-10 py-3 rounded-full font-semibold transition shadow-md hover:shadow-lg border border-secondary shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-sm">Lihat Selengkapnya PDDikti &nbsp; &rarr;</button>
        </div>
    </section>

    <section class="py-28 bg-white container mx-auto px-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125"></div>
        
        <div class="text-center mb-16 relative z-10">
            <h2 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight">Galeri <span class="font-light text-slate-500">Kegiatan</span></h2>
            <div class="w-16 h-1 bg-accent mx-auto mt-5 rounded-full shadow-inner"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[220px] relative z-10">
            
            <div class="col-span-2 row-span-2 relative rounded-2xl overflow-hidden group shadow-lg">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 relative z-10 opacity-90 group-hover:opacity-100 shadow-soft shadow-inner shadow-soft">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-8 opacity-0 group-hover:opacity-100 transition duration-300 z-20 shadow-lg">
                    <h4 class="text-white font-semibold text-lg drop-shadow shadow-soft shadow-soft">Rapat Koordinasi Evaluasi Mutu</h4>
                </div>
            </div>
            
            <div class="relative rounded-2xl overflow-hidden group shadow-md">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 relative z-10 opacity-90 group-hover:opacity-100 shadow-soft shadow-inner shadow-soft">
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center p-4 opacity-0 group-hover:opacity-100 transition z-20 shadow-md">
                    <i class="fas fa-search text-white text-2xl drop-shadow shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft"></i>
                </div>
            </div>
            
            <div class="relative rounded-2xl overflow-hidden group shadow-md">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 relative z-10 opacity-90 group-hover:opacity-100 shadow-soft shadow-inner shadow-soft">
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center p-4 opacity-0 group-hover:opacity-100 transition z-20 shadow-md">
                    <i class="fas fa-search text-white text-2xl drop-shadow shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft"></i>
                </div>
            </div>
            
            <div class="col-span-2 relative rounded-2xl overflow-hidden group shadow-lg">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                <img src="https://images.unsplash.com/photo-1558403194-611308249627?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 relative z-10 opacity-90 group-hover:opacity-100 shadow-soft shadow-inner shadow-soft">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-8 opacity-0 group-hover:opacity-100 transition duration-300 z-20 shadow-lg">
                    <h4 class="text-white font-semibold text-lg drop-shadow shadow-soft shadow-soft">Penyerahan SK Jabatan Fungsional</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-[#F8FAFC] border-t border-slate-100 relative overflow-hidden rounded-t-3xl shadow-soft">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 scale-x-150"></div>
        
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 relative z-10">
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-soft relative group">
                <i class="fas fa-drum-bali absolute text-culture_sky text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                <h3 class="text-2xl font-extrabold text-primary mb-8 flex items-center justify-between relative z-10">
                    <span><i class="fab fa-instagram text-pink-600 mr-3 text-3xl shadow-soft"></i> Instagram Feed</span>
                    <a href="#" class="text-xs text-secondary font-medium hover:text-blue-800">@lldikti7 &rarr;</a>
                </h3>
                <div class="w-full h-72 rounded-xl flex flex-col items-center justify-center text-slate-400 relative overflow-hidden group border border-slate-200">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 scale-x-150"></div>
                    <i class="fab fa-instagram text-5xl mb-4 text-pink-600 relative z-10 shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft"></i>
                    <p class="text-sm relative z-10">[ Widget API Instagram Disini ]</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-soft relative group">
                <i class="fas fa-vihara absolute text-culture_green text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                <h3 class="text-2xl font-extrabold text-primary mb-8 flex items-center justify-between relative z-10">
                    <span><i class="fab fa-youtube text-red-600 mr-3 text-3xl shadow-soft shadow-soft shadow-soft shadow-soft"></i> YouTube Channel</span>
                    <a href="#" class="text-xs text-secondary font-medium hover:text-blue-800">Official &rarr;</a>
                </h3>
                <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-xl border-2 border-slate-100 relative group z-10">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                    <iframe class="w-full h-72 relative z-10 opacity-90 group-hover:opacity-100 transition duration-300" src="https://www.youtube.com/embed/fDofR5n6j7g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-primary text-slate-300 pt-20 pb-10 relative overflow-hidden rounded-t-3xl shadow-soft">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-20 bg-repeat-x scale-125 scale-x-150"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-primary/10 via-primary/70 to-primary"></div>
        
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-slate-800 pb-16 mb-10 relative z-10 flex flex-col items-center">
            
            <div class="md:col-span-1">
                <div class="flex items-center space-x-2 bg-white rounded-lg p-2.5 inline-block mb-6 relative border border-slate-100 shadow-soft">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_of_Ministry_of_Education_and_Culture_of Republic_of_Indonesia.svg" class="h-8 w-auto">
                    <div class="w-px h-8 bg-slate-200 shadow-soft shadow-soft"></div>
                    <span class="font-bold text-primary text-xl">LLDIKTI VII</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">Fasilitasi peningkatan mutu pendidikan tinggi di Jawa Timur.</p>
                <div class="flex space-x-3 mt-4 relative">
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fab fa-facebook-f text-sm text-slate-400 group-hover:text-primary transition"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fas fa-x text-sm text-slate-400 group-hover:text-primary transition shadow-soft shadow-soft shadow-soft"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fab fa-instagram text-sm text-slate-400 group-hover:text-primary transition shadow-soft"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fab fa-tiktok text-sm text-slate-400 group-hover:text-primary transition shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800/60 border border-slate-700 flex items-center justify-center hover:bg-accent hover:text-primary transition group"><i class="fab fa-youtube text-sm text-slate-400 group-hover:text-primary transition shadow-soft shadow-soft shadow-soft"></i></a>
                </div>
                <p class="text-slate-500 text-xs mt-4 relative">@lldikti7</p>
            </div>

            <div class="md:col-span-1 flex flex-col items-start">
                <div class="flex items-center space-x-2 mb-6 pb-2 border-b border-slate-800">
                    <div class="w-2 h-8 bg-accent rounded-full shadow-inner shadow-soft shadow-soft shadow-soft"></div>
                    <h3 class="text-xl font-bold mb-0 text-white tracking-wide">Kontak</h3>
                </div>
                <ul class="text-slate-400 text-sm space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3.5 text-accent flex-shrink-0 text-xl shadow-soft"></i>
                        <span>Jl. Dr. Ir. H. Soekarno No. 177, Sukolilo, Surabaya, Jawa Timur 60117</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt mr-3.5 text-accent text-xl shadow-soft"></i>
                        <span>(031) 5925418</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3.5 text-accent text-xl shadow-soft shadow-soft"></i>
                        <span>info@lldikti7.or.id</span>
                    </li>
                </ul>
            </div>

            <div class="md:col-span-1 flex flex-col items-start">
                <div class="flex items-center space-x-2 mb-6 pb-2 border-b border-slate-800">
                    <div class="w-2 h-8 bg-accent rounded-full shadow-inner shadow-soft shadow-soft shadow-soft shadow-soft"></div>
                    <h3 class="text-xl font-bold mb-0 text-white tracking-wide">Link Layanan</h3>
                </div>
                <ul class="text-slate-400 text-sm space-y-3">
                    <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-university text-xs mr-2 text-culture_sky shadow-soft"></i> PDDikti</a></li>
                    <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-book-open text-xs mr-2 text-culture_green shadow-soft"></i> SISTER</a></li>
                    <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-award text-xs mr-2 text-culture_red shadow-soft"></i> BIMA Riset</a></li>
                    <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-chalkboard-teacher text-xs mr-2 text-culture_sky shadow-soft shadow-soft"></i> Jafung Dosen</a></li>
                    <li><a href="#" class="hover:text-accent transition flex items-center"><i class="fas fa-question-circle text-xs mr-2 text-culture_green shadow-soft"></i> FAQ & Bantuan</a></li>
                </ul>
            </div>

            <div class="md:col-span-1 flex flex-col items-center">
                <div class="flex flex-col items-center space-y-2 p-3 bg-white rounded-xl shadow-soft border border-slate-100 shadow-soft">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/de/Logo_Tut_Wuri_Handayani.png" class="h-10 w-auto shadow-soft">
                    <span class="font-bold text-primary text-sm shadow-soft">Tut Wuri Handayani</span>
                    <div class="w-px h-8 bg-slate-200 shadow-soft shadow-soft shadow-soft"></div>
                </div>
                <div class="w-2 h-8 bg-accent rounded-full shadow-inner mt-6 shadow-soft shadow-soft"></div>
                <p class="text-slate-400 text-xs leading-relaxed border border-slate-800 p-4 rounded-xl bg-slate-900/30 shadow-inner mt-4 shadow-soft">"Melayani Perguruan Tinggi dengan Integritas, Profesional, Tanpa KKN."</p>
                <p class="text-slate-500 text-xs mt-4 relative shadow-soft">LAYANAN HUMANIS BERINTEGRITAS</p>
            </div>
        </div>

        <div class="container mx-auto px-6 mt-8 text-center text-slate-600 text-xs flex flex-col items-center relative z-10">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_of_Ministry_of_Education_and_Culture_of Republic_of_Indonesia.svg" class="h-6 w-auto mb-2 shadow-soft">
            <span class="shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft shadow-soft">&copy; {{ date('Y') }} LLDIKTI Wilayah VII Jawa Timur. Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi.</span>
        </div>
    </footer>

    <style>
        @keyframes zoom-slow {
            0%, 100% { transform: scale(1.05); }
            50% { transform: scale(1.15); }
        }
        .text-gradient {
            background: linear-gradient(to right, #60A5FA, #EE4444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .shadow-soft {
            box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.05), 0 2px 4px -2px rgba(15, 23, 42, 0.05);
        }
    </style>

</body>
</html>