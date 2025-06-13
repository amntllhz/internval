<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="max-w-5xl w-full mx-auto flex flex-col">
        <h2>Detail Pengajuan</h2>

        <p><strong>Nama:</strong> {{ $submission->nama_mahasiswa }}</p>
        <p><strong>NIM:</strong> {{ $submission->nim }}</p>
        <p><strong>Prodi:</strong> {{ $submission->prodi }}</p>
        <p><strong>Instansi:</strong> {{ $submission->instansi_tujuan }}</p>
        <p><strong>Tanggal:</strong> {{ $submission->tanggal_mulai }} s/d {{ $submission->tanggal_selesai }}</p>

        <p><strong>Status Pengajuan:</strong> {{ ucfirst($submission->status_pengajuan) }}</p>

        @if($submission->status_pengajuan === 'rejected' && $submission->alasan_penolakan)
            <p><strong>Alasan Penolakan:</strong> {{ $submission->alasan_penolakan }}</p>
        @endif

        <p><strong>Status Surat:</strong> {{ ucfirst($submission->status_surat) }}</p>

        @if($submission->status_surat === 'ready')
            <p><strong>Catatan:</strong> Surat sudah bisa diambil di ruang BAAK</p>
        @endif
    </section>
</body>
</html>