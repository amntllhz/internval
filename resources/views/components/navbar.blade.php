
@php
    // Jika pakai Blade, ini bisa ditaruh di layout: untuk AlpineJS
@endphp

<div x-data="{ open: false }" class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex items-center bg-apple-100 px-8 py-4 rounded-full relative z-10 mt-4">
    <div class="flex items-center justify-between w-full">
        {{-- Logo --}}
        <img class="lg:h-6 xs:h-5" src="{{ asset('img/logo.svg') }}" alt=""> 
        
        {{-- Tombol Hamburger (muncul di breakpoint kecil) --}}
        <button 
            @click="open = !open"
            class="lg:hidden text-apple-600 focus:outline-none"
        >
            <!-- Icon Hamburger -->
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>

            <!-- Icon Close -->
            <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>

        {{-- Menu utama (hidden di xs, flex di lg) --}}
        <div class="lg:flex items-center gap-8 hidden">
            <a href="/home" class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition duration-300 ease-in-out">Beranda</a>
            <a href="/tentang" class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition duration-300 ease-in-out">Tentang</a>
            <a href="/Pengajuan" class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition duration-300 ease-in-out">Pengajuan</a>
            <a href="/Contact" class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition duration-300 ease-in-out">Kontak</a>  
        </div>
    </div>

    {{-- Menu responsif (muncul saat open=true di layar kecil) --}}
    <div x-show="open" x-transition class="lg:hidden absolute top-full mt-2 left-0 w-full bg-apple-100 rounded-xl py-4 px-6 z-20">
        <a href="/home" class="block text-apple-600 font-display text-sm font-bold hover:text-apple-900 py-2">Beranda</a>
        <a href="/tentang" class="block text-apple-600 font-display text-sm font-bold hover:text-apple-900 py-2">Tentang</a>
        <a href="/Pengajuan" class="block text-apple-600 font-display text-sm font-bold hover:text-apple-900 py-2">Pengajuan</a>
        <a href="/Contact" class="block text-apple-600 font-display text-sm font-bold hover:text-apple-900 py-2">Kontak</a>
    </div>
</div>
