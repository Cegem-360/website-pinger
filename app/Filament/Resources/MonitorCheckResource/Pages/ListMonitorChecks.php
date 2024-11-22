<?php

namespace App\Filament\Resources\MonitorCheckResource\Pages;

use App\Filament\Resources\MonitorCheckResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonitorChecks extends ListRecords
{
    protected static string $resource = MonitorCheckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
