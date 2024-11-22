<?php

namespace App\Filament\Widgets;

use App\Models\MonitorCheck;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SuccessfulChecks extends BaseWidget
{
    protected function getStats(): array
    {
        $successfulChecks = MonitorCheck::where('status', 'up')->count();

        return [
            Stat::make('Sikeres lekérdezések', $successfulChecks),
        ];
    }
}
