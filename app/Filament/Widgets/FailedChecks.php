<?php

namespace App\Filament\Widgets;

use App\Models\MonitorCheck;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FailedChecks extends BaseWidget
{
    protected function getStats(): array
    {
        $failedChecks = MonitorCheck::where('status', '!=', 'up')->count();

        return [
            Stat::make('Nem sikeres lekérdezések', $failedChecks),
        ];
    }
}
