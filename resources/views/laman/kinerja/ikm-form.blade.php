@extends('laman.layouts.master')

@section('title', 'Isi Kuesioner IKM')

@section('content')

    {{-- HEADER SECTION --}}
    <section class="relative pt-36 pb-20 lg:pt-48 lg:pb-28 bg-sky-100 overflow-hidden border-b border-white/50">
        <div class="absolute inset-0 bg-gradient-to-b from-sky-200/50 via-sky-100 to-[#F8FAFC] z-0"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clouds.png')] opacity-30 bg-repeat-x scale-125 z-0 animate-[marquee_60s_linear_infinite]"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <nav class="flex justify-center mb-6" aria-label="Breadcrumb" data-aos="fade-down">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm font-medium">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-slate-500 hover:text-secondary transition flex items-center">
                            <i class="fas fa-home mr-2"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center text-slate-400">
                            <i class="fas fa-chevron-right text-xs mx-2"></i>
                            <a href="{{ route('ikm.index') }}" class="hover:text-secondary transition">IKM</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center text-secondary font-bold">
                            <i class="fas fa-chevron-right text-xs mx-2 text-slate-400"></i>
                            <span>Isi Kuesioner</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-extrabold text-primary tracking-tight mb-4 drop-shadow-sm" data-aos="fade-up">
                Isi Kuesioner <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-accent">Survei IKM</span>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="200">
                Kontribusi Anda sangat berharga bagi kami untuk terus meningkatkan kualitas pelayanan di LLDIKTI Wilayah VII.
            </p>
        </div>
    </section>

    <section class="py-12 md:py-20 bg-[#F8FAFC] relative overflow-hidden">
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            
            @if(session('success'))
                <div class="bg-green-500 text-white p-6 rounded-3xl shadow-lg mb-10 flex items-center gap-4 animate-bounce-short">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-2xl">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <p class="font-bold text-lg">Terima Kasih!</p>
                        <p class="opacity-90">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('ikm.store') }}" method="POST" class="space-y-10">
                @csrf
                
                {{-- KARTU 1: DATA DIRI --}}
                <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-soft border border-slate-100" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-secondary/10 text-secondary rounded-xl flex items-center justify-center font-black">1</div>
                        <h3 class="text-xl font-extrabold text-primary">Profil Responden</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 ml-1">Nama Lengkap</label>
                            <input type="text" name="nama" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 focus:bg-white focus:border-secondary transition-all outline-none text-slate-700 font-medium" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 ml-1">Email Aktif</label>
                            <input type="email" name="email" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 focus:bg-white focus:border-secondary transition-all outline-none text-slate-700 font-medium" placeholder="Alamat email Anda">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 ml-1">Jenis Kelamin</label>
                            <div class="flex gap-4 pt-2">
                                <label class="flex-1 cursor-pointer group">
                                    <input type="radio" name="jenis_kelamin" value="L" class="hidden peer" required>
                                    <div class="p-4 border-2 border-slate-50 bg-slate-50 rounded-2xl text-center font-bold text-slate-400 peer-checked:border-secondary peer-checked:bg-secondary/5 peer-checked:text-secondary transition-all group-hover:bg-slate-100">Laki-laki</div>
                                </label>
                                <label class="flex-1 cursor-pointer group">
                                    <input type="radio" name="jenis_kelamin" value="P" class="hidden peer">
                                    <div class="p-4 border-2 border-slate-50 bg-slate-50 rounded-2xl text-center font-bold text-slate-400 peer-checked:border-secondary peer-checked:bg-secondary/5 peer-checked:text-secondary transition-all group-hover:bg-slate-100">Perempuan</div>
                                </label>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 ml-1">Kategori Usia</label>
                            <select name="usia_id" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 focus:bg-white focus:border-secondary transition-all outline-none text-slate-700 font-medium appearance-none cursor-pointer">
                                <option value="">Pilih Usia</option>
                                @foreach($usia as $u)
                                    <option value="{{ $u->id }}">{{ $u->usia }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 ml-1">Pendidikan Terakhir</label>
                            <select name="pendidikan_id" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 focus:bg-white focus:border-secondary transition-all outline-none text-slate-700 font-medium appearance-none cursor-pointer">
                                <option value="">Pilih Pendidikan</option>
                                @foreach($pendidikan as $p)
                                    <option value="{{ $p->id }}">{{ $p->pendidikan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 ml-1">Pekerjaan / Profesi</label>
                            <select name="profesi_id" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 focus:bg-white focus:border-secondary transition-all outline-none text-slate-700 font-medium appearance-none cursor-pointer">
                                <option value="">Pilih Profesi</option>
                                @foreach($profesi as $pro)
                                    <option value="{{ $pro->id }}">{{ $pro->nama_profesi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- KARTU 2: DAFTAR PERTANYAAN --}}
                <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-soft border border-slate-100" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-secondary/10 text-secondary rounded-xl flex items-center justify-center font-black">2</div>
                        <h3 class="text-xl font-extrabold text-primary">Penilaian Pelayanan</h3>
                    </div>

                    <div class="space-y-12">
                        @foreach($pertanyaan as $index => $item)
                            <div class="space-y-6">
                                <p class="text-slate-800 font-bold leading-relaxed text-lg">{{ $index + 1 }}. {{ $item->pertanyaan }}</p>
                                
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    @foreach(['Sangat Sesuai', 'Sesuai', 'Kurang Sesuai', 'Tidak Sesuai'] as $opsi)
                                        <label class="cursor-pointer group">
                                            <input type="radio" name="jawaban[{{ $item->id }}]" value="{{ $opsi }}" required class="hidden peer">
                                            <div class="px-3 py-4 border-2 border-slate-50 bg-slate-50 rounded-2xl text-center text-[10px] font-black uppercase tracking-widest text-slate-400 peer-checked:border-secondary peer-checked:bg-secondary/5 peer-checked:text-secondary transition-all group-hover:bg-slate-100">
                                                {{ $opsi }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- KARTU 3: KRITIK & SARAN --}}
                <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-soft border border-slate-100" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-secondary/10 text-secondary rounded-xl flex items-center justify-center font-black">3</div>
                        <h3 class="text-xl font-extrabold text-primary">Kritik & Saran</h3>
                    </div>

                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 ml-1">Kritik</label>
                            <textarea name="kritik" rows="4" class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 focus:bg-white focus:border-secondary transition-all outline-none text-slate-700 font-medium" placeholder="Tulis keluhan atau kekurangan pelayanan..."></textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 ml-1">Saran</label>
                            <textarea name="saran" rows="4" class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 focus:bg-white focus:border-secondary transition-all outline-none text-slate-700 font-medium" placeholder="Tulis masukan untuk kemajuan kami..."></textarea>
                        </div>
                    </div>
                </div>

                {{-- TOMBOL SUBMIT --}}
                <div class="text-center pb-10" data-aos="zoom-in">
                    <button type="submit" class="bg-gradient-to-r from-secondary to-blue-700 text-white font-black uppercase tracking-[0.2em] px-12 py-5 rounded-full shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all active:scale-95 inline-flex items-center gap-3">
                        Kirim Jawaban <i class="fas fa-paper-plane"></i>
                    </button>
                    <p class="text-slate-400 text-xs mt-6">Seluruh data yang Anda masukkan dijamin kerahasiaannya sesuai regulasi yang berlaku.</p>
                </div>

            </form>
        </div>
    </section>

    <style>
        .shadow-soft { box-shadow: 0 15px 45px -10px rgba(0, 0, 0, 0.05); }
        input[type="date"]::-webkit-calendar-picker-indicator { opacity: 0.4; cursor: pointer; }
    </style>

@endsection