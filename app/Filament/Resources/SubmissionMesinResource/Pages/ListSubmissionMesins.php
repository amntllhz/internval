<?php

namespace App\Filament\Resources\SubmissionMesinResource\Pages;

use App\Filament\Resources\SubmissionMesinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmissionMesins extends ListRecords
{
    protected static string $resource = SubmissionMesinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
