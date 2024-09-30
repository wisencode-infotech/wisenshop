<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends APIController
{
    public function index()
    {
        $products = Product::all();
        return $this->sendSuccess($products, 'Products retrieved successfully');
    }

    public function show($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return $this->sendError('Product not found', 404);
        }
        
        return $this->sendSuccess($product, 'Product retrieved successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        if ($products->isEmpty()) {
            return $this->sendError('No products found matching the search criteria', 404);
        }

        return $this->sendSuccess($products, 'Products found');
    }
}
