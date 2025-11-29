<?php

namespace App\Filament\Resources\SubmissionAcceptedResource\Pages;

use App\Filament\Resources\SubmissionAcceptedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubmissionAccepted extends EditRecord
{
    protected static string $resource = SubmissionAcceptedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
