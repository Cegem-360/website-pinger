<?php

namespace App\Filament\Widgets;

use App\Models\MonitorCheck;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalChecks extends BaseWidget
{
    protected function getStats(): array
    {
        $totalChecks = MonitorCheck::count();

        return [
            Stat::make('Összes lekérdezés', $totalChecks),
        ];
    }
}
