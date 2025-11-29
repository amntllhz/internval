<?php

namespace App\Filament\Resources\SubmissionRejectedResource\Pages;

use App\Filament\Resources\SubmissionRejectedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmissionRejecteds extends ListRecords
{
    protected static string $resource = SubmissionRejectedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
