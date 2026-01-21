<?php

namespace App\Filament\Imports;

use App\Models\Dospemdraft;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class DospemdraftImporter extends Importer
{
    protected static ?string $model = Dospemdraft::class;

    public static function getColumns(): array
    {
        return [
            //
            ImportColumn::make('nama_dpl')
                ->label('Dosen Pembimbing Lapangan')
                ->examples([
                   'Fenilinas Adi Artanto S.Si., M.Si', 
                   'Aslam Fatkhudin S.Kom., M.Kom',
                   'Hadwitya Handayani Kusumawhardani S.Kom., M.Kom'
                ])
                ->rules([
                    'required',
                    'regex:/^[A-Za-z\s.,]+$/',
                    'min:3',
                    'max:255'
                ]),
            ImportColumn::make('nim')       
                ->label('NIM')                     
                ->examples([
                    '202203040001',
                    '202203040002',
                    '202203040003'
                ])
                ->rules([
                    'required',
                    'regex:/^[0-9\s]+$/',
                    'min:12',
                    'max:12'
                ]),      
            ImportColumn::make('nama_mahasiswa')
                ->label('Nama Mahasiswa')
                ->examples([
                   'M. Khafid Al Amien' ,
                   'Asfa Aji Pamungkas',
                   'Azi Alqoist',
                ])
                ->rules([
                    'required',
                    'regex:/^[A-Za-z\s.]+$/',
                    'min:3',
                    'max:255'
                ]),    
            ImportColumn::make('prodi') 
                ->label('Prodi') 
                ->examples([
                    'S1 Informatika',
                    'S1 Teknik Mesin',
                    'D3 Manajemen Informatika'
                ])              
                ->rules([
                    'required',
                    'regex:/^[A-Za-z0-9\s]+$/'
                ]),    
        ];
    }

    public function resolveRecord(): ?Dospemdraft
    {
        return Dospemdraft::firstOrNew([
            // Update existing records, matching them by `$this->data['column_name']`
            'nim' => $this->data['nim'],
        ]);

        return new Dospemdraft();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your dospemdraft import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
