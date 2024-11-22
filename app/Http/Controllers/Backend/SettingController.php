<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Language;
use App\Models\SettingGroup;
use App\Models\SiteTheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $setting_groups = SettingGroup::orderBy('sequence', 'ASC')->pluck('title', 'id')->toArray();
        
        $settings = Setting::get();

        $currencies = Currency::all();

        $languages = Language::all();

        $site_themes = SiteTheme::all();

        return view('backend.settings.index', compact('setting_groups', 'settings', 'currencies', 'languages', 'site_themes'));
    }

    public function update(Request $request)
    {
        $site_theme_updated = ($request->has('settings') && __setting('site_theme') != $request->settings['site_theme']);
        
        // Validate the request
        $request->validate([
            'settings.*' => 'required',
            'settings.*_logo' => 'required|image'
        ]);

        // Update settings in the database
        foreach ($request->settings as $key => $value) {

            if ($request->hasFile('settings.' . $key)) {
                $file = $request->file('settings.' . $key);
                $filename = $key . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/frontend/img'), $filename); // Move the file to the desired location

                $value = 'assets/frontend/img/' . $filename; // Set the value to the public path

                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value] // Now, this will always have a value
                );

                __updateSetting($key, $value);

            } else {

                if (!in_array($key, ['header_logo', 'footer_logo', 'fav_logo', 'email_header_logo', 'activate_currencies_module', 'activate_multilangual_module'])) {

                    if (str_starts_with($key, 'color-')) {
                        $value = __convertHexToRgb($value);
                    }

                    Setting::updateOrCreate(
                        ['key' => $key],
                        ['value' => $value]
                    );

                    __updateSetting($key, $value);
                }
            }
            
        }

        $activate_currencies_module = array_key_exists('activate_currencies_module', $request->settings) ? '1' : '0';
        $activate_multilangual_module = array_key_exists('activate_multilangual_module', $request->settings) ? '1' : '0';

        Setting::updateOrCreate(
            ['key' => 'activate_currencies_module'],
            ['value' => $activate_currencies_module]
        );

        Setting::updateOrCreate(
            ['key' => 'activate_multilangual_module'],
            ['value' => $activate_multilangual_module]
        );

        __updateSetting('activate_currencies_module', $activate_currencies_module);
        __updateSetting('activate_multilangual_module', $activate_multilangual_module);

        Cache::clear('site-customizer');

        if ($site_theme_updated)
            $this->updateMixManifest();

        return redirect()->route('backend.settings.index')->with('success', 'Settings updated successfully.');
    }

    protected function updateMixManifest()
    {
        $site_theme = __setting('site_theme');

        $manifest_file_path = public_path('mix-manifest.json');

        $updated_manifest_object = [
            '/assets/frontend/theme/mix.js' => '/assets/frontend/js/' . $site_theme . '/mix.js',
            '/assets/frontend/theme/mix.css' => '/assets/frontend/css/' . $site_theme . '/mix.css',
        ];

        file_put_contents($manifest_file_path, json_encode($updated_manifest_object, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
