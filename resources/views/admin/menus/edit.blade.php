@extends('layouts.admin')

@section('title', 'Edit Menu - Tasty Food Admin')
@section('header', 'Edit Menu')

@section('content')
    <div class="max-w-2xl bg-white rounded-sm shadow-sm border border-neutral-100 p-6 sm:p-8">
        <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">Nama Menu</label>
                <input type="text" id="name" name="name" value="{{ old('name', $menu->name) }}" required
                        class="w-full px-4 py-3 rounded-sm border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                @error('name') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="image" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">Foto Menu</label>
                <div class="mb-3">
                    <img id="image-preview" src="{{ asset($menu->image) }}" alt="Preview"
                            class="w-28 h-28 object-cover rounded-full border border-neutral-200">
                    <p id="preview-label" class="text-[11px] text-neutral-400 mt-1.5">Foto saat ini. Pilih file baru jika ingin menggantinya.</p>
                </div>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"
                        class="w-full px-4 py-2.5 rounded-sm border border-neutral-300 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-bold file:uppercase file:bg-black file:text-white hover:file:bg-neutral-800 cursor-pointer">
                @error('image') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">Deskripsi Singkat</label>
                <textarea id="description" name="description" rows="4" required
                            class="w-full px-4 py-3 rounded-sm border border-neutral-300 text-sm focus:outline-none focus:border-black transition">{{ old('description', $menu->description) }}</textarea>
                @error('description') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $menu->is_featured) ? 'checked' : '' }}
                    class="w-4 h-4 accent-black rounded-sm cursor-pointer">
                <label for="is_featured" class="text-sm font-medium text-neutral-700 cursor-pointer">
                    Tampilkan di <strong>4 Kartu Menu Utama</strong> (Halaman Home)
                </label>
                @error('is_featured')
                    <span class="text-xs text-red-600 font-medium mt-1.5 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-4 border-t border-neutral-100 flex items-center gap-3">
                <button type="submit" class="px-6 py-3 bg-black text-white text-xs font-bold uppercase tracking-wider rounded-sm hover:bg-neutral-800 transition cursor-pointer">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.menus.index') }}" class="px-6 py-3 bg-neutral-100 text-neutral-700 text-xs font-bold uppercase tracking-wider rounded-sm hover:bg-neutral-200 transition">
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
                preview.src = URL.createObjectURL(input.files[0]);
                label.textContent = 'Pratinjau foto baru (belum disimpan).';
                label.classList.remove('text-neutral-400');
                label.classList.add('text-green-600', 'font-semibold');
            }
        }
    </script>
@endsection