<?php

namespace App\Filament\Resources\SubmissionMesinResource\Pages;

use App\Filament\Resources\SubmissionMesinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSubmissionMesin extends EditRecord
{
    protected static string $resource = SubmissionMesinResource::class;

    protected function resolveRecord(int|string $key): Model
    {
        return parent::resolveRecord($key)->load('dospem');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
