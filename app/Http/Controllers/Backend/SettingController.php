<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();

        return view('backend.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'required|string',
        ]);

        // Update settings in the database
        foreach ($request->settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );

            __updateSetting($setting['key'], $setting['value']);
        }

        return redirect()->route('backend.settings.index')->with('success', 'Settings updated successfully.');
    }
}
