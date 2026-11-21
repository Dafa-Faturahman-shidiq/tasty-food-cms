@extends('layouts.admin')

@section('title', 'Kelola Berita - Tasty Food Admin')
@section('header', 'Kelola Berita')

@section('content')
    {{-- Header Atas + Tombol Tambah --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <p class="text-sm text-neutral-500">Daftar seluruh artikel dan berita yang tampil di website.</p>
        <a href="{{ route('admin.news.create') }}" 
           class="inline-flex items-center justify-center px-5 py-2.5 bg-black text-white text-xs font-bold uppercase tracking-wider rounded-sm hover:bg-neutral-800 transition shrink-0">
            + Tambah Berita
        </a>
    </div>

    {{-- Tabel Data Berita --}}
    <div class="bg-white rounded-sm shadow-sm border border-neutral-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-neutral-50 border-b border-neutral-200 text-[11px] font-extrabold uppercase tracking-wider text-neutral-500">
                        <th class="py-4 px-6">Foto</th>
                        <th class="py-4 px-6">Judul Berita</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-100 text-sm">
                    @forelse ($news as $item)
                        <tr class="hover:bg-neutral-50/70 transition">
                            <td class="py-4 px-6">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" 
                                    class="w-16 h-12 object-cover rounded-sm border border-neutral-200">
                            </td>
                            <td class="py-4 px-6 font-bold text-neutral-900 max-w-xs">
                                <p class="line-clamp-2">{{ $item->title }}</p>
                            </td>
                            <td class="py-4 px-6">
                                @if ($item->is_featured)
                                    <span class="px-3 py-1 text-[11px] font-bold uppercase tracking-wider rounded-sm bg-black text-white">
                                        Berita Utama
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-[11px] font-semibold uppercase tracking-wider rounded-sm bg-neutral-100 text-neutral-600">
                                        Reguler
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-xs text-neutral-500 whitespace-nowrap">
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.news.edit', $item->id) }}" 
                                        class="px-3 py-1.5 text-xs font-semibold rounded-sm border border-neutral-300 text-neutral-700 hover:bg-black hover:text-white hover:border-black transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" 
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-3 py-1.5 text-xs font-semibold rounded-sm bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition cursor-pointer">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10 px-6 text-center text-sm text-neutral-500">
                                Belum ada data berita. Klik tombol <strong>+ Tambah Berita</strong> untuk mulai membuat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection