<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="max-w-5xl w-full mx-auto flex flex-col">
        <h2>Detail Pengajuan</h2>

        <p class="font-display font-bold text-accent2">Nama: {{ $submission->nama_mahasiswa }}</p>
        <p class="font-display font-bold text-accent2">NIM: {{ $submission->nim }}</p>
        <p class="font-display font-bold text-accent2">Prodi: {{ $submission->prodi }}</p>
        <p class="font-display font-bold text-accent2">Instansi: {{ $submission->instansi_tujuan }}</p>
        <p class="font-display font-bold text-accent2">Tanggal: {{ $submission->tanggal_mulai }} s/d {{ $submission->tanggal_selesai }}</p>

        <p class="font-display font-bold text-green-600">Status Pengajuan: {{ ucfirst($submission->status_pengajuan) }}</p>

        @if($submission->status_pengajuan === 'rejected' && $submission->alasan_penolakan)
            <p class="font-display font-bold text-accent2">Alasan Penolakan: {{ $submission->alasan_penolakan }}</p>
        @endif

        <p class="font-display font-bold text-accent2">Status Surat: {{ ucfirst($submission->status_surat) }}</p>

        @if($submission->status_surat === 'ready')
            <p class="font-display font-bold text-accent2">Catatan: Surat sudah bisa diambil di ruang BAAK</p>
        @endif
    </section>
</body>
</html>