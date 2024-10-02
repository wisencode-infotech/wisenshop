<?php

use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

if (!function_exists('__trans')) {
    function __trans($key, $locale = null, $group = null)
    {
        $locale = $locale ?? app()->getLocale(); // Get the current locale if not passed
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
