<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Tasty Food')</title>

    <!-- Google Font (Montserrat) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/tasty.css') }}">
</head>
<body class="bg-[#F4F4F4] text-neutral-900 antialiased">

    {{-- Wrapper Utama Flex  --}}
    <div class="min-h-screen flex">
        
        {{-- Sidebar Kiri --}}
        <aside class="w-64 bg-white text-black  flex flex-col shrink-0">
            <div class="p-6 border-b border-neutral-800">
                <h1 class="text-xl font-extrabold tracking-wider uppercase">Tasty Food</h1>
                <p class="text-[11px] text-neutral-400 tracking-widest uppercase mt-1">Admin Panel</p>
            </div>

            <nav class="flex-1 p-4 space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" 
                    class="block py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.dashboard') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.news.index') }}" 
                    class="block py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.news.index') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    Kelola Berita
                </a>
                <a href="{{ route('admin.galleries.index') }}" 
                    class="block py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.galleries.index') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    Kelola Galeri
                </a>
                <a href="{{ route('admin.messages.index') }}" 
                    class="block py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.contacts.index') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    Pesan Masuk
                </a>
                <a href="{{ route('admin.profile.edit') }}" 
                    class="block py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.profile.edit') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    Profil Perusahaan
                </a>
            </nav>

            <div class="p-4 border-t border-neutral-800">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-2.5 px-4 btn-tasty text-white text-xs font-bold uppercase tracking-wider rounded-sm  hover:bg-red-700 transition cursor-pointer">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Kolom Kanan  --}}
        <div class="flex-1 flex flex-col">
            
            {{-- Topbar Putih --}}
            <header class="bg-white border-b border-neutral-200 px-6 lg:px-8 py-4 flex items-center justify-between">
                <h2 class="text-lg font-extrabold uppercase tracking-wide">
                    @yield('header', 'Dashboard')
                </h2>
                <div class="flex items-center gap-4 text-xs">
                    <span class="text-neutral-500">Halo, <strong class="text-black">{{ Auth::user()->name }}</strong></span>
                    <a href="{{ route('home') }}" target="_blank" class="px-3 py-1.5 rounded-lg border border-neutral-300 font-semibold hover:bg-black hover:text-white transition">
                        Lihat Website ↗
                    </a>
                </div>
            </header>

            {{-- Isi Halaman yang Berubah-ubah --}}
            <main class="p-6 lg:p-8 flex-1">
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-green-100 border border-green-300 text-green-800 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>