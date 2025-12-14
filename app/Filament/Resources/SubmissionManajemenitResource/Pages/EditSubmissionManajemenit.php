<?php

namespace App\Filament\Resources\SubmissionManajemenitResource\Pages;

use App\Filament\Resources\SubmissionManajemenitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubmissionManajemenit extends EditRecord
{
    protected static string $resource = SubmissionManajemenitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
