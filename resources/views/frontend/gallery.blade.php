@extends('layouts.app')

@section('title', 'Gallery - Tasty Food')

@section('content')
    <section style="background-image: url('{{ asset('asset/abt.jpg') }}');" class="bg-cover bg-center relative">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="tasty-container pt-36 pb-20 lg:pt-44 lg:pb-28 relative z-10">
            <h1 class="text-white text-3xl lg:text-5xl font-extrabold uppercase">Galeri Kami</h1>
        </div>
    </section>

    {{-- COURSEL --}}
    <section class="bg-[#F4F4F4] section-space">
        <div class="tasty-container">
            <div class="relative">
                <img id="featured-gallery-img" src="{{ asset('asset/gall6.jpg') }}" alt="Galeri Utama" class="w-full h-64 sm:h-96 lg:h-[460px] object-cover rounded-2xl shadow-lg transition-opacity duration-300">
                <button id="prev-btn" class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-neutral-100 transition absolute top-1/2 -translate-y-1/2 left-3 md:-left-5">
                    <svg class="w-5 h-5 text-neutral-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button id="next-btn" class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-neutral-100 transition absolute top-1/2 -translate-y-1/2 right-3 md:-right-5">
                    <svg class="w-5 h-5 text-neutral-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- GALLERY --}}
    <section class="bg-white section-space">
        <div class="tasty-container">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <div class="rounded-2xl overflow-hidden shadow-sm group">
                    <img src="{{ asset('asset/gall1.jpg') }}" alt="" class="w-full aspect-square object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-2xl overflow-hidden shadow-sm group">
                    <img src="{{ asset('asset/gall2.jpg') }}" alt="" class="w-full aspect-square object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-2xl overflow-hidden shadow-sm group">
                    <img src="{{ asset('asset/gall3.jpg') }}" alt="" class="w-full aspect-square object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-2xl overflow-hidden shadow-sm group">
                    <img src="{{ asset('asset/gall4.jpg') }}" alt="" class="w-full aspect-square object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-2xl overflow-hidden shadow-sm group">
                    <img src="{{ asset('asset/gall5.jpg') }}" alt="" class="w-full aspect-square object-cover group-hover:scale-105 transition duration-300">
                </div>
            </div>
        </div>
    </section>
            
<script>
    const galleryImages = [
        "{{ asset('asset/main.jpg') }}",
        "{{ asset('asset/chef.jpg') }}",
        "{{ asset('asset/tomat.jpg') }}",
        "{{ asset('asset/dapur.jpg') }}"
    ];

    let currentIndex = 0;
    const featuredImg = document.getElementById('featured-gallery-img');

    document.getElementById('next-btn').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        featuredImg.src = galleryImages[currentIndex];
    });

    document.getElementById('prev-btn').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        featuredImg.src = galleryImages[currentIndex];
    });
</script>
@endsection