<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LanguageController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Language::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('image', function($row) {
                    return $row->image_url;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.language.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        $languages = Language::all(); // Fetch all languages
        return view('backend.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('backend.languages.create'); // Return the create view
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'code' => 'required|string|max:10|unique:languages,code',
            'name' => 'required|string|max:100',
        ]);

        // Create a new language in the database
        $language = Language::create([
            'code' => $request->code,
            'name' => $request->name
        ]);

        return redirect()->route('backend.language.index')
                         ->with('success', 'Language created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(Language $language)
    {
        return view('backend.languages.show', compact('language')); // Return the show view
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Language $language)
    {
        return view('backend.languages.edit', compact('language')); // Return the edit view
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Language $language)
    {
        // Validate the request data
        $request->validate([
            'code' => 'required|string|max:10|unique:languages,code,' . $language->id,
            'name' => 'required|string|max:100',
        ]);

        $data = [
            'code' => $request->code,
            'name' => $request->name
        ];

        // Update the language data
        $language->update($data);

        return redirect()->route('backend.language.index')
                         ->with('success', 'Language updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        if ($language) {
            $language->delete();
            return response()->json(['success' => 'Language deleted successfully.']);
        }
        return response()->json(['error' => 'Language not found.'], 404);
    }

    // Helper method to generate unique slug
    private function generateUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Keep checking if the slug exists and append a number if it does
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
