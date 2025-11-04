<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Pengajuan</title>
    <link rel="icon" href={{ asset('img/icon.svg') }}>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>
    <section class="lg:max-w-4xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center mt-28 mb-20">

        {{-- Judul --}}
        <div class="flex flex-col justify-center items-center gap-1">
            <h1 class="text-apple-600 lg:text-3xl xs:text-2xl font-bold font-display text-center w-full">Cek Status Pengajuan</h1>
            <p class="text-gray-400 text-sm font-display">Lakukan pengecekan status pengajuan secara berkala</p>           
        </div>

        {{-- Wrong ID --}}
        @if(session('error'))
            {{-- <p style="color: red;">{{ session('error') }}</p> --}}
            <!-- Modal Overlay -->
            <div 
                x-data="{ open: true }" 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-lg z-50 min-h-screen"
            >
                
                <div class="bg-white backdrop-blur-lg p-4 rounded-xl lg:max-w-xs xs:max-w-9/10 w-full text-center relative z-60">
                    <!-- Gambar -->
                    <div class="bg-red-100 p-2.5 rounded-full w-fit mx-auto mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>                        
                    </div>

                    <!-- Konten Modal -->
                    <div class="mt-4">
                        <h2 class="text-base font-display font-bold text-gray-800 mb-1">{{ session('error') }}</h2>
                        <p class="font-display text-xs text-gray-400 mb-1">Pastikan ID yang anda tuliskan benar</p>                                           

                        <!-- Tombol Tutup -->
                        <button 
                            @click="open = false" 
                            class="text-white mt-4 font-display font-bold bg-red-600 hover:bg-red-700 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md w-full cursor-pointer"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endif    

        {{-- Form Tracking --}}
        <form x-data="{ loading: false }" x-on:submit="loading = true" action="{{ route('tracking.result') }}" method="POST" class="lg:max-w-3xl xs:max-w-9/10 flex flex-col gap-4 justify-center w-full ring ring-apple-400 p-4 rounded-2xl mt-6">
            @csrf

            <div class="flex flex-col gap-2">
                <label for="id" class="block text-xs font-display text-apple-600 font-semibold">ID Pengajuan</label>            
                <input name="id" id="id" type="text" pattern="[A-Za-z0-9\s]+" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').toUpperCase()" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5" placeholder="Tuliskan ID Pengajuan" required autocomplete="off"/>
            </div>            

            <div class="flex justify-center w-full">
                <button 
                    type="submit"
                    :disabled="loading"
                    class="flex items-center justify-center gap-2 text-white cursor-pointer text-center font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-lg w-full disabled:opacity-70 disabled:cursor-not-allowed"
                >
                    <template x-if="!loading">
                        <span>Cek Status</span>
                    </template>
                    <template x-if="loading">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 border-2 border-white border-t-white/20 rounded-full animate-spin"></div>
                            <span>Mencari...</span>
                        </div>
                    </template>
                </button>
            </div>
            
        </form>

    </section>
    <x-footer></x-footer>
</body>
</html>