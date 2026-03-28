@extends('laman.layouts.master')

@section('content')

    <section class="relative pt-36 pb-20 lg:pt-48 lg:pb-28 bg-sky-100 overflow-hidden border-b border-white/50">
        <div class="absolute inset-0 bg-gradient-to-b from-sky-200/50 via-sky-100 to-[#F8FAFC] z-0"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-30 bg-repeat-x scale-125 z-0 animate-[marquee_60s_linear_infinite]"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <nav class="flex justify-center mb-6" aria-label="Breadcrumb" data-aos="fade-down" data-aos-duration="800">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm font-medium">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-slate-500 hover:text-secondary transition flex items-center">
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
                                <img src="{{ asset('laman/img/kepala-lldikti7-3.jpeg') }}" 
                                     alt="Foto Kepala LLDIKTI VII" 
                                     class="w-full h-full object-cover object-top transform group-hover:scale-105 transition duration-700">
                                
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-primary/90 to-transparent p-6 text-center">
                                    <h3 class="text-white font-bold text-xl drop-shadow-md">Prof. Dr. Dyah Sawitri, S.E., M.M.</h3>
                                    <p class="text-accent text-sm font-medium tracking-wide">Kepala LLDIKTI Wilayah VII</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 bg-white p-6 rounded-2xl shadow-soft border border-slate-100 text-center">
                            <h4 class="text-sm font-bold text-primary uppercase tracking-widest mb-4">Hubungi Kami</h4>
                            <div class="flex justify-center space-x-4">
                                <a href="mailto:info@kopertis7.go.id" class="w-10 h-10 rounded-full bg-sky-50 text-secondary flex items-center justify-center hover:bg-secondary hover:text-white transition shadow-sm"><i class="fas fa-envelope"></i></a>
                                <a href="#" class="w-10 h-10 rounded-full bg-sky-50 text-secondary flex items-center justify-center hover:bg-secondary hover:text-white transition shadow-sm"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="bg-white p-10 md:p-14 rounded-3xl shadow-soft border border-slate-100 relative">
                        <i class="fas fa-quote-left absolute text-sky-100 text-8xl -top-4 -left-4 -z-10 transform -rotate-12"></i>
                        
                        {{-- MENGGUNAKAN text-justify DAN leading-relaxed UNTUK KERAPIAN --}}
                        <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed text-justify">
                            
                            {{-- SAPAAN AWAL DIRAPIKAN DENGAN BORDER BAWAH --}}
                            <div class="border-b border-slate-100 pb-6 mb-8">
                                <h2 class="text-2xl md:text-3xl font-extrabold text-primary leading-snug">
                                    Assalamu'alaikum Warahmatullahi Wabarakatuh, <br>
                                    <span class="text-xl md:text-2xl text-slate-600 font-bold">Salam Sejahtera bagi kita semua.</span>
                                </h2>
                            </div>
                            
                            <p class="first-letter:text-6xl first-letter:font-extrabold first-letter:text-secondary first-letter:mr-3 first-letter:float-left first-letter:mt-1.5">
                                Selamat datang kepada seluruh pengunjung laman web Lembaga Layanan Pendidikan Tinggi (LLDIKTI) Wilayah VII Jawa Timur.
                            </p>

                            <p>
                                Di era global dan pesatnya Teknologi Informasi, keberadaan sebuah laman web untuk suatu organisasi sangatlah penting. Laman web LLDIKTI Wilayah VII merupakan media elektronik yang dapat dijadikan sebagai sarana informasi bagi LLDIKTI Wilayah VII dalam melaksanakan fasilitasi pelayanan bagi perguruan tinggi dan lembaga terkait serta masyarakat dalam rangka keterbukaan publik khususnya dalam hal pendidikan tinggi.
                            </p>

                            <p>
                                Laman web juga dapat dijadikan sarana komunikasi antar Perguruan Tinggi, bahkan Perguruan Tinggi dapat memanfaatkan laman web ini untuk melakukan konsolidasi, sehingga terbentuk jejaring yang makin besar dan kuat.
                            </p>

                            <blockquote class="my-10 p-6 md:p-8 bg-sky-50/80 border-l-4 border-accent rounded-r-2xl shadow-sm text-primary font-medium italic text-xl leading-relaxed text-left">
                                "LLDIKTI Wilayah VII menyadari bahwa Perguruan Tinggi memiliki potensi yang apabila digali dan dikelola dengan baik dan benar akan mampu memberikan kontribusi yang sangat positif dalam <span class="text-secondary font-bold">mencerdaskan kehidupan bangsa.</span>"
                            </blockquote>

                            <p>
                                Oleh karena itu, kami sangat berharap, melalui laman web ini, komunikasi antara LLDIKTI Wilayah VII dan perguruan tinggi dapat berjalan lebih cepat dan lancar.
                            </p>

                            <p>
                                Laman web LLDIKTI Wilayah VII merupakan wahana yang dapat digunakan sebagai media penyebarluasan informasi-informasi baik dari Kementerian Riset, Teknologi, dan Pendidikan Tinggi maupun perguruan tinggi, yang memang harus diketahui oleh pemangku kepentingan secara luas. Dalam laman web LLDIKTI Wilayah VII ini antara lain memuat jurnal elektronik, pengumuman, peraturan, dan tautan ke layanan-layanan pendidikan tinggi.
                            </p>

                            <p>
                                Kami menyadari bahwa masih banyak kekurangan pada laman web LLDIKTI Wilayah VII ini, oleh karenanya, laman web akan terus dikembangkan, sehingga tampilan, isi, dan mutunya menjadi lebih baik lagi dan akuntabel. Untuk itu, pengunjung laman web LLDIKTI Wilayah VII yang kami hormati, kami mengharapkan saran dan komentar yang berkesinambungan guna menunjang peningkatan pelayanan dan informasi yang dibutuhkan bersama. Saran dan komentar dapat disampaikan melalui akses buku tamu dan surat elektronik ke <a href="mailto:ult.lldikti7@kemdikbud.go.id" class="text-secondary hover:text-primary transition-colors hover:underline font-semibold">ult.lldikti7@kemdikbud.go.id</a>.
                            </p>

                            <p>
                                Akhirnya kami mengucapkan terima kasih atas kepercayaan para pengunjung dalam menggunakan laman web ini sebagai rujukan layanan pendidikan tinggi sampai saat ini. Semoga dengan transformasi laman web ini dapat meningkatkan layanan pendidikan tinggi dan memberikan manfaat yang lebih besar kepada masyarakat.
                            </p>

                            <p class="font-bold text-primary mt-10 text-xl text-left">
                                Wassalamualaikum Wr. Wb.
                            </p>

                            <div class="mt-10 pt-8 border-t border-slate-100 flex flex-col items-end text-right">
                                <p class="text-slate-500 mb-2">Surabaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                                <p class="font-bold text-primary text-xl mb-1">Prof. Dr. Dyah Sawitri, S.E., M.M.</p>
                                <p class="text-secondary font-medium">Kepala LLDIKTI Wilayah VII</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection