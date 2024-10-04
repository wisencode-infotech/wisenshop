<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        return view('backend.products.create'); // Return the create view
    }
}
