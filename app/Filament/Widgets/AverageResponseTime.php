<?php

namespace App\Filament\Widgets;

use App\Models\MonitorCheck;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AverageResponseTime extends BaseWidget
{
    protected function getStats(): array
    {
        $averageResponseTime = MonitorCheck::avg('response_time_in_ms');

        return [
            Stat::make('Átlagos lekérdezési idő (ms)', round($averageResponseTime, 2)),
        ];
    }
}
