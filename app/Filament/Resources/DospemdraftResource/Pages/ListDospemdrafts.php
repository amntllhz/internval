<?php

namespace App\Filament\Resources\DospemdraftResource\Pages;

use App\Filament\Imports\DospemdraftImporter;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\DospemdraftResource;

class ListDospemdrafts extends ListRecords
{
    protected static string $resource = DospemdraftResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Tambah Data'),
            ImportAction::make()
                    ->importer(DospemdraftImporter::class)
                    ->label('Unggah CSV')                    
                    ->color('primary')
                    ->icon('heroicon-o-folder-plus')
                    ->csvDelimiter(';'),
        ];
    }
}
