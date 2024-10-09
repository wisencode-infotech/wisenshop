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
        $categories = Category::all();

        $display_specific_categories_on_page_load = __homeSetting('display_specific_categories_on_page_load', true);

        return view('backend.home-settings.index', compact('categories', 'display_specific_categories_on_page_load'));
    }

    public function store(Request $request)
    {

        $display_specific_categories_on_page_load = $request->display_specific_categories_on_page_load;

        if (!empty($display_specific_categories_on_page_load))
            $display_specific_categories_on_page_load = array_map('intval', $display_specific_categories_on_page_load);

        $display_specific_categories_on_page_load = !empty($display_specific_categories_on_page_load) ? json_encode($display_specific_categories_on_page_load) : null;

        $this->saveSettings('display_specific_categories_on_page_load', $display_specific_categories_on_page_load);

        return redirect()->back()->with('success', 'saved settings');
    }

    public function saveSettings($key, $value) {
        HomePageSetting::updateOrCreate(
            ['meta_key' => $key],
            ['meta_value' => $value]
        );
    }
}
