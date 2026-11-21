@extends('layouts.admin')

@section('title', 'Baca Pesan - Tasty Food Admin')
@section('header', 'Detail Pesan Masuk')

@section('content')
    <div class="max-w-3xl bg-white rounded-2xl shadow-sm border border-neutral-100 p-6 sm:p-8">
        
        {{-- Header Pengirim & Waktu --}}
        <div class="pb-6 border-b border-neutral-100 flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-400">Subjek Pesan</span>
                <h3 class="text-xl font-extrabold text-black mt-1">{{ $contact->subject }}</h3>
                
                <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-neutral-600">
                    <span>Dari: <strong class="text-black">{{ $contact->name }}</strong></span>
                    <span>&bull;</span>
                    <a href="mailto:{{ $contact->email }}" class="underline hover:text-black">{{ $contact->email }}</a>
                </div>
            </div>

            <span class="text-xs text-neutral-400 whitespace-nowrap">
                {{ $contact->created_at->format('d M Y, H:i') }} WIB
            </span>
        </div>

        {{-- Isi Lengkap Pesan --}}
        <div class="py-6 text-sm text-neutral-800 leading-relaxed whitespace-pre-line">
            {{ $contact->message }}
        </div>

        {{-- Tombol Bawah --}}
        <div class="pt-6 border-t border-neutral-100 flex items-center justify-between gap-3">
            <a href="{{ route('admin.messages.index') }}" 
                class="px-5 py-2.5 bg-neutral-100 text-neutral-700 text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-neutral-200 transition">
                &larr; Kembali
            </a>

            <div class="flex items-center gap-2">
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" 
                    class="px-5 py-2.5 bg-black text-white text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-neutral-800 transition">
                    Balas via Email
                </a>
                <form action="{{ route('admin.messages.destroy', $contact->id) }}" method="POST" 
                        onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-5 py-2.5 bg-red-50 text-red-600 border border-red-200 text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-red-600 hover:text-white transition cursor-pointer">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection