<?php

namespace App\Filament\Resources\SubmissionResource\Widgets;

use App\Models\Submission;
use Filament\Facades\Filament;
use Filament\Infolists\Components\IconEntry\IconEntrySize;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Enums\IconSize;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{   
    protected static bool $isLazy = false;        

    protected function getStats(): array
    {
        $user = Filament::auth()->user();

        $query = Submission::query();

        if (str_starts_with($user->role, 'kaprodi')) {
            
            $roleToProdi = [
                
                'kaprodi_informatika' => 'S1 Informatika',
                'kaprodi_mesin' => 'S1 Teknik Mesin',
                'kaprodi_manajemenit' => 'D3 Manajemen Informatika',
            ];

            $prodi = $roleToProdi[$user->role] ?? null;

            if ($prodi) {
                $query->where('prodi', $prodi);
            }
        }

        $totalPending = (clone $query)->where('status_pengajuan', 'pending')->count();
        $totalAccepted = (clone $query)->where('status_pengajuan', 'accepted')->count();
        $totalRejected = (clone $query)->where('status_pengajuan', 'rejected')->count();
        
        return [
            //            

            Stat::make('Menunggu Verifikasi', $totalPending)
                ->description('Menunggu verifikasi')
                ->descriptionIcon('heroicon-m-inbox-arrow-down', IconPosition::Before, IconSize::Small, IconEntrySize::Small)                
                ->chart([7, 12, 10, 15, 6, 10])
                ->color('warning'),

            Stat::make('Pengajuan Diterima', $totalAccepted)
                ->description('Pengajuan diterima')
                ->descriptionIcon('heroicon-m-check-badge', IconPosition::Before, IconSize::Small, IconEntrySize::Small)
                ->chart([8, 5, 10, 12, 3, 12])
                ->color('success'),

            Stat::make('Pengajuan Ditolak', $totalRejected)
                ->description('Pengajuan ditolak')
                ->descriptionIcon('heroicon-m-shield-exclamation', IconPosition::Before, IconSize::Small, IconEntrySize::Small)
                ->chart([10, 6, 10, 11, 13, 7])
                ->color('danger'),
        ];
    }
}
