@extends('admin.layouts.master') 

@section('title', 'Detail Responden IKM')

@section('content')
{{-- HEADER SECTION SEDERHANA --}}
<div class="bg-primary pt-12 pb-24 px-4 -mt-4 mb-4">
    <div class="container mx-auto">
        <nav class="flex text-white/70 text-sm mb-4 font-medium">
            <ol class="flex items-center space-x-2">
                <li><a href="#" class="hover:text-white transition">Halaman</a></li>
                <li><i class="fas fa-chevron-right text-[10px] mx-2 opacity-50"></i></li>
                <li><a href="{{ route('admin.ikm.index') }}" class="hover:text-white transition">Data Responden</a></li>
                <li><i class="fas fa-chevron-right text-[10px] mx-2 opacity-50"></i></li>
                <li class="text-white">Detail Survei</li>
            </ol>
        </nav>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                {{-- Tombol Kembali --}}
                <a href="{{ route('admin.ikm.index') }}" class="bg-white/20 hover:bg-white/30 text-white w-10 h-10 rounded-full flex items-center justify-center transition shadow-sm border border-white/10">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight">
                        Detail Hasil Survei
                    </h1>
                    <p class="text-white/80 mt-1 text-sm">
                        Menampilkan rincian data responden dan jawaban kuesioner.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 -mt-16 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Kolom Kiri: Profil Responden --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-6">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3 mb-4 flex items-center gap-2">
                    <i class="fas fa-user-shield text-primary"></i> Profil Responden
                </h3>
                
                <div class="space-y-4 text-sm">
                    @php
                        // Logika Masking Nama
                        $nama = $responden->nama;
                        $maskedNama = substr($nama, 0, 1) . str_repeat('*', strlen($nama) - 1);

                        // Logika Masking Email (Contoh: m*******@gmail.com)
                        $email = $responden->email;
                        $emailParts = explode('@', $email);
                        if(count($emailParts) == 2) {
                            $maskedEmail = substr($emailParts[0], 0, 1) . str_repeat('*', strlen($emailParts[0]) - 1) . '@' . $emailParts[1];
                        } else {
                            $maskedEmail = '***@***.***';
                        }
                    @endphp

                    <div>
                        <p class="text-slate-400 text-[10px] uppercase font-bold tracking-widest mb-1">Nama Lengkap</p>
                        <p class="font-bold text-slate-700 text-lg tracking-tight">{{ $maskedNama }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] uppercase font-bold tracking-widest mb-1">Email</p>
                        <p class="font-medium text-slate-600 italic">{{ $maskedEmail }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-slate-400 text-[10px] uppercase font-bold tracking-widest mb-1">Jenis Kelamin</p>
                            <span class="inline-block px-2.5 py-1 rounded-lg text-[10px] font-black uppercase tracking-tighter {{ $responden->jenis_kelamin == 'L' ? 'bg-blue-50 text-blue-600 border border-blue-100' : 'bg-pink-50 text-pink-600 border border-pink-100' }}">
                                {{ $responden->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </span>
                        </div>
                        <div>
                            <p class="text-slate-400 text-[10px] uppercase font-bold tracking-widest mb-1">Usia</p>
                            <p class="font-bold text-slate-700">{{ $responden->usia->usia ?? '-' }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] uppercase font-bold tracking-widest mb-1">Profesi</p>
                        <p class="font-bold text-slate-700">{{ $responden->profesi->nama_profesi ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] uppercase font-bold tracking-widest mb-1">Waktu Pengisian</p>
                        <p class="font-medium text-slate-500 text-xs flex items-center gap-1">
                            <i class="far fa-calendar-alt opacity-50"></i>
                            {{ \Carbon\Carbon::parse($responden->created_at)->translatedFormat('l, d F Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Kotak Kritik & Saran --}}
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl shadow-xl p-6 text-white border border-slate-700">
                <h3 class="text-lg font-bold border-b border-slate-700 pb-3 mb-4 flex items-center gap-2">
                    <i class="fas fa-comment-dots text-accent"></i> Kritik & Saran
                </h3>
                <div class="space-y-5">
                    <div>
                        <p class="text-slate-400 text-[10px] uppercase font-bold mb-2">Kritik</p>
                        <div class="bg-slate-800/50 p-3 rounded-xl border border-slate-700 text-sm leading-relaxed text-slate-300 italic">
                            "{{ $responden->kritik ?: 'Tidak ada kritik.' }}"
                        </div>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] uppercase font-bold mb-2">Saran</p>
                        <div class="bg-slate-800/50 p-3 rounded-xl border border-slate-700 text-sm leading-relaxed text-slate-300 italic">
                            "{{ $responden->saran ?: 'Tidak ada saran.' }}"
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Rincian Jawaban --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <i class="fas fa-list-ul text-primary"></i> Rincian Jawaban Kuesioner
                    </h3>
                    <span class="bg-primary/10 text-primary text-[10px] font-black uppercase px-4 py-1.5 rounded-full border border-primary/20">
                        Total: {{ $jawaban->count() }} Poin
                    </span>
                </div>
                
                <div class="divide-y divide-slate-100">
                    @forelse($jawaban as $index => $item)
                        <div class="p-6 hover:bg-slate-50 transition-colors flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
                            <div class="flex gap-4 items-start flex-1">
                                <div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-400 flex items-center justify-center font-black text-xs shrink-0 border border-slate-200">
                                    {{ $index + 1 }}
                                </div>
                                <p class="text-slate-700 text-sm font-medium leading-relaxed">
                                    {{ $item->pertanyaan->pertanyaan ?? 'Pertanyaan tidak ditemukan' }}
                                </p>
                            </div>
                            
                            <div class="shrink-0 md:w-44">
                                @php
                                    $warnaBadge = 'bg-slate-50 text-slate-500 border-slate-200';
                                    $jawabanLower = strtolower($item->jawaban);
                                    
                                    if(str_contains($jawabanLower, 'sangat sesuai') || str_contains($jawabanLower, 'sangat baik')) {
                                        $warnaBadge = 'bg-green-50 text-green-700 border-green-200';
                                    } elseif(str_contains($jawabanLower, 'sesuai') || str_contains($jawabanLower, 'baik')) {
                                        $warnaBadge = 'bg-blue-50 text-blue-700 border-blue-200';
                                    } elseif(str_contains($jawabanLower, 'kurang')) {
                                        $warnaBadge = 'bg-amber-50 text-amber-700 border-amber-200';
                                    } elseif(str_contains($jawabanLower, 'tidak')) {
                                        $warnaBadge = 'bg-red-50 text-red-700 border-red-200';
                                    }
                                @endphp
                                <span class="inline-block {{ $warnaBadge }} text-[10px] font-black uppercase px-3 py-2 rounded-xl text-center w-full border shadow-sm tracking-tighter">
                                    {{ $item->jawaban }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center text-slate-400 italic">
                            Data jawaban tidak ditemukan.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
@endsection