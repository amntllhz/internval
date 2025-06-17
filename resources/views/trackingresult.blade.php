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
            
        <div class="flex flex-col justify-center items-center gap-1 w-full rounded-2xl p-4 pb-12">            

            <div class="border-b border-gray-900/10 pb-12 grid lg:grid-cols-6 xs:grid-cols-1 w-full gap-6">
                <div class="col-span-full">
                    <h2 class="text-gray-800 text-left w-full font-bold font-display">Data Pengajuan</h2>
                    <p class="text-gray-400 text-xs text-left w-full font-display">Form dengan tanda ( <span class="text-gray-400">*</span> ) wajib diisi</p>
                </div>

                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg col-span-2 font-semibold text-sm text-gray-800 text-left w-full"> {{ $submission->nama_mahasiswa }}</p>
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg col-span-2 font-semibold text-sm text-gray-800 text-left w-full"> {{ $submission->nim }}</p>
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg col-span-2 font-semibold text-sm text-gray-800 text-left w-full"> {{ $submission->prodi }}</p>
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 text-gray-800 text-left w-full"> {{ $submission->instansi_tujuan }}</p>
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 text-gray-800 text-left w-full"> {{ $submission->provinsi }}</p>
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 text-gray-800 text-left w-full"> {{ $submission->kabupaten_kota }}</p>
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 text-gray-800 text-left w-full"> {{ $submission->kecamatan }}</p>
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 text-gray-800 text-left w-full"> {{ $submission->desa_kelurahan }}</p>
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 text-gray-800 text-left w-full"> {{ $submission->tanggal_mulai }} <span class="text-apple-600 text-sm">s/d</span> {{ $submission->tanggal_selesai }}</p>
        
            </div>
            

            @php
                $statusPengajuanColor = match($submission->status_pengajuan) {
                    'pending' => 'text-gray-800',
                    'accepted' => 'text-apple-600',
                    'rejected' => 'text-red-600',
                    default => 'text-gray-800'
                };

                $statusSuratColor = match($submission->status_surat) {
                    'none' => 'text-gray-800',
                    'made' => 'text-yellow-600',
                    'ready' => 'text-apple-600',
                    default => 'text-gray-800'
                };
            @endphp

            <div class="grid lg:grid-cols-4 xs:grid-cols-1 gap-6 mt-10 w-full">
                <div class="col-span-full">
                    <h2 class="text-gray-800 text-left w-full font-semibold text-sm font-display">Status Pengajuan</h2>
                    <p class="text-gray-400 text-xs text-left w-full font-display">Form dengan tanda ( <span class="text-gray-400">*</span> ) wajib diisi</p>
                </div>

                {{-- Status Pengajuan --}}
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 {{ $statusPengajuanColor }} text-left w-full">
                    {{ ucfirst($submission->status_pengajuan) }}
                </p>

                {{-- Alasan Penolakan --}}
                @if($submission->status_pengajuan === 'rejected' && $submission->alasan_penolakan)
                    <p class="font-display bg-red-100 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 text-red-600 text-left w-full">
                        {{ $submission->alasan_penolakan }}
                    </p>
                @endif

                {{-- Status Surat --}}
                <p class="font-display bg-apple-900/10 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-2 {{ $statusSuratColor }} text-left w-full">
                    {{ ucfirst($submission->status_surat) }}
                </p>

                {{-- Catatan Pengambilan Surat --}}
                @if($submission->status_surat === 'ready')
                    <p class="font-display bg-apple-100 px-3 py-1.5 rounded-lg font-semibold text-sm col-span-full text-apple-600 text-left w-full">
                        Catatan: Surat sudah bisa diambil di ruang BAAK
                    </p>
                @endif
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</body>
</html>