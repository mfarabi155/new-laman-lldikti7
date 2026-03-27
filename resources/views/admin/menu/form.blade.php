@extends('admin.layouts.master')
@section('title', isset($menu) ? 'Edit Menu' : 'Tambah Menu')

@section('content')
<div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-6 md:p-8 max-w-4xl mx-auto">
    
    <div class="border-b border-slate-100 mb-6 pb-4">
        <h3 class="text-argon-dark font-bold text-lg">
            <i class="fas {{ isset($menu) ? 'fa-edit text-orange-500' : 'fa-plus text-argon-blue' }} mr-2"></i> 
            {{ isset($menu) ? 'Form Edit Menu' : 'Form Menu Baru' }}
        </h3>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl shadow-sm text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    {{-- State Alpine.js untuk tipe menu --}}
    <form action="{{ isset($menu) ? route('admin.menu.update', $menu->menu_id) : route('admin.menu.store') }}" method="POST"
          x-data="{ menuType: '{{ old('menu_type', $menu->menu_type ?? '1') }}' }">
        @csrf
        @if(isset($menu)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-2">Nama Menu <span class="text-red-500">*</span></label>
                <input type="text" name="menu_nama" required value="{{ old('menu_nama', $menu->menu_nama ?? '') }}" placeholder="Contoh: Berita, Pengumuman, dll"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-argon-blue outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Tipe Menu <span class="text-red-500">*</span></label>
                <select name="menu_type" x-model="menuType" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-argon-blue outline-none">
                    <option value="1">Menu Child (Sub Menu)</option>
                    <option value="0">Grup Parent (Header Utama)</option>
                </select>
            </div>

            {{-- Kolom Parent hanya muncul jika Tipe Menu = 1 (Child) --}}
            <div x-show="menuType == '1'" x-transition>
                <label class="block text-sm font-semibold mb-2">Pilih Parent (Grup) <span class="text-red-500">*</span></label>
                <select name="menu_parent" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-argon-blue outline-none">
                    <option value="">-- Pilih Grup Parent --</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->menu_id }}" {{ old('menu_parent', $menu->menu_parent ?? '') == $parent->menu_id ? 'selected' : '' }}>
                            {{ $parent->menu_nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Route / Link <span class="text-red-500">*</span></label>
                <input type="text" name="menu_link" required value="{{ old('menu_link', $menu->menu_link ?? '') }}" placeholder="Contoh: admin.berita.index atau #"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-argon-blue outline-none font-mono text-sm">
                <p class="text-[10px] text-slate-400 mt-1">Gunakan <b>#</b> jika ini adalah Grup Parent.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Class Ikon (FontAwesome)</label>
                <input type="text" name="menu_icon" value="{{ old('menu_icon', $menu->menu_icon ?? '') }}" placeholder="Contoh: fas fa-bullhorn text-indigo-500"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-argon-blue outline-none font-mono text-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Urutan Tampil (Index) <span class="text-red-500">*</span></label>
                <input type="number" name="menu_index" required value="{{ old('menu_index', $menu->menu_index ?? '1') }}" min="1"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-argon-blue outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Status Aktif</label>
                <select name="menu_status_aktif" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-argon-blue outline-none">
                    <option value="0" {{ old('menu_status_aktif', $menu->menu_status_aktif ?? '0') == '0' ? 'selected' : '' }}>Aktif (Ditampilkan)</option>
                    <option value="1" {{ old('menu_status_aktif', $menu->menu_status_aktif ?? '') == '1' ? 'selected' : '' }}>Tidak Aktif (Disembunyikan)</option>
                </select>
            </div>

        </div>

        <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-slate-100">
            <a href="{{ route('admin.menu.index') }}" class="px-6 py-2 bg-slate-200 text-slate-700 font-bold rounded-lg hover:bg-slate-300 transition">Batal</a>
            <button type="submit" class="px-6 py-2 bg-argon-blue text-white font-bold rounded-lg hover:bg-argon-indigo transition shadow-md">Simpan Menu</button>
        </div>
    </form>
</div>
@endsection