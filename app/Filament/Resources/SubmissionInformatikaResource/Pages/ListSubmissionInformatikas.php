<?php

namespace App\Filament\Resources\SubmissionInformatikaResource\Pages;

use App\Filament\Resources\SubmissionInformatikaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmissionInformatikas extends ListRecords
{
    protected static string $resource = SubmissionInformatikaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
