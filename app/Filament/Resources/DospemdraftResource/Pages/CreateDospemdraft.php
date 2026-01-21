<?php

namespace App\Filament\Resources\DospemdraftResource\Pages;

use App\Filament\Resources\DospemdraftResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDospemdraft extends CreateRecord
{
    protected static string $resource = DospemdraftResource::class;
    protected static ?string $title = 'Tambah Draft Bimbingan';
}
