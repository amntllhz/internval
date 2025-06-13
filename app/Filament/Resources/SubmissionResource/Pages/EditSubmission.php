<?php

namespace App\Filament\Resources\SubmissionResource\Pages;

use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SubmissionResource;

class EditSubmission extends EditRecord
{
    protected static string $resource = SubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $user = Filament::auth()->user();

        if ($user->role === 'dosen') {
            // Dosen hanya boleh ubah status_pengajuan dan alasan_penolakan
            return [
                'status_pengajuan' => $data['status_pengajuan'],
                'alasan_penolakan' => $data['alasan_penolakan'] ?? null,
            ];
        }

        if ($user->role === 'baak') {
            // BAAK hanya boleh ubah status_surat
            return [
                'status_surat' => $data['status_surat'],
            ];
        }

    return $data;
}
}
