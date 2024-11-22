<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $table = 'monitors';

    protected $fillable = [
        'url',
        'uptime_check_enabled',
        'look_for_string',
        'uptime_check_interval_in_minutes',
        'uptime_status',
        'uptime_check_failure_reason',
        'uptime_check_times_failed_in_a_row',
        'uptime_status_last_change_date',
        'uptime_last_check_date',
        'uptime_check_failed_event_fired_on_date',
        'uptime_check_method',
        'uptime_check_payload',
        'uptime_check_additional_headers',
        'uptime_check_response_checker',
        'certificate_check_enabled',
        'certificate_status',
        'certificate_expiration_date',
        'certificate_issuer',
        'certificate_check_failure_reason',
    ];

    protected $guarded = [];

    protected $casts = [
        'uptime_check_enabled' => 'boolean',
        'certificate_check_enabled' => 'boolean',
        'uptime_check_times_failed_in_a_row' => 'integer',
        'uptime_check_interval_in_minutes' => 'integer',
        'uptime_status_last_change_date' => 'datetime',
        'uptime_last_check_date' => 'datetime',
        'uptime_check_failed_event_fired_on_date' => 'datetime',
        'certificate_expiration_date' => 'datetime',
    ];
}
