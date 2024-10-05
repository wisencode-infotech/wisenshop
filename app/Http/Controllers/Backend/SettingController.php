<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('sort_number', 'ASC')->get();
        $currencies = Currency::all(); 

        return view('backend.settings.index', compact('settings', 'currencies'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'settings.*.key' => 'required|string'
        ]);

        // Update settings in the database
        foreach ($request->settings as $index => $setting) {

            if ($request->hasFile('settings.' . $index . '.value')) {
                $file = $request->file('settings.' . $index . '.value');
                $filename = Str::random(10) . '.' . $file->getClientOriginalExtension(); // Create a unique filename
                $file->move(public_path('assets/frontend/img'), $filename); // Move the file to the desired location

                $value = 'assets/frontend/img/' . $filename; // Set the value to the public path

                Setting::updateOrCreate(
                    ['key' => $setting['key']],
                    ['value' => $value] // Now, this will always have a value
                );

                __updateSetting($setting['key'], $value);

            } else {
                $value = $setting['value'] ?? null;

                if (!in_array($setting['key'], ['header_logo', 'footer_logo', 'fav_logo'])){
                    Setting::updateOrCreate(
                        ['key' => $setting['key']],
                        ['value' => $value]
                    );

                    __updateSetting($setting['key'], $value);    
                }
            }
            
        }

        return redirect()->route('backend.settings.index')->with('success', 'Settings updated successfully.');
    }
}
