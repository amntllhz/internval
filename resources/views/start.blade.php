@extends('layout.layout')

@section('title', 'Get Started')
@section('content')
    <section class="lg:max-w-5xl lg:bg-gradient-to-b lg:from-white lg:to-white xs:bg-gradient-to-b xs:from-apple-400 xs:to-apple-700 xs:w-full mx-auto flex flex-col lg:justify-center lg:items-center xs:justify-between xs:items-end min-h-screen xs:h-dvh">
        <div class="relative flex lg:p-2 xs:p-0 lg:flex-row xs:flex-col lg:w-fit xs:w-full lg:justify-center xs:justify-between lg:gap-6 xs:gap-0 items-center rounded-2xl mx-auto lg:h-fit xs:h-dvh">

            {{-- Masuk sebagai --}}
            <div class="flex relative xs:bg-gradient-to-b xs:from-transparent xs:to-transparent lg:bg-gradient-to-b lg:from-apple-400 lg:to-apple-600 overflow-hidden flex-col lg:h-64 xs:h-auto p-0 lg:rounded-xl xs:rounded-t-2xl xs:rounded-b-none lg:justify-center lg:items-center xs:justify-start xs:items-start">                
                {{-- <img id="getstarted" src="{{ asset('img/startimg.svg') }}" alt="getstarted" class="w-[480px] lg:pb-4 xs:pb-0"> --}}
                <img id="getstarted" src="{{ asset('img/startxs.svg') }}" alt="getstarted" class="relative lg:-top-22 xs:-top-0 lg:w-[360px] lg:h-auto lg:object-cover xs:w-full xs:h-full xs:object-cover">
            </div>

            {{-- Opsi Role --}}
            <div class="lg:relative lg:bg-white lg:ring-0 xs:rounded-t-4xl xs:bg-transparent lg:w-fit xs:w-full flex flex-col space-y-1 px-6 lg:py-6 xs:py-8 items-center justify-center">
                <div class="flex flex-col mb-6 justify-center items-center">
                    <h1 class="lg:text-gray-800 xs:text-white lg:text-xl xs:text-2xl font-semibold font-head">Selamat Datang</h1>
                    <p class="lg:text-gray-400 xs:text-white text-center font-display text-[10px]">Pilih role untuk masuk ke aplikasi</p>
                </div>
                
                <a href={{ route('mahasiswa.redirect') }} class="lg:text-white xs:text-apple-600 flex justify-center items-center gap-2 font-display font-bold lg:bg-apple-600 xs:bg-white lg:hover:bg-apple-600/90 xs:hover:bg-white transition duration-300 ease-in-out px-4 py-2 lg:text-xs xs:text-sm rounded-lg lg:w-56 xs:w-full text-center cursor-pointer lg:inset-ring lg:inset-ring-apple-700/20 lg:outline lg:-outline-offset-2 lg:outline-apple-500/30 lg:shadow-md lg:shadow-apple-700/40 lg:inset-shadow-[0_-3px_4px] lg:inset-shadow-apple-700/80">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                    </svg>
                    Mahasiswa
                </a>

                <div class="relative flex justify-center items-center">
                    <hr class="w-56 h-px my-4 lg:bg-gray-200 xs:bg-transparent border-0">
                    <p class="absolute lg:text-gray-400 xs:text-white text-center lg:bg-white xs:bg-transparent px-2 -translate-x-1/2 left-1/2 font-display text-[10px]">atau masuk sebagai</p>
                </div>

                <div class="w-full flex justify-center xs:flex-row lg:gap-2 xs:gap-4">
                    <a href="/admin/login" class="flex justify-center items-center gap-1.5 lg:text-gray-400 xs:text-white font-display font-bold lg:bg-gray-100 xs:bg-transparent lg:hover:bg-gray-50 xs:hover:bg-white/30 xs:ring xs:ring-white transition duration-300 ease-in-out px-4 py-2 lg:text-xs xs:text-sm rounded-lg lg:w-[108px] xs:w-full text-center lg:ring-0 lg:inset-ring lg:inset-ring-gray-200 lg:outline lg:-outline-offset-2 lg:outline-white/30 lg:shadow-md lg:shadow-gray-200/50 lg:inset-shadow-[0_-3px_4px] lg:inset-shadow-gray-200/80">                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                            <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                            <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                        </svg>
                        Kaprodi
                    </a>
                    <a href="/admin/login" class="flex justify-center items-center gap-1.5 lg:text-gray-400 xs:text-white font-display font-bold lg:bg-gray-100 xs:bg-transparent lg:hover:bg-gray-50 xs:hover:bg-white/30 xs:ring xs:ring-white transition duration-300 ease-in-out px-4 py-2 lg:text-xs xs:text-sm rounded-lg lg:w-[108px] xs:w-full text-center lg:ring-0 lg:inset-ring lg:inset-ring-gray-200 lg:outline lg:-outline-offset-2 lg:outline-white/30 lg:shadow-md lg:shadow-gray-200/50 lg:inset-shadow-[0_-3px_4px] lg:inset-shadow-gray-200/80">                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M2.25 5.25a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3V15a3 3 0 0 1-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 0 1-.53 1.28h-9a.75.75 0 0 1-.53-1.28l.621-.622a2.25 2.25 0 0 0 .659-1.59V18h-3a3 3 0 0 1-3-3V5.25Zm1.5 0v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5Z" clip-rule="evenodd" />
                        </svg>
                        BAAK
                    </a>
                </div>

            </div>

        </div>                        
    </section>
@endsection