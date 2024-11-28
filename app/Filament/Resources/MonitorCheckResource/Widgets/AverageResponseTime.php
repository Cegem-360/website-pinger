<?php

namespace App\Filament\Resources\MonitorCheckResource\Widgets;

use App\Models\MonitorCheck;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AverageResponseTime extends BaseWidget
{
    protected function getStats(): array
    {
        $averageResponseTime = round(MonitorCheck::avg('response_time_in_ms')).' ms';
        $successfulChecks = MonitorCheck::where('status', 'up')->count();
        $failedChecks = MonitorCheck::where('status', '!=', 'up')->count();

        return [
            Stat::make('Átlagos lekérdezési idő (ms)', $averageResponseTime),
            Stat::make('Sikeres lekérdezések', $successfulChecks),
            Stat::make('Nem sikeres lekérdezések', $failedChecks),
        ];

    }
}
