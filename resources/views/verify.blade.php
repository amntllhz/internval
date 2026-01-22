@extends('layout.layout')

@section('title', 'Verify Submission')
@section('content')
    <x-navbar></x-navbar>
    @php
        $statusPengajuanColor = match($submission->status_pengajuan) {
            'pending' => 'bg-gray-100 px-2 py-[0.8px] rounded-sm ring-1 ring-gray-300 text-gray-600',
            'accepted' => 'bg-apple-50 px-2 py-[0.8px] rounded-sm ring-1 ring-apple-400 text-apple-600',
            'rejected' => 'bg-red-50 px-2 py-[0.8px] rounded-sm ring-1 ring-red-400 text-red-600',
            default => 'bg-gray-100 px-2 py-[0.8px] rounded-sm ring-1 ring-gray-300 text-gray-600'
        };
    @endphp

    <section class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center min-h-screen">
        <div class="items-center justify-center min-h-screen w-full flex">
            <div class="flex flex-col gap-2 lg:max-w-sm xs:w-full rounded-xl text-center">

                {{-- Verified --}}
                <div class="flex flex-col gap-4 justify-center w-full">

                    {{-- gambar --}}
                    <div class="justify-center items-center flex flex-col rounded-lg p-2">
                        <img class="h-40" src="{{ asset('img/verified/verified.svg') }}" alt="">
                    </div>

                    {{-- data utama --}}
                    <div class="flex flex-col space-y-4 justify-center items-center">
                        <div class="flex flex-col gap-2 lg:max-w-sm xs:w-full  mx-auto">

                            {{-- pesan --}}
                            <h1 class="text-gray-600 text-center font-semibold font-display">Dokumen Ini Valid !</h1>                            

                            {{-- data dasar --}}
                            <div class="flex py-2 px-2.5 rounded-lg w-full bg-gray-100/70 mt-2">
                                <div class="flex flex-col w-full items-start space-y-2">
                                    <p class="text-gray-400 font-semibold text-left font-display text-xs">ID</p>
                                    <p class="text-gray-400 font-semibold text-left font-display text-xs">Status Pengajuan</p>
                                    <p class="text-gray-400 font-semibold text-left font-display text-xs">Disetujui Oleh</p>                            
                                    <p class="text-gray-400 font-semibold text-left font-display text-xs">Jabatan</p>                            
                                </div>
                                <div class="flex flex-col w-full items-end space-y-2">
                                    <p class="text-gray-400 text-right font-display text-xs">{{ $submission->id }}</p>                                    
                                    <p class="font-display font-medium text-[10px] {{ $statusPengajuanColor }} text-left w-fit">
                                        {{ ucfirst($submission->status_pengajuan) }}
                                    </p>
                                    <p class="text-gray-400 text-right font-display text-xs">{{ $kaprodi->nama_kaprodi }}</p>                            
                                    <p class="text-gray-400 text-right font-display text-xs">Kaprodi {{ $kaprodi->prodi }}</p>                            
                                </div>
                            </div>

                            {{-- data tambahan --}}
                            <div class="flex py-2 px-2.5 rounded-lg w-full bg-gray-100/70">
                                <div class="flex flex-col w-full items-start space-y-2">
                                    <p class="text-gray-400 font-semibold text-left font-display text-xs">Dibuat Pada</p>
                                    <p class="text-gray-400 font-semibold text-left font-display text-xs">Terakhir Diperbarui</p>                                    
                                </div>
                                <div class="flex flex-col w-full items-end space-y-2">
                                    <p class="text-gray-400 text-right font-display text-xs">{{ $submission->created_at->format('d-m-Y · H:i:s') }}</p>                            
                                    <p class="text-gray-400 text-right font-display text-xs">{{ $submission->updated_at->format('d-m-Y · H:i:s') }}</p>
                                </div>                                
                            </div>
                        </div>

                        {{-- button kembali --}}
                        <a href="{{ url('/home') }}" class="flex-1 justify-center items-center text-gray-400 text-center font-display font-bold bg-gray-100 hover:bg-gray-50 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-lg inset-ring inset-ring-gray-200 outline -outline-offset-2 outline-white/30 shadow-md shadow-gray-200/50 inset-shadow-[0_-3px_4px] inset-shadow-gray-200/80 cursor-pointer">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <x-footer></x-footer>
@endsection