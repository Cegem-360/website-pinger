<?php

namespace App\Providers;

use App\Observers\MonitorObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Spatie\UptimeMonitor\Models\Monitor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        //Monitor::observe(MonitorObserver::class);
    }
}
