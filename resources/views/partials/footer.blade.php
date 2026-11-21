<footer class="bg-[#121212] text-white pt-14 pb-8 lg:pt-20 lg:pb-10">
    <div class="tasty-container">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-10">

            <div class="lg:col-span-4">
                <h2 class="text-xl font-extrabold uppercase mb-4">TASTY FOOD</h2>
                <p class="text-neutral-400 text-sm leading-relaxed">{{ $profile->about_text ?? 'Tasty Food menyajikan hidangan lezat dan sehat.'}}</p>
                {{-- iccon --}}
                <div class="flex items-center gap-4 mt-6">
                    <a href="{{ $profile->facebook_url ?? '#' }}" class="w-10 h-10 rounded-full bg-neutral-800 flex items-center justify-center hover:bg-neutral-700 transition-colors">
                        <img src="{{ asset('asset/fb.png') }}" alt="">
                    </a>
                    <a href="{{ $profile->twitter_url ?? '#' }}" class="w-10 h-10 rounded-full bg-neutral-800 flex items-center justify-center hover:bg-neutral-700 transition-colors">
                        <img src="{{ asset('asset/twit.png') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="lg:col-span-2">
                <h3 class="font-extrabold mb-4">Useful Links</h3>
                <ul class="flex flex-col gap-2 sm:space-y-3">
                    <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">blog</a></li>
                    <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Hewan</a></li>
                    <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Gallery</a></li>
                    <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Testimonial</a></li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h3 class="font-extrabold mb-4">Privacy</h3>
                <ul class="flex flex-col gap-2 sm:space-y-3">
                    <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Karir</a></li>
                    <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Servis</a></li>
                    <li><a href="#" class="text-neutral-400 hover:text-white transition-colors">Kontak kami</a></li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h3 class="font-extrabold mb-4">Contact Info</h3>
                <ul class="flex flex-col gap-2 sm:space-y-3">
                    <div class="flex items-center gap-3">
                        <li class="text-neutral-400 hover:text-white transition-colors">{{ $profile->email ?? 'tastyfood@gmail.com' }}</li>
                    </div>
                    <div class="flex items-center gap-3">
                        <li class="text-neutral-400 hover:text-white transition-colors">{{ $profile->phone ?? '+62 812 3456 7890' }}</li>
                    </div>
                    <div class="flex items-center gap-3">
                        <li class="text-neutral-400 hover:text-white transition-colors">{{ $profile->address ?? 'Kota Bandung, Jawa Barat' }}</li>
                    </div>
                </ul>
            </div>

        </div>
        <div class="mt-12 pt-8 border-t border-neutral-800">
            <p class="text-center text-xs text-neutral-500">© 2026 Tasty Food. All rights reserved.</p>
        </div>
    </div>
</footer>