<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\UptimeMonitor\Models\Monitor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        Monitor::create([
            'url' => 'https://elefantrendelo.com/',
            'uptime_check_interval_in_minutes' => 1,
            'uptime_check_enabled' => true,
            'uptime_status' => 'up',
        ]);
        //https://faddikorrkft.hu/
        Monitor::create([
            'url' => 'https://faddikorrkft.hu/',
            'uptime_check_interval_in_minutes' => 1,
            'uptime_check_enabled' => true,
            'uptime_status' => 'up',
        ]);
    }
}
