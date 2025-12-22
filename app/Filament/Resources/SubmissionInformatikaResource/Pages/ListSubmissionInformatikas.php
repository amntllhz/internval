<?php

namespace App\Filament\Resources\SubmissionInformatikaResource\Pages;

use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\SubmissionExporter;
use App\Filament\Resources\SubmissionInformatikaResource;
use Filament\Actions\Exports\Enums\Contracts\ExportFormat;

class ListSubmissionInformatikas extends ListRecords
{
    protected static string $resource = SubmissionInformatikaResource::class;

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
