<?php

namespace App\Listeners;

use App\Models\MonitorCheck;
use Spatie\UptimeMonitor\Events\UptimeCheckFailed;

class MonitorCheckFailedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UptimeCheckFailed $event): void
    {
        $monitor = $event->monitor;
        MonitorCheck::create([
            'monitor_id' => $monitor->id,
            'status' => 'down',
            'status_code' => 500,
            'response_time_in_ms' => null,
            'checked_at' => now(),
        ]);
    }
}
