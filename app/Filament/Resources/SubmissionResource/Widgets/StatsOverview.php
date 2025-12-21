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
        
        $newPendingToday = (clone $query)
            ->where('status_pengajuan', 'pending')
            ->whereDate('created_at', now()) // Filter tanggal hari ini
            ->count();

        $newAcceptedToday = (clone $query)
            ->where('status_pengajuan', 'accepted')
            ->whereDate('updated_at', now()) // Filter tanggal hari ini
            ->count();
        
        $newRejectedToday = (clone $query)
            ->where('status_pengajuan', 'rejected')
            ->whereDate('updated_at', now()) // Filter tanggal hari ini
            ->count();
        
        return [
            //            

            Stat::make('Pending', $totalPending)
                ->description( $newPendingToday . ' Pengajuan baru')
                ->descriptionIcon('heroicon-o-arrow-trending-down', IconPosition::After, IconSize::Small, IconEntrySize::Small)                
                ->chart([7, 12, 10, 15, 6, 10])
                ->color('gray'),                

            Stat::make('Accepted', $totalAccepted)
                ->description($newAcceptedToday . ' Pengajuan tervalidasi hari ini')
                ->descriptionIcon('heroicon-o-arrow-trending-up', IconPosition::After, IconSize::Small, IconEntrySize::Small)
                ->chart([8, 5, 10, 12, 3, 12])
                ->color('success'),

            Stat::make('Rejected', $totalRejected)
                ->description($newRejectedToday . ' Pengajuan ditolak')
                ->descriptionIcon('heroicon-o-arrow-path-rounded-square', IconPosition::After, IconSize::Small, IconEntrySize::Small)
                ->chart([10, 6, 10, 11, 13, 7])
                ->color('warning'),
        ];
    }
}
