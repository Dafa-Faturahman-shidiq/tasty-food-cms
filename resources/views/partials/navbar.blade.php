@php
    // Deteksi apakah sedang di halaman Home atau halaman dalam
    $isHome = request()->routeIs('home');
    $textColor = $isHome ? 'text-black' : 'text-white';
    $mobileBg = $isHome ? 'bg-white shadow-lg text-black' : 'bg-neutral-900 text-white';
@endphp

<nav class="absolute top-0 left-0 w-full z-50 py-6 {{ $textColor }}">
    <div class="tasty-container flex items-center justify-between">
        
        {{-- Logo Brand --}}
        <a href="{{ route('home') }}" class="text-xl font-extrabold tracking-wider uppercase">
            TASTY FOOD
        </a>

        {{-- Tombol Hamburger Mobile --}}
        <button id="mobile-menu-btn" class="md:hidden focus:outline-none" aria-label="Menu">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        {{-- Menu Desktop --}}
        <ul class="hidden md:flex items-center space-x-8 text-xs font-semibold tracking-widest uppercase">
            <li>
                <a href="{{ route('home') }}" class="pb-1.5 relative {{ request()->routeIs('home') ? 'after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-current' : 'hover:opacity-75' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="pb-1.5 relative {{ request()->routeIs('about') ? 'after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-current' : 'hover:opacity-75' }}">
                    Tentang
                </a>
            </li>
            <li>
                <a href="{{ route('news.index') }}" class="pb-1.5 relative {{ request()->routeIs('news.*') ? 'after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-current' : 'hover:opacity-75' }}">
                    Berita
                </a>
            </li>
            <li>
                <a href="{{ route('gallery') }}" class="pb-1.5 relative {{ request()->routeIs('gallery') ? 'after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-current' : 'hover:opacity-75' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="pb-1.5 relative {{ request()->routeIs('contact') ? 'after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-current' : 'hover:opacity-75' }}">
                    Kontak
                </a>
            </li>
        </ul>
    </div>

    {{-- Dropdown Menu Mobile --}}
    <div id="mobile-menu" class="hidden md:hidden mx-6 mt-4 p-5 {{ $mobileBg }}">
        <ul class="flex flex-col space-y-4 text-xs font-bold tracking-widest uppercase">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>
            <li><a href="{{ route('news.index') }}">Berita</a></li>
            <li><a href="{{ route('gallery') }}">Galeri</a></li>
            <li><a href="{{ route('contact') }}">Kontak</a></li>
        </ul>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>