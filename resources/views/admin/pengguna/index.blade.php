@extends('admin.layouts.master')

@section('title', 'Daftar Pengguna')

@section('content')

    {{-- Notifikasi Sukses (Muncul saat berhasil tambah/edit/nonaktif) --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl shadow-sm flex items-center justify-between" x-data="{ show: true }" x-show="show">
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
        <a href="{{ url('k0p3rt1s4dm1n/pengguna/tambah') }}" class="bg-white text-argon-blue hover:bg-slate-50 hover:shadow-lg font-bold py-2.5 px-5 rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2 text-sm transform hover:-translate-y-0.5">
            <i class="fas fa-plus"></i> Tambah Pengguna
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden relative z-10">
        
        <div class="p-6 border-b border-slate-100 bg-white">
            <form action="{{ url('k0p3rt1s4dm1n/pengguna') }}" method="GET" class="flex gap-2 w-full md:w-1/3 lg:w-1/4">
                <input type="text" name="search" value="{{ request('search') }}" class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-argon-blue focus:bg-white transition-all text-slate-700" placeholder="Cari Username...">
                <button type="submit" class="bg-argon-blue hover:bg-argon-indigo text-white px-4 py-2.5 rounded-lg transition-colors shadow-sm flex-shrink-0">
                    <i class="fas fa-search"></i>
                </button>
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
                    
                    {{-- LOOPING DATA DARI DATABASE --}}
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
                            
                            {{-- Nama Bagian (Dari Join t_bagian) --}}
                            <td class="px-6 py-4 text-slate-500">
                                {{ $user->bagian_nama ?? 'Tidak Ada Bagian' }}
                            </td>
                            
                            {{-- Last Login --}}
                            <td class="px-6 py-4 text-xs text-slate-500">
                                @if($user->t_user_last_login)
                                    {{ \Carbon\Carbon::parse($user->t_user_last_login)->format('Y-m-d') }} <br>
                                    <span class="text-slate-400">{{ \Carbon\Carbon::parse($user->t_user_last_login)->format('H:i:s') }}</span>
                                @else
                                    <span class="italic text-slate-400">Belum pernah</span>
                                @endif
                            </td>
                            
                            {{-- Badge Is Login --}}
                            <td class="px-6 py-4 text-center">
                                @if($user->t_user_islogin == 1)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">Online</span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-slate-300 text-slate-600 shadow-sm">Offline</span>
                                @endif
                            </td>
                            
                            {{-- Badge Status Aktif/Nonaktif --}}
                            <td class="px-6 py-4 text-center">
                                @if($user->t_user_status == 1)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">Active</span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500 text-white shadow-sm">Inactive</span>
                                @endif
                            </td>
                            
                            {{-- Created Date --}}
                            <td class="px-6 py-4 text-xs text-slate-500">
                                @if($user->t_user_created_date)
                                    {{ \Carbon\Carbon::parse($user->t_user_created_date)->format('Y-m-d') }}
                                @else
                                    -
                                @endif
                            </td>
                            
                            {{-- Tombol Aksi --}}
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ url('k0p3rt1s4dm1n/pengguna/' . $user->t_user_id . '/edit') }}" class="w-8 h-8 rounded bg-orange-400 hover:bg-orange-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Edit">
                                        <i class="fas fa-pen text-xs"></i>
                                    </a>
                                    
                                    {{-- Tombol Toggle Disable/Enable (Menggunakan Form karena merubah data) --}}
                                    <form action="{{ url('k0p3rt1s4dm1n/pengguna/' . $user->t_user_id . '/disable') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status pengguna ini?');">
                                        @csrf
                                        <button type="submit" class="w-8 h-8 rounded {{ $user->t_user_status == 1 ? 'bg-red-400 hover:bg-red-500' : 'bg-emerald-400 hover:bg-emerald-500' }} text-white flex items-center justify-center transition-colors shadow-sm" title="{{ $user->t_user_status == 1 ? 'Nonaktifkan' : 'Aktifkan' }}">
                                            <i class="fas {{ $user->t_user_status == 1 ? 'fa-eye-slash' : 'fa-eye' }} text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        {{-- Tampilan jika data kosong --}}
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-slate-400">
                                <i class="fas fa-inbox text-4xl mb-3 opacity-50"></i>
                                <p class="text-sm">Belum ada data pengguna yang terdaftar.</p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- PAGINATION DINAMIS LARAVEL --}}
        <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
            {{ $pengguna->links('pagination::tailwind') }}
        </div>

    </div>

@endsection