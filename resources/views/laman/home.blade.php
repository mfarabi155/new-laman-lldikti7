@extends('laman.layouts.master')

@section('content')

    <section x-data="{ 
            activeSlide: 1, 
            loop() { setInterval(() => { this.activeSlide = this.activeSlide === 2 ? 1 : 2 }, 6000) }
        }" 
        x-init="loop"
        class="relative h-[60vh] md:h-screen w-full overflow-hidden bg-sky-100">
        
        <div x-show="activeSlide === 1" 
             x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full">
            <img src="{{ asset('laman/img/carousel-1.webp') }}" class="w-full h-full object-cover md:object-fill" alt="Layanan Humanis Berintegritas 1">
        </div>

        <div x-show="activeSlide === 2" 
             x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full" x-cloak>
            <img src="{{ asset('laman/img/carousel-2.webp') }}" class="w-full h-full object-cover md:object-fill" alt="Layanan Humanis Berintegritas 2">
        </div>

        <button @click="activeSlide = activeSlide === 1 ? 2 : 1" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center backdrop-blur-sm transition z-20">
            <i class="fas fa-chevron-left"></i>
        </button>

        <button @click="activeSlide = activeSlide === 2 ? 1 : 2" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center backdrop-blur-sm transition z-20">
            <i class="fas fa-chevron-right"></i>
        </button>
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
            <div class="flex justify-between items-center mb-12 pb-4 border-b border-slate-100" data-aos="fade-up">
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-8 bg-accent rounded-full shadow-inner"></div>
                    <h2 class="text-4xl font-extrabold text-primary tracking-tight">Pengumuman <span class="font-light text-slate-500">Terbaru</span></h2>
                </div>
                <a href="#" class="text-secondary font-semibold hover:text-blue-800 transition hidden md:block group">Lihat Semua <span class="inline-block transition-transform group-hover:translate-x-1">&rarr;</span></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative">
                    <i class="fas fa-drum-bali absolute text-culture_sky text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                    <div class="w-14 h-14 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6 text-2xl border border-blue-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300 shadow-inner">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <p class="text-xs text-slate-400 mb-2 font-medium flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> 24 Maret 2026</p>
                    <h3 class="font-semibold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 flex-grow">Surat Edaran Panduan Layanan Jabatan Akademik Dosen 2026</h3>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative">
                    <i class="fas fa-vihara absolute text-culture_green text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                    <div class="w-14 h-14 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6 text-2xl border border-blue-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300 shadow-inner">
                        <i class="fas fa-bell"></i>
                    </div>
                    <p class="text-xs text-slate-400 mb-2 font-medium flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> 20 Maret 2026</p>
                    <h3 class="font-semibold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 flex-grow">Undangan Bimbingan Teknis Aplikasi SISTER Versi Cloud</h3>
                </div>

                <div data-aos="fade-up" data-aos-delay="300" class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative">
                    <i class="fas fa-mask absolute text-culture_red text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                    <div class="w-14 h-14 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6 text-2xl border border-blue-100 group-hover:bg-secondary group-hover:text-white transition-colors duration-300 shadow-inner">
                        <i class="fas fa-award"></i>
                    </div>
                    <p class="text-xs text-slate-400 mb-2 font-medium flex items-center"><i class="far fa-calendar-alt mr-1.5 text-accent"></i> 15 Maret 2026</p>
                    <h3 class="font-semibold text-lg text-primary leading-snug group-hover:text-secondary transition line-clamp-3 flex-grow">Hasil Seleksi Program Kompetisi Kampus Merdeka (PKKM)</h3>
                </div>

                <div data-aos="fade-up" data-aos-delay="400" class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group cursor-pointer relative">
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
                <svg class="w-full h-20 mb-6" viewBox="0 0 500 120" data-aos="fade-down">
                  <path id="curve3" d="M0,60 C50,20 200,20 250,60 C300,100 450,100 500,60" fill="none" />
                  <text class="wavy-text" style="font-size: 26px; font-weight: 800; fill: #0F172A;">
                    <textPath xlink:href="#curve3" startOffset="50%" text-anchor="middle">
                      Kabar Pendidikan Tinggi
                    </textPath>
                  </text>
                </svg>
                <div class="flex items-center space-x-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-2 h-8 bg-accent rounded-full shadow-inner"></div>
                    <h2 class="text-4xl font-extrabold text-primary tracking-tight">di <span class="font-light text-slate-500">Jawa Timur</span></h2>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div data-aos="fade-right" data-aos-duration="1000" class="lg:col-span-2 bg-white rounded-3xl overflow-hidden shadow-soft group cursor-pointer border border-slate-100 relative">
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
                        <p class="text-slate-600 mb-6 leading-relaxed line-clamp-3">Kepala LLDIKTI Wilayah VII resmi membuka acara Rapat Koordinasi Pimpinan PTS. Acara ini bertujuan untuk menyelaraskan visi dan misi peningkatan mutu pendidikan tinggi serta implementasi MBKM secara menyeluruh di wilayah Jawa Timur...</p>
                        <span class="text-secondary font-semibold group-hover:text-blue-800 transition flex items-center">Baca selengkapnya &nbsp; <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i></span>
                    </div>
                </div>

                <div class="flex flex-col space-y-5" data-aos="fade-left" data-aos-duration="1000">
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
            <svg class="w-full h-24 mb-6" viewBox="0 0 500 150" data-aos="zoom-in">
              <path id="curve4" d="M0,70 C50,20 200,20 250,70 C300,120 450,120 500,70" fill="none" />
              <text class="wavy-text" style="font-size: 32px; font-weight: 800; fill: #0F172A;">
                <textPath xlink:href="#curve4" startOffset="50%" text-anchor="middle">
                  LLDIKTI VII DALAM ANGKA
                </textPath>
              </text>
            </svg>
            <p class="text-lg font-light mb-16 max-w-xl mx-auto text-primary drop-shadow max-w-xl" data-aos="fade-up">Statistik Data Pendidikan Tinggi Terupdate di Jawa Timur.</p>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-16">
                <div data-aos="flip-left" data-aos-delay="100" class="p-8 bg-white p-7 rounded-3xl border border-slate-100 shadow-soft hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 relative border-l-4 border-accent">
                    <i class="fas fa-drum-bali absolute text-culture_sky text-xl opacity-20" style="top: 15px; right: 15px;"></i>
                    <i class="fas fa-university text-5xl text-accent mb-6"></i>
                    <h3 class="text-6xl font-extrabold text-primary mb-2 tracking-tighter shadow-inner"
                        x-data="{ count: 0, target: 318 }"
                        x-intersect.once="let start = null; const step = (ts) => { if(!start) start = ts; const prog = Math.min((ts - start) / 2000, 1); count = Math.floor(prog * target); if(prog < 1) window.requestAnimationFrame(step); }; window.requestAnimationFrame(step);">
                        <span x-text="count">0</span>
                    </h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Perguruan Tinggi</p>
                </div>
                
                <div data-aos="flip-left" data-aos-delay="200" class="p-8 bg-white p-7 rounded-3xl border border-slate-100 shadow-soft hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 relative border-l-4 border-accent">
                    <i class="fas fa-vihara absolute text-culture_green text-xl opacity-20" style="top: 15px; right: 15px;"></i>
                    <i class="fas fa-book-open text-5xl text-accent mb-6"></i>
                    <h3 class="text-6xl font-extrabold text-primary mb-2 tracking-tighter shadow-inner"
                        x-data="{ count: 0, target: 1894 }"
                        x-intersect.once="let start = null; const step = (ts) => { if(!start) start = ts; const prog = Math.min((ts - start) / 2000, 1); count = Math.floor(prog * target); if(prog < 1) window.requestAnimationFrame(step); }; window.requestAnimationFrame(step);">
                        <span x-text="count.toLocaleString('id-ID')">0</span>
                    </h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Program Studi</p>
                </div>

                <div data-aos="flip-left" data-aos-delay="300" class="p-8 bg-white p-7 rounded-3xl border border-slate-100 shadow-soft hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 relative border-l-4 border-accent">
                    <i class="fas fa-mask absolute text-culture_red text-xl opacity-20" style="top: 15px; right: 15px;"></i>
                    <i class="fas fa-user-tie text-5xl text-accent mb-6"></i>
                    <h3 class="text-6xl font-extrabold text-primary mb-2 tracking-tighter shadow-inner"
                        x-data="{ count: 0, target: 24 }"
                        x-intersect.once="let start = null; const step = (ts) => { if(!start) start = ts; const prog = Math.min((ts - start) / 2000, 1); count = Math.floor(prog * target); if(prog < 1) window.requestAnimationFrame(step); }; window.requestAnimationFrame(step);">
                        <span x-text="count">0</span>.5k
                    </h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Dosen</p>
                </div>

                <div data-aos="flip-left" data-aos-delay="400" class="p-8 bg-white p-7 rounded-3xl border border-slate-100 shadow-soft hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-2 relative border-l-4 border-accent">
                    <i class="fas fa-mosque absolute text-culture_sky text-xl opacity-20" style="top: 15px; right: 15px;"></i>
                    <i class="fas fa-users text-5xl text-accent mb-6"></i>
                    <h3 class="text-6xl font-extrabold text-primary mb-2 tracking-tighter shadow-inner"
                        x-data="{ count: 0, target: 680 }"
                        x-intersect.once="let start = null; const step = (ts) => { if(!start) start = ts; const prog = Math.min((ts - start) / 2000, 1); count = Math.floor(prog * target); if(prog < 1) window.requestAnimationFrame(step); }; window.requestAnimationFrame(step);">
                        <span x-text="count">0</span>k+
                    </h3>
                    <p class="text-sm font-medium tracking-widest text-slate-400 uppercase">Mahasiswa</p>
                </div>
            </div>

            <button class="bg-secondary hover:bg-blue-800 text-white hover:text-primary px-10 py-3 rounded-full font-semibold transition shadow-md hover:shadow-lg border border-secondary transform hover:-translate-y-0.5 text-sm" data-aos="fade-up">Lihat Selengkapnya PDDikti &nbsp; &rarr;</button>
        </div>
    </section>

    <section class="py-28 bg-white container mx-auto px-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125"></div>
        <div class="text-center mb-16 relative z-10" data-aos="fade-down">
            <h2 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight">Galeri <span class="font-light text-slate-500">Kegiatan</span></h2>
            <div class="w-16 h-1 bg-accent mx-auto mt-5 rounded-full shadow-inner"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[220px] relative z-10">
            <div data-aos="fade-right" data-aos-duration="1200" class="col-span-2 row-span-2 relative rounded-2xl overflow-hidden group shadow-lg">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 relative z-10 opacity-90 group-hover:opacity-100 shadow-soft shadow-inner shadow-soft">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-8 opacity-0 group-hover:opacity-100 transition duration-300 z-20 shadow-lg">
                    <h4 class="text-white font-semibold text-lg drop-shadow shadow-soft shadow-soft">Rapat Koordinasi Evaluasi Mutu</h4>
                </div>
            </div>
            
            <div data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200" class="relative rounded-2xl overflow-hidden group shadow-md">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 relative z-10 opacity-90 group-hover:opacity-100 shadow-soft shadow-inner shadow-soft">
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center p-4 opacity-0 group-hover:opacity-100 transition z-20 shadow-md">
                    <i class="fas fa-search text-white text-2xl drop-shadow shadow-soft"></i>
                </div>
            </div>
            
            <div data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400" class="relative rounded-2xl overflow-hidden group shadow-md">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 relative z-10 opacity-90 group-hover:opacity-100 shadow-soft shadow-inner shadow-soft">
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center p-4 opacity-0 group-hover:opacity-100 transition z-20 shadow-md">
                    <i class="fas fa-search text-white text-2xl drop-shadow shadow-soft"></i>
                </div>
            </div>
            
            <div data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300" class="col-span-2 relative rounded-2xl overflow-hidden group shadow-lg">
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
            <div data-aos="fade-right" data-aos-duration="1000" class="bg-white p-8 rounded-3xl border border-slate-100 shadow-soft relative group">
                <i class="fas fa-drum-bali absolute text-culture_sky text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                <h3 class="text-2xl font-extrabold text-primary mb-8 flex items-center justify-between relative z-10">
                    <span><i class="fab fa-instagram text-pink-600 mr-3 text-3xl shadow-soft"></i> Instagram Feed</span>
                    <a href="#" class="text-xs text-secondary font-medium hover:text-blue-800">@lldikti7 &rarr;</a>
                </h3>
                <div class="w-full h-72 rounded-xl flex flex-col items-center justify-center text-slate-400 relative overflow-hidden group border border-slate-200">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 scale-x-150"></div>
                    <i class="fab fa-instagram text-5xl mb-4 text-pink-600 relative z-10 shadow-soft"></i>
                    <p class="text-sm relative z-10">[ Widget API Instagram Disini ]</p>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-duration="1000" class="bg-white p-8 rounded-3xl border border-slate-100 shadow-soft relative group">
                <i class="fas fa-vihara absolute text-culture_green text-xl opacity-20 group-hover:opacity-40" style="top: 15px; right: 15px;"></i>
                <h3 class="text-2xl font-extrabold text-primary mb-8 flex items-center justify-between relative z-10">
                    <span><i class="fab fa-youtube text-red-600 mr-3 text-3xl shadow-soft"></i> YouTube Channel</span>
                    <a href="#" class="text-xs text-secondary font-medium hover:text-blue-800">Official &rarr;</a>
                </h3>
                <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-xl border-2 border-slate-100 relative group z-10">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-10 bg-repeat-x scale-125 group-hover:scale-150 transition-transform duration-700"></div>
                    <iframe class="w-full h-72 relative z-10 opacity-90 group-hover:opacity-100 transition duration-300" src="https://www.youtube.com/embed/fDofR5n6j7g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection