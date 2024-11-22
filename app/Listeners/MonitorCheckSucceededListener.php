<?php

namespace App\Listeners;

use App\Models\MonitorCheck;
use Spatie\UptimeMonitor\Events\UptimeCheckSucceeded;

class MonitorCheckSucceededListener
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
    public function handle(UptimeCheckSucceeded $event): void
    {
        $monitor = $event->monitor;
        //ms time
        $startTime = $monitor->uptime_last_check_date;
        $endTime = now();
        $responseTime = $endTime->diffInMilliseconds($startTime) * -1;
        MonitorCheck::create([
            'monitor_id' => $monitor->id,
            'status' => 'up',
            'status_code' => 200,
            'response_time_in_ms' => $responseTime,
            'checked_at' => now(),
        ]);
    }
}
