@extends('layouts.admin')

@section('title', 'Edit Foto Galeri - Tasty Food Admin')
@section('header', 'Edit Foto Galeri')

@section('content')
    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-neutral-100 p-6 sm:p-8">
        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul / Keterangan Foto (Opsional) --}}
            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                    Keterangan Foto <span class="text-neutral-400 font-normal lowercase">(opsional)</span>
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $gallery->title) }}"
                        placeholder="Contoh: Hidangan Spesial Nusantara..."
                        class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                @error('title')
                    <span class="text-xs text-red-600 font-medium mt-1.5 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Upload Gambar --}}
            <div>
                <label for="image" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                    Pilih Foto (Max 2MB: JPG, PNG, WEBP)
                </label>
                <div class="mb-3">
                        <img id="image-preview" src="{{ asset($gallery->image) }}" alt="Preview" 
                                class="w-48 h-32 object-cover rounded-xl border border-neutral-200 shadow-sm">
                        <p id="preview-label" class="text-[11px] text-neutral-400 mt-1.5">
                            Foto saat ini. Pilih file baru di bawah jika ingin menggantinya.
                        </p>
                </div>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"
                        class="w-full px-4 py-2.5 rounded-xl border border-neutral-300 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:bg-black file:text-white hover:file:bg-neutral-800 cursor-pointer">
                @error('image')
                    <span class="text-xs text-red-600 font-medium mt-1.5 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Checkbox Carousel Utama --}}
            <div class="flex items-center gap-3">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}
                        class="w-4 h-4 accent-black rounded cursor-pointer">
                <label for="is_featured" class="text-sm font-medium text-neutral-700 cursor-pointer">
                    Tampilkan di <strong>Carousel Utama</strong> (Halaman Galeri)
                </label>
            </div>

            {{-- Tombol Aksi --}}
            <div class="pt-4 border-t border-neutral-100 flex items-center gap-3">
                <button type="submit" 
                        class="px-6 py-3 bg-black text-white text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-neutral-800 transition cursor-pointer">
                    Simpan Foto
                </button>
                <a href="{{ route('admin.galleries.index') }}" 
                    class="px-6 py-3 bg-neutral-100 text-neutral-700 text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-neutral-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const label = document.getElementById('preview-label');
        
            if (input.files && input.files[0]) {
                // Membuat URL sementara dari file yang baru dipilih di komputer
                preview.src = URL.createObjectURL(input.files[0]);
                
                // Ubah keterangan teks biar admin sadar ini foto baru
                label.textContent = 'Pratinjau foto baru (belum disimpan).';
                label.classList.remove('text-neutral-400');
                label.classList.add('text-green-600', 'font-semibold');
            }
        }
    </script>
@endsection