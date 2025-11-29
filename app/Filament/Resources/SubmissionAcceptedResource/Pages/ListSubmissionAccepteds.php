<?php

namespace App\Filament\Resources\SubmissionAcceptedResource\Pages;

use App\Filament\Resources\SubmissionAcceptedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmissionAccepteds extends ListRecords
{
    protected static string $resource = SubmissionAcceptedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
