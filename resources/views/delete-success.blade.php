@extends('layout.layout')

@section('title', 'Success Delete Submission')
@section('content')
    <x-navbar></x-navbar>
    <section class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center min-h-screen">
        <div class="items-center justify-center min-h-screen w-full flex">
            <div class="flex flex-col gap-2 mt-10 bg-white p-4 lg:max-w-sm xs:max-w-9/10 w-full rounded-xl text-center">

                {{-- Delete Success --}}
                <div class="flex flex-col gap-4 justify-center w-full">
                    <div class="bg-gradient-to-b from-white to-apple-300/50 justify-center items-center flex flex-col rounded-lg p-6">
                        <img class="h-40" src="{{ asset('img/delsuccess/delete-success.svg') }}" alt="">
                    </div>
                    <div class="flex flex-col space-y-4 justify-center items-center">
                        <div class="flex flex-col gap-1 lg:max-w-xs xs:w-full  mx-auto">
                            <h1 class="text-gray-600 text-center font-bold font-display">Pengajuan Berhasil Dihapus</h1>
                            <p class="text-gray-400 text-center font-display text-xs">Lakukan pengajuan ulang di halaman pengajuan, pastikan data yang anda masukan sudah benar dan sesuai dengan ketentuan yang berlaku</p>
                        </div>
                        <a href="{{ url('/home') }}" class="flex gap-1 justify-center items-center text-white text-center w-fit font-display font-bold bg-apple-600 hover:bg-apple-600/90 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-lg inset-ring inset-ring-apple-700/20 outline -outline-offset-2 outline-apple-500/30 shadow-md shadow-apple-700/40 inset-shadow-[0_-3px_4px] inset-shadow-apple-700/80">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <x-footer></x-footer>
@endsection