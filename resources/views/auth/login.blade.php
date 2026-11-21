<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login - Tasty Food</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F4F4F4] text-neutral-900 antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        
        {{-- Card Login --}}
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg border border-neutral-100 p-8 sm:p-10">
            
            {{-- Header / Brand --}}
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-wider uppercase text-black">
                    TASTY FOOD
                </a>
                <p class="text-xs text-neutral-500 uppercase tracking-widest mt-2">
                    Admin Dashboard Panel
                </p>
            </div>

            {{-- Form Login --}}
            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="admin@tastyfood.com" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3.5 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                    @error('email')
                        <span class="text-xs text-red-600 font-medium mt-1.5 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-2">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required
                        class="w-full px-4 py-3.5 rounded-xl border border-neutral-300 text-sm focus:outline-none focus:border-black transition">
                    @error('password')
                        <span class="text-xs text-red-600 font-medium mt-1.5 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-black text-white font-bold text-xs tracking-widest uppercase py-4 rounded-xl hover:bg-neutral-800 transition cursor-pointer shadow-sm">
                        Masuk ke Dashboard
                    </button>
                </div>
            </form>

            {{-- Link Kembali --}}
            <div class="mt-8 pt-6 border-t border-neutral-100 text-center">
                <a href="{{ route('home') }}" class="text-xs font-medium text-neutral-500 hover:text-black transition">
                    ← Kembali ke Website Utama
                </a>
            </div>
        </div>

    </div>
</body>
</html>