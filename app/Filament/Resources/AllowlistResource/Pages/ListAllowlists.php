<?php

namespace App\Filament\Resources\AllowlistResource\Pages;

use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Imports\AllowlistImporter;
use App\Filament\Resources\AllowlistResource;

class ListAllowlists extends ListRecords
{
    protected static string $resource = AllowlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Tambah Data'),
            ImportAction::make()
                    ->importer(AllowlistImporter::class)
                    ->label('Unggah CSV')                    
                    ->color('primary')
                    ->icon('heroicon-o-folder-plus'),
        ];
    }
}
