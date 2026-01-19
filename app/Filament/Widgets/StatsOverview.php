<?php

namespace App\Filament\Widgets;

use App\Models\Checkup;
use App\Models\Owner;
use App\Models\Pet;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pemilik', Owner::count())
                ->description('Jumlah pemilik terdaftar')
                ->icon('heroicon-o-user'),

            Stat::make('Total Hewan', Pet::count())
                ->description('Jumlah hewan terdaftar')
                ->icon('heroicon-o-heart'),

            Stat::make('Total Pemeriksaan', Checkup::count())
                ->description('Jumlah pemeriksaan')
                ->icon('heroicon-o-clipboard-document-check'),

            Stat::make(
                'Pemeriksaan Hari Ini',
                Checkup::whereDate('checkup_date', now())->count()
            )
                ->description('Hari ini')
                ->icon('heroicon-o-calendar-days'),

        ];
    }
}
