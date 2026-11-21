@extends('layouts.admin')

@section('title', 'Kelola Galeri - Tasty Food Admin')
@section('header', 'Kelola Galeri')

@section('content')
    {{-- Header Atas + Tombol Tambah --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <p class="text-sm text-neutral-500">Kelola koleksi foto galeri dan sorotan carousel halaman utama.</p>
        <a href="{{ route('admin.galleries.create') }}" 
           class="inline-flex items-center justify-center px-5 py-2.5 bg-black text-white text-xs font-bold uppercase tracking-wider rounded-sm hover:bg-neutral-800 transition shrink-0">
            + Tambah Foto
        </a>
    </div>

    {{-- Grid Kartu Galeri --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($galleries as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-neutral-100 overflow-hidden flex flex-col group">
                
                {{-- Thumbnail Foto + Badge Carousel --}}
                <div class="relative h-48 overflow-hidden bg-neutral-100">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->title ?? 'Foto Galeri' }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    
                    @if ($item->is_featured)
                        <span class="absolute top-3 left-3 px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-full bg-black text-white shadow">
                            Carousel
                        </span>
                    @endif
                </div>

                {{-- Keterangan & Tombol Aksi --}}
                <div class="p-4 flex flex-col flex-1 justify-between">
                    <p class="text-sm font-bold text-neutral-900 line-clamp-1 mb-4">
                        {{ $item->title ?: 'Tanpa Keterangan' }}
                    </p>

                    <div class="pt-3 border-t border-neutral-100 flex items-center gap-2">
                        <a href="{{ route('admin.galleries.edit', $item->id) }}" 
                           class="flex-1 text-center py-2 text-xs font-semibold rounded-sm border border-neutral-300 text-neutral-700 hover:bg-black hover:text-white hover:border-black transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.galleries.destroy', $item->id) }}" method="POST" class="flex-1"
                              onsubmit="return confirm('Yakin ingin menghapus foto ini dari galeri?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full py-2 text-xs font-semibold rounded-sm bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition cursor-pointer">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl border border-neutral-100 p-12 text-center">
                <p class="text-sm text-neutral-500">
                    Belum ada foto di galeri. Klik tombol <strong>+ Tambah Foto</strong> untuk mulai mengunggah.
                </p>
            </div>
        @endforelse
    </div>
@endsection