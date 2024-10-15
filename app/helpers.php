<?php

use App\Models\Translation;
use App\Models\Currency;
use App\Models\HomePageSetting;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Notification;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\FranchiseProductAvailability;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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

if (!function_exists('__homeSetting')) 
{
    function __homeSetting($key, $decode = false) 
    {
        $setting = HomePageSetting::where('meta_key', $key)->first();

        if (!empty($setting)) {

            if($decode == true && !empty($setting->meta_value))
                return json_decode($setting->meta_value, TRUE);

            return $setting->meta_value;
        }

        return '';
    }
}

if (!function_exists('__convertRgbToHex'))
{
    function __convertRgbToHex($rgb)
    {
        $rgbValues = array_map('intval', explode(',', str_replace(['rgb(', ')'], '', trim($rgb))));
        return count($rgbValues) === 3 ? sprintf("#%02x%02x%02x", ...$rgbValues) : $rgb;
    }
}

if (!function_exists('__convertHexToRgb')) 
{
    function __convertHexToRgb($hex)
    {
        $hex = ltrim($hex, '#');
        $hex = strlen($hex) === 3 ? preg_replace('/(.)/', '$1$1', $hex) : $hex;
        return strlen($hex) === 6 ? implode(', ', array_map('hexdec', str_split($hex, 2))) : null;
    }
}

if (!function_exists('__addNotification'))
{
    function __addNotification(array $params)
    {
        try {
            // Ensure necessary parameters are set
            $title = $params['title'] ?? null;
            $message = $params['message'] ?? null;

            if (!$title || !$message) {
                throw new Exception('Title and message are required for notifications.');
            }

            $notification = Notification::create([
                'title'     => $title,
                'message'   => $message,
                'user_id'   => $params['user_id'] ?? null,
                'is_global' => $params['is_global'] ?? false,
                'type'      => $params['type'] ?? 'info',
                'url'       => $params['url'] ?? null,
                'meta_data' => isset($params['meta_data']) ? json_encode($params['meta_data']) : null,
                'is_read'   => $params['is_read'] ?? false,
            ]);

            return $notification;
        } catch (Exception $e) {
            Log::error('Failed to add notification: ' . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('__currentUserRole')) 
{
    function __currentUserRole()
    {
        if (auth()->check()) {
            return auth()->user()->userRole->role;
        }

        return 'buyer';
    }
}

// if (!function_exists('__productDisabled')) 
// {
//     function __productDisabled()
//     {
//         if (auth()->check()) {
//             if(auth()->user()->userRole->role == 'franchise'){
//                 return 'disabled';
//             }
//         }

//         return '';
//     }
// }

if (!function_exists('__productStock')) 
{
    function __productStock($product_id, $product_variation_id = null)
    {
        if (__currentUserRole() == 'franchise') {

            $franchise_product = FranchiseProductAvailability::where('product_id', $product_id);

            if (!empty($product_variation_id)) {
                $franchise_product = $franchise_product->where('product_variation_id', $product_variation_id);
            }

            $franchise_product = $franchise_product->first();

            return $franchise_product->quantity ?? 0;
            
        } elseif(!empty($product_variation_id)) {
            return ProductVariation::find($product_variation_id)->stock ?? 0;
        } else {
            return Product::find($product_id)->stock ?? 0;
        }
        
        return 0;
    }
}