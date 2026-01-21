<?php

namespace App\Filament\Resources\SubmissionInformatikaResource\Pages;

use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\SubmissionExporter;
use App\Filament\Resources\SubmissionInformatikaResource;
use Filament\Actions\Exports\Enums\Contracts\ExportFormat;
use Filament\Resources\Components\Tab;

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

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua'),
            'pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn ($query) => $query->where('status_pengajuan', 'pending')),
            'accepted' => Tab::make('Accepted')
                ->modifyQueryUsing(fn ($query) => $query->where('status_pengajuan', 'accepted')),
            'rejected' => Tab::make('Rejected')
                ->modifyQueryUsing(fn ($query) => $query->where('status_pengajuan', 'rejected')),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'all';
    }
}
