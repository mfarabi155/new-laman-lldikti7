@extends('admin.layouts.master')

@section('title', 'Daftar Pengguna')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 relative z-10">
        <h2 class="text-2xl font-bold text-white tracking-wide">Daftar Pengguna</h2>
        <a href="#" class="bg-white text-argon-blue hover:bg-slate-50 hover:shadow-lg font-bold py-2.5 px-5 rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2 text-sm transform hover:-translate-y-0.5">
            <i class="fas fa-plus"></i> Tambah Pengguna
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden relative z-10">
        
        <div class="p-6 border-b border-slate-100 bg-white">
            <form action="#" method="GET" class="flex gap-2 w-full md:w-1/3 lg:w-1/4">
                <input type="text" name="search" class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-argon-blue focus:bg-white transition-all text-slate-700" placeholder="Cari Username...">
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
                    
                    <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                        <td class="px-6 py-4 text-center font-medium text-slate-400">1</td>
                        <td class="px-6 py-4 font-bold text-argon-dark">kemahasiswaan</td>
                        <td class="px-6 py-4 text-slate-500">Tim Kerja Kemahasiswaan</td>
                        <td class="px-6 py-4 text-xs text-slate-500">2025-12-06<br>11:09:24</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Online
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-400"></td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button class="w-8 h-8 rounded bg-orange-400 hover:bg-orange-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Edit">
                                    <i class="fas fa-pen text-xs"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-red-400 hover:bg-red-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Nonaktifkan">
                                    <i class="fas fa-eye-slash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                        <td class="px-6 py-4 text-center font-medium text-slate-400">2</td>
                        <td class="px-6 py-4 font-bold text-argon-dark">kopwiel_admin</td>
                        <td class="px-6 py-4 text-slate-500">Urusan Humas Dan Protokoler</td>
                        <td class="px-6 py-4 text-xs text-slate-500">2026-03-04<br>14:19:58</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Online
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-500">2021-07-21<br>09:24:39</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button class="w-8 h-8 rounded bg-orange-400 hover:bg-orange-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Edit">
                                    <i class="fas fa-pen text-xs"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-red-400 hover:bg-red-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Nonaktifkan">
                                    <i class="fas fa-eye-slash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                        <td class="px-6 py-4 text-center font-medium text-slate-400">3</td>
                        <td class="px-6 py-4 font-bold text-argon-dark">ll7-hkt</td>
                        <td class="px-6 py-4 text-slate-500">Urusan Hukum, Kepegawaian, Tata Laksana</td>
                        <td class="px-6 py-4 text-xs text-slate-500">2025-09-24<br>10:46:42</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Online
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-400"></td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button class="w-8 h-8 rounded bg-orange-400 hover:bg-orange-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Edit">
                                    <i class="fas fa-pen text-xs"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-red-400 hover:bg-red-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Nonaktifkan">
                                    <i class="fas fa-eye-slash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                        <td class="px-6 py-4 text-center font-medium text-slate-400">4</td>
                        <td class="px-6 py-4 font-bold text-argon-dark">akademik</td>
                        <td class="px-6 py-4 text-slate-500">Tim Kerja Akademik dan Risbang</td>
                        <td class="px-6 py-4 text-xs text-slate-500">2025-12-29<br>15:38:13</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Online
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-400"></td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button class="w-8 h-8 rounded bg-orange-400 hover:bg-orange-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Edit">
                                    <i class="fas fa-pen text-xs"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-red-400 hover:bg-red-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Nonaktifkan">
                                    <i class="fas fa-eye-slash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                        <td class="px-6 py-4 text-center font-medium text-slate-400">5</td>
                        <td class="px-6 py-4 font-bold text-argon-dark">kelembagaan</td>
                        <td class="px-6 py-4 text-slate-500">Tim Kerja Kelembagaan</td>
                        <td class="px-6 py-4 text-xs text-slate-500">2022-09-21<br>09:39:02</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500 text-white shadow-sm">
                                Offline
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-400"></td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button class="w-8 h-8 rounded bg-orange-400 hover:bg-orange-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Edit">
                                    <i class="fas fa-pen text-xs"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-red-400 hover:bg-red-500 text-white flex items-center justify-center transition-colors shadow-sm" title="Nonaktifkan">
                                    <i class="fas fa-eye-slash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="bg-white px-6 py-4 border-t border-slate-100 flex items-center justify-between sm:px-6">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-slate-500">
                        Menampilkan <span class="font-bold text-argon-dark">1</span> sampai <span class="font-bold text-argon-dark">5</span> dari <span class="font-bold text-argon-dark">12</span> Pengguna
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-slate-200 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 transition-colors">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </a>
                        <a href="#" aria-current="page" class="z-10 bg-argon-blue border-argon-blue text-white relative inline-flex items-center px-4 py-2 border text-sm font-bold shadow-sm">
                            1
                        </a>
                        <a href="#" class="bg-white border-slate-200 text-slate-500 hover:bg-slate-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">
                            2
                        </a>
                        <a href="#" class="bg-white border-slate-200 text-slate-500 hover:bg-slate-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">
                            3
                        </a>
                        <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-slate-200 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 transition-colors">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>

    </div>

@endsection