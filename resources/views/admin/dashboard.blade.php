@extends('layouts.admin')

@section('title', 'Dashboard - Tasty Food Admin')
@section('header', 'Dashboard Admin')

@section('content')
    {{-- Bagian 1: 3 Kartu Statistik Utama --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Kartu 1: Total Berita --}}
        <div class="bg-white p-6 rounded-sm shadow-sm border border-neutral-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-neutral-400">Total Berita</p>
                <h3 class="text-3xl font-extrabold text-black mt-2">{{ $totalNews }}</h3>
            </div>
            <div class="w-12 h-12 rounded-sm bg-neutral-100 text-black flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
        </div>

        {{-- Kartu 2: Total Galeri --}}
        <div class="bg-white p-6 rounded-sm shadow-sm border border-neutral-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-neutral-400">Total Foto Galeri</p>
                <h3 class="text-3xl font-extrabold text-black mt-2">{{ $totalGalleries }}</h3>
            </div>
            <div class="w-12 h-12 rounded-sm bg-neutral-100 text-black flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>

        {{-- Kartu 3: Pesan Masuk Belum Dibaca --}}
        <div class="bg-white p-6 rounded-sm shadow-sm border border-neutral-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-neutral-400">Pesan Belum Dibaca</p>
                <h3 class="text-3xl font-extrabold text-black mt-2">{{ $unreadContacts }}</h3>
            </div>
            <div class="w-12 h-12 rounded-sm bg-black text-white flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>

    </div>

    {{-- Bagian 2: Aktivitas Publikasi Terbaru & Pesan Masuk --}}
    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        {{-- Kolom Kiri: Aktivitas Berita Terbaru --}}
        <div class="bg-white rounded-sm shadow-sm border border-neutral-100 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h4 class="text-xs font-extrabold uppercase tracking-wider text-black">Aktivitas Berita Terbaru</h4>
                <a href="{{ route('admin.news.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-900 transition">
                    Lihat Semua →
                </a>
            </div>

            <div class="divide-y divide-neutral-100 flex-1">
                @forelse ($latestNews as $news)
                    <div class="p-4 px-6 flex items-center justify-between gap-4 hover:bg-neutral-50/70 transition">
                        <div class="flex items-center gap-3 min-w-0">
                            <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" 
                                 class="w-12 h-10 object-cover rounded-sm border border-neutral-200 shrink-0">
                            <div class="min-w-0">
                                <p class="text-sm font-bold text-neutral-900 truncate">{{ $news->title }}</p>
                                <p class="text-[11px] text-neutral-400 mt-0.5">
                                    Dipublikasikan {{ $news->created_at?->diffForHumans() ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <a href="{{ route('admin.news.edit', $news->id) }}" 
                           class="px-2.5 py-1 text-[11px] font-semibold rounded-sm border border-neutral-300 text-neutral-700 hover:bg-black hover:text-white hover:border-black transition shrink-0">
                            Edit
                        </a>
                    </div>
                @empty
                    <div class="p-8 text-center text-xs text-neutral-400">
                        Belum ada aktivitas berita.
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Kolom Kanan: Pesan Masuk Terbaru --}}
        <div class="bg-white rounded-sm shadow-sm border border-neutral-100 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h4 class="text-xs font-extrabold uppercase tracking-wider text-black">Pesan Masuk Terbaru</h4>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-neutral-500 hover:text-black transition">
                    Lihat Semua →
                </a>
            </div>

            <div class="divide-y divide-neutral-100 flex-1">
                @forelse ($latestContacts as $msg)
                    <a href="{{ route('admin.messages.show', $msg->id) }}" 
                        class="p-4 px-6 flex items-start justify-between gap-4 hover:bg-neutral-50 transition ">
                        <div class="min-w-0">
                            <div class="flex items-center gap-2">
                                <p class="text-sm {{ !$msg->is_read ? 'font-extrabold text-black' : 'font-semibold text-neutral-700' }} truncate">
                                    {{ $msg->name }}
                                </p>
                                @if (!$msg->is_read)
                                    <span class="px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider rounded-sm bg-black text-white shrink-0">
                                        Baru
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs text-neutral-500 truncate mt-0.5">{{ $msg->subject }}</p>
                        </div>

                        <span class="text-[11px] text-neutral-400 whitespace-nowrap shrink-0">
                            {{ $msg->created_at?->diffForHumans() ?? '-' }}
                        </span>
                    </a>
                @empty
                    <div class="p-8 text-center text-xs text-neutral-400">
                        Belum ada pesan masuk.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
@endsection