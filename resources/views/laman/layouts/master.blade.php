<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <title>LLDIKTI Wilayah VII - Layanan Humanis Berintegritas</title>
    <link rel="icon" href="{{ asset('laman/img/Logo-Tut-Wuri-Handayani.png') }}" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0F172A',
                        secondary: '#1D4ED8',
                        accent: '#F59E0B',
                        culture_sky: '#60A5FA',
                        culture_red: '#EE4444',
                        culture_green: '#22C55E',
                    }
                }
            }
        }
    </script>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('laman/css/style.css') }}">
    
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#F8FAFC] font-sans antialiased text-slate-800 overflow-x-hidden">

    @include('laman.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('laman.partials.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script src="{{ asset('laman/js/main.js') }}"></script>

</body>
</html>