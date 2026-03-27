@extends('admin.layouts.master')
@section('title', 'Manajemen Menu')

@section('content')
<div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-6 md:p-8">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-slate-100 pb-4">
        <h3 class="text-argon-dark font-bold text-lg"><i class="fas fa-list text-argon-blue mr-2"></i> Daftar Menu Sistem</h3>
        <a href="{{ route('admin.menu.create') }}" class="bg-argon-blue hover:bg-argon-indigo text-white px-5 py-2 rounded-lg text-sm font-bold shadow-sm transition">
            <i class="fas fa-plus mr-1"></i> Tambah Menu Baru
        </a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-slate-500 font-bold uppercase text-[11px] tracking-wider border-y border-slate-200">
                <tr>
                    <th class="px-4 py-3 text-center w-12">No</th>
                    <th class="px-4 py-3">Ikon & Nama Menu</th>
                    <th class="px-4 py-3">Tipe / Parent</th>
                    <th class="px-4 py-3">Route / Link</th>
                    <th class="px-4 py-3 text-center">Urutan</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($menus as $menu)
                <tr class="hover:bg-slate-50 transition {{ $menu->menu_type == 0 ? 'bg-slate-50/50 font-semibold' : '' }}">
                    <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <i class="{{ $menu->menu_icon }} w-4 text-center text-lg"></i>
                            <span class="{{ $menu->menu_type == 0 ? 'text-argon-blue font-bold' : '' }}">
                                {{ $menu->menu_type == 1 ? '— ' : '' }}{{ $menu->menu_nama }}
                            </span>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        @if($menu->menu_type == 0)
                            <span class="bg-indigo-100 text-indigo-700 px-2 py-1 rounded text-[10px] font-bold">Grup Parent</span>
                        @else
                            <span class="text-xs text-slate-500">Child dari: <b>{{ $menu->parentMenu->menu_nama ?? '-' }}</b></span>
                        @endif
                    </td>
                    <td class="px-4 py-3 font-mono text-xs text-slate-500">{{ $menu->menu_link }}</td>
                    <td class="px-4 py-3 text-center font-bold">{{ $menu->menu_index }}</td>
                    <td class="px-4 py-3 text-center">
                        @if($menu->menu_status_aktif == 0)
                            <span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-full text-[10px] font-bold">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-[10px] font-bold">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('admin.menu.edit', $menu->menu_id) }}" class="text-argon-blue hover:text-argon-indigo bg-blue-50 p-2 rounded-lg transition" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.menu.destroy', $menu->menu_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus menu ini? Jika ini Parent, semua Child-nya juga akan terhapus!');">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 p-2 rounded-lg transition" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection