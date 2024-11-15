<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class FreshInstallWisenShop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wisenshop:fresh-install {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perform a fresh install of WisenShop by migrating and seeding the database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Ask for user confirmation before proceeding
        if (!$this->option('force')) {
            if (!$this->confirm('This will refresh the database and seed it. Are you sure you want to continue?')) {
                $this->info('Fresh install process cancelled.');
                return Command::SUCCESS;
            }
        }

        // Run the 'migrate:fresh --seed' command
        $this->info('Running migrate:fresh --seed...');
        $this->call('migrate:fresh', ['--seed' => true]);

        // Log information after completing the first command
        $this->info('Database migration and seeding completed.');

        // Run the 'db:seed --class=FakeAppSeeder' command
        $this->info('Running db:seed with FakeAppSeeder...');
        $this->call('db:seed', ['--class' => 'FakeAppSeeder']);

        // Final message after completion
        $this->info('FakeAppSeeder executed successfully.');

        Storage::disk('local')->put('.installed', 'Installed on ' . now());

        return Command::SUCCESS;
    }
}
