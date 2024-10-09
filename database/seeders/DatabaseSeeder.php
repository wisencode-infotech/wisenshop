<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Language seeder
        (new LanguageSeeder())->run();

        // Currency seeder
        (new CurrencySeeder())->run();

        // Set site default settings
        (new DefaultSettingSeeder())->run();

        // Update currency exchange rates based on site base currency
        Artisan::call('currency:update-exchange-rates');

        // ProductUnit seeder
        (new ProductUnitSeeder())->run();

        // ShippingMethod seeder
        (new ShippingMethodSeeder())->run();
    }
}
