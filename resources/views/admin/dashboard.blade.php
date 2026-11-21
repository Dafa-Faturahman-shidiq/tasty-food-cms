@extends('layouts.admin')

@section('title', 'Dashboard - Tasty Food Admin')
@section('header', 'Dashboard Admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Kartu 1: Total Berita --}}
        <div class="bg-white p-6 rounded-sm  shadow-sm border border-neutral-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-neutral-400">Total Berita</p>
                <h3 class="text-3xl font-extrabold text-black mt-2">{{ $totalNews }}</h3>
            </div>
        </div>

        {{-- Kartu 2: Total Galeri --}}
        <div class="bg-white p-6 rounded-sm  shadow-sm border border-neutral-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-neutral-400">Total Foto Galeri</p>
                <h3 class="text-3xl font-extrabold text-black mt-2">{{ $totalGalleries }}</h3>
            </div>
        </div>

        {{-- Kartu 3: Pesan Masuk Belum Dibaca --}}
        <div class="bg-white p-6 rounded-sm  shadow-sm border border-neutral-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-neutral-400">Pesan Belum Dibaca</p>
                <h3 class="text-3xl font-extrabold text-black mt-2">{{ $unreadContacts }}</h3>
            </div>
        </div>

    </div>
@endsection