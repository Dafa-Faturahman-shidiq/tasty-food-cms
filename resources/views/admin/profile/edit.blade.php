@extends('layouts.admin')

@section('title', 'Profil Perusahaan - Tasty Food Admin')
@section('header', 'Profil Perusahaan')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-neutral-100 p-6 sm:p-8">
        <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            {{-- Bagian 1: Tentang, Visi & Misi --}}
            <div class="space-y-5">
                <h3 class="text-sm font-extrabold uppercase tracking-wider text-black border-b border-neutral-100 pb-3">
                    Identitas & Visi Misi
                </h3>

                <div>
                    <label for="about_text" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                        Tentang Kami (About)
                    </label>
                    <textarea id="about_text" name="about_text" rows="4"
                              class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">{{ old('about_text', $profile->about_text) }}</textarea>
                    @error('about_text') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="vision" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                            Visi Perusahaan
                        </label>
                        <textarea id="vision" name="vision" rows="4"
                                  class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">{{ old('vision', $profile->vision) }}</textarea>
                        @error('vision') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="mission" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                            Misi Perusahaan
                        </label>
                        <textarea id="mission" name="mission" rows="4"
                                  class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">{{ old('mission', $profile->mission) }}</textarea>
                        @error('mission') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Bagian 2: Kontak & Lokasi --}}
            <div class="space-y-5">
                <h3 class="text-sm font-extrabold uppercase tracking-wider text-black border-b border-neutral-100 pb-3">
                    Kontak & Alamat
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                            Email Resmi
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', $profile->email) }}"
                               class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                        @error('email') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                            Nomor Telepon / WhatsApp
                        </label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}"
                               class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                        @error('phone') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="address" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                        Alamat Lengkap
                    </label>
                    <input type="text" id="address" name="address" value="{{ old('address', $profile->address) }}"
                           class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                    @error('address') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="maps_url" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                        Link Embed Google Maps (src iframe)
                    </label>
                    <input type="text" id="maps_url" name="maps_url" value="{{ old('maps_url', $profile->maps_url) }}"
                           placeholder="https://www.google.com/maps/embed?..."
                           class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                    @error('maps_url') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Bagian 3: Sosial Media --}}
            <div class="space-y-5">
                <h3 class="text-sm font-extrabold uppercase tracking-wider text-black border-b border-neutral-100 pb-3">
                    Tautan Sosial Media
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="facebook_url" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                            URL Facebook
                        </label>
                        <input type="url" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $profile->facebook_url) }}"
                               placeholder="https://facebook.com/..."
                               class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                        @error('facebook_url') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="twitter_url" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                            URL Twitter / X
                        </label>
                        <input type="url" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $profile->twitter_url) }}"
                               placeholder="https://twitter.com/..."
                               class="w-full px-4 py-3 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                        @error('twitter_url') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Tombol Simpan --}}
            <div class="pt-4 border-t border-neutral-100">
                <button type="submit" 
                        class="px-8 py-3.5 bg-black text-white text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-neutral-800 transition cursor-pointer">
                    Simpan Perubahan Profil
                </button>
            </div>
        </form>
    </div>
@endsection