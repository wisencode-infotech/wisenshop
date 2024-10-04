<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('category', function($row) {
                    return $row->category->name;
                })
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                 ->addColumn('price', function($row) {
                    return $row->price;
                })
                ->addColumn('status', function($row) {
                    if($row->status == '1')
                    {
                        return '<span class="badge rounded-pill badge-soft-success font-size-12">Active</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill badge-soft-danger font-size-12">InActive</span>'; 
                    }
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.category.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        $products = Product::all(); // Fetch all products
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $units = ProductUnit::all();
        $categories = Category::all();
        return view('backend.products.create', compact('units', 'categories')); // Return the create view
    }

    public function store(Request $request)
    {
         // Common validation rules
    $rules = [
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'nullable|integer|min:0',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'unit_id' => 'required|exists:product_units,id',
    ];

    // If variation product, add variation validation rules
    if ($request->has('is_variation_product')) {
        $rules = array_merge($rules, [
            'variations.*.name' => 'required|string|max:255',
            'variations.*.price' => 'nullable|numeric|min:0',
            'variations.*.stock' => 'nullable|integer|min:0',
        ]);
    }

    // Custom error messages
    $messages = [
        'category_id.required' => 'Please select a category.',
        'name.required' => 'Product name is required.',
        'price.required' => 'Price is required.',
        'price.numeric' => 'Price must be a valid number.',
        'images.*.image' => 'Uploaded file must be an image.',
        'variations.*.name.required' => 'Variation name is required.',
    ];

    // Validate the request
    $validatedData = $request->validate($rules, $messages);

        // Generate a unique slug
        $slug = Str::slug($request->name);
        $slug = $this->generateUniqueSlug($slug);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->save();

        // Check if images were uploaded
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store image in products/{product_id}/
                $path = $image->store('products/' . $product->id, 'public');
                
                // Save image path to product_images table
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        if ($request->has('is_variation_product')) {
            foreach ($request->variations as $variation) {
                $product->variations()->create([
                    'name' => $variation['name'],
                    'price' => $variation['price'] ?? null,
                    'stock' => $variation['stock'] ?? null
                ]);
            }
        }

        return redirect()->route('backend.product.index')->with('success', 'Product created successfully.');
    }

    private function generateUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Keep checking if the slug exists and append a number if it does
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
