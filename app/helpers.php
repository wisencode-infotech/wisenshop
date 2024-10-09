<?php

use App\Models\Translation;
use App\Models\Currency;
use App\Models\Setting;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;

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

            if ( empty(app()->getLocale()) ) {
                session()->put('app_locale', config('locale', 'es'));
                $locale = session('app_locale');
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

        // Remove app currency from cache after saving settings
        if ($key == 'site_currency')
            Cache::forget('app.currency');

        Cache::rememberForever($cache_key, function() use($value) { 
            return $value;
        });
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

if (!function_exists('__languages')) 
{
    function __languages()
    {
        $cache_key = "app.languages";

        return Cache::rememberForever($cache_key, function() { 
            return Language::all();
        });
    }
}

if (!function_exists('__appCurrency')) 
{
    function __appCurrency()
    {
        $site_currency_code = __setting('site_currency');

        $cache_key = "app.currency";

        return Cache::rememberForever($cache_key, function() use ($site_currency_code) { 
            return Currency::where('code', $site_currency_code)->first();
        });
    }
}

if (!function_exists('__userCurrencyCode')) 
{
    function __userCurrencyCode()
    {
        return session('user_currency_code', 'EUR');
    }
}

if (!function_exists('__userCurrency')) 
{
    function __userCurrency()
    {
        $user_currency_code = __userCurrencyCode();

        $cache_key = "user.currency";

        return Cache::rememberForever($cache_key, function() use ($user_currency_code) { 
            return Currency::where('code', $user_currency_code)->first();
        });
    }
}

if (!function_exists('__userCurrencySymbol')) 
{
    function __userCurrencySymbol()
    {
        return __userCurrency()->symbol ?? '';
    }
}

if (!function_exists('__currencies')) 
{
    function __currencies()
    {
        $cache_key = "app.currencies";

        return Cache::rememberForever($cache_key, function() { 
            return Currency::all();
        });
    }
}

if (!function_exists('__appCurrencySymbol')) 
{
    function __appCurrencySymbol()
    {
        $currency_info = __appCurrency();
        if ( !empty($currency_info) ) 
            return $currency_info->symbol;
        else
            return 'EUR';
    }
}

if (!function_exists('rgbToHex')) 
{
    function rgbToHex($rgb) {

        // Normalize input if it's in "rgb(180, 19, 19)" format
        $rgb = trim($rgb); // Remove any extra spaces
        
        // Remove the 'rgb()' wrapper if it exists
        $rgb = str_replace(['rgb(', ')'], '', $rgb);

        // Now, we expect the input to be in "180, 19, 19" format
        $rgbArray = explode(',', $rgb);

        // Ensure we have exactly 3 values for R, G, and B
        if (count($rgbArray) === 3) {
            $r = intval(trim($rgbArray[0])); // Trim in case there are spaces
            $g = intval(trim($rgbArray[1]));
            $b = intval(trim($rgbArray[2]));

            // Convert RGB to hex and return it
            return sprintf("#%02x%02x%02x", $r, $g, $b);
        }

        // If the input is invalid, return the original value or handle the error as needed
        return $rgb;
    }
}

if (!function_exists('hexToRgb')) {
    function hexToRgb($hex) {
        // Normalize the input by removing the '#' if it exists
        $hex = ltrim($hex, '#');

        // If the hex code is shorthand (3 digits), expand it to 6 digits
        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        // Now we expect the hex to be in "RRGGBB" format
        if (strlen($hex) === 6) {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));

            return "{$r}, {$g}, {$b}";
        }

        return null;
    }
}
