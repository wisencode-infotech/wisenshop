<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\SettingGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $setting_groups = SettingGroup::orderBy('sequence', 'ASC')->pluck('title', 'id')->toArray();
        
        $settings = Setting::get();

        $currencies = Currency::all(); 

        return view('backend.settings.index', compact('setting_groups', 'settings', 'currencies'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'settings.*' => 'required',
            'settings.*_logo' => 'required|image'
        ]);

        // Update settings in the database
        foreach ($request->settings as $key => $value) {

            if ($request->hasFile('settings.' . $key)) {
                $file = $request->file('settings.' . $key);
                $filename = Str::random(10) . '.' . $file->getClientOriginalExtension(); // Create a unique filename
                $file->move(public_path('assets/frontend/img'), $filename); // Move the file to the desired location

                $value = 'assets/frontend/img/' . $filename; // Set the value to the public path

                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value] // Now, this will always have a value
                );

                __updateSetting($key, $value);

            } else {

                if (!in_array($key, ['header_logo', 'footer_logo', 'fav_logo', 'email_header_logo'])) {

                    if (str_starts_with($key, 'color-')) {
                        $value = hexToRgb($value);
                    }

                    Setting::updateOrCreate(
                        ['key' => $key],
                        ['value' => $value]
                    );

                    __updateSetting($key, $value);    
                }
            }
            
        }

        return redirect()->route('backend.settings.index')->with('success', 'Settings updated successfully.');
    }
}
