@extends('layouts.admin')

@section('title', 'Kelola Menu - Tasty Food Admin')
@section('header', 'Kelola Menu Utama')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <p class="text-sm text-neutral-500">Maksimal 4 menu terbaru akan ditampilkan di halaman depan.</p>
        <a href="{{ route('admin.menus.create') }}" 
            class="inline-flex items-center justify-center px-5 py-2.5 bg-black text-white text-xs font-bold uppercase tracking-wider rounded-sm hover:bg-neutral-800 transition shrink-0">
            + Tambah Menu
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($menus as $item)
            <div class="bg-white rounded-sm shadow-sm border border-neutral-100 p-5 flex flex-col items-center text-center">
                @if ($item->is_featured)
                    <span class="mb-2 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider rounded-sm bg-black text-white">
                        Tampil di Home
                    </span>
                @endif
                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" 
                        class="w-24 h-24 object-cover rounded-full border border-neutral-200 mb-4">
                <h3 class="text-sm font-extrabold uppercase text-black mb-2">{{ $item->name }}</h3>
                <p class="text-xs text-neutral-500 line-clamp-3 mb-4 flex-1">{{ $item->description }}</p>

                <div class="w-full pt-3 border-t border-neutral-100 flex items-center gap-2">
                    <a href="{{ route('admin.menus.edit', $item->id) }}" 
                        class="flex-1 py-2 text-xs font-semibold rounded-sm border border-neutral-300 text-neutral-700 hover:bg-black hover:text-white hover:border-black transition">
                        Edit
                    </a>
                    <form action="{{ route('admin.menus.destroy', $item->id) }}" method="POST" class="flex-1"
                            onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full py-2 text-xs font-semibold rounded-sm bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition cursor-pointer">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-sm border border-neutral-100 p-10 text-center text-sm text-neutral-500">
                Belum ada data menu. Klik <strong>+ Tambah Menu</strong> untuk mulai menambahkan.
            </div>
        @endforelse
        <div class="mt-6">
            {{ $menus->links() }}
        </div>
    </div>
@endsection