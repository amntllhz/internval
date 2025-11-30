
@php
    // Jika pakai Blade, ini bisa ditaruh di layout: untuk AlpineJS
@endphp

<div 
    x-data="{ open: false }" 
    class="lg:max-w-5xl xs:max-w-9/10 w-full fixed left-1/2 -translate-x-1/2 top-4 z-50 
           bg-apple-600/10 backdrop-blur-lg px-6 py-4 rounded-2xl transition-all duration-300"
>

    {{-- Navbar --}}
    <div class="flex items-center justify-between">

        {{-- Logo --}}
        <a href={{ url('/home') }}>
            <img class="lg:h-6 xs:h-5" src="{{ asset('img/logo.svg') }}" alt=""> 
        </a>
        
        {{-- Hamburger Button --}}
        <button @click="open = !open" class="lg:hidden text-apple-600 focus:outline-none">
            <!-- Open Icon -->
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <!-- Close Icon -->
            <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        {{-- Menu utama (inline horizontal di lg) --}}
        <div class="hidden lg:flex items-center gap-8">            
            <a href={{ url('/tracking') }} class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition">Cek Status</a>
            <a href={{ url('/submission') }} class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition">Pengajuan</a>
            <a href="#footer" class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition">Kontak</a>  
        </div>
    </div>

    {{-- Menu responsif (stacked vertical in xs) --}}
    <div x-show="open" x-collapse x-cloak class="mt-8 flex flex-col gap-3 lg:hidden">        
        <a href={{ url('/tracking') }} class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition">Cek Status</a>
        <a href={{ url('/submission') }} class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition">Pengajuan</a>
        <a href="#footer" class="text-apple-600 font-display text-sm font-bold hover:text-apple-900 transition">Kontak</a>
    </div>

</div>

