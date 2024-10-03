<?php

use App\Models\Product;
use App\Models\Translation;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\Language;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

if (!function_exists('__trans')) 
{
    function __trans($key, $locale = null, $group = null)
    {
        $locale = $locale ?? app()->getLocale(); // Get the current locale if not passed
        
        // dd($locale);
        $cacheKey = "translation.{$locale}.{$group}.{$key}";

        // Try to retrieve the translation from cache
        return Cache::rememberForever($cacheKey, function () use ($key, $locale, $group) {
            $query = Translation::where('locale', $locale)->where('key', $key);

            if ($group) {
                $query->where('group', $group);
            }

            $translation = $query->first();

            // If translation exists, return the value
            if ($translation) {
                return $translation->value;
            }

            // If not found, insert it with the key as the value
            Translation::create([
                'locale' => $locale,
                'group'  => $group,
                'key'    => $key,
                'value'  => $key,  // Default to key as value
            ]);

            // Return the key as a fallback for now
            return $key;
        });
    }
}

if (!function_exists('__setting')) 
{
    function __setting($key, $default = null)
    {
        // Define cache key based on the setting key
        $cacheKey = "settings.{$key}";

        // Try to retrieve the setting value from cache
        return Cache::rememberForever($cacheKey, function () use ($key, $default) {
            // Query the setting from the database
            $setting = Setting::where('key', $key)->first();

            // If the setting exists, return the value
            if ($setting) {
                return $setting->value;
            }

            // If the setting does not exist, insert a new record with the default value
            Setting::create([
                'key'   => $key,
                'value' => $default ?? '',
            ]);

            // Return the default value
            return $default;
        });
    }
}

if (!function_exists('__updateSetting')) 
{
    function __updateSetting($key, $value)
    {
        $cache_key = "settings.{$key}";
        
        Cache::forget($cache_key);

        Cache::rememberForever($cache_key, function() use($value) { 
            return $value;
        });
    }
}


if (!function_exists('updateCart')) 
{
    function updateCart($productId, $quantity)
    {
        if (auth()->check()) {

            if ($quantity > 0) {
                Cart::updateOrCreate(
                    [
                        'user_id' => auth()->user()->id,
                        'product_id' => $productId,
                    ],
                    ['quantity' => $quantity]
                );
            } else {
                Cart::where('user_id', auth()->user()->id)
                    ->where('product_id', $productId)
                    ->delete();
            }
        } else {
            
            $cart = shoppingCart();

            if ($quantity > 0) {
                $cart[$productId] = [
                    'quantity' => $quantity,
                ];
            } else {
                unset($cart[$productId]);
            }

            Session::put('cart', $cart);
        }
    }
}



if (!function_exists('shoppingCart')) 
{
    function shoppingCart($options = [])
    {

        $cart_items = [];

        if (auth()->check()) {

            $db_cart_items  = Cart::where('user_id', auth()->user()->id)->get();

            $cart_items = [];

            foreach ($db_cart_items as $db_item) {
                $cart_items[$db_item->product_id] = [
                    'quantity' => $db_item->quantity,
                    'product_price' => $db_item->product->price ?? 0,
                    'product' => $db_item->product,
                ];
            }

            return $cart_items;

        } else {

            $cart_items = Session::get('cart', []);

            foreach ($cart_items as $product_id => &$item) {
                $product = Product::find($product_id);

                if ($product) {
                    $item['product'] = $product;
                    $item['product_price'] = ($product->price ?? 0);
                }
            }

            return $cart_items;
        }
    }
}

if (!function_exists('shoppingCartTotal')) 
{
    function shoppingCartTotal()
    {
        $cart_items = shoppingCart();

        $total = 0;

        foreach ($cart_items as $item) {
            $total += ($item['quantity'] ?? 0) * ($item['product_price'] ?? 0);
        }

        return $total;
    }
}

if (!function_exists('__updateTrans')) 
{
    function __updateTrans($key, $value, $locale = '', $group = null)
    {
        $locale = $locale ?? app()->getLocale(); // Get the current locale if not passed

        $cache_key = "translation.{$locale}.{$group}.{$key}";
        
        Cache::forget($cache_key);

        Cache::rememberForever($cache_key, function() use($value) { 
            return $value;
        });
    }
}

if (!function_exists('getAllLanguages')) {
    function getAllLanguages()
    {
        return Language::all();
    }
}