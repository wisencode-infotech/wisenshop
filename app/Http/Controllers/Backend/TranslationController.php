<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Models\Language;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class TranslationController extends Controller
{
    /**
     * Display a listing of the site banners.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
             $locale = $request->input('locale');

            // Filter translations based on the selected locale
            $query = Translation::query();
            if ($locale) {
                $query->where('locale', $locale);
            }

            $data = $query->latest()->get(); // Fetch filtered translations

            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('locale', function($row) {
                    return $row->locale;
                })
                ->addColumn('key', function($row) {
                    return $row->key;
                })
                ->addColumn('value', function($row) {
                    return $row->value;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.translation.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        $translations = Translation::all(); // Fetch all site banners
        $locales = Language::select('code')->get();
        return view('backend.translations.index', compact('translations', 'locales'));
    }

    /**
     * Show the form for creating a new site banners.
     */
    public function create()
    {
        $locales = Language::select('code')->get();
        return view('backend.translations.create', compact('locales')); // Return the create view
    }

    /**
     * Store a newly created site banners in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'locale' => 'required|string|max:10',
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        // Create a new category in the database
        $category = Translation::create([
            'locale' => $request->locale,
            'key' => $request->key,
            'value' => $request->value
        ]);

        __updateTrans($request->key, $request->value, $request->locale);

        return redirect()->route('backend.translation.index')
                         ->with('success', 'Translation created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(Translation $translation)
    {
        return view('backend.translations.show', compact('translation')); // Return the show view
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Translation $translation)
    {
        return view('backend.translations.edit', compact('translation')); // Return the edit view
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Translation $translation)
    {
        // Validate the request data
        $request->validate([
            'locale' => 'required|string|max:10' . $translation->id,
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $data = [
            'locale' => $request->locale,
            'key' => $request->key, 
            'value' => $request->value
        ];

        // Update the translation data
        $translation->update($data);

        __updateTrans($request->key, $request->value, $request->locale);

        return redirect()->route('backend.translation.index')
                         ->with('success', 'Translation updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $translation = Translation::find($id);
        if ($translation) {
            $translation->delete();
            return response()->json(['success' => 'Translation deleted successfully.']);
        }
        return response()->json(['error' => 'Translation not found.'], 404);
    }

    // Helper method to generate unique slug
    private function generateUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Keep checking if the slug exists and append a number if it does
        while (Translation::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
