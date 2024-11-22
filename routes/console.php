<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('monitor:check-uptime')->everyMinute();
Schedule::command('monitor:check-certificate')->daily();
