<?php

namespace App\Filament\Resources\SubmissionResource\Widgets;

use App\Models\Submission;
use Filament\Facades\Filament;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{   
    protected static bool $isLazy = false;        

    protected function getStats(): array
    {
        $user = Filament::auth()->user();

        $query = Submission::query();

        if (str_starts_with($user->role, 'dosen')) {
            
            $roleToProdi = [
                
                'dosen_informatika' => 'S1 Informatika',
                'dosen_mesin' => 'S1 Teknik Mesin',
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

            Stat::make('Total Pending', $totalPending)
                ->description('Menunggu verifikasi')
                ->descriptionIcon('heroicon-m-wallet', IconPosition::Before)
                ->color('warning'),

            Stat::make('Total Accepted', $totalAccepted)
                ->description('Pengajuan diterima')
                ->descriptionIcon('heroicon-m-check', IconPosition::Before)
                ->color('success'),

            Stat::make('Total Rejected', $totalRejected)
                ->description('Pengajuan ditolak')
                ->descriptionIcon('heroicon-m-x-mark', IconPosition::Before)
                ->color('danger'),
        ];
    }
}
