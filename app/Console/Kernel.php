<?php

namespace App\Console;

use App\Services\Product\ProductConfirmationSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        
        $schedule->call(new ProductConfirmationSchedule, ['provider' => 'openFood'])
            ->name('v_open_food')
            ->dailyAt('03:00')
            ->onOneServer();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
