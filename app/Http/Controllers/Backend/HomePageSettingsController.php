<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;

class HomePageSettingsController extends Controller
{
    public function index()
    {
        $categories = Category::whereNUll('parent_id')->get();

        $display_specific_categories_on_page_load = __homeSetting('display_specific_categories_on_page_load', true);

        $banner_settings = __homeSetting('banner_settings', true);

        $default_home_sorting_method = __homeSetting('default_home_sorting_method');

        return view('backend.home-settings.index', compact('categories', 'display_specific_categories_on_page_load', 'banner_settings', 'default_home_sorting_method'));
    }

    public function store(Request $request)
    {

        $display_specific_categories_on_page_load = $request->display_specific_categories_on_page_load;

        // if (!empty($display_specific_categories_on_page_load))
        //     $display_specific_categories_on_page_load = array_map('intval', $display_specific_categories_on_page_load);

        $display_specific_categories_on_page_load = !empty($display_specific_categories_on_page_load) ? $display_specific_categories_on_page_load : null;

        $this->saveSettings('display_specific_categories_on_page_load', $display_specific_categories_on_page_load);

        return redirect()->back()->with('success', 'saved settings');
    }

    public function bannerStore(Request $request)
    {
        $existing_banner_settings = __homeSetting('banner_settings', true);

        $request->validate([
            'banner_image' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            'banner_description' => 'nullable|max:250',
            'banner_url' => 'nullable|url',
        ]);

        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image')->store('banners', 'public');
        } else {
            $bannerImage = $existing_banner_settings['banner_image'] ?? null;
        }

        // Prepare data to be stored as JSON
        $bannerSettings = [
            'banner_image' => $bannerImage,
            'banner_description' => $request->banner_description,
            'banner_url' => $request->banner_url,
        ];

        // Save the banner settings as JSON in the database
        $this->saveSettings('banner_settings', json_encode($bannerSettings));

        return redirect()->back()->with('success', 'Banner settings saved successfully');
    }

    
    public function sortingStore(Request $request)
    {
        $existing_banner_settings = __homeSetting('default_home_sorting_method', true);

        $request->validate([
            'default_home_sorting_method' => 'required',
        ]);

        $this->saveSettings('default_home_sorting_method', $request->default_home_sorting_method);

        return redirect()->back()->with('success', 'Sorting settings saved successfully');
    }

    public function saveSettings($key, $value) {
        HomePageSetting::updateOrCreate(
            ['meta_key' => $key],
            ['meta_value' => $value]
        );
    }


}
