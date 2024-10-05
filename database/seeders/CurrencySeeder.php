<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['name' => 'US Dollar', 'code' => 'USD', 'symbol' => '$', 'exchange_rate' => 1.00, 'active' => true],
            ['name' => 'Euro', 'code' => 'EUR', 'symbol' => '€', 'exchange_rate' => 0.85, 'active' => true],
            ['name' => 'British Pound', 'code' => 'GBP', 'symbol' => '£', 'exchange_rate' => 0.76, 'active' => true],
            ['name' => 'Japanese Yen', 'code' => 'JPY', 'symbol' => '¥', 'exchange_rate' => 110.17, 'active' => true],
            ['name' => 'Australian Dollar', 'code' => 'AUD', 'symbol' => 'A$', 'exchange_rate' => 1.34, 'active' => true],
            ['name' => 'Canadian Dollar', 'code' => 'CAD', 'symbol' => 'C$', 'exchange_rate' => 1.26, 'active' => true],
            ['name' => 'Swiss Franc', 'code' => 'CHF', 'symbol' => 'CHF', 'exchange_rate' => 0.92, 'active' => true],
            ['name' => 'Chinese Yuan', 'code' => 'CNY', 'symbol' => '¥', 'exchange_rate' => 6.45, 'active' => true],
            ['name' => 'New Zealand Dollar', 'code' => 'NZD', 'symbol' => 'NZ$', 'exchange_rate' => 1.41, 'active' => true],
            ['name' => 'Indian Rupee', 'code' => 'INR', 'symbol' => '₹', 'exchange_rate' => 73.58, 'active' => true]
        ];

        Currency::insert($currencies);
    }
}
