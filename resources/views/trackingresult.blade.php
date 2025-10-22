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
                        <div class="flex flex-col col-span-full gap-1 mt-1">
                            <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Alasan Penolakan</p>
                            <div class="relative flex flex-row bg-red-50 ring ring-red-200 px-2.5 py-2.5 rounded-lg items-start gap-2 w-full">                                   
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-red-600 pt-0.5">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                </svg>                       
                                <p class="font-display text-xs font-medium text-red-600 text-left w-full items-start"> {{ $submission->alasan_penolakan }}</p>
                            </div>
                        </div>                        
                    @endif

                    {{-- Catatan Pengambilan Surat --}}
                    @if($submission->status_surat === 'ready')
                        <div class="flex flex-col gap-1 col-span-full mt-1">
                            <p class="font-display text-[9px] rounded-lg font-medium text-gray-400 text-left w-full">Informasi Surat</p>
                            <div class="relative flex flex-row bg-apple-50 ring ring-apple-200 px-2.5 py-2.5 rounded-lg items-start gap-2 w-full">                                                                   
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-apple-600">
                                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                </svg>                    
                                <p class="font-display text-xs rounded-lg font-medium text-apple-600 text-left w-full items-start">Surat dapat diambil di Ruang BAAK</p>
                            </div>                            
                        </div>
                    @endif


                </div>
            </div>
        </div>
                
        <div x-data="{ open: false, alasan: '' }">
            <!-- Tombol Hapus Pengajuan -->
            <div class="flex justify-center items-center gap-1 mt-1 text-center">
                <p class="font-display text-xs text-gray-400">Ingin mengajukan ulang ? </p>
                <button
                    @click="alasan = ''; open = true"
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
                        
                        <!-- Radio Alasan -->
                        <div class="flex flex-col text-left max-w-xs space-y-2 mb-6">
                            <label class="flex w-full px-4 py-3 justify-between items-center gap-2 text-xs font-display text-gray-400 cursor-pointer rounded-md hover:bg-gray-100 transition duration-100 ease-in-out has-checked:bg-red-50 has-checked:text-red-600 has-checked:ring-red-200 has-checked:ring-[1px]">
                                Ingin mengganti tujuan PKL
                                <input type="radio" name="alasan" value="opsi1" x-model="alasan" class="text-red-600 focus:ring-0 focus:ring-offset-0">
                            </label>
                            <label class="flex w-full px-4 py-3 justify-between items-center gap-2 text-xs font-display text-gray-400 cursor-pointer rounded-md hover:bg-gray-100 transition duration-100 ease-in-out has-checked:bg-red-50 has-checked:text-red-600 has-checked:ring-red-200 has-checked:ring-[1px]">
                                Terdapat kesalahan penulisan data
                                <input type="radio" name="alasan" value="opsi2" x-model="alasan" class="text-red-600 focus:ring-0 focus:ring-offset-0">
                            </label>
                            <label class="flex w-full px-4 py-3 justify-between items-center gap-2 text-xs font-display text-gray-400 cursor-pointer rounded-md hover:bg-gray-100 transition duration-100 ease-in-out has-checked:bg-red-50 has-checked:text-red-600 has-checked:ring-red-200 has-checked:ring-[1px]">
                                Perubahan jadwal pelaksanaan
                                <input type="radio" name="alasan" value="opsi3" x-model="alasan" class="text-red-600 focus:ring-0 focus:ring-offset-0">
                            </label>                            
                        </div>

                        <!-- Tombol Batal & Hapus -->
                        <div class="flex gap-2">
                            <button 
                                @click="open = false" 
                                class="flex-1 text-gray-700 font-display font-bold bg-white ring-1 ring-gray-300 hover:bg-gray-100 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md cursor-pointer"
                            >
                                Batal
                            </button>

                            <a 
                                :class="alasan === '' 
                                    ? 'pointer-events-none opacity-50 bg-red-400' 
                                    : 'bg-red-600 hover:bg-red-700 cursor-pointer'"
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