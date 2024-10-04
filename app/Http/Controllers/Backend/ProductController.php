<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
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
                    $btn = '<a href="'.route('backend.product.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
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

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

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

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Product $product)
    {
        $units = ProductUnit::all();
        $categories = Category::all();
        return view('backend.products.edit', compact('product', 'units', 'categories')); // Return the edit view
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        $product->name = $request->name;

        $slug = Str::slug($request->name);
        $product->slug = $this->generateUniqueSlug($slug);
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
            // Get current product variations from the database
            $existingVariations = $product->variations()->pluck('id')->toArray();
            $requestVariationIds = array_filter(array_column($request->variations, 'id')); // Filter out any null/undefined IDs from the request
        
            // Find variations that are no longer in the request and delete them
            $variationsToDelete = array_diff($existingVariations, $requestVariationIds);
            $product->variations()->whereIn('id', $variationsToDelete)->delete();
        
            // Loop through the variations from the request
            foreach ($request->variations as $variation) {
                // Check if variation has an ID (exists in the database)
                if (isset($variation['id'])) {
                    // Update existing variation
                    $productVariation = $product->variations()->find($variation['id']);
                    if ($productVariation) {
                        $productVariation->update([
                            'name' => $variation['name'],
                            'price' => $variation['price'] ?? null,
                            'stock' => $variation['stock'] ?? null
                        ]);
                    }
                } else {
                    // Create new variation (doesn't have an ID)
                    $product->variations()->create([
                        'name' => $variation['name'],
                        'price' => $variation['price'] ?? null,
                        'stock' => $variation['stock'] ?? null
                    ]);
                }
            }
        } else {
            // If not a variation product, ensure all variations are deleted
            $product->variations()->delete();
        }

        return redirect()->route('backend.product.edit', $product)->with('success', 'Product updated successfully.');
    }

    public function removeImage(Request $request)
    {
        $image = ProductImage::findOrFail($request->image_id);

        // Assuming the image file needs to be deleted from the storage
        if (Storage::exists($image->image_url)) {
            Storage::delete($image->image_url);
        }

        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image removed successfully.']);
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

    public function destroyImage(ProductImage $image)
    {

        // Delete the image file from storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => true]);
    }
}
