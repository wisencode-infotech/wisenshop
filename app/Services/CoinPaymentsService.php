<?php

namespace App\Services;

use CoinpaymentsAPI;
use Exception;

class CoinPaymentsService
{
    protected $api;

    public function __construct()
    {
        $this->api = new CoinpaymentsAPI(env('COINPAYMENTS_API_SECRET'), env('COINPAYMENTS_API_KEY'), 'json');
    }

    public function createTransaction($fields)
    {
        try {
            $transaction = $this->api->CreateCustomTransaction($fields);
            return $transaction;
        } catch (Exception $e) {
            throw new Exception("Transaction creation failed: " . $e->getMessage());
        }
    }

    public function getSupportedCoins()
    {
        try {
            $rates = $this->api->GetRates();
            return $rates;
            // foreach ($rates as $coin => $details) {
            //     if ($details['accepted'] == 1) {
            //         echo "Coin: {$coin}, Name: {$details['name']}\n";
            //     }
            // }
        } catch (Exception $e) {
            throw new Exception("Failed to get rates: " . $e->getMessage());
        }
    }
}
