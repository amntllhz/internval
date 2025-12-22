<?php

namespace App\Filament\Resources\SubmissionManajemenitResource\Pages;

use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\SubmissionExporter;
use App\Filament\Resources\SubmissionManajemenitResource;

class ListSubmissionManajemenits extends ListRecords
{
    protected static string $resource = SubmissionManajemenitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make()
                ->label('Ekspor Data')
                ->icon('heroicon-o-table-cells')
                ->color('primary')
                ->exporter(SubmissionExporter::class)                
        ];
    }
}
