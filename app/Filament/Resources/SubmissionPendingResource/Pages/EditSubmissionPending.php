<?php

namespace App\Filament\Resources\SubmissionPendingResource\Pages;

use App\Filament\Resources\SubmissionPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubmissionPending extends EditRecord
{
    protected static string $resource = SubmissionPendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
