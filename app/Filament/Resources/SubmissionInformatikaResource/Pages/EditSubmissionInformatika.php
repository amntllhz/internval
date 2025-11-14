<?php

namespace App\Filament\Resources\SubmissionInformatikaResource\Pages;

use App\Filament\Resources\SubmissionInformatikaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSubmissionInformatika extends EditRecord
{
    protected static string $resource = SubmissionInformatikaResource::class;

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
