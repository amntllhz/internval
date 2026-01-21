<?php

namespace App\Filament\Resources\DospemdraftResource\Pages;

use App\Filament\Resources\DospemdraftResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDospemdraft extends EditRecord
{
    protected static string $resource = DospemdraftResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->icon('heroicon-s-trash')
                ->label('Hapus Data'),
        ];
    }
}
