<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - LLDIKTI Wilayah VII</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Open Sans', 'sans-serif'],
                    },
                    colors: {
                        argon: {
                            blue: '#5e72e4',
                            indigo: '#5603ad',
                            dark: '#172b4d',
                            light: '#f8f9fe',
                        }
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        /* Kustom scrollbar untuk sidebar */
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="bg-argon-light font-sans antialiased text-slate-700 m-0 p-0 overflow-hidden" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen w-full">

        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black/50 z-40 lg:hidden" @click="sidebarOpen = false" x-cloak></div>

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
               class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:flex-shrink-0 flex flex-col h-full">
            
            <div class="h-20 flex items-center justify-center border-b border-slate-100 px-6">
                <a href="#" class="flex items-center gap-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg" class="h-8 w-auto" alt="Logo">
                    <span class="font-bold text-argon-dark text-lg tracking-tight">Admin<span class="text-argon-blue">Panel</span></span>
                </a>
            </div>

            <div class="flex-1 overflow-y-auto custom-scrollbar py-4 px-4 space-y-1">
                
                <p class="px-4 text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 mt-2">Utama</p>

                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-argon-light text-argon-blue font-semibold rounded-lg transition-colors">
                    <i class="fas fa-tv w-5 text-center text-argon-blue"></i>
                    <span class="text-sm">Dashboard</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-argon-dark hover:bg-slate-50 font-medium rounded-lg transition-colors">
                    <i class="fas fa-database w-5 text-center text-orange-500"></i>
                    <span class="text-sm">Master Data</span>
                </a>

                <p class="px-4 text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 mt-6">Manajemen Laman</p>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-argon-dark hover:bg-slate-50 font-medium rounded-lg transition-colors">
                    <i class="fas fa-gavel w-5 text-center text-emerald-500"></i>
                    <span class="text-sm">Peraturan</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-argon-dark hover:bg-slate-50 font-medium rounded-lg transition-colors">
                    <i class="fas fa-chart-line w-5 text-center text-cyan-500"></i>
                    <span class="text-sm">Kinerja</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-argon-dark hover:bg-slate-50 font-medium rounded-lg transition-colors">
                    <i class="fas fa-shield-alt w-5 text-center text-red-500"></i>
                    <span class="text-sm">SPI</span>
                </a>

                <p class="px-4 text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 mt-6">Pengaturan</p>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-argon-dark hover:bg-slate-50 font-medium rounded-lg transition-colors">
                    <i class="fas fa-cog w-5 text-center text-slate-500"></i>
                    <span class="text-sm">Pengaturan Sistem</span>
                </a>
            </div>

            <div class="p-4 mt-auto">
                <div class="bg-gradient-to-tr from-argon-indigo to-argon-blue rounded-xl p-4 text-white shadow-lg">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mb-3">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h6 class="text-sm font-bold mb-1">Butuh Bantuan?</h6>
                    <p class="text-xs text-white/80 mb-3">Silakan cek dokumentasi panduan admin.</p>
                    <a href="#" class="block w-full bg-white text-argon-dark text-center text-xs font-bold py-2 rounded-lg hover:bg-slate-50 transition">DOKUMENTASI</a>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
            
            <div class="absolute top-0 w-full h-72 bg-gradient-to-r from-argon-indigo to-argon-blue -z-10"></div>

            <header class="h-20 px-6 flex items-center justify-between z-20">
                
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-white hover:text-white/80 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <h1 class="text-white font-semibold text-sm tracking-wide hidden sm:block">
                        <span class="text-white/70 mr-2">Halaman /</span> @yield('title', 'Dashboard')
                    </h1>
                </div>

                <div class="flex items-center gap-6">
                    
                    <div class="hidden md:flex relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-argon-dark/50">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="bg-white/90 border-0 text-sm rounded-full pl-10 pr-4 py-2 w-64 focus:ring-2 focus:ring-white focus:bg-white focus:outline-none transition-all placeholder-argon-dark/50 text-argon-dark" placeholder="Cari menu...">
                    </div>

                    <div x-data="{ profileOpen: false }" class="relative">
                        <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex items-center gap-3 focus:outline-none pr-2">
                            <img src="https://ui-avatars.com/api/?name=Admin+LLDIKTI&background=fff&color=5e72e4" alt="Avatar" class="w-9 h-9 rounded-full border-2 border-white/50 object-cover shadow-sm">
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-bold text-white leading-tight">Admin LLDIKTI</p>
                            </div>
                        </button>

                        <div x-show="profileOpen" x-transition.opacity.duration.200ms class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl py-2 border border-slate-100 z-50" x-cloak>
                            <div class="px-4 py-2 border-b border-slate-100 mb-1">
                                <h6 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Selamat Datang!</h6>
                            </div>
                            <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-argon-dark transition">
                                <i class="fas fa-user w-4 text-center"></i> Profil Saya
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-argon-dark transition">
                                <i class="fas fa-cog w-4 text-center"></i> Pengaturan
                            </a>
                            <div class="border-t border-slate-100 my-1"></div>
                            
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition">
                                    <i class="fas fa-sign-out-alt w-4 text-center"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto overflow-x-hidden p-4 md:p-6 lg:p-8 z-10 relative custom-scrollbar">
                
                @yield('content')

                <footer class="mt-10 pt-6 border-t border-slate-200/60 flex flex-col md:flex-row items-center justify-between text-slate-500 text-sm">
                    <p>&copy; {{ date('Y') }} <a href="#" class="font-bold text-argon-blue hover:text-argon-indigo transition">LLDIKTI Wilayah VII</a>.</p>
                    <ul class="flex gap-4 mt-2 md:mt-0 font-medium">
                        <li><a href="#" class="hover:text-argon-dark transition">Bantuan</a></li>
                        <li><a href="#" class="hover:text-argon-dark transition">Lisensi</a></li>
                    </ul>
                </footer>
            </main>

        </div>
    </div>

</body>
</html>