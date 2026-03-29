@extends('admin.layouts.master')

{{-- Judul Halaman Dinamis --}}
@section('title', isset($user) ? 'Ubah Pengguna' : 'Tambah Pengguna')

@section('content')

    {{-- Header Halaman --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 relative z-10">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            {{ isset($user) ? 'Ubah Data User' : 'Tambah User Baru' }}
        </h2>
        <a href="{{ route('admin.pengguna.index') }}" class="bg-white text-argon-dark hover:bg-slate-50 hover:shadow-lg font-bold py-2.5 px-5 rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2 text-sm transform hover:-translate-y-0.5">
            <i class="fas fa-arrow-left text-slate-400"></i> Kembali
        </a>
    </div>

    {{-- Kartu Form --}}
    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden relative z-10 max-w-4xl">
        
        <div class="p-6 md:p-8">
            
            {{-- Notifikasi Error Validasi (Agar Anda tahu kenapa login/simpan gagal) --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl shadow-sm">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span class="font-bold">Terjadi Kesalahan!</span>
                    </div>
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="border-b border-slate-100 mb-8 pb-4">
                <h3 class="text-argon-blue font-bold text-lg flex items-center gap-2">
                    <i class="fas {{ isset($user) ? 'fa-user-edit' : 'fa-user-plus' }}"></i> 
                    Form Data Pengguna
                </h3>
            </div>

            {{-- Form Action Dinamis --}}
            <form action="{{ isset($user) ? route('admin.pengguna.update', $user->t_user_id) : route('admin.pengguna.store') }}" method="POST">
                @csrf
                
                {{-- Method PUT khusus untuk Mode Edit --}}
                @if(isset($user))
                    @method('PUT')
                @endif

                {{-- Input Username --}}
                <div class="mb-6">
                    <label for="username" class="block text-sm font-semibold text-slate-700 mb-2">
                        Username Pengguna <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                            <i class="fas fa-user text-sm"></i>
                        </span>
                        <input type="text" id="username" name="username" 
                            value="{{ old('username', $user->t_user_username ?? '') }}"
                            required
                            class="w-full pl-11 pr-4 py-3 bg-white border @error('username') border-red-500 @else border-slate-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue transition-all text-slate-700 placeholder-slate-400 shadow-sm"
                            placeholder="Masukkan Username">
                    </div>
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Password --}}
                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                        Password Pengguna 
                        @if(!isset($user)) <span class="text-red-500">*</span> @endif
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        {{-- Password hanya 'required' saat Mode Tambah --}}
                        <input type="password" id="password" name="password" 
                            {{ !isset($user) ? 'required' : '' }}
                            class="w-full pl-11 pr-4 py-3 bg-white border @error('password') border-red-500 @else border-slate-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue transition-all text-slate-700 placeholder-slate-400 shadow-sm"
                            placeholder="Masukkan Password">
                    </div>
                    @if(isset($user))
                        <p class="text-xs text-orange-500 mt-2 font-medium">
                            <i class="fas fa-info-circle"></i> Kosongkan jika tidak ingin mengubah password.
                        </p>
                    @else
                        <p class="text-xs text-slate-400 mt-2 italic">Minimal 6 karakter.</p>
                    @endif
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Select Bagian (Dinamis dari t_bagian) --}}
                <div class="mb-10">
                    <label for="bagian_id" class="block text-sm font-semibold text-slate-700 mb-2">
                        Pilih Bagian <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 pointer-events-none">
                            <i class="fas fa-building text-sm"></i>
                        </span>
                        <select id="bagian_id" name="bagian_id" required
                            class="w-full pl-11 pr-10 py-3 bg-white border @error('bagian_id') border-red-500 @else border-slate-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue transition-all text-slate-700 appearance-none shadow-sm cursor-pointer">
                            <option value="" disabled {{ !isset($user) ? 'selected' : '' }}>Pilih Bagian...</option>
                            
                            @foreach($pilihanBagian as $bagian)
                                <option value="{{ $bagian->bagian_id }}" 
                                    {{ old('bagian_id', $user->t_bagian_id ?? '') == $bagian->bagian_id ? 'selected' : '' }}>
                                    {{ $bagian->bagian_nama }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-slate-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    @error('bagian_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="flex justify-end pt-4 border-t border-slate-100 mt-4">
                    <button type="submit" class="bg-argon-blue hover:bg-argon-indigo text-white font-bold py-3 px-8 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 text-sm flex items-center gap-2 tracking-wide">
                        <i class="fas {{ isset($user) ? 'fa-save' : 'fa-check' }}"></i> 
                        {{ isset($user) ? 'Simpan Perubahan' : 'Simpan Data' }}
                    </button>
                </div>
                
            </form>
        </div>
    </div>

@endsection