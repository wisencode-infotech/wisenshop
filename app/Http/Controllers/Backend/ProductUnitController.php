<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductUnitController extends Controller
{
    /**
     * Display a listing of the product units.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = ProductUnit::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->addColumn('short_name', function($row) {
                    return $row->short_name;
                })
                ->addColumn('can_have_variations', function($row) {
                    if($row->can_have_variations == 1)
                    {
                        return '<span class="badge rounded-pill badge-soft-success font-size-12">Yes</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill badge-soft-danger font-size-12">No</span>';
                    }
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.product-unit.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action','can_have_variations', 'code'])
                ->make(true);
        }

        $product_units = ProductUnit::all(); // Fetch all product_units
        return view('backend.product-units.index', compact('product_units'));
    }

    /**
     * Show the form for creating a new product unit.
     */
    public function create()
    {
        return view('backend.product-units.create'); // Return the create view
    }

    /**
     * Store a newly created product unit in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:20',
            'short_name' => 'required|string|max:20|unique:product_units,short_name'
        ]);

        // Create a new product unit in the database
        $product_unit = ProductUnit::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'can_have_variations' => $request->can_have_variations ?? '0'
        ]);

        return redirect()->route('backend.product-unit.index')
                         ->with('success', 'Product unit created successfully.');
    }

    /**
     * Display the specified product unit.
     */
    public function show(ProductUnit $product_unit)
    {
        return view('backend.product-units.show', compact('product_unit')); // Return the show view
    }

    /**
     * Show the form for editing the specified product unit.
     */
    public function edit(ProductUnit $product_unit)
    {
        return view('backend.product-units.edit', compact('product_unit')); // Return the edit view
    }

    /**
     * Update the specified product unit in storage.
     */
    public function update(Request $request, ProductUnit $product_unit)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:20',
            'short_name' => 'required|string|max:20|unique:product_units,short_name,' . $product_unit->id,
        ]);


        $data = [
            'name' => $request->name,
            'short_name' => $request->short_name,
            'can_have_variations' => $request->can_have_variations ?? '0'
        ];

        // Update the product unit data
        $product_unit->update($data);

        return redirect()->route('backend.product-unit.index')
                         ->with('success', 'Product unit updated successfully.');
    }

    /**
     * Remove the specified product unit from storage.
     */
    public function destroy($id)
    {
        $product_unit = ProductUnit::find($id);
        if ($product_unit) {
            $product_unit->delete();
            return response()->json(['success' => 'Product unit deleted successfully.']);
        }
        return response()->json(['error' => 'Product unit not found.'], 404);
    }

}
