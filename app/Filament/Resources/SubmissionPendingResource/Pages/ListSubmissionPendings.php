<?php

namespace App\Filament\Resources\SubmissionPendingResource\Pages;

use App\Filament\Resources\SubmissionPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmissionPendings extends ListRecords
{
    protected static string $resource = SubmissionPendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
