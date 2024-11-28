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

        /*  Monitor::create([
             'url' => 'https://elefantrendelo.com/',
             'uptime_check_interval_in_minutes' => 1,
             'uptime_check_enabled' => true,
             'uptime_status' => 'up',
             'certificate_check_enabled' => true,
             'look_for_string' => '',
             'uptime_check_failure_reason' => null,
             'uptime_check_method' => 'get',
             'uptime_check_payload' => true,
             'uptime_check_response_checker' => true,

         ]);

         Monitor::create([
             'url' => 'https://faddikorrkft.hu/',
             'uptime_check_interval_in_minutes' => 1,
             'uptime_check_enabled' => true,
             'uptime_status' => 'up',
             'certificate_check_enabled' => true,
             'look_for_string' => '',
             'uptime_check_failure_reason' => null,
             'uptime_check_method' => 'get',
             'uptime_check_payload' => true,
             'uptime_check_response_checker' => true,
         ]); */
    }
}
