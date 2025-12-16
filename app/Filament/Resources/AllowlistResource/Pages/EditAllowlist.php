<?php

namespace App\Filament\Resources\AllowlistResource\Pages;

use App\Filament\Resources\AllowlistResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAllowlist extends EditRecord
{
    protected static string $resource = AllowlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
