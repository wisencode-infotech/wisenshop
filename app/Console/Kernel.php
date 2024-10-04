<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Console\Scheduling\Schedule; // Add this import

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Register your custom commands here
        Commands\UpdateCurrencyRates::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('currency:update-exchange-rates')->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
