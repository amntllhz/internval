<?php

namespace App\Filament\Resources\SubmissionResource\Widgets;

use App\Models\Submission;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{   
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            //            

            Stat::make('Total Pending', Submission::where('status_pengajuan', 'pending')->count())
                ->description('Menunggu verifikasi')
                ->descriptionIcon('heroicon-m-wallet', IconPosition::Before)
                ->color('warning'),

            Stat::make('Total Accepted', Submission::where('status_pengajuan', 'accepted')->count())
                ->description('Pengajuan diterima')
                ->descriptionIcon('heroicon-m-check', IconPosition::Before)
                ->color('success'),

            Stat::make('Total Rejected', Submission::where('status_pengajuan', 'rejected')->count())
                ->description('Pengajuan ditolak')
                ->descriptionIcon('heroicon-m-x-mark', IconPosition::Before)
                ->color('danger'),
        ];
    }
}
