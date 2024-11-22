<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\UptimeMonitor\Models\Monitor;

class MonitorCheck extends Model
{
    protected $fillable = ['monitor_id', 'status', 'status_code', 'checked_at', 'reason', 'response_time_in_ms'];

    public function monitor()
    {
        return $this->belongsTo(Monitor::class);
    }
}
