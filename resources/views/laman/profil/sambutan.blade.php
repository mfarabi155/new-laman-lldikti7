@extends('laman.layouts.master')

@section('content')
    {{-- HEADER SECTION --}}
    <section class="relative pt-36 pb-20 lg:pt-48 lg:pb-28 bg-sky-100 overflow-hidden border-b border-white/50">
        <div class="absolute inset-0 bg-gradient-to-b from-sky-200/50 via-sky-100 to-[#F8FAFC] z-0"></div>
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-30 bg-repeat-x scale-125 z-0 animate-[marquee_60s_linear_infinite]">
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <nav class="flex justify-center mb-6" aria-label="Breadcrumb" data-aos="fade-down" data-aos-duration="800">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm font-medium">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}"
                            class="text-slate-500 hover:text-secondary transition flex items-center">
                            <i class="fas fa-home mr-2"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center text-slate-400">
                            <i class="fas fa-chevron-right text-xs mx-2"></i>
                            <span class="hover:text-secondary cursor-pointer transition">Profil</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center text-secondary font-bold">
                            <i class="fas fa-chevron-right text-xs mx-2 text-slate-400"></i>
                            <span>Sambutan Kepala Lembaga</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm"
                data-aos="fade-up" data-aos-duration="1000">
                Sambutan <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Kepala
                    Lembaga</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                Lembaga Layanan Pendidikan Tinggi (LLDIKTI) Wilayah VII Jawa Timur.
            </p>
        </div>
    </section>

    <section class="py-20 bg-[#F8FAFC] relative overflow-hidden">
        <i class="fas fa-drum-bali absolute text-culture_sky text-6xl opacity-5" style="top: 10%; right: 5%;"></i>
        <i class="fas fa-vihara absolute text-culture_green text-6xl opacity-5" style="bottom: 20%; left: 5%;"></i>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-start">

                {{-- SIDEBAR KIRI: FOTO KEPALA LEMBAGA --}}
                <div class="w-full lg:w-1/3" data-aos="fade-right" data-aos-duration="1200">
                    <div class="sticky top-32">
                        <div
                            class="bg-white p-4 rounded-3xl shadow-soft border border-slate-100 relative group overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-tr from-sky-100 to-amber-50 opacity-50 z-0"></div>

                            <div class="relative z-10 rounded-2xl overflow-hidden shadow-inner bg-slate-200 aspect-[3/4]">
                                <img src="{{ asset('laman/img/kepala-lldikti7-3.jpeg') }}" alt="Foto Kepala LLDIKTI VII"
                                    class="w-full h-full object-cover object-top transform group-hover:scale-105 transition duration-700">

                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-primary/90 to-transparent p-6 text-center">
                                    <h3 class="text-white font-bold text-xl drop-shadow-md">Prof. Dr. Dyah Sawitri, S.E.,
                                        M.M.</h3>
                                    <p class="text-accent text-sm font-medium tracking-wide">Kepala LLDIKTI Wilayah VII</p>
                                </div>
                            </div>
                        </div>

                        {{-- FITUR TEXT-TO-SPEECH PLAYER WIDGET --}}
                        <div class="mt-8 bg-white p-6 rounded-2xl shadow-soft border border-slate-100 text-center relative overflow-hidden"
                            id="tts-widget">
                            <div class="absolute top-0 left-0 w-full h-1 bg-slate-100">
                                <div id="tts-progress" class="h-full bg-accent w-0 transition-all duration-500 ease-linear">
                                </div>
                            </div>

                            <h4 class="text-sm font-bold text-primary uppercase tracking-widest mb-2"><i
                                    class="fas fa-headphones-alt mr-2 text-accent"></i> Dengarkan Sambutan</h4>
                            <p class="text-xs text-slate-400 mb-5" id="tts-status">Audio siap diputar.</p>

                            <div class="flex justify-center items-center gap-4 relative">
                                
                                {{-- Tombol Stop (Sembunyi by default) --}}
                                <button id="btn-tts-stop"
                                    class="w-10 h-10 rounded-full bg-red-100 text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all shadow-sm focus:outline-none hidden">
                                    <i class="fas fa-stop"></i>
                                </button>

                                {{-- Tombol Play/Pause --}}
                                <button id="btn-tts-play"
                                    class="w-14 h-14 rounded-full bg-[#02275d] text-white flex items-center justify-center hover:bg-blue-900 transition-all shadow-md transform hover:scale-105 focus:outline-none z-10">
                                    <i class="fas fa-play text-xl ml-1" id="icon-tts-play"></i>
                                </button>

                                {{-- FITUR BARU: Tombol Speed (Kecepatan) --}}
                                <button id="btn-tts-speed" title="Ubah Kecepatan Suara"
                                    class="w-10 h-10 rounded-full bg-sky-50 text-[#02275d] font-bold text-xs flex items-center justify-center hover:bg-sky-200 transition-all shadow-sm focus:outline-none border border-sky-100">
                                    1x
                                </button>

                            </div>

                            {{-- Animasi Visualizer (Muncul saat play) --}}
                            <div id="tts-visualizer"
                                class="flex justify-center items-end gap-1 h-6 mt-4 opacity-0 transition-opacity duration-300">
                                <div class="w-1 bg-accent rounded-t-sm animate-[bounce_1s_infinite_0.1s]"></div>
                                <div class="w-1 bg-secondary rounded-t-sm animate-[bounce_1.2s_infinite_0.2s] h-4"></div>
                                <div class="w-1 bg-accent rounded-t-sm animate-[bounce_0.8s_infinite_0.3s] h-6"></div>
                                <div class="w-1 bg-secondary rounded-t-sm animate-[bounce_1.1s_infinite_0.15s] h-3"></div>
                                <div class="w-1 bg-accent rounded-t-sm animate-[bounce_0.9s_infinite_0.4s]"></div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- KONTEN KANAN: TEKS SAMBUTAN --}}
                <div class="w-full lg:w-2/3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="bg-white p-10 md:p-14 rounded-3xl shadow-soft border border-slate-100 relative">
                        <i
                            class="fas fa-quote-left absolute text-sky-100 text-8xl -top-4 -left-4 -z-10 transform -rotate-12"></i>

                        {{-- KITA BUNGKUS TEKS DENGAN ID AGAR MUDAH DIAMBIL OLEH JAVASCRIPT --}}
                        <div id="teks-sambutan"
                            class="prose prose-lg max-w-none text-slate-700 leading-relaxed text-justify">

                            <div class="border-b border-slate-100 pb-6 mb-8">
                                <h2 class="text-2xl md:text-3xl font-extrabold text-primary leading-snug">
                                    Assalamu'alaikum Warahmatullahi Wabarakatuh, <br>
                                    <span class="text-xl md:text-2xl text-slate-600 font-bold">Salam Sejahtera bagi kita
                                        semua.</span>
                                </h2>
                            </div>

                            <p
                                class="first-letter:text-6xl first-letter:font-extrabold first-letter:text-secondary first-letter:mr-3 first-letter:float-left first-letter:mt-1.5">
                                Selamat datang kepada seluruh pengunjung laman web Lembaga Layanan Pendidikan Tinggi
                                (LLDIKTI) Wilayah VII Jawa Timur.
                            </p>

                            <p>
                                Di era global dan pesatnya Teknologi Informasi, keberadaan sebuah laman web untuk suatu
                                organisasi sangatlah penting. Laman web LLDIKTI Wilayah VII merupakan media elektronik yang
                                dapat dijadikan sebagai sarana informasi bagi LLDIKTI Wilayah VII dalam melaksanakan
                                fasilitasi pelayanan bagi perguruan tinggi dan lembaga terkait serta masyarakat dalam rangka
                                keterbukaan publik khususnya dalam hal pendidikan tinggi.
                            </p>

                            <p>
                                Laman web juga dapat dijadikan sarana komunikasi antar Perguruan Tinggi, bahkan Perguruan
                                Tinggi dapat memanfaatkan laman web ini untuk melakukan konsolidasi, sehingga terbentuk
                                jejaring yang makin besar dan kuat.
                            </p>

                            <blockquote
                                class="my-10 p-6 md:p-8 bg-sky-50/80 border-l-4 border-accent rounded-r-2xl shadow-sm text-primary font-medium italic text-xl leading-relaxed text-left">
                                "LLDIKTI Wilayah VII menyadari penuh bahwa <span
                                    class="text-secondary font-bold underline decoration-accent decoration-4 underline-offset-4">Perguruan
                                    Tinggi Punya Peran Strategis</span>. Potensi besar ini, apabila digali dan dikelola
                                dengan baik dan benar, akan mampu memberikan kontribusi yang sangat positif dalam
                                mencerdaskan kehidupan bangsa."
                            </blockquote>

                            <p>
                                Oleh karena itu, kami sangat berharap, melalui laman web ini, komunikasi antara LLDIKTI
                                Wilayah VII dan perguruan tinggi dapat berjalan lebih cepat dan lancar untuk mewujudkan visi
                                dan misi pendidikan tinggi yang lebih baik.
                            </p>

                            <p>
                                Laman web LLDIKTI Wilayah VII merupakan wahana yang dapat digunakan sebagai media
                                penyebarluasan informasi-informasi baik dari Kementerian Pendidikan, Kebudayaan, Riset, dan
                                Teknologi maupun dari internal perguruan tinggi, yang memang harus diketahui oleh pemangku
                                kepentingan secara luas. Dalam laman web ini, antara lain memuat jurnal elektronik,
                                pengumuman, peraturan, dan tautan ke layanan-layanan pendidikan tinggi.
                            </p>

                            <p>
                                Kami menyadari bahwa masih banyak kekurangan pada laman web LLDIKTI Wilayah VII ini. Oleh
                                karenanya, laman web akan terus dikembangkan sehingga tampilan, isi, dan mutunya menjadi
                                lebih baik lagi dan akuntabel. Untuk itu, pengunjung laman web yang kami hormati, kami
                                sangat mengharapkan saran dan komentar yang berkesinambungan guna menunjang peningkatan
                                pelayanan dan informasi yang dibutuhkan bersama. Saran dan komentar dapat disampaikan
                                melalui akses buku tamu dan surat elektronik ke <a
                                    href="mailto:ult.lldikti7@kemdikbud.go.id"
                                    class="text-secondary hover:text-primary transition-colors hover:underline font-semibold">ult.lldikti7@kemdikbud.go.id</a>.
                            </p>

                            <p>
                                Akhir kata, kami mengucapkan terima kasih atas kepercayaan para pengunjung yang terus
                                menggunakan laman web ini sebagai rujukan utama layanan pendidikan tinggi. Semoga
                                transformasi digital melalui laman web ini dapat meningkatkan efisiensi layanan dan
                                memberikan manfaat yang lebih besar kepada masyarakat luas.
                            </p>

                            <p class="font-bold text-primary mt-10 text-xl text-left">
                                Wassalamualaikum Wr. Wb.
                            </p>

                            <div class="mt-10 pt-8 border-t border-slate-100 flex flex-col items-end text-right">
                                <p class="text-slate-500 mb-2">Surabaya,
                                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                                <p class="font-bold text-primary text-xl mb-1">Prof. Dr. Dyah Sawitri, S.E., M.M.</p>
                                <p class="text-secondary font-medium">Kepala LLDIKTI Wilayah VII</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- SCRIPT TEXT-TO-SPEECH (TTS) DENGAN SMART AUTOPLAY & SPEED CONTROL --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if ('speechSynthesis' in window) {
                const btnPlay   = document.getElementById('btn-tts-play');
                const btnStop   = document.getElementById('btn-tts-stop');
                const btnSpeed  = document.getElementById('btn-tts-speed'); // Tombol Baru
                const iconPlay  = document.getElementById('icon-tts-play');
                const statusTxt = document.getElementById('tts-status');
                const visualizer= document.getElementById('tts-visualizer');
                const progressBar= document.getElementById('tts-progress');
                
                let utterance = new SpeechSynthesisUtterance();
                let isPlaying = false;
                let isPaused  = false;
                let keepAliveInterval;
                let hasAutoplayed = false; 
                
                // Variabel Kecepatan (Mulai dari normal/agak lambat)
                const speeds = [0.9, 1.25, 1.5, 2.0];
                let currentSpeedIndex = 0;

                // 1. TUNGGU SUARA SIAP
                function loadVoices() {
                    window.speechSynthesis.getVoices();
                    utterance.lang = 'id-ID'; 
                }
                loadVoices();
                if (speechSynthesis.onvoiceschanged !== undefined) {
                    speechSynthesis.onvoiceschanged = loadVoices;
                }

                utterance.rate = speeds[currentSpeedIndex]; 
                utterance.pitch = 1.0; 

                const textContainer = document.getElementById('teks-sambutan');
                let rawText = textContainer.innerText || textContainer.textContent;
                rawText = rawText.replace(/\n\s*\n/g, '. ').replace(/\n/g, ' ');
                utterance.text = rawText;

                function updateUI_Playing() {
                    iconPlay.className = "fas fa-pause text-xl"; 
                    btnPlay.classList.add('bg-accent', 'text-primary');
                    btnPlay.classList.remove('bg-[#02275d]', 'text-white');
                    btnStop.classList.remove('hidden');
                    statusTxt.innerText = "Sedang membacakan...";
                    visualizer.classList.remove('opacity-0');
                    progressBar.classList.add('w-full', 'duration-[120s]'); 
                }

                function updateUI_Paused() {
                    iconPlay.className = "fas fa-play text-xl ml-1";
                    btnPlay.classList.remove('bg-accent', 'text-primary');
                    btnPlay.classList.add('bg-[#02275d]', 'text-white');
                    statusTxt.innerText = "Audio dijeda.";
                    visualizer.classList.add('opacity-0');
                    progressBar.classList.remove('duration-[120s]');
                }

                function resetTTS() {
                    isPlaying = false;
                    isPaused = false;
                    hasAutoplayed = false;
                    clearInterval(keepAliveInterval); 
                    
                    iconPlay.className = "fas fa-play text-xl ml-1";
                    btnPlay.classList.remove('bg-accent', 'text-primary');
                    btnPlay.classList.add('bg-[#02275d]', 'text-white');
                    btnStop.classList.add('hidden');
                    statusTxt.innerText = "Audio siap diputar.";
                    visualizer.classList.add('opacity-0');
                    progressBar.className = "h-full bg-accent w-0 transition-all duration-500 ease-linear";
                }

                // 2. FUNGSI PEMUTAR UTAMA
                function triggerPlay() {
                    if(isPlaying) return; 
                    
                    window.speechSynthesis.cancel(); 
                    
                    // Pastikan kecepatan yang diset adalah yang terakhir dipilih user
                    utterance.rate = speeds[currentSpeedIndex];

                    setTimeout(() => {
                        window.speechSynthesis.speak(utterance);
                        isPlaying = true;
                        hasAutoplayed = true; 
                        updateUI_Playing();
                        
                        keepAliveInterval = setInterval(function() {
                            if (!window.speechSynthesis.paused && window.speechSynthesis.speaking) {
                                window.speechSynthesis.resume();
                            }
                        }, 10000);
                    }, 200);
                }

                // ========================================================
                // LOGIKA TOMBOL KECEPATAN (SPEED)
                // ========================================================
                btnSpeed.addEventListener('click', function(e) {
                    e.stopPropagation();
                    
                    // Pindah ke kecepatan berikutnya (Jika sudah mentok, kembali ke 0)
                    currentSpeedIndex = (currentSpeedIndex + 1) % speeds.length;
                    const newSpeed = speeds[currentSpeedIndex];
                    
                    // Update teks tombol (Contoh: "1x", "1.5x")
                    let speedText = newSpeed === 0.9 ? '1x' : newSpeed + 'x';
                    btnSpeed.innerText = speedText;
                    
                    // Terapkan kecepatan ke sistem
                    utterance.rate = newSpeed;

                    // PERHATIAN: Web Speech API tidak bisa ganti speed on-the-fly.
                    // Jadi jika sedang berputar, kita harus stop dan putar ulang teksnya dari awal
                    if (isPlaying && !isPaused) {
                        window.speechSynthesis.cancel();
                        isPlaying = false; // Reset status sebentar
                        
                        // Mainkan lagi dengan speed baru
                        setTimeout(() => {
                            triggerPlay();
                        }, 100);
                    }
                });

                // ========================================================
                // 3. SMART AUTOPLAY LOGIC 
                // ========================================================
                
                setTimeout(() => {
                    if(!hasAutoplayed) triggerPlay();
                }, 1500);

                const interactionEvents = ['click', 'touchstart', 'scroll'];
                const startAudioOnInteraction = function() {
                    if (!hasAutoplayed) {
                        triggerPlay();
                    }
                    interactionEvents.forEach(event => document.removeEventListener(event, startAudioOnInteraction));
                };

                interactionEvents.forEach(event => document.addEventListener(event, startAudioOnInteraction, { once: true }));

                // Event Listener Tombol Play/Pause Manual
                btnPlay.addEventListener('click', function(e) {
                    e.stopPropagation(); 
                    if (!isPlaying) {
                        triggerPlay();
                    } else if (isPaused) {
                        window.speechSynthesis.resume();
                        isPaused = false;
                        updateUI_Playing();
                    } else {
                        window.speechSynthesis.pause();
                        isPaused = true;
                        updateUI_Paused();
                    }
                });

                btnStop.addEventListener('click', function(e) {
                    e.stopPropagation();
                    window.speechSynthesis.cancel();
                    resetTTS();
                });

                utterance.onend = function() {
                    resetTTS();
                };
                
                utterance.onerror = function(e) {
                    window.speechSynthesis.cancel();
                    resetTTS();
                    if (e.error !== 'not-allowed' && e.error !== 'interrupted') {
                        statusTxt.innerText = "Sistem audio browser terganggu.";
                    }
                };
                
                window.addEventListener('beforeunload', function() {
                    window.speechSynthesis.cancel();
                });

            } else {
                document.getElementById('tts-widget').style.display = 'none';
            }
        });
    </script>
@endsection