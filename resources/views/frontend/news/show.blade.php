@extends('layouts.app')

@section('title', '{{$news->slug}} - Tasty Food')

@section('content')
    <section class="bg-white section-space">
        <div class="tasty-container max-w-4xl mx-auto">
            <img src="{{ asset($news->image) }}" class="w-full h-72 md:h-[450px] object-cover rounded-2xl shadow-lg mb-8">
            <p class="text-xs text-neutral-400 uppercase tracking-widest mb-2">{{ $news->created_at->format('d M Y') }}</p>
            <h1 class="text-2xl md:text-4xl font-extrabold uppercase mb-6">{{ $news->title }}</h1>
            <div class="text-sm md:text-base text-neutral-700 leading-relaxed space-y-4">{!! nl2br(e($news->content)) !!}</div>
            <a href="{{ route('news.index') }}" class="btn-tasty inline-block mt-10">← Kembali ke Berita</a>
        </div>
    </section>
@endsection