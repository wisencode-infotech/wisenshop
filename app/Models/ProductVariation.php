<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    public $fillable = [
        'name', 'price', 'stock'
    ];

    //Accessors
    public function priceWithCurrency($currency_code = '')
    {
        if (empty($currency_code))
            $currency_code = __userCurrencyCode();

        $exchange_rate = 1;

        if (__userCurrencyCode() != __appCurrency()->code) {
            $currency = Currency::where('code', $currency_code)->select('exchange_rate')->first();
    
            $exchange_rate = $currency->exchange_rate ?? 1;
        }

        return ($this->price * $exchange_rate);
    }
}
