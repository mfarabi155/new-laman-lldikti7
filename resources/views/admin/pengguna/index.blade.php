@extends('admin.layouts.master')

@section('title', 'Daftar Pengguna')

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

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 relative z-10">
        <h2 class="text-2xl font-bold text-white tracking-wide">Daftar Pengguna</h2>
        <a href="{{ url('pangkalan/pengguna/tambah') }}"
            class="bg-white text-argon-blue hover:bg-slate-50 hover:shadow-lg font-bold py-2.5 px-5 rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2 text-sm transform hover:-translate-y-0.5">
            <i class="fas fa-plus"></i> Tambah Pengguna
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden relative z-10">

        {{-- AREA FORM FILTER & PENCARIAN --}}
        <div class="p-6 border-b border-slate-100 bg-white">
            <form action="{{ url('pangkalan/pengguna') }}" method="GET"
                class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-4 w-full">

                {{-- Dropdown Pilihan Jumlah Data (Show Entries) --}}
                <div class="flex items-center gap-2 w-full xl:w-auto">
                    <span class="text-sm text-slate-500 font-medium">Tampilkan</span>
                    <select name="per_page" onchange="this.form.submit()"
                        class="bg-slate-50 border border-slate-200 rounded-lg text-sm px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-argon-blue text-slate-700 cursor-pointer font-medium shadow-sm">
                        <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-slate-500 font-medium">Data</span>
                </div>

                {{-- Filter Bagian & Pencarian Username --}}
                <div class="flex flex-col md:flex-row gap-3 w-full xl:w-auto">

                    {{-- Dropdown Filter Bagian --}}
                    <select name="bagian_id" onchange="this.form.submit()"
                        class="bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-argon-blue text-slate-700 cursor-pointer shadow-sm w-full md:w-56">
                        <option value="">-- Semua Bagian --</option>
                        @foreach ($pilihanBagian as $bagian)
                            <option value="{{ $bagian->bagian_id }}"
                                {{ request('bagian_id') == $bagian->bagian_id ? 'selected' : '' }}>
                                {{ $bagian->bagian_nama }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Kolom Pencarian Username --}}
                    <div class="flex gap-2 w-full md:w-64">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-argon-blue transition-all text-slate-700 shadow-sm"
                            placeholder="Cari Username...">
                        <button type="submit"
                            class="bg-argon-blue hover:bg-argon-indigo text-white px-4 py-2.5 rounded-lg transition-colors shadow-sm flex-shrink-0"
                            title="Cari">
                            <i class="fas fa-search"></i>
                        </button>

                        {{-- Tombol Reset Filter (Muncu jika ada pencarian/filter aktif) --}}
                        @if (request('search') || request('bagian_id'))
                            <a href="{{ url('pangkalan/pengguna') }}"
                                class="bg-slate-200 hover:bg-slate-300 text-slate-600 px-4 py-2.5 rounded-lg transition-colors shadow-sm flex-shrink-0 flex items-center justify-center"
                                title="Reset Filter">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        @endif
                    </div>
                </div>

            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-bold w-12 text-center">No</th>
                        <th class="px-6 py-4 font-bold">Username</th>
                        <th class="px-6 py-4 font-bold">Bagian</th>
                        <th class="px-6 py-4 font-bold">Last Login</th>
                        <th class="px-6 py-4 font-bold text-center">Is Login</th>
                        <th class="px-6 py-4 font-bold text-center">Status</th>
                        <th class="px-6 py-4 font-bold">Created Date</th>
                        <th class="px-6 py-4 font-bold text-center w-24">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-slate-600 text-sm divide-y divide-slate-100">

                    @forelse($pengguna as $key => $user)
                        <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                            {{-- Nomor Urut Dinamis (Berdasarkan Halaman) --}}
                            <td class="px-6 py-4 text-center font-medium text-slate-400">
                                {{ $pengguna->firstItem() + $key }}
                            </td>

                            {{-- Username --}}
                            <td class="px-6 py-4 font-bold text-argon-dark">
                                {{ $user->t_user_username }}
                            </td>

                            {{-- Nama Bagian --}}
                            <td class="px-6 py-4 text-slate-500">
                                {{ $user->bagian_nama ?? 'Tidak Ada Bagian' }}
                            </td>

                            {{-- Last Login --}}
                            <td class="px-6 py-4 text-xs text-slate-500">
                                @if ($user->t_user_last_login)
                                    {{ \Carbon\Carbon::parse($user->t_user_last_login)->format('Y-m-d') }} <br>
                                    <span
                                        class="text-slate-400">{{ \Carbon\Carbon::parse($user->t_user_last_login)->format('H:i:s') }}</span>
                                @else
                                    <span class="italic text-slate-400">Belum pernah</span>
                                @endif
                            </td>

                            {{-- Badge Is Login --}}
                            <td class="px-6 py-4 text-center">
                                @if ($user->t_user_islogin == 1)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">Online</span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-slate-300 text-slate-600 shadow-sm">Offline</span>
                                @endif
                            </td>

                            {{-- Badge Status Aktif/Nonaktif --}}
                            <td class="px-6 py-4 text-center">
                                @if ($user->t_user_status == 1)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">Active</span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500 text-white shadow-sm">Inactive</span>
                                @endif
                            </td>

                            {{-- Created Date --}}
                            <td class="px-6 py-4 text-xs text-slate-500">
                                @if ($user->t_user_created_date)
                                    {{ \Carbon\Carbon::parse($user->t_user_created_date)->format('Y-m-d') }}
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Tombol Aksi --}}
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ url('pangkalan/pengguna/' . $user->t_user_id . '/edit') }}"
                                        class="w-8 h-8 rounded bg-orange-400 hover:bg-orange-500 text-white flex items-center justify-center transition-colors shadow-sm"
                                        title="Edit">
                                        <i class="fas fa-pen text-xs"></i>
                                    </a>

                                    <form action="{{ url('pangkalan/pengguna/' . $user->t_user_id . '/disable') }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin mengubah status pengguna ini?');">
                                        @csrf
                                        <button type="submit"
                                            class="w-8 h-8 rounded {{ $user->t_user_status == 1 ? 'bg-red-400 hover:bg-red-500' : 'bg-emerald-400 hover:bg-emerald-500' }} text-white flex items-center justify-center transition-colors shadow-sm"
                                            title="{{ $user->t_user_status == 1 ? 'Nonaktifkan' : 'Aktifkan' }}">
                                            <i
                                                class="fas {{ $user->t_user_status == 1 ? 'fa-eye-slash' : 'fa-eye' }} text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-slate-400">
                                <i class="fas fa-inbox text-4xl mb-3 opacity-50"></i>
                                <p class="text-sm">
                                    @if (request('search'))
                                        Pencarian <b>"{{ request('search') }}"</b> tidak ditemukan.
                                    @else
                                        Belum ada data pengguna yang terdaftar.
                                    @endif
                                </p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- PAGINATION DINAMIS LARAVEL --}}
        @if ($pengguna->hasPages())
            <div
                class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-slate-500 font-medium">
                    Menampilkan {{ $pengguna->firstItem() ?? 0 }} - {{ $pengguna->lastItem() ?? 0 }} dari total
                    {{ $pengguna->total() }} data
                </div>
                <div>
                    {{ $pengguna->links('pagination::tailwind') }}
                </div>
            </div>
        @endif

    </div>

@endsection
