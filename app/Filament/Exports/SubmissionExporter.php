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
            ExportColumn::make('id'),
            ExportColumn::make('nim'),
            ExportColumn::make('nama_mahasiswa'),          
            ExportColumn::make('prodi'),
            ExportColumn::make('email'),
            ExportColumn::make('telepon'),
            ExportColumn::make('jenis_kelamin'),
            ExportColumn::make('tempat_lahir'),
            ExportColumn::make('tanggal_lahir'),
            ExportColumn::make('alamat'),
            ExportColumn::make('judul_laporan'),
            ExportColumn::make('instansi_tujuan'),
            ExportColumn::make('provinsi'),
            ExportColumn::make('kabupaten_kota'),
            ExportColumn::make('kecamatan'),
            ExportColumn::make('desa_kelurahan'),
            ExportColumn::make('jalan'),
            ExportColumn::make('telepon_instansi'),
            ExportColumn::make('dospem_id')
                ->label('Nama Dosen Pembimbing') // Lebih jelas di Excel
                ->getStateUsing(fn (Submission $record) => $record->dospem?->nama_dosen ?? '-'),
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
