@extends('admin.layouts.master')

@section('title', isset($user) ? 'Ubah Pengguna' : 'Tambah Pengguna')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 relative z-10">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            {{ isset($user) ? 'Ubah Data User' : 'Tambah User Baru' }}
        </h2>
        <a href="{{ url('/admin/pengguna') }}"
            class="bg-white text-argon-dark hover:bg-slate-50 hover:shadow-lg font-bold py-2.5 px-5 rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2 text-sm transform hover:-translate-y-0.5">
            <i class="fas fa-arrow-left text-slate-400"></i> Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden relative z-10 max-w-4xl">

        <div class="p-6 md:p-8">
            <div class="border-b border-slate-100 mb-8 pb-4">
                <h3 class="text-argon-blue font-bold text-lg flex items-center gap-2">
                    <i class="fas {{ isset($user) ? 'fa-user-edit' : 'fa-user-plus' }}"></i>
                    Form User
                </h3>
            </div>

            <form action="{{ isset($user) ? url('/admin/pengguna/' . $user->id) : url('/admin/pengguna') }}" method="POST">
                @csrf

                @if (isset($user))
                    @method('PUT')
                @endif

                <div class="mb-6">
                    <label for="username" class="block text-sm font-semibold text-slate-700 mb-2">
                        Username Pengguna <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                            <i class="fas fa-user text-sm"></i>
                        </span>
                        <input type="text" id="username" name="username" required
                            value="{{ old('username', $user->username ?? '') }}"
                            class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue transition-all text-slate-700 placeholder-slate-400 shadow-sm"
                            placeholder="Masukkan Username">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                        Password Pengguna {!! !isset($user) ? '<span class="text-red-500">*</span>' : '' !!}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input type="password" id="password" name="password" {{ !isset($user) ? 'required' : '' }}
                            class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue transition-all text-slate-700 placeholder-slate-400 shadow-sm"
                            placeholder="Masukkan Password">
                    </div>
                    @if (isset($user))
                        <p class="text-xs text-orange-500 mt-2 font-medium"><i class="fas fa-info-circle"></i> Kosongkan
                            jika tidak ingin mengubah password.</p>
                    @endif
                </div>

                <div class="mb-10">
                    <label for="bagian" class="block text-sm font-semibold text-slate-700 mb-2">
                        Pilih Bagian <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 pointer-events-none">
                            <i class="fas fa-building text-sm"></i>
                        </span>
                        <select id="bagian_id" name="bagian_id" required
                            class="w-full pl-11 pr-10 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue transition-all text-slate-700 appearance-none shadow-sm cursor-pointer">
                            <option value="" disabled {{ !isset($user) ? 'selected' : '' }}>Pilih Bagian...</option>

                            @php
                                // Ambil data bagian lama saat edit
                                $currentBagianId = old('bagian_id', $user->t_bagian_id ?? '');
                            @endphp

                            @foreach ($pilihanBagian as $bagian)
                                <option value="{{ $bagian->bagian_id }}"
                                    {{ $currentBagianId == $bagian->bagian_id ? 'selected' : '' }}>
                                    {{ $bagian->bagian_nama }}
                                </option>
                            @endforeach

                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-slate-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-4 border-t border-slate-100 mt-4">
                    <button type="submit"
                        class="bg-argon-blue hover:bg-argon-indigo text-white font-bold py-3 px-8 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 text-sm flex items-center gap-2 tracking-wide">
                        <i class="fas {{ isset($user) ? 'fa-save' : 'fa-check' }}"></i>
                        {{ isset($user) ? 'Simpan Perubahan' : 'Simpan Data' }}
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
