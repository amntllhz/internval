<?php

namespace App\Filament\Resources\SubmissionExpiredResource\Pages;

use App\Filament\Resources\SubmissionExpiredResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmissionExpireds extends ListRecords
{
    protected static string $resource = SubmissionExpiredResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
