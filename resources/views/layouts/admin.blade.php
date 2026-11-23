<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Tasty Food')</title>

    <!-- Google Font (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
                    class="flex items-center gap-3 py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.dashboard') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.news.index') }}" 
                    class="flex items-center gap-3 py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.news.index') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    Kelola Berita
                </a>
                <a href="{{ route('admin.galleries.index') }}" 
                    class="flex items-center gap-3 py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.galleries.index') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Kelola Galeri
                </a>
                <a href="{{ route('admin.messages.index') }}" 
                    class="flex items-center gap-3 py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.contacts.index') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Pesan Masuk
                    @if ($unreadMessagesCount > 0)
                        <span class="px-2 py-0.5 text-[10px] font-extrabold rounded-sm bg-black text-white">
                            {{ $unreadMessagesCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('admin.profile.edit') }}" 
                    class="flex items-center gap-3 py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.profile.edit') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-400 hover:bg-white hover:text-black hover:border-black' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Profil Perusahaan
                </a>
                <a href="{{ route('admin.menus.index') }}" 
                    class="flex items-center gap-3 py-2.5 px-4 rounded-sm border transition {{ request()->routeIs('admin.menus.*') ? 'bg-white text-black font-bold border-black' : 'border-transparent text-neutral-500 hover:bg-white hover:text-black hover:border-black' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>Kelola Menu</span>
                </a>
            </nav>

            <div class="p-4 border-t border-neutral-800">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-2.5 px-4 bg-black border border-black flex items-center justify-center gap-2 text-white text-xs font-bold uppercase tracking-wider rounded-sm hover:bg-white hover:text-black transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
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