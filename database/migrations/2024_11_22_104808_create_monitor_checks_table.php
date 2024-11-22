<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\UptimeMonitor\Models\Monitor;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monitor_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Monitor::class)->constrained();
            $table->integer('response_time_in_ms')->nullable();
            $table->integer('status_code')->nullable();
            $table->enum('status', ['up', 'mixed', 'down']);
            $table->timestamp('checked_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitor_checks');
    }
};
