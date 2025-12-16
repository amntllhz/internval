<?php

namespace App\Filament\Resources\AllowlistResource\Pages;

use App\Filament\Resources\AllowlistResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAllowlists extends ListRecords
{
    protected static string $resource = AllowlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
