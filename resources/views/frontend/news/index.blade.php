@extends('layouts.app')

@section('title', 'News - Tasty Food')

@section('content')
    <section style="background-image: url('{{ asset('asset/abt.jpg') }}');" class="bg-cover bg-center relative">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="tasty-container pt-36 pb-20 lg:pt-44 lg:pb-28 relative z-10">
            <h1 class="text-white text-3xl lg:text-5xl font-extrabold uppercase">Berita Kami</h1>
        </div>
    </section>

    {{-- FIRST NEWS --}}
    <div class=" bg-[#F4F4F4] section-space">
        <div class="tasty-container">
            @if ($featuredNews)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                    <img src="{{ asset($featuredNews->image) }}" alt="{{ $featuredNews->title }}" class="w-full rounded-2xl h-72 lg:h-96 object-cover shadow-lg">
                    <div class="space-y-4">
                        <h2 class="font-extrabold text-2xl lg:text-3xl uppercase mb-6">{{ $featuredNews->title }}</h2>
                        <p class="text-sm text-neutral-600 leading-relaxed space-y-4">{{ Str::limit($featuredNews->content, 220) }}</p>
                        <a href="{{ route('news.show', $featuredNews->slug) }}" class="btn-tasty">Baca Selengkapnya</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- OTHER NEWS --}}
    <div class="section-space">
        <div class="tasty-container">
            <h2 class="font-extrabold text-2xl lg:text-3xl uppercase mb-10">Berita Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- card --}}
                @forelse ( $otherNews as $news )
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm flex flex-col border border-neutral-100 hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="w-full h-44 object-cover">
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="font-extrabold text-base uppercase mb-2 line-clamp-2 ">{{ $news->title }}</h3>
                            <p class="text-xs text-neutral-500 leading-relaxed mb-4 line-clamp-3">{{ Str::limit($news->content, 100) }}</p>
                            <div class="mt-auto pt-4 flex items-center justify-between">
                                <a href="{{ route('news.show', $news->slug) }}" class="text-xs font-semibold text-[#F5A623] hover:underline">Baca selengkapnya</a>
                                <span class="text-neutral-400 font-bold tracking-widest">...</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-sm text-neutral-500 py-8">
                        Belum ada berita lainnya saat ini.
                    </p>
                @endforelse
            </div>
        </div>
    </div>
@endsection