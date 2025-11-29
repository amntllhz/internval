<?php

namespace App\Filament\Resources\SubmissionRejectedResource\Pages;

use App\Filament\Resources\SubmissionRejectedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubmissionRejected extends EditRecord
{
    protected static string $resource = SubmissionRejectedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
