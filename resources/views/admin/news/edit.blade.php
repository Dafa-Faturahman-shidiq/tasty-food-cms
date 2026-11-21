@extends('layouts.admin')

@section('title', 'Edit Berita - Tasty Food Admin')
@section('header', 'Edit Berita')

@section('content')
    <div class="max-w-3xl bg-white rounded-2xl shadow-sm border border-neutral-100 p-6 sm:p-8">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul Berita --}}
            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                    Judul Berita
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required
                        placeholder="Masukkan judul berita..."
                        class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                @error('title')
                    <span class="text-xs text-red-600 font-medium mt-1.5 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Upload Gambar --}}
            <div>
                <label for="image" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                    Foto Utama (Max 2MB: JPG, PNG, WEBP)
                </label>
                <div class="mb-3">
                    <img src="{{ asset($news->image) }}" alt="Preview" class="w-40 h-28 object-cover rounded-xl border border-neutral-200">
                    <p class="text-[11px] text-neutral-400 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
                </div>
                <input type="file" id="image" name="image" accept="image/*" 
                        class="w-full px-4 py-2.5 rounded-xl border border-neutral-300 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:bg-black file:text-white hover:file:bg-neutral-800 cursor-pointer">
                @error('image')
                    <span class="text-xs text-red-600 font-medium mt-1.5 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Isi Berita --}}
            <div>
                <label for="content" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                    Isi Artikel
                </label>
                <textarea id="content" name="content" rows="8" required
                            placeholder="Tulis isi lengkap berita di sini..."
                            class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <span class="text-xs text-red-600 font-medium mt-1.5 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Checkbox Berita Utama --}}
            <div class="flex items-center gap-3">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}
                        class="w-4 h-4 accent-black rounded cursor-pointer">
                <label for="is_featured" class="text-sm font-medium text-neutral-700 cursor-pointer">
                    Jadikan sebagai <strong>Berita Utama</strong> (Sorotan)
                </label>
            </div>

            {{-- Tombol Aksi --}}
            <div class="pt-4 border-t border-neutral-100 flex items-center gap-3">
                <button type="submit" 
                        class="px-6 py-3 bg-black text-white text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-neutral-800 transition cursor-pointer">
                    Simpan Berita
                </button>
                <a href="{{ route('admin.news.index') }}" 
                    class="px-6 py-3 bg-neutral-100 text-neutral-700 text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-neutral-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection