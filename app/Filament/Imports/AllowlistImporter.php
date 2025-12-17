<?php

namespace App\Filament\Imports;

use App\Models\Allowlist;
use Filament\Actions\Imports\Importer;
use Illuminate\Support\Facades\Storage;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Models\Import;

class AllowlistImporter extends Importer
{
    protected static ?string $model = Allowlist::class;

    public static function getColumns(): array
    {
        return [
            //
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
                    'max:15'
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

    public function resolveRecord(): ?Allowlist
    {
        return Allowlist::firstOrNew([
            // Update existing records, matching them by `$this->data['column_name']`
            'nim' => $this->data['nim'],
        ]);

        return new Allowlist();
    }

    protected function beforeSave(): void
    {
        $this->record->is_active = true;
    }      

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your allowlist import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    
}
