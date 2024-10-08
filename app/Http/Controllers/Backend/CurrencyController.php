<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the currency.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Currency::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->addColumn('code', function($row) {
                    return $row->code;
                })
                ->addColumn('symbol', function($row) {
                    return $row->symbol;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.currency.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'code'])
                ->make(true);
        }

        $currencies = Currency::all(); // Fetch all currencies
        return view('backend.currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new currency.
     */
    public function create()
    {
        return view('backend.currencies.create'); // Return the create view
    }

    /**
     * Store a newly created currency in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:20',
            'code' => 'required|string|max:3',
            'symbol' => 'required|string|max:10'
        ]);

        // Create a new currency in the database
        $currency = Currency::create([
            'name' => $request->name,
            'code' => $request->code,
            'symbol' => $request->symbol
        ]);

        return redirect()->route('backend.currency.index')
                         ->with('success', 'Currency created successfully.');
    }

    /**
     * Display the specified currency.
     */
    public function show(Currency $currency)
    {
        return view('backend.currencies.show', compact('currency')); // Return the show view
    }

    /**
     * Show the form for editing the specified currency.
     */
    public function edit(Currency $currency)
    {
        return view('backend.currencies.edit', compact('currency')); // Return the edit view
    }

    /**
     * Update the specified currency in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:20,' . $currency->id,
            'code' => 'required|string|max:3',
            'symbol' => 'required|string|max:10'
        ]);

        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'symbol' => $request->symbol
        ];

        // Update the currency data
        $currency->update($data);

        return redirect()->route('backend.currency.index')
                         ->with('success', 'Currency updated successfully.');
    }

    /**
     * Remove the specified currency from storage.
     */
    public function destroy($id)
    {
        $currency = Currency::find($id);
        if ($currency) {
            $currency->delete();
            return response()->json(['success' => 'Currency deleted successfully.']);
        }
        return response()->json(['error' => 'Currency not found.'], 404);
    }

}
