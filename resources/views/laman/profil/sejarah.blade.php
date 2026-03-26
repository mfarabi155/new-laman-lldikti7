@extends('laman.layouts.master')

@section('content')

    <section class="relative pt-36 pb-20 lg:pt-48 lg:pb-28 bg-sky-100 overflow-hidden border-b border-white/50">
        <div class="absolute inset-0 bg-gradient-to-b from-sky-200/50 via-sky-100 to-[#F8FAFC] z-0"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-30 bg-repeat-x scale-125 z-0 animate-[marquee_60s_linear_infinite]"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <nav class="flex justify-center mb-6" aria-label="Breadcrumb" data-aos="fade-down" data-aos-duration="800">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm font-medium">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-slate-500 hover:text-secondary transition flex items-center">
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
                            <span>Sejarah Lembaga</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up" data-aos-duration="1000">
                Sejarah <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Lembaga</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Jejak langkah dan evolusi layanan pendidikan tinggi di Wilayah VII sejak 1967.
            </p>
        </div>
    </section>

    <section class="py-20 bg-[#F8FAFC] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-5 scale-125"></div>

        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-3xl font-bold text-primary">Garis Waktu Perjalanan</h2>
                <div class="w-16 h-1 bg-accent mx-auto mt-4 rounded-full shadow-inner"></div>
            </div>

            <div class="relative border-l-4 border-sky-200 ml-4 md:ml-8">
                
                <div class="mb-12 ml-8 relative group" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute -left-10 md:-left-11 mt-1.5 w-6 h-6 bg-accent rounded-full border-4 border-white shadow-md group-hover:scale-125 transition-transform duration-300"></div>
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-soft border border-slate-100 group-hover:shadow-lg transition-all duration-300 transform group-hover:-translate-y-1">
                        <span class="inline-block px-4 py-1.5 bg-sky-100 text-secondary font-bold rounded-full text-sm mb-4">1967</span>
                        <h3 class="text-xl font-bold text-primary mb-3">Pembentukan KOPERTI</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Pemerintah membentuk Lembaga yang mengkoordinir Perguruan Tinggi dengan nama Koordinasi Perguruan Tinggi (KOPERTI) yang berkantor di Jl. Airlangga no. 8 Surabaya. Wilayah kerjanya sangat luas, meliputi 7 provinsi: Jawa Timur, Bali, Nusa Tenggara Barat, Nusa Tenggara Timur, Kalimantan Selatan, Kalimantan Tengah, dan Kalimantan Timur, di bawah pimpinan seorang Koordinator dibantu oleh Sekretaris.
                        </p>
                    </div>
                </div>

                <div class="mb-12 ml-8 relative group" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute -left-10 md:-left-11 mt-1.5 w-6 h-6 bg-secondary rounded-full border-4 border-white shadow-md group-hover:scale-125 transition-transform duration-300"></div>
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-soft border border-slate-100 group-hover:shadow-lg transition-all duration-300 transform group-hover:-translate-y-1">
                        <span class="inline-block px-4 py-1.5 bg-sky-100 text-secondary font-bold rounded-full text-sm mb-4">1974</span>
                        <h3 class="text-xl font-bold text-primary mb-3">Perubahan Menjadi KOPERTIS Wilayah VI</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Nama KOPERTI secara resmi diubah menjadi KOPERTIS WILAYAH VI. Meskipun berganti nama, wilayah kerja lembaga ini tetap dipertahankan meliputi 7 (tujuh) provinsi yang sama seperti sebelumnya.
                        </p>
                    </div>
                </div>

                <div class="mb-12 ml-8 relative group" data-aos="fade-up" data-aos-delay="300">
                    <div class="absolute -left-10 md:-left-11 mt-1.5 w-6 h-6 bg-accent rounded-full border-4 border-white shadow-md group-hover:scale-125 transition-transform duration-300"></div>
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-soft border border-slate-100 group-hover:shadow-lg transition-all duration-300 transform group-hover:-translate-y-1">
                        <span class="inline-block px-4 py-1.5 bg-sky-100 text-secondary font-bold rounded-full text-sm mb-4">1982</span>
                        <h3 class="text-xl font-bold text-primary mb-3">Pemekaran Menjadi KOPERTIS Wilayah VII</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Nama lembaga diubah kembali menjadi KOPERTIS WILAYAH VII. Seiring dengan perkembangan pendidikan, wilayah kerjanya difokuskan dan diperkecil menjadi 4 provinsi saja, yaitu: Jawa Timur, Kalimantan Selatan, Kalimantan Tengah, dan Kalimantan Timur.
                        </p>
                    </div>
                </div>

                <div class="mb-12 ml-8 relative group" data-aos="fade-up" data-aos-delay="400">
                    <div class="absolute -left-10 md:-left-11 mt-1.5 w-6 h-6 bg-secondary rounded-full border-4 border-white shadow-md group-hover:scale-125 transition-transform duration-300"></div>
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-soft border border-slate-100 group-hover:shadow-lg transition-all duration-300 transform group-hover:-translate-y-1">
                        <span class="inline-block px-4 py-1.5 bg-sky-100 text-secondary font-bold rounded-full text-sm mb-4">1990</span>
                        <h3 class="text-xl font-bold text-primary mb-3">Fokus Wilayah Jawa Timur</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Wilayah kerja KOPERTIS WILAYAH VII kembali berkurang dan secara eksklusif hanya meliputi 1 provinsi, yaitu Provinsi Jawa Timur.
                        </p>
                    </div>
                </div>

                <div class="ml-8 relative group" data-aos="fade-up" data-aos-delay="500">
                    <div class="absolute -left-10 md:-left-11 mt-1.5 w-8 h-8 bg-gradient-to-br from-secondary to-accent rounded-full border-4 border-white shadow-lg animate-pulse"></div>
                    <div class="bg-gradient-to-br from-white to-sky-50 p-6 md:p-8 rounded-2xl shadow-md border border-sky-200 group-hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-1">
                        <span class="inline-block px-4 py-1.5 bg-secondary text-white font-bold rounded-full text-sm mb-4 shadow-sm">2018 - Sekarang</span>
                        <h3 class="text-2xl font-extrabold text-primary mb-3">Transformasi Menjadi LLDIKTI</h3>
                        <p class="text-slate-700 leading-relaxed">
                            Seiring dengan berlakunya Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 15 Tahun 2018, terjadi perubahan organisasi dan tata kerja secara menyeluruh menjadi <span class="font-bold text-secondary">Lembaga Layanan Pendidikan Tinggi (LLDIKTI) Wilayah VII</span>. Lembaga ini berkedudukan di Surabaya dengan wilayah kerja Provinsi Jawa Timur, dipimpin oleh seorang Kepala dan dibantu oleh Sekretaris LLDIKTI.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-20 bg-white relative">
        <div class="container mx-auto px-6 max-w-5xl">
            
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-primary">Daftar Pimpinan Lembaga</h2>
                <div class="w-16 h-1 bg-accent mx-auto mt-4 rounded-full shadow-inner mb-6"></div>
                <p class="text-slate-500">Tokoh-tokoh yang pernah mendedikasikan diri memimpin layanan pendidikan tinggi di Wilayah VII.</p>
            </div>

            <div class="mb-16" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-secondary text-white px-6 py-4 rounded-t-2xl flex items-center shadow-md">
                    <i class="fas fa-history text-accent text-2xl mr-4"></i>
                    <h3 class="font-bold text-lg">Koordinator KOPERTI s.d. KOPERTIS Wilayah VII</h3>
                </div>
                <div class="overflow-x-auto bg-white border-x border-b border-slate-200 rounded-b-2xl shadow-soft">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-sm uppercase tracking-wider">
                                <th class="px-6 py-4 border-b font-semibold w-16 text-center">No</th>
                                <th class="px-6 py-4 border-b font-semibold">Nama Pejabat</th>
                                <th class="px-6 py-4 border-b font-semibold w-64">Periode Jabatan</th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-700 divide-y divide-slate-100">
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">1</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Eri Soedewo</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">1967 – 1972</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">2</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Kwari Satjadibrata</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">1972 – 1975</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">3</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Dardji Darmodiardjo</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">1976 – 1979</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">4</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Soedarso Djojonegoro</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">1980 – 1985</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">5</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Abdoel Gani, SH. MS.</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">1985 – 1990</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">6</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Harsono, SE.</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">1990 – 1995</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">7</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Ir. H. Pinardi Koestalam, M.Sc.</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">1995 – 1999</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">8</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. H. Rochiman Sasmita, MS., drh.</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">1999 – 2003</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">9</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Ir. Nadjadji Anwar, M.Sc.</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">2003 – 2008</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">10</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. H. Sugijanto, MS.Apt.</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">2008 – 2015</span></td>
                            </tr>
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium">11</td>
                                <td class="px-6 py-4 font-semibold text-primary">Prof. Dr. Ir. Soeprapto, DEA.</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm">2015 – 2018</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="300">
                <div class="bg-primary text-white px-6 py-4 rounded-t-2xl flex items-center shadow-md border-t-4 border-accent">
                    <i class="fas fa-user-tie text-accent text-2xl mr-4"></i>
                    <h3 class="font-bold text-lg">Kepala LLDIKTI Wilayah VII</h3>
                </div>
                <div class="overflow-x-auto bg-white border-x border-b border-slate-200 rounded-b-2xl shadow-soft">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-sm uppercase tracking-wider">
                                <th class="px-6 py-4 border-b font-semibold w-16 text-center">No</th>
                                <th class="px-6 py-4 border-b font-semibold">Nama Pejabat</th>
                                <th class="px-6 py-4 border-b font-semibold w-64">Periode Jabatan</th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-700 divide-y divide-slate-100">
                            <tr class="hover:bg-sky-50 transition duration-150">
                                <td class="px-6 py-4 text-center font-medium text-lg">1</td>
                                <td class="px-6 py-4 font-bold text-primary text-lg">Prof. Dr. Ir. Soeprapto, DEA.</td>
                                <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full font-medium">2018 – 2022</span></td>
                            </tr>
                            <tr class="bg-amber-50 hover:bg-amber-100 transition duration-150">
                                <td class="px-6 py-5 text-center font-bold text-accent text-lg">2</td>
                                <td class="px-6 py-5 font-bold text-primary text-lg">
                                    Prof. Dr. Dyah Sawitri, S.E., M.M.
                                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                        Menjabat
                                    </span>
                                </td>
                                <td class="px-6 py-5"><span class="bg-accent text-white px-3 py-1 rounded-full font-bold shadow-sm">2022 – Sekarang</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

@endsection