<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\FranchiseProductAvailability;
use Illuminate\Http\Request;

class FranchiseProductController extends Controller
{
    public function edit($id)
    {
        $product = Product::withoutGlobalScope('public_visibility')->where('id', $id)->first();
        
        $units = ProductUnit::all();

        return view('backend.franchise-products.edit', compact('product', 'units')); // Return the edit view
    }

    public function update(Request $request, $id)
    {
        $product = Product::withoutGlobalScope('public_visibility')->findOrFail($id);

        if (isset($request->stock)) {
            $franchise_product = FranchiseProductAvailability::where('product_id', $product->id)
                                ->where('user_id', auth()->user()->id)
                                ->first();

            if(empty($franchise_product)){
                $franchise_product = new FranchiseProductAvailability();
                $franchise_product->product_id = $product->id;
                $franchise_product->product_variation_id = null;
                $franchise_product->user_id = auth()->user()->id;
            }

            $franchise_product->quantity = $request->stock;
            $franchise_product->save(); 
        }
        
        if (isset($request->variations)) {
            foreach ($request->variations as $variation) {
                
                if (isset($variation['id'])) {
                    
                    $productVariation = $product->variations()->find($variation['id']);

                    if ($productVariation) {

                        $franchise_product = FranchiseProductAvailability::where('product_id', $product->id)
                                    ->where('product_variation_id', $variation['id'])
                                    ->where('user_id', auth()->user()->id)
                                    ->first();

                        if(empty($franchise_product)){
                            $franchise_product = new FranchiseProductAvailability();
                            $franchise_product->product_id = $product->id;
                            $franchise_product->product_variation_id = $variation['id'] ?? null;
                            $franchise_product->user_id = auth()->user()->id ?? null;
                        }

                        $franchise_product->quantity = $variation['stock'] ?? null;
                        $franchise_product->save();
                        
                    }
                }
            } 
        }

        return redirect()->route('backend.franchise-product.edit', $product)->with('success', 'Franchise Product stock updated successfully.');
    }
}
