@extends('layouts.app')

@section('title', 'Contact - Tasty Food')

@section('content')
    <section style="background-image: url('{{ asset('asset/abt.jpg') }}');" class="bg-cover bg-center relative">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="tasty-container pt-36 pb-20 lg:pt-44 lg:pb-28 relative z-10">
            <h1 class="text-white text-3xl lg:text-5xl font-extrabold uppercase">Kontak Kami</h1>
        </div>
    </section>

    {{-- FORM   --}}
    <section class="bg-white section-space">
        <div class="tasty-container">
            <h2 class="text-2xl lg:text-3xl font-extrabold uppercase mb-8">KONTAK KAMI</h2>

                {{-- SUCCESS MESSAGE --}}
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-green-100 border border-green-300 text-green-800 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- EROR MESSAGE --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-100 border border-red-300 text-red-800 text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <form action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="flex flex-col gap-4">
                        {{-- subject --}}
                        <input type="text" name="subject" placeholder="subject" value="{{ old('subject') }}" class="w-full px-4 py-3.5 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                        {{-- name  --}}
                        <input type="text" name="name" placeholder="name" value="{{ old('name') }}" class="w-full px-4 py-3.5 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                        {{-- email --}}
                        <input type="email" name="email" placeholder="email" value="{{ old('email') }}" class="w-full px-4 py-3.5 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                    </div>
                    {{-- message --}}
                    <textarea name="message" placeholder="message" class="w-full h-full min-h-[160px] px-4 py-3.5 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition resize-none">{{ old('message') }}</textarea>
                </div>
                    <button type="submit" class="w-full bg-black text-white font-bold text-xs tracking-widest uppercase py-4 rounded-xl hover:bg-neutral-800 transition cursor-pointer">KIRIM</button>
            </form>

            {{-- CONTACT INFO --}}
            <div class="mt-16 lg:mt-20 mb-20">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 rounded-full bg-black text-white flex items-center justify-center mb-4 shadow-md">
                            <img src="{{ asset('asset/email.png') }}" alt="">
                        </div>
                        <h3 class="font-extrabold text-sm uppercase tracking-wider mb-1">Email</h3>
                        <p class="text-xs text-neutral-600">{{ $profile->email ?? 'tastyfood@gmail.com' }}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 rounded-full bg-black text-white flex items-center justify-center mb-4 shadow-md">
                            <img src="{{ asset('asset/telp.png') }}" alt="">
                        </div>
                        <h3 class="font-extrabold text-sm uppercase tracking-wider mb-1">Telepon</h3>
                        <p class="text-xs text-neutral-600">{{ $profile->phone ?? '+62 812 3456 7890' }}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 rounded-full bg-black text-white flex items-center justify-center mb-4 shadow-md">
                            <img src="{{ asset('asset/loca.png') }}" alt="">
                        </div>
                        <h3 class="font-extrabold text-sm uppercase tracking-wider mb-1">Lokasi</h3>
                        <p class="text-xs text-neutral-600">{{ $profile->address ?? 'Bandung , Jawa Barat' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- LOCATION --}}
        <section class="bg-[#F4F4F4] section-space">
            <div class="tasty-container">
                <h2 class="text-2xl lg:text-3xl font-extrabold uppercase mb-8">LOKASI KAMI</h2>
                <div class="w-full h-[400px] rounded-xl overflow-hidden">
                    <iframe class="w-full h-72 md:h-96 rounded-2xl shadow-md border-0" src="{{ $profile?->maps_url }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
            </div>
        </section>
    </section>
@endsection