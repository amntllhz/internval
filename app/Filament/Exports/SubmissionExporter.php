<?php

namespace App\Filament\Exports;

use App\Models\Submission;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SubmissionExporter extends Exporter
{
    protected static ?string $model = Submission::class;

    public static function getColumns(): array
    {
        return [
            //
            ExportColumn::make('id')
                ->label('ID Pegajuan'),
            ExportColumn::make('nim')
                ->label('NIM'),
            ExportColumn::make('nama_mahasiswa')
                ->label('Nama Mahasiswa'),          
            ExportColumn::make('prodi')
                ->label('Program Studi'),
            ExportColumn::make('email')
                ->label('Email'),
            ExportColumn::make('telepon')
                ->label('Telepon'),
            ExportColumn::make('jenis_kelamin')
                ->label('Jenis Kelamin'),
            ExportColumn::make('tempat_lahir')
                ->label('Tempat Lahir'),
            ExportColumn::make('tanggal_lahir')
                ->label('Tanggal Lahir'),
            ExportColumn::make('alamat')
                ->label('Alamat'),
            ExportColumn::make('judul_laporan')
                ->label('Judul Laporan'),
            ExportColumn::make('instansi_tujuan')
                ->label('Instansi Tujuan'),
            ExportColumn::make('provinsi')
                ->label('Provinsi'),
            ExportColumn::make('kabupaten_kota')
                ->label('Kabupaten/Kota'),
            ExportColumn::make('kecamatan')
                ->label('Kecamatan'),
            ExportColumn::make('desa_kelurahan')
                ->label('Desa/Kelurahan'),
            ExportColumn::make('jalan')
                ->label('Jalan'),
            ExportColumn::make('telepon_instansi')
                ->label('Telepon Instansi'),
            ExportColumn::make('dospem_acc_id')
                ->label('Dosen Pembimbing Lapangan') // Lebih jelas di Excel
                ->getStateUsing(fn (Submission $record) => $record->dospemAccept?->nama_dosen ?? '-'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your submission export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
