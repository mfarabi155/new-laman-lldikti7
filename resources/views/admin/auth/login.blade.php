<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - LLDIKTI Wilayah VII</title>
    
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
</head>
<body class="bg-argon-light font-sans antialiased m-0 p-0 relative overflow-x-hidden min-h-screen flex flex-col">

    <div class="absolute top-0 w-full h-96 bg-gradient-to-r from-argon-indigo to-argon-blue transform -skew-y-6 origin-top-left -z-10 shadow-lg"></div>

    <div class="container mx-auto px-4 pt-16 pb-8 text-center relative z-10">
        <h1 class="text-4xl font-bold text-white mb-2">Selamat Datang!</h1>
        <p class="text-white/80 font-medium">Silakan masuk ke Manajemen Data Laman LLDIKTI Wilayah VII</p>
    </div>

    <div class="container mx-auto px-4 flex-grow flex items-start justify-center pt-8 relative z-10">
        
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden border border-slate-100/50">
            
            <div class="bg-transparent px-8 pt-8 pb-6 text-center">
                <div class="flex justify-center mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg" class="h-16 w-auto" alt="Logo">
                </div>
                <h2 class="text-argon-dark font-bold text-xl uppercase tracking-wide">Login</h2>
            </div>

            <div class="px-8 pb-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf 

                    <div class="mb-4">
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-400">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" id="email" required autofocus
                                class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue focus:border-transparent transition-shadow text-slate-700 placeholder-slate-400 shadow-sm"
                                placeholder="Email">
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" id="password" required
                                class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-argon-blue focus:border-transparent transition-shadow text-slate-700 placeholder-slate-400 shadow-sm"
                                placeholder="Password">
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-6 mt-2">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 text-argon-blue bg-white border-slate-300 rounded focus:ring-argon-blue focus:ring-2 cursor-pointer transition duration-200">
                            <span class="ml-2 text-sm text-slate-600 font-medium">Ingat saya</span>
                        </label>
                        
                        <a href="#" class="text-sm text-argon-blue hover:text-argon-indigo font-semibold transition-colors">
                            Lupa password?
                        </a>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="w-full bg-argon-blue hover:bg-argon-indigo text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg hover:-translate-y-px transition-all duration-300 text-sm tracking-wide">
                            MASUK
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>

    <footer class="py-6 text-center relative z-10 mt-auto">
        <p class="text-sm text-slate-500 font-medium">
            &copy; {{ date('Y') }} LLDIKTI Wilayah VII Jawa Timur.
        </p>
    </footer>

</body>
</html>