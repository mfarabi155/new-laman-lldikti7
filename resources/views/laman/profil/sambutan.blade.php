@extends('laman.layouts.master')

@section('content')

    <section class="relative pt-36 pb-20 lg:pt-48 lg:pb-28 bg-sky-100 overflow-hidden border-b border-white/50">
        <div class="absolute inset-0 bg-gradient-to-b from-sky-200/50 via-sky-100 to-[#F8FAFC] z-0"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-30 bg-repeat-x scale-125 z-0 animate-[marquee_60s_linear_infinite]"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <nav class="flex justify-center mb-6" aria-label="Breadcrumb" data-aos="fade-down" data-aos-duration="800">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm font-medium">
                    <li class="inline-flex items-center">
                        <a href="#" class="text-slate-500 hover:text-secondary transition flex items-center">
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

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Sambutan <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Kepala Lembaga</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                Lembaga Layanan Pendidikan Tinggi (LLDIKTI) Wilayah VII Jawa Timur.
            </p>
        </div>
    </section>

    <section class="py-20 bg-[#F8FAFC] relative overflow-hidden">
        <i class="fas fa-drum-bali absolute text-culture_sky text-6xl opacity-5" style="top: 10%; right: 5%;"></i>
        <i class="fas fa-vihara absolute text-culture_green text-6xl opacity-5" style="bottom: 20%; left: 5%;"></i>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-start">
                
                <div class="w-full lg:w-1/3" data-aos="fade-right" data-aos-duration="1200">
                    <div class="sticky top-32">
                        <div class="bg-white p-4 rounded-3xl shadow-soft border border-slate-100 relative group overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-tr from-sky-100 to-amber-50 opacity-50 z-0"></div>
                            
                            <div class="relative z-10 rounded-2xl overflow-hidden shadow-inner bg-slate-200 aspect-[3/4]">
                                <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     alt="Foto Kepala LLDIKTI VII" 
                                     class="w-full h-full object-cover object-top transform group-hover:scale-105 transition duration-700">
                                
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-primary/90 to-transparent p-6 text-center">
                                    <h3 class="text-white font-bold text-xl drop-shadow-md">Prof. Dr. Nama Kepala Lembaga</h3>
                                    <p class="text-accent text-sm font-medium tracking-wide">Kepala LLDIKTI Wilayah VII</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 bg-white p-6 rounded-2xl shadow-soft border border-slate-100 text-center">
                            <h4 class="text-sm font-bold text-primary uppercase tracking-widest mb-4">Hubungi Kami</h4>
                            <div class="flex justify-center space-x-4">
                                <a href="#" class="w-10 h-10 rounded-full bg-sky-50 text-secondary flex items-center justify-center hover:bg-secondary hover:text-white transition"><i class="fas fa-envelope"></i></a>
                                <a href="#" class="w-10 h-10 rounded-full bg-sky-50 text-secondary flex items-center justify-center hover:bg-secondary hover:text-white transition"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="bg-white p-10 md:p-14 rounded-3xl shadow-soft border border-slate-100 relative">
                        <i class="fas fa-quote-left absolute text-sky-100 text-8xl -top-4 -left-4 -z-10 transform -rotate-12"></i>
                        
                        <div class="prose prose-lg prose-slate max-w-none text-slate-700 leading-loose">
                            
                            <h2 class="text-3xl font-extrabold text-primary mb-6">Assalamu'alaikum Warahmatullahi Wabarakatuh, <br>Salam Sejahtera bagi kita semua.</h2>
                            
                            <p class="first-letter:text-7xl first-letter:font-extrabold first-letter:text-secondary first-letter:mr-3 first-letter:float-left">
                                Puji syukur senantiasa kita panjatkan kehadirat Tuhan Yang Maha Esa atas segala rahmat dan karunia-Nya. Selamat datang di laman resmi Lembaga Layanan Pendidikan Tinggi (LLDIKTI) Wilayah VII Jawa Timur.
                            </p>

                            <p>
                                Laman ini hadir sebagai wujud nyata komitmen kami dalam mengedepankan transparansi, akuntabilitas, dan pelayanan prima kepada seluruh pemangku kepentingan, khususnya perguruan tinggi negeri maupun swasta, dosen, mahasiswa, serta masyarakat luas di lingkungan Provinsi Jawa Timur.
                            </p>

                            <blockquote class="my-10 p-6 bg-sky-50 border-l-4 border-accent rounded-r-2xl shadow-sm text-primary font-medium italic text-xl">
                                "LLDIKTI Wilayah VII berkomitmen penuh untuk menghadirkan <span class="text-secondary font-bold">Layanan Humanis Berintegritas</span> guna mewujudkan pendidikan tinggi yang bermutu, inovatif, dan berdaya saing global."
                            </blockquote>

                            <p>
                                Dalam era disrupsi dan percepatan digitalisasi saat ini, transformasi pendidikan tinggi menjadi sebuah keharusan. Melalui implementasi kebijakan Merdeka Belajar Kampus Merdeka (MBKM), kami terus memfasilitasi dan mendorong perguruan tinggi untuk beradaptasi, berinovasi, serta meningkatkan kualitas Tri Dharma Perguruan Tinggi.
                            </p>

                            <p>
                                Kami menyadari bahwa tantangan ke depan tidaklah ringan. Namun, dengan sinergi, kolaborasi, dan integritas yang kuat dari seluruh civitas akademika, kami yakin perguruan tinggi di Jawa Timur mampu melahirkan lulusan-lulusan unggul yang menjadi motor penggerak kemajuan bangsa Indonesia.
                            </p>

                            <p>
                                Akhir kata, semoga laman informasi ini memberikan manfaat seluas-luasnya. Kami senantiasa membuka diri terhadap kritik dan saran yang membangun demi perbaikan mutu layanan kami di masa mendatang.
                            </p>

                            <div class="mt-12 pt-8 border-t border-slate-100 flex flex-col items-end text-right">
                                <p class="text-slate-500 mb-2">Surabaya, 26 Maret 2026</p>
                                <p class="font-bold text-primary text-xl mb-1">Prof. Dr. Nama Kepala Lembaga</p>
                                <p class="text-secondary font-medium">Kepala LLDIKTI Wilayah VII</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection