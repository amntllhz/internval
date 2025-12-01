@extends('layout.layout')

@section('title', 'Get Started')
@section('content')
    <section class="lg:max-w-5xl lg:bg-gradient-to-b lg:from-white lg:to-white xs:bg-gradient-to-b xs:from-apple-400 xs:to-apple-700 xs:w-full mx-auto flex flex-col lg:justify-center lg:items-center xs:justify-between xs:items-end min-h-screen">
        <div class="relative flex lg:p-2 xs:p-0 lg:flex-row xs:flex-col lg:max-w-5xl xs:w-full lg:justify-center xs:justify-between lg:gap-6 xs:gap-4 items-center rounded-2xl mx-auto xs:h-screen">

            {{-- Masuk sebagai --}}
            <div class="flex relative xs:bg-gradient-to-b xs:from-transparent xs:to-transparent lg:bg-gradient-to-b lg:from-apple-400 lg:to-apple-600 overflow-hidden flex-col lg:h-64 xs:h-full lg:p-0 xs:p-0 lg:rounded-xl xs:rounded-t-2xl xs:rounded-b-none lg:justify-center lg:items-center xs:justify-start xs:items-start">                
                {{-- <img id="getstarted" src="{{ asset('img/startimg.svg') }}" alt="getstarted" class="w-[480px] lg:pb-4 xs:pb-0"> --}}
                <img id="getstarted" src="{{ asset('img/startxs.svg') }}" alt="getstarted" class="relative lg:-top-16 xs:-top-0 lg:w-[360px] xs:w-[420px]">
            </div>

            {{-- Opsi Role --}}
            <div class="relative lg:bg-white lg:ring-0 xs:rounded-t-4xl xs:bg-white xs:ring-1 xs:ring-apple-400 lg:w-fit xs:w-full flex flex-col space-y-1 px-6 lg:py-6 xs:py-8 items-center justify-center">
                <div class="flex flex-col mb-6 justify-center items-center">
                    <h1 class="text-gray-800 text-xl font-semibold font-head">Selamat Datang</h1>
                    <p class="text-gray-400 text-center font-display text-[10px]">Pilih role untuk masuk ke aplikasi</p>
                </div>
                
                <a href={{ route('mahasiswa.redirect') }} class="text-white flex justify-center items-center gap-2 font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 lg:text-xs xs:text-sm rounded-md lg:w-56 xs:w-full text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                    </svg>
                    Mahasiswa
                </a>

                <div class="relative flex justify-center items-center">
                    <hr class="w-56 h-px my-4 bg-gray-200 border-0">
                    <p class="absolute text-gray-400 text-center bg-white px-2 -translate-x-1/2 left-1/2 font-display text-[10px]">atau masuk sebagai</p>
                </div>

                <div class="w-full flex justify-center xs:flex-row lg:gap-2 xs:gap-4">
                    <a href="/admin/login" class="flex justify-center items-center gap-2 text-gray-500 font-display font-bold bg-gray-200 hover:bg-gray-300 hover:text-white transition duration-300 ease-in-out px-4 py-2 lg:text-xs xs:text-sm rounded-md lg:w-[108px] xs:w-full text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                        </svg>
                        Dosen
                    </a>
                    <a href="/admin/login" class="flex justify-center items-center gap-2 text-gray-500 font-display font-bold bg-gray-200 hover:bg-gray-300 hover:text-white transition duration-300 ease-in-out px-4 py-2 lg:text-xs xs:text-sm rounded-md lg:w-[108px] xs:w-full text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
                        </svg>
                        BAAK
                    </a>
                </div>

            </div>

        </div>                        
    </section>
@endsection