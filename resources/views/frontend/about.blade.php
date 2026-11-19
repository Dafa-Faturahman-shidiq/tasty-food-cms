@extends('layouts.app')

@section('title', 'About - Tasty Food')

@section('content')
    <section style="background-image: url('{{ asset('asset/abt.jpg') }}');" class="bg-cover bg-center relative">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="tasty-container pt-36 pb-20 lg:pt-44 lg:pb-28 relative z-10">
            <h1 class="text-white text-3xl lg:text-5xl font-extrabold uppercase">Tentang Kami</h1>
        </div>
    </section>

    {{-- TENTANG --}}
    <div class=" bg-[#F4F4F4] section-space">
        <div class="tasty-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="font-extrabold text-2xl lg:text-3xl uppercase mb-6">Tasty Food</h2>
                    <p class="text-sm text-neutral-600 leading-relaxed space-y-4">Tasty Food adalah restoran yang berdedikasi untuk menyajikan hidangan lezat dan sehat kepada pelanggan kami. Kami percaya bahwa makanan yang baik tidak hanya memuaskan selera, tetapi juga memberikan manfaat bagi kesehatan.</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('asset/chef.jpg') }}" alt="" class="w-full rounded-2xl h-64 lg:h-80 object-cover shadow-lg">
                    <img src="{{ asset('asset/tomat.jpg') }}" alt="" class="w-full rounded-2xl h-64 lg:h-80 object-cover shadow-lg">
                </div>
            </div>
        </div>
    </div>

    {{-- VISI --}}
    <div class=" bg-white pt-20 lg:pt-28 pb-20 lg:pb-28">
        <div class="tasty-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="grid grid-cols-2 gap-4 order-last lg:order-first">
                    <img src="{{ asset('asset/main.jpg') }}" alt="" class="w-full rounded-2xl h-64 lg:h-80 object-cover shadow-lg">
                    <img src="{{ asset('asset/ramen.jpg') }}" alt="" class="w-full rounded-2xl h-64 lg:h-80 object-cover shadow-lg">
                </div>
                <div>
                    <h2 class="font-extrabold text-2xl lg:text-3xl uppercase mb-6">Visi</h2>
                    <p class="text-sm text-neutral-600 leading-relaxed space-y-4">Visi Tasty Food adalah menjadi restoran terdepan yang dikenal dengan kualitas makanan yang superior dan pelayanan pelanggan yang luar biasa.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- MISI --}}
    <div class=" bg-[#F4F4F4] pt-20 lg:pt-28 pb-20 lg:pb-28">
        <div class="tasty-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="font-extrabold text-2xl lg:text-3xl uppercase mb-6">Misi</h2>
                    <p class="text-sm text-neutral-600 leading-relaxed space-y-4">Misi Tasty Food adalah untuk menyajikan makanan lezat dan sehat kepada pelanggan kami, sambil memberikan pelayanan terbaik.</p>
                </div>
                <div >
                    <img src="{{ asset('asset/main.jpg') }}" alt="" class="w-full h-64 lg:h-72 object-cover rounded-2xl shadow-lg">
                </div>
            </div>
        </div>
    </div>
@endsection