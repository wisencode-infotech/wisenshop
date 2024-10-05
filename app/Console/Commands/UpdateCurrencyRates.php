<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update-exchange-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currency rates from an external API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $site_currency_code = __setting('site_currency');
        
        $this->info('Fetching exchange rates... BASE CURRENCY : ' . $site_currency_code);

        // Fetch exchange rates from an external API
        $response = Http::get('https://api.exchangerate-api.com/v4/latest/' . ($site_currency_code ?? 'EUR')); // Replace with your API URL

        if ($response->successful()) {
            $rates = $response->json()['rates'];

            // Get all currency codes from the database
            $currencyRates = Currency::all();

            foreach ($currencyRates as $currencyRate) {
                $currencyCode = $currencyRate->code;

                // Check if the rate exists in the fetched rates
                if (isset($rates[$currencyCode])) {
                    // Update the exchange rate in the database
                    $currencyRate->update(['exchange_rate' => $rates[$currencyCode]]);
                    $this->info("Updated rate for {$currencyCode}: {$rates[$currencyCode]}");
                } else {
                    $this->warn("Rate for {$currencyCode} not found in the API response.");
                }
            }

            $this->info('Exchange rates updated successfully.');
        } else {
            $this->error('Failed to fetch exchange rates. Response: ' . $response->body());
        }
    }
}
