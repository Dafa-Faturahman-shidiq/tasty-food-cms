@php
    $textColor = 'text-black';
    $mobileBg = 'bg-white shadow-xl border border-neutral-100 text-black';
    $activeDesktop = "after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-current";
@endphp


<nav class="absolute top-0 left-0 w-full z-50 py-6 {{ $textColor }}">
    <div class="tasty-container flex items-center justify-between md:justify-start md:space-x-8 px-6 md:px-0">
        
        {{-- Logo Brand --}}
        <a href="{{ route('home') }}" class="text-xl font-extrabold tracking-wider uppercase">
            TASTY FOOD
        </a>

        {{-- Tombol Hamburger Mobile --}}
        <button id="mobile-menu-btn" class="md:hidden p-1 focus:outline-none" aria-label="Menu">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        {{-- Menu Desktop --}}
        <ul class="hidden md:flex items-center space-x-8 text-xs font-semibold tracking-widest uppercase">
            <li>
                <a href="{{ route('home') }}" class="pb-1.5 relative transition-opacity {{ request()->routeIs('home') ? $activeDesktop : 'hover:opacity-75' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="pb-1.5 relative transition-opacity {{ request()->routeIs('about') ? $activeDesktop : 'hover:opacity-75' }}">
                    Tentang
                </a>
            </li>
            <li>
                <a href="{{ route('news.index') }}" class="pb-1.5 relative transition-opacity {{ request()->routeIs('news.*') ? $activeDesktop : 'hover:opacity-75' }}">
                    Berita
                </a>
            </li>
            <li>
                <a href="{{ route('gallery') }}" class="pb-1.5 relative transition-opacity {{ request()->routeIs('gallery') ? $activeDesktop : 'hover:opacity-75' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="pb-1.5 relative transition-opacity {{ request()->routeIs('contact') ? $activeDesktop : 'hover:opacity-75' }}">
                    Kontak
                </a>
            </li>
        </ul>
    </div>

    {{-- Dropdown Menu Mobile --}}
    <div id="mobile-menu" class="hidden md:hidden mx-6 mt-4 p-5 rounded-2xl {{ $mobileBg }}">
        <ul class="flex flex-col space-y-4 text-xs font-bold tracking-widest uppercase">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'underline underline-offset-4' : 'opacity-80' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'underline underline-offset-4' : 'opacity-80' }}">Tentang</a></li>
            <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'underline underline-offset-4' : 'opacity-80' }}">Berita</a></li>
            <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'underline underline-offset-4' : 'opacity-80' }}">Galeri</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'underline underline-offset-4' : 'opacity-80' }}">Kontak</a></li>
        </ul>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>