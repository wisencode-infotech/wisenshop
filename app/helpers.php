<?php

use App\Models\Product;
use App\Models\Translation;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
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

if (!function_exists('getAllLanguages')) {
    function getAllLanguages()
    {
        return Language::all();
    }
}

if (!function_exists('wishList'))
{
    function wishList()
    {
        return Session::get('wishlist', []);
    }
}

if (!function_exists('syncWishlistToUser'))
{
    function syncWishlistToUser($user_id = null)
    {
        $user_id =  (!empty($user_id)) ? $user_id : Auth::user()->id;

        $wishlist = wishList();

        foreach ($wishlist as $product_id) {

            if (!Wishlist::where('product_id', $product_id)->where('user_id', $user_id)->exists()) {
                $wishlist = new Wishlist();

                $wishlist->user_id = $user_id;
                $wishlist->product_id = $product_id;
                $wishlist->save();
            }
        }

        Session::forget('wishlist');
    }
}