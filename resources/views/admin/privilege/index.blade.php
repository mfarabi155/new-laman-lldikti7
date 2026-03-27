@extends('admin.layouts.master')
@section('title', 'Manajemen Hak Akses')

@section('content')
<div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-6 md:p-8">
    <div class="flex items-center mb-6 border-b border-slate-100 pb-4">
        <h3 class="text-argon-dark font-bold text-lg"><i class="fas fa-user-shield text-argon-blue mr-2"></i> Manajemen Hak Akses Pengguna</h3>
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
                    <th class="px-4 py-3">Nama Pengguna / Username</th>
                    <th class="px-4 py-3 text-center w-32">Kelola Akses</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($users as $u)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                    
                    {{-- SESUAIKAN 'name' DENGAN KOLOM NAMA DI TABEL USER ANDA --}}
                    <td class="px-4 py-3 font-semibold text-argon-dark">{{ $u->t_user_username ?? $u->username ?? 'User ID: ' . $u->t_user_id }}</td>
                    
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('admin.privilege.edit', $u->t_user_id) }}" class="inline-flex items-center gap-2 bg-argon-blue hover:bg-argon-indigo text-white px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                            <i class="fas fa-key"></i> Atur Akses
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection