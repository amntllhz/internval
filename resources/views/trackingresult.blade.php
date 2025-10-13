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
    <section class="lg:max-w-4xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center mt-28 gap-8 mb-20">
        
        <div class="flex flex-col justify-center items-center gap-1">
            <h1 class="text-apple-600 lg:text-3xl xs:text-2xl font-bold font-display text-center w-full">Status Pengajuan</h1>
            <p class="text-gray-400 text-sm font-display text-center w-full">Baca peraturan mengenai Praktik Kerja Lapangan sebelum melakukan pengajuan</p>        
        </div>

        <div class="flex lg:w-2/3 xs:max-w-9/10 lg:flex-row xs:flex-col w-full ring-1 ring-apple-200 gap-4 p-4 rounded-xl">
            <div class="bg-apple-50 p-4 rounded-md flex justify-center items-center">
                <img src="{{ asset('img/flow/sendsub.svg') }}" class="w-36" alt="">
            </div>
            <div class="flex flex-col gap-1 justify-start items-start w-full">
                <h1 class="text-gray-800 bg-gray-100 px-3 py-1 lg:rounded-tr-lg text-sm w-full font-bold font-display">{{ $submission->id }}</h1>                
                <div class="grid lg:grid-cols-2 xs:grid-cols-1 gap-1 px-3 py-2">

                    @php
                        $statusPengajuanColor = match($submission->status_pengajuan) {
                            'pending' => 'bg-gray-100 px-2 py-[0.8px] rounded-full ring-1 ring-gray-300 text-gray-600',
                            'accepted' => 'bg-apple-50 px-2 py-[0.8px] rounded-full ring-1 ring-apple-400 text-apple-600',
                            'rejected' => 'bg-red-50 px-2 py-[0.8px] rounded-full ring-1 ring-red-400 text-red-600',
                            default => 'bg-gray-100 px-2 py-[0.8px] rounded-full ring-1 ring-gray-300 text-gray-600'
                        };

                        $statusSuratColor = match($submission->status_surat) {
                            'none' => 'bg-gray-100 px-2 py-[0.8px] rounded-full ring-1 ring-gray-300 text-gray-600',
                            'made' => 'bg-yellow-50 px-2 py-[0.8px] rounded-full ring-1 ring-yellow-400 text-yellow-600',
                            'ready' => 'bg-apple-50 px-2 py-[0.8px] rounded-full ring-1 ring-apple-400 text-apple-600',
                            default => 'bg-gray-100 px-2 py-[0.8px] rounded-full ring-1 ring-gray-300 text-gray-600'
                        };
                    @endphp

                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Nama</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full">{{ $submission->nama_mahasiswa }}</p>
                    </div>

                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">NIM</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->nim }}</p>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Program Studi</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->prodi }}</p>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Instansi Tujuan</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->instansi_tujuan }}</p>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Provinsi</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->provinsi }}</p>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Kabupaten/Kota</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->kabupaten_kota }}</p>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Kecamatan</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->kecamatan }}</p>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Desa/Kelurahan</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->desa_kelurahan }}</p>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Waktu Pelaksanaan</p>
                        <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->tanggal_mulai }} <span class="text-apple-600 text-[9px]">s/d</span> {{ $submission->tanggal_selesai }}</p>
                    </div>                    
                </div>

                <div class="grid lg:grid-cols-2 xs:grid-cols-1 gap-2 px-3 py-2 w-full">

                    <div class="flex flex-col gap-1.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Status Pengajuan</p>
                        <p class="font-display font-medium text-[10px] {{ $statusPengajuanColor }} text-left w-fit">
                            {{ ucfirst($submission->status_pengajuan) }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Status Surat</p>
                        <p class="font-display font-medium text-[10px] {{ $statusSuratColor }} text-left w-fit">
                            {{ ucfirst($submission->status_surat) }}
                        </p>
                    </div>

                    {{-- Alasan Penolakan --}}
                    @if($submission->status_pengajuan === 'rejected' && $submission->alasan_penolakan)
                        <div class="flex flex-col gap-1">
                            <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Alasan Penolakan</p>
                            <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full"> {{ $submission->alasan_penolakan }}</p>
                        </div>                        
                    @endif

                    {{-- Catatan Pengambilan Surat --}}
                    @if($submission->status_surat === 'ready')
                        <div class="flex flex-col gap-1">
                            <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Informasi Surat</p>
                            <p class="font-display text-xs rounded-lg font-medium text-gray-800 text-left w-full">Surat dapat diambil di Ruang BAAK</p>
                        </div>
                    @endif


                </div>
            </div>
        </div>
                
        <div x-data="{ open: false }">
            <!-- Tombol Hapus Pengajuan -->
            <div class="flex justify-center items-center gap-1 mt-1 text-center">
                <p class="font-display text-xs text-gray-400">Ingin mengajukan ulang ? </p>
                <button
                    @click="open = true"
                    class="text-red-600 font-display text-xs font-semibold hover:text-red-800 cursor-pointer"                    
                >
                    Hapus Pengajuan
                </button>
            </div>

            <!-- Modal Konfirmasi Hapus -->
            <div
                x-show="open"
                x-transition
                class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-lg z-50"
            >
                <div class="bg-white p-6 rounded-xl lg:max-w-xs xs:max-w-9/10 w-full text-center relative z-60">
                    <!-- Icon Warning -->
                    <div class="bg-red-100 p-2.5 rounded-full w-fit mx-auto mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>                        
                    </div>

                    <!-- Konten Modal -->
                    <div class="mt-4">
                        <h2 class="text-base font-display font-bold text-gray-800 mb-1">Hapus Pengajuan</h2>
                        <p class="font-display text-xs text-gray-400 mb-4">
                            Anda yakin ingin menghapus pengajuan ini? Tindakan ini tidak dapat dikembalikan.
                        </p>                                           

                        <!-- Tombol Batal & Hapus -->
                        <div class="flex gap-2">
                            <button 
                                @click="open = false" 
                                class="flex-1 text-gray-700 font-display font-bold bg-white ring-1 ring-gray-300 hover:bg-gray-100 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md cursor-pointer"
                            >
                                Batal
                            </button>

                            <a 
                                href="{{ route('submission.delete', ['id' => $submission->id]) }}"
                                class="flex-1 text-white font-display font-bold bg-red-600 hover:bg-red-700 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md"
                            >
                                Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <x-footer></x-footer>
</body>
</html>