<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FreshInstallWisenShop extends WisenShopCommand
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
        $this->messageAlignedBig('Installation started. Please wait...', 'INFO', 'blue');
        $this->call('migrate:fresh', ['--seed' => true]);

        // Log information after completing the first command
        $this->infoAlignedCompact('Database migration and seeding completed.');

        // Run the 'db:seed --class=FakeAppSeeder' command
        $this->call('db:seed', ['--class' => 'FakeAppSeeder']);

        // Display message after fake-seeder is executed
        $this->infoAlignedCompact('FakeAppSeeder executed successfully.');

        // Transferring assets & media
        $this->transferAssets();

        Storage::disk('local')->put('.installed', 'Installed on ' . now());

        $this->clearCached();

        // Display final message after installation is completed
        $this->messageAlignedBig('Installation completed.');

        return Command::SUCCESS;
    }

    protected function transferAssets()
    {
        $this->showConsoleHeadingInfo('Transferring assets & media');

        $app_default_logo_path = public_path('assets/frontend/img/static/media/wisenshop-logo.png');

        $app_latest_logo_path = public_path('assets/frontend/img/logo.png');
        $app_latest_email_header_logo_path = public_path('assets/frontend/img/email_header_logo.png');
        $app_latest_fav_logo_path = public_path('assets/frontend/img/fav_logo.png');
        $app_latest_header_logo_path = public_path('assets/frontend/img/header_logo.png');
        $app_latest_footer_logo_path = public_path('assets/frontend/img/footer_logo.png');

        if (File::exists($app_default_logo_path)) {

            if (File::exists($app_latest_logo_path))
                File::delete($app_latest_logo_path);

            if (File::exists($app_latest_email_header_logo_path))
                File::delete($app_latest_email_header_logo_path);

            if (File::exists($app_latest_fav_logo_path))
                File::delete($app_latest_fav_logo_path);

            if (File::exists($app_latest_header_logo_path))
                File::delete($app_latest_header_logo_path);

            if (File::exists($app_latest_footer_logo_path))
                File::delete($app_latest_footer_logo_path);

            File::copy($app_default_logo_path, $app_latest_logo_path);
            File::copy($app_default_logo_path, $app_latest_email_header_logo_path);
            File::copy($app_default_logo_path, $app_latest_fav_logo_path);
            File::copy($app_default_logo_path, $app_latest_header_logo_path);
            File::copy($app_default_logo_path, $app_latest_footer_logo_path);

            $this->infoAlignedCompact('Assets and media transferred successfully.');
        }

        // Empty dynamically generated files
        $this->emptyDirectory(app_path('Services/PaymentGateway/'));
    }
}
