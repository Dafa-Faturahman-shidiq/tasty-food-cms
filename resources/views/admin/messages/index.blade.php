@extends('layouts.admin')

@section('title', 'Pesan Masuk - Tasty Food Admin')
@section('header', 'Pesan Masuk')

@section('content')
    <div class="mb-6">
        <p class="text-sm text-neutral-500">Daftar pesan dan pertanyaan yang dikirim pengunjung melalui halaman Kontak.</p>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-neutral-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-neutral-50 border-b border-neutral-200 text-[11px] font-extrabold uppercase tracking-wider text-neutral-500">
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Pengirim</th>
                        <th class="py-4 px-6">Subjek</th>
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-100 text-sm">
                    @forelse ($contacts as $item)
                        <tr class="{{ !$item->is_read ? 'bg-neutral-50/90 font-semibold' : 'text-neutral-600' }} hover:bg-neutral-100/60 transition">
                            <td class="py-4 px-6 whitespace-nowrap">
                                @if (!$item->is_read)
                                    <span class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-sm bg-black text-white">
                                        Baru
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-[10px] font-semibold uppercase tracking-wider rounded-sm bg-neutral-100 text-neutral-500">
                                        Dibaca
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-neutral-900 {{ !$item->is_read ? 'font-bold' : 'font-medium' }}">{{ $item->name }}</p>
                                <p class="text-xs text-neutral-400">{{ $item->email }}</p>
                            </td>
                            <td class="py-4 px-6 max-w-xs">
                                <p class="line-clamp-1 text-neutral-800">{{ $item->subject }}</p>
                            </td>
                            <td class="py-4 px-6 text-xs text-neutral-500 whitespace-nowrap">
                                {{ $item->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.messages.show', $item->id) }}" 
                                        class="px-3 py-1.5 text-xs font-semibold rounded-sm border border-neutral-300 text-neutral-800 hover:bg-black hover:text-white hover:border-black transition">
                                        Baca
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $item->id) }}" method="POST" 
                                            onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
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
                            <td colspan="5" class="py-12 px-6 text-center text-sm text-neutral-500">
                                Belum ada pesan masuk dari pengunjung.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection