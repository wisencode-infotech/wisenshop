<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteBanner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SiteBannerController extends Controller
{
    /**
     * Display a listing of the site banners.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = SiteBanner::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('image', function($row) {
                    return $row->image_url;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.site-banner.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        $site_banners = SiteBanner::all(); // Fetch all site banners
        return view('backend.site-banners.index', compact('site_banners'));
    }

    /**
     * Show the form for creating a new site banners.
     */
    public function create()
    {
        return view('backend.site-banners.create'); // Return the create view
    }

    /**
     * Store a newly created site banners in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Max 2MB
        ]);

        // Handle the file upload if an image was provided
        $imagePath = null;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'site-banners/' . $imageName;
            
            // Check if the file already exists
            if (!Storage::disk('public')->exists($imagePath)) {
                // Store the image in the public storage
                $image->storeAs('site-banners', $imageName, 'public');
            }
        }

        // Create a new category in the database
        $category = SiteBanner::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'description' => !empty($request->description) ? $request->description : null,
        ]);

        return redirect()->route('backend.site-banner.index')
                         ->with('success', 'Site Bannner created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(SiteBanner $site_banner)
    {
        return view('backend.site-banners.show', compact('site_banner')); // Return the show view
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(SiteBanner $site_banner)
    {
        return view('backend.site-banners.edit', compact('site_banner')); // Return the edit view
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, SiteBanner $site_banner)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255' . $site_banner->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Max 2MB
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];

         // Handle image upload if a new image is provided
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'site-banners/' . $imageName;

            // Check if the file already exists
            if (!Storage::disk('public')->exists($imagePath)) {
                // Store the image in the public storage
                $image->storeAs('site-banners', $imageName, 'public');
                $data['image_path'] = $imagePath;
            }
        }

        // Update the category data
        $site_banner->update($data);

        return redirect()->route('backend.site-banner.index')
                         ->with('success', 'Site Bannner updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $site_banner = SiteBanner::find($id);
        if ($site_banner) {
            $site_banner->delete();
            return response()->json(['success' => 'Site Bannner deleted successfully.']);
        }
        return response()->json(['error' => 'Site Bannner not found.'], 404);
    }

    // Helper method to generate unique slug
    private function generateUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Keep checking if the slug exists and append a number if it does
        while (SiteBanner::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
