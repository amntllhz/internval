<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>submission-{{ e($submission->nim) }}</title>
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    <style>
        /* CSS untuk Dompdf */
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            margin: 0;
            padding: 16px 6px 16px 6px; /* Margin atas, kanan, bawah, kiri */
        }
        .header {
            text-align: center;
            border: black 4px solid;
            outline: 1px solid black;       /* border dalam */
            outline-offset: -6px;
            padding: 0;    
            margin-bottom: 30px;        
        }
        .header-one {
            font-size: 14pt;
            margin-bottom: 2px;
            padding: 0;
            line-height: 0.6;
        }
        
        .header-two-group {            
            padding: 0;
            margin: 0;
        }

        .header-two {
            font-size: 12pt;            
            padding: 0;
            line-height: 0.5;
        }
        .section-title {
            font-weight: bold;  
            margin-left: 16px;          
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .title-span {
            margin-left: 10px;
        }

        .data-row {
            margin-left: 42px;
            display: table;
            width: 80%;
            margin-bottom: 3px;
        }
        .data-label, .data-separator, .data-value {
            display: table-cell;
        }
        .data-label {
            width: 20%;
            padding-right: 5px;
        }
        .data-separator {
            width: 1%;
            text-align: center;
        }
        .data-value {
            padding-left: 5px;
            width: 59%;
        }

        .table-container {
            padding-right: 50px;
            box-sizing: border-box;
        }

        .table-period {
            width: 100%;            
            margin-left: 42px;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table-period th, .table-period td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .table-period th {
            background-color: #f2f2f2;
        }
        .signature-section {
            display: block;
            margin: 50px auto 0 auto;
            width: 90%;
        }
        .signature-column {
            width: 45%;            
            float: left;
            text-align: center;            
            line-height: 0.4;
        }
        .signature-right {
            text-align: center;
            float: right;
            line-height: 0.4;
        }

        .signature-kaprodi {            
            text-decoration: underline;
            margin-top: 30px;
            padding: 0;
            line-height: 1.2;
        }

        .signature-mahasiswa {            
            text-decoration: underline;            
            padding: 0;
            margin-top: 48px;
            line-height: 1.2;
        }

        .clear {
            clear: both;
        }
        .note {
            font-size: 9pt;
            margin-left: 16px;
            margin-top: 100px;
            line-height: 0.8;
        }

        .badge-id {
            font-family: 'Manrope', sans-serif;
            background-color: #f4ffe8;
            padding: 2px 4px 2px 4px;
            border-radius: 4px;
            color: #58cc02;
            border: #ceff8a solid 1px;
            width: fit-content;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="header-one">FORMULIR PENGAJUAN</h1>
        <div class="header-two-group">
            <h2 class="header-two">PRAKTEK KERJA LAPANGAN (PKL) / MAGANG</h2>
            <h2 class="header-two">FAKULTAS TEKNIK DAN ILMU KOMPUTER (FASTIKOM)</h2>
            <h2 class="header-two">UNIVERSITAS MUHAMMADIYAH PEKAJANGAN PEKALONGAN (UMPP)</h2>
        </div>
    </div>

    <div class="section-title">1.  <span class="title-span">Biodata Diri</span></div>
    <div class="data-row">
        <div class="data-label">Nama</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->nama_mahasiswa) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">NIM</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->nim) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">Program Studi</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->prodi) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">Jenis Kelamin</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->jenis_kelamin) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">No Telepon</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->telepon) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">E-mail</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->email) }}</div>
    </div>    

    <div class="section-title">2.  <span class="title-span">Lembaga Tempat Praktek Kerja Lapangan (PKL) / Magang</span></div>
    <div class="data-row">
        <div class="data-label">Nama Lembaga / Instansi</div>
        <div class="data-separator">:</div>        
        <div class="data-value">{{ e($submission->instansi_tujuan) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">Provinsi</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->provinsi) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">Kabupaten / Kota</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->kabupaten_kota) }}</div>
    </div>    
    <div class="data-row">
        <div class="data-label">Kecamatan</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->kecamatan) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">Desa / Kelurahan</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->desa_kelurahan) }}</div>
    </div>
    <div class="data-row">
        <div class="data-label">Jalan</div>
        <div class="data-separator">:</div>
        <div class="data-value">{{ e($submission->jalan) }}</div>
    </div>

    <div class="section-title">3.  <span class="title-span">Periode Magang</span></div>
    <div class="table-container">
        <table class="table-period">
            <thead>
                <tr>
                    <th>TANGGAL MULAI</th>
                    <th>TANGGAL BERAKHIR</th>
                    <th>DPL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{-- Format tanggal sesuai keinginan Anda --}}
                    <td>{{ \Carbon\Carbon::parse($submission->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($submission->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                    {{-- Asumsi ada kolom dpl atau relasi ke DPL --}}
                    <td>{{ e($submission->dospem->nama_dosen) ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="signature-section">
        <div class="signature-column">
            <p>Mengetahui,</p>
            <p>Ka. Prodi {{ e($submission->prodi) }}</p>
            <p>Fakultas Teknik dan Ilmu Komputer UMPP</p>
            <br><br><br><br>
            {{-- Asumsi data Ka. Prodi tersedia --}}
            <p class="signature-kaprodi">{{ e($kaprodi->nama_kaprodi) }}</p>
            <p>NIDN. {{ e($kaprodi->nidn) }}</p>
        </div>
        <div class="signature-column signature-right">
            {{-- Tanggal pengajuan --}}
            <p>Pekalongan, {{ \Carbon\Carbon::parse($submission->created_at)->translatedFormat('d F Y') }}</p>
            <p>Yang bersangkutan,</p>
            <br><br><br><br>
            <p class="signature-mahasiswa">{{ e($submission->nama_mahasiswa) }}</p>
            <p>NIM. {{ e($submission->nim) }}</p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="note">
        <p>** Catatan:</p>
        <p>** Pengajuan ini telah terverifikasi melalui Internval</p>  
        <p>** <span class="badge-id">{{ e($submission->id) }}</span></p>      
    </div>
</body>
</html>