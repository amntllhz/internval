<?php

namespace App\Filament\Resources\ProdiResource\Pages;

use Filament\Actions;
use Filament\Support\Enums\MaxWidth;
use App\Filament\Resources\ProdiResource;
use Filament\Resources\Pages\ListRecords;

class ListProdis extends ListRecords
{
    protected static string $resource = ProdiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()   
                ->icon('heroicon-o-plus')             
                ->label('Tambah Data')
                ->modalHeading('Tambah Program Studi')
                ->modalWidth(MaxWidth::Medium),                
        ];
    }
}
