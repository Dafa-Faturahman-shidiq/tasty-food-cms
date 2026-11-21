@extends('layouts.app')

@section('title', 'Home - Tasty Food')

@section('content')

    {{-- HERO SECTION --}}
    <section class="bg-[#F4F4F4] relative overflow-hidden pt-40 pb-24 lg:pb-32">
        <div class="tasty-container grid grid-cols-1 lg:grid-cols-2">
            <div class="flex flex-col items-start gap-4 ">
                <div class="w-16 h-[2px] bg-black"></div>
                <h2 class="text-4xl font-light">HEALTHY</h2>
                <h2 class="text-4xl font-extrabold">TASTY FOOD</h2>
                <p class="text-sm text-neutral-600 leading-relaxed max-w-md">Nikmati hidangan lezat dan sehat dari Tasty Food. Kami menyajikan makanan berkualitas tinggi yang memanjakan lidah Anda.</p>
                <a href="{{ route('about') }}" class="btn-tasty">TENTANG KAMI</a>
            </div>
            <img src="{{ asset('asset/img-4.png') }}" alt="" class="w-full max-w-md mx-auto mt-10 lg:mt-0 lg:max-w-none lg:w-[620px] lg:absolute lg:-top-30 lg:-right-35 animate-spin [animation-duration:25s]">
        </div>
    </section>

    {{-- ABOUT SECTION --}}
    <section class="bg-white py-20">
        <div class="tasty-container">
            <div class="text-center">
                <h2 class="text-3xl  font-extrabold uppercase tracking-wide mb-4">TENTANG KAMI</h2>
                <p class="text-sm text-neutral-600 leading-relaxed max-w-md mx-auto">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquet, nunc nisl aliquet nunc, vitae aliquet nisl nunc vitae nisl.
                </p>
            </div>
        </div>
    </section>

    {{-- 4 MENU --}}
    <section style="background-image: url('{{ asset('asset/Group 70.png') }}');" class="bg-cover bg-center py-20 pt-28 pb-20">
        <div class="tasty-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-24 lg:gap-y-0">
            {{-- card --}}
            <div class="bg-white rounded-2xl text-center shadow-2xl px-6 pb-8">
                <img src="{{ asset('asset/img-1.png') }}" alt="" class="w-36 h-36 object-cover rounded-full mx-auto -mt-20 hover:animate-spin hover:[animation-duration:20s] hover:scale-105 transition duration-300">
                <h3 class="font-extrabold text-base uppercase mt-5 mb-3 tracking-wide">Menu 1</h3>
                <p class="text-xs text-neutral-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquet, nunc nisl aliquet nunc, vitae aliquet nisl nunc vitae nisl.</p>
            </div>
            {{-- card --}}
            <div class="bg-white rounded-2xl text-center shadow-2xl px-6 pb-8">
                <img src="{{ asset('asset/img-2.png') }}" alt="" class="w-36 h-36 object-cover rounded-full mx-auto -mt-20 hover:animate-spin hover:[animation-duration:20s] hover:scale-105 transition duration-300">
                <h3 class="font-extrabold text-base uppercase mt-5 mb-3 tracking-wide">Menu 2</h3>
                <p class="text-xs text-neutral-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquet, nunc nisl aliquet nunc, vitae aliquet nisl nunc vitae nisl.</p>
            </div>
            {{-- card --}}
            <div class="bg-white rounded-2xl text-center shadow-2xl px-6 pb-8">
                <img src="{{ asset('asset/img-3.png') }}" alt="" class="w-36 h-36 object-cover rounded-full mx-auto -mt-20 hover:animate-spin hover:[animation-duration:20s] hover:scale-105 transition duration-300">
                <h3 class="font-extrabold text-base uppercase mt-5 mb-3 tracking-wide">Menu 3</h3>
                <p class="text-xs text-neutral-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquet, nunc nisl aliquet nunc, vitae aliquet nisl nunc vitae nisl.</p>
            </div>
            {{-- card --}}
            <div class="bg-white rounded-2xl text-center shadow-2xl px-6 pb-8">
                <img src="{{ asset('asset/img-4.png') }}" alt="" class="w-36 h-36 object-cover rounded-full mx-auto -mt-20 hover:animate-spin hover:[animation-duration:20s] hover:scale-105 transition duration-300">
                <h3 class="font-extrabold text-base uppercase mt-5 mb-3 tracking-wide">Menu 4</h3>
                <p class="text-xs text-neutral-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquet, nunc nisl aliquet nunc, vitae aliquet nisl nunc vitae nisl.</p>
            </div>
        </div>
    </section>

    {{-- NEWS SECTION --}}
    <section class="bg-[#F4F4F4] section-space">
        <div class="tasty-container">
            <h2 class="font-extrabold uppercase text-2xl text-center mb-12">BERITA KAMI</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- main news --}}
                @if ($featuredNews)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm flex flex-col">
                        <img src="{{ asset($featuredNews->image) }}" alt="" class="w-full object-cover h-64">
                        <div class="flex flex-col p-6 flex-1">
                            <h3 class="font-extrabold text-lg ">{{ $featuredNews->title }}</h3>
                            <p class="text-sm text-neutral-500 leading-relaxed mb-4">{{ Str::limit($featuredNews->content, 150) }}</p>
                            <div class="mt-auto pt-4 flex items-center justify-between">
                                <a href="{{ route('news.show', $featuredNews->slug) }}" class="text-xs font-semibold text-[#F5A623] hover:underline">Baca selengkapnya</a>
                                <span class="text-neutral-400 font-bold tracking-widest">...</span>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- other news --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @forelse ( $otherNews as $news )
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm flex flex-col">
                            <img src="{{ asset($news->image) }}" alt="" class="w-full object-cover h-32">
                            <div class="flex flex-col p-6 flex-1">
                                <h3 class="font-extrabold text-sm ">{{ $news->title }}</h3>
                                <p class="text-sm text-neutral-500 leading-relaxed mb-4 line-clamp-2">{{ Str::limit($news->content, 150) }}</p>
                                <div class="mt-auto pt-4 flex items-center justify-between">
                                    <a href="{{ route('news.show', $news->slug) }}" class="text-xs font-semibold text-[#F5A623] hover:underline">Baca selengkapnya</a>
                                    <span class="text-neutral-400 font-bold tracking-widest">...</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-neutral-500">Tidak ada berita lainnya.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    {{-- GALLEY SECTION --}}
    <section class="bg-white section-space">
        <div class="tasty-container">
            <h2 class="font-extrabold uppercase text-2xl text-center mb-12">GALERI KAMI</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ( $gallerys as $item )
                <div class="rounded-2xl overflow-hidden">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->title ?? 'Galeri Tasty Food' }}" class="w-full h-64 object-cover rounded-xl shadow-sm aspect-square hover:scale-105 transition duration-300">
                </div>
                @empty
                    <p class="text-center text-neutral-500">Tidak ada galeri.</p>
                @endforelse
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('gallery') }}" class="btn-tasty">LIHAT SEMUA GALERI</a>
            </div>
        </div>

@endsection