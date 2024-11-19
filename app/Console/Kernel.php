<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Console\Scheduling\Schedule; // Add this import

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Register your custom commands here
        Commands\UpdateCurrencyRates::class,
        Commands\FreshInstallWisenShop::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('wisenshop:update-currency-exchange-rates')->cron('0 */9 * * *');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
