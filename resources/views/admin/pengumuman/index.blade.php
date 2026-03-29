@extends('admin.layouts.master')

@section('title', 'Daftar Pengumuman')

@section('content')

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl shadow-sm flex items-center justify-between"
            x-data="{ show: true }" x-show="show">
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle text-lg"></i>
                <p class="font-bold text-sm">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="text-emerald-500 hover:text-emerald-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    {{-- Header Judul & Tombol Tambah --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 relative z-10">
        <h2 class="text-2xl font-bold text-white tracking-wide">Daftar Pengumuman</h2>
        <a href="{{ url('pangkalan/pengumuman/tambah') }}"
            class="bg-white text-argon-blue hover:bg-slate-50 hover:shadow-lg font-bold py-2.5 px-5 rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2 text-sm transform hover:-translate-y-0.5">
            <i class="fas fa-plus"></i> Tambah Pengumuman
        </a>
    </div>

    {{-- Container Utama --}}
    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden relative z-10">

        {{-- Area Filter Pencarian --}}
        <div class="p-6 border-b border-slate-100 bg-white">
            <form action="{{ url('pangkalan/pengumuman') }}" method="GET" class="flex flex-wrap gap-3 items-end w-full">

                {{-- Dropdown Jumlah Data --}}
                <div class="flex-1 min-w-[80px] max-w-[100px]">
                    <div class="text-xs text-slate-400 mb-1 font-semibold ml-1">Tampilkan</div>
                    <select name="per_page" onchange="this.form.submit()"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-3 py-2.5 focus:ring-2 focus:ring-argon-blue focus:bg-white text-slate-700 cursor-pointer">
                        <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>

                <div class="flex-1 min-w-[140px]">
                    <div class="text-xs text-slate-400 mb-1 font-semibold ml-1">Tanggal Mulai</div>
                    <input type="date" name="start_date" value="{{ request('start_date') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:ring-2 focus:ring-argon-blue focus:bg-white text-slate-500 cursor-pointer">
                </div>

                <div class="flex-1 min-w-[140px]">
                    <div class="text-xs text-slate-400 mb-1 font-semibold ml-1">Tanggal Akhir</div>
                    <input type="date" name="end_date" value="{{ request('end_date') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:ring-2 focus:ring-argon-blue focus:bg-white text-slate-500 cursor-pointer">
                </div>

                <div class="flex-1 min-w-[140px]">
                    <div class="text-xs text-slate-400 mb-1 font-semibold ml-1">Status</div>
                    <select name="status"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:ring-2 focus:ring-argon-blue focus:bg-white text-slate-500 cursor-pointer">
                        <option value="">Semua Status</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Tampil</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Sembunyi</option>
                    </select>
                </div>

                {{-- FITUR BARU: DROPDOWN BAGIAN HANYA MUNCUL JIKA DEVELOPER --}}
                @if (session('admin_bagian_id') == 0)
                    <div class="flex-1 min-w-[150px]">
                        <div class="text-xs text-slate-400 mb-1 font-semibold ml-1">Bagian</div>
                        <select name="bagian"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:ring-2 focus:ring-argon-blue focus:bg-white text-slate-500 cursor-pointer">
                            <option value="">Semua Bagian</option>
                            @foreach ($pilihanBagian as $bgn)
                                <option value="{{ $bgn->bagian_id }}"
                                    {{ request('bagian') == $bgn->bagian_id ? 'selected' : '' }}>
                                    {{ $bgn->bagian_nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="flex-[2] min-w-[200px]">
                    <div class="text-xs text-slate-400 mb-1 font-semibold ml-1">Pencarian Judul</div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:ring-2 focus:ring-argon-blue focus:bg-white text-slate-700"
                        placeholder="Cari Judul...">
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="bg-argon-blue hover:bg-argon-indigo text-white px-6 py-2.5 rounded-lg transition-colors shadow-sm font-bold flex items-center gap-2">
                        <i class="fas fa-filter text-sm"></i> Filter
                    </button>

                    {{-- Tombol Reset Filter jika ada parameter yang aktif --}}
                    @if (request()->anyFilled(['search', 'start_date', 'end_date', 'status', 'bagian']) || request('per_page') != 10)
                        <a href="{{ url('pangkalan/pengumuman') }}"
                            class="bg-slate-200 hover:bg-slate-300 text-slate-600 px-4 py-2.5 rounded-lg transition-colors shadow-sm flex items-center justify-center"
                            title="Reset Filter">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Tabel Data --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-bold w-12 text-center">No</th>
                        <th class="px-6 py-4 font-bold">Judul</th>
                        <th class="px-6 py-4 font-bold">Bagian</th>
                        <th class="px-6 py-4 font-bold text-center">Status</th>
                        <th class="px-6 py-4 font-bold">Tanggal Pengumuman</th>
                        <th class="px-6 py-4 font-bold text-center w-24">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-slate-600 text-sm divide-y divide-slate-100">

                    @forelse($pengumuman as $key => $item)
                        <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                            {{-- No --}}
                            <td class="px-6 py-4 text-center font-medium text-slate-400">
                                {{ $pengumuman->firstItem() + $key }}
                            </td>

                            {{-- Judul --}}
                            <td class="px-6 py-4 text-argon-dark font-medium whitespace-normal max-w-xs leading-snug">
                                {{ $item->info_judul }}
                            </td>

                            {{-- Bagian --}}
                            <td class="px-6 py-4 text-slate-500 whitespace-normal max-w-[200px]">
                                {{ $item->bagian_nama ?? 'Umum' }}
                            </td>

                            {{-- Status Tampil/Sembunyi --}}
                            <td class="px-6 py-4 text-center">
                                @if ($item->info_status == 0)
                                    <span
                                        class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                        Tampil
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-red-500 text-white shadow-sm">
                                        Sembunyi
                                    </span>
                                @endif
                            </td>

                            {{-- Tanggal --}}
                            <td class="px-6 py-4 text-slate-500">
                                {{ \Carbon\Carbon::parse($item->info_tanggal)->translatedFormat('d F Y') }}
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.pengumuman.edit', $item->info_id) }}"
                                        class="w-8 h-8 rounded bg-orange-400 hover:bg-orange-500 text-white flex items-center justify-center transition-colors shadow-sm"
                                        title="Edit">
                                        <i class="fas fa-pen text-xs"></i>
                                    </a>

                                    <form action="{{ route('admin.pengumuman.disable', $item->info_id)}}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin mengubah status Pengumuman ini?');">
                                        @csrf
                                        <button type="submit"
                                            class="w-8 h-8 rounded {{ $item->info_status == 0 ? 'bg-red-400 hover:bg-red-500' : 'bg-emerald-400 hover:bg-emerald-500' }} text-white flex items-center justify-center transition-colors shadow-sm"
                                            title="{{ $item->info_status == 0 ? 'Sembunyikan' : 'Tampilkan' }}">
                                            <i
                                                class="fas {{ $item->info_status == 0 ? 'fa-eye-slash' : 'fa-eye' }} text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                <i class="fas fa-bullhorn text-4xl mb-3 opacity-50"></i>
                                <p class="text-sm">
                                    @if (request()->anyFilled(['search', 'start_date', 'end_date', 'status', 'bagian']))
                                        Pengumuman dengan filter tersebut tidak ditemukan.
                                    @else
                                        Belum ada data pengumuman yang tersedia.
                                    @endif
                                </p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- PAGINATION DINAMIS LARAVEL --}}
        @if ($pengumuman->hasPages())
            <div
                class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-slate-500 font-medium">
                    Menampilkan {{ $pengumuman->firstItem() ?? 0 }} - {{ $pengumuman->lastItem() ?? 0 }} dari total
                    {{ $pengumuman->total() }} data
                </div>
                <div>
                    {{ $pengumuman->links('pagination::tailwind') }}
                </div>
            </div>
        @endif

    </div>

@endsection