<?php

use App\Models\Translation;
use App\Models\Currency;
use App\Models\HomePageSetting;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Notification;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\User;
use App\Models\SiteBanner;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

if (!function_exists('__trans')) 
{
    function __trans($key, $locale = null, $group = null)
    {
        if (empty(trim($locale))) {
            if (__setting('activate_multilangual_module') == '1')
                $locale = $locale ?? app()->getLocale(); // Get the current locale if not passed
            else
                $locale = __setting('site_locale'); // Get the default site locale if multilangual_module is disabled
        }
        
        $cache_key = "translation.{$locale}.{$group}.{$key}";

        // Try to retrieve the translation from cache
        return Cache::rememberForever($cache_key, function () use ($key, $locale, $group) {
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
        $cache_key = "settings.{$key}";

        // Try to retrieve the setting value from cache
        return Cache::rememberForever($cache_key, function () use ($key, $default) {
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
            return Language::active()->get();
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

if (!function_exists('setCurrency')) 
{
    function setCurrency($currency)
    {
        $cache_key = "user.currency";

        Cache::forget($cache_key);

        if (Auth::check()) {

            User::where('id', Auth::user()->id)->update([
                'currency_id' => Currency::where('code', $currency)->first()->id
            ]);
        }

        Session::put('user_currency_code', $currency);
    }
}

if (!function_exists('__userCurrencyCode')) 
{
    function __userCurrencyCode()
    {
        if (__setting('activate_currencies_module') != '1')
            return env('APP_FALLBACK_CURRENCY', 'INR');
        
        if (Auth::check()) {

            $user = Auth::user();

            if(!empty($user->currency)){
                return $user->currency->code;
            }
        }

        return session('user_currency_code', env('APP_FALLBACK_CURRENCY', 'INR'));
    }
}

if (!function_exists('__userCurrency')) 
{
    function __userCurrency()
    {
        $user_currency_code = __userCurrencyCode();

        return Currency::where('code', $user_currency_code)->first();

        // $cache_key = "user.currency";

        // return Cache::rememberForever($cache_key, function() use ($user_currency_code) { 
        //     return Currency::where('code', $user_currency_code)->first();
        // });
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
            return Currency::active()->get();
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
            return env('APP_FALLBACK_CURRENCY_SYMBOL', '₹');
    }
}

if (!function_exists('__appActiveTheme')) 
{
    function __appActiveTheme()
    {
        return __setting('site_theme', 'default');
    }
}

if (!function_exists('__homeSetting')) 
{
    function __homeSetting($key, $decode = false) 
    {
        // Define cache key based on the home setting key
        $cache_key = "home_settings.{$key}";

        // Try to retrieve the setting value from cache
        return Cache::rememberForever($cache_key, function() use ($key, $decode) {
            $setting = HomePageSetting::where('meta_key', $key)->first();

            if (!empty($setting)) {
                if($decode == true && !empty($setting->meta_value))
                    return json_decode($setting->meta_value, TRUE);

                return $setting->meta_value;
            }

            return ''; // Return an empty string if not found
        });
    }
}

if (!function_exists('__updateHomeSetting')) 
{
    function __updateHomeSetting($key, $decode)
    {
        $cache_key = "home_settings.{$key}";
        
        Cache::forget($cache_key);

        return Cache::rememberForever($cache_key, function() use ($key, $decode) {
            $setting = HomePageSetting::where('meta_key', $key)->first();
             
            if (!empty($setting)) {
                if($decode == true && !empty($setting->meta_value))
                    return json_decode($setting->meta_value, TRUE);

                return $setting->meta_value;
            }

            return ''; // Return an empty string if not found
        });
    }
}

if (!function_exists('__updateCache')) 
{
    function __updateCache($key)
    {
        $cache_key = $key;
        
        Cache::forget($cache_key);

        return Cache::rememberForever($cache_key, function() use ($key) {

            if ($key == 'site-banners') {
                return SiteBanner::all();
            } else if($key == 'all-categories') {
                return Category::all();
            } else if($key == 'main-categories') {
                return Category::whereNull('parent_id')->get();
            } 

        });
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
        if (Auth::check()) {
            return Auth::user()->userRole->role;
        }

        return 'customer';
    }
}

if (!function_exists('__productStock')) 
{
    function __productStock($product_id, $product_variation_id = null)
    {
        if(!empty($product_variation_id)) {
            return ProductVariation::find($product_variation_id)->stock ?? 0;
        } else {
            return Product::find($product_id)->stock ?? 0;
        }
        
        return 0;
    }
}

if (!function_exists('__isAdmin')) 
{
    function __isAdmin()
    {
        return __currentUserRole() === 'admin';
    }
}

if (!function_exists('notification')) 
{
    function notification()
    {
        return new Notification();
    }
}

if (!function_exists('__clearCache')) 
{
    function __clearCache($cache_key)
    {   
        Cache::forget($cache_key);
    }
}

if (!function_exists('__documentLocale')) 
{
    function __documentLocale()
    {   
        return str_replace('_', '-', (app()->getLocale() ?? env('APP_FALLBACK_LOCALE', 'en')));
    }
}

if (!function_exists('__includeThemePartialView')) 
{
    function __includeThemePartialView($directory = 'head', $file = 'before-mix', $with = [], $must_exists = false)
    {   
        if (__appThemeHasPartialView($directory, $file))
            return view('frontend/layouts/themes/' . __appActiveTheme() . '/partials/' . $directory . '/' . $file, $with)->render();

        if ($must_exists)
            throw new Exception('File [frontend/layouts/themes/' . __appActiveTheme() . '/partials/' . $directory . '/' . $file . '.blade.php] not found.');

        return '';
    }
}

if (!function_exists('__appThemeHasPartialView')) 
{
    function __appThemeHasPartialView($directory = 'head', $file = 'before-mix')
    {   
        return View::exists('frontend/layouts/themes/' . __appActiveTheme() . '/partials/' . $directory . '/' . $file);
    }
}

if (!function_exists('__appLivewireView'))
{
    function __appLivewireView($view_name, $data = [])
    {
        return view('livewire.' . __appActiveTheme() . '.' . $view_name, $data);
    }
}

if (!function_exists('__appLivewireViewInclude'))
{
    function __appLivewireViewInclude($view_name, $data = [])
    {
        return __appLivewireView($view_name, $data)->render();
    }
}

if (!function_exists('__activeThemeStaticImgMediaAsset'))
{
    function __activeThemeStaticImgMediaAsset($media_name = '')
    {
        if (!empty($media_name))
            return asset('assets/frontend/img/static/media/themes/' . __appActiveTheme() . '/' . $media_name);

        return '';
    }
}