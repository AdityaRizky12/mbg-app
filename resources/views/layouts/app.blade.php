<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Monitoring MBG')</title>
    
    <!-- Panggil Vite / Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen">

    <!-- Navbar / Header -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-3">
                    <span class="text-xl font-bold text-indigo-600">🍱 MBG Monitoring</span>
                </div>
                <div class="flex space-x-4 font-medium text-sm">
                    <a href="{{ route('sekolah.index') }}" class="px-3 py-2 rounded-lg hover:bg-slate-100 text-slate-700">Data Sekolah</a>
                    <a href="{{ route('menu.index') }}" class="px-3 py-2 rounded-lg hover:bg-slate-100 text-slate-700">Data Menu</a>
                    <a href="{{ route('distribusi.index') }}" class="px-3 py-2 rounded-lg hover:bg-slate-100 text-slate-700">Data Distribusi</a>
                </div>
            </div>
        </div>
    </nav>

       <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if (session('success'))
            <div id="toast"
                 class="fixed top-5 right-5 z-50 bg-emerald-600 text-white px-4 py-3 rounded-lg shadow-lg text-sm flex items-center gap-2 transition-all duration-300">
                <span>✓</span>
                <span>{{ session('success') }}</span>
            </div>

            <script>
                setTimeout(() => {
                    const toast = document.getElementById('toast');
                    if (toast) {
                        toast.style.opacity = '0';
                        toast.style.transform = 'translateY(-10px)';
                        setTimeout(() => toast.remove(), 300);
                    }
                }, 3000);
            </script>
        @endif

        @yield('content')
    </main>

</body>
</html>