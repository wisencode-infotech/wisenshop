<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('name', function($row) {
                    $parentName = $row->parent ? $row->parent->name : '';
                    return $row->name . '<br>' . '<span style="font-size: 11px;color: blueviolet;">' . $parentName . '</span>';
                })
                ->addColumn('image', function($row) {
                    return $row->image_url;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.category.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['name', 'action', 'image'])
                ->make(true);
        }

        $categories = Category::all(); // Fetch all categories
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.categories.create', compact('categories')); // Return the create view
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'image' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048', // Max 2MB
        ]);

        
        // Generate a unique slug
        $slug = Str::slug($request->name);
        $slug = $this->generateUniqueSlug($slug);

        // Handle the file upload if an image was provided
        $imagePath = null;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'categories/' . $imageName;
            
            // Check if the file already exists
            if (!Storage::disk('public')->exists($imagePath)) {
                // Store the image in the public storage
                $image->storeAs('categories', $imageName, 'public');
            }
        }

        // Create a new category in the database
        $category = Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'image_path' => $imagePath,
            'order' => $request->order,
            'description' => !empty($request->description) ? $request->description : null,
            'parent_id' => $request->parent_id ?? NULL,
        ]);

        return redirect()->route('backend.category.index')
                         ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        return view('backend.categories.show', compact('category')); // Return the show view
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('backend.categories.edit', compact('category','categories')); // Return the edit view
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048', // Max 2MB
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'order' => $request->order,
            'parent_id' => $request->parent_id ?? NULL,
        ];

         // Handle image upload if a new image is provided
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'categories/' . $imageName;

            // Check if the file already exists
            if (!Storage::disk('public')->exists($imagePath)) {
                // Store the image in the public storage
                $image->storeAs('categories', $imageName, 'public');
                $data['image_path'] = $imagePath;
            }
        }
        // Update the category data
        $category->update($data);
        return redirect()->route('backend.category.index')
                         ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['success' => 'Category deleted successfully.']);
        }
        return response()->json(['error' => 'Category not found.'], 404);
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
