<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the payment methods.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PaymentMethod::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('image', function($row) {
                    return '<img src="' . $row->logo_url . '" height="50" width="50" />';
                })
                ->addColumn('is_default', function($row) {
                    
                    if ($row->is_default == 1) {
                        $badge_title = 'Yes';
                        $badge_class = 'badge-soft-success';
                    } else {
                        $badge_title = 'No';
                        $badge_class = 'badge-soft-danger';
                    }

                    return '<span class="badge rounded-pill font-size-12 ' . $badge_class . '">' .  $badge_title . '</span>';
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.payment-method.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'image', 'is_default'])
                ->make(true);
        }

        $payment_methods = PaymentMethod::all(); // Fetch all payment methods
        return view('backend.payment-methods.index', compact('payment_methods'));
    }

    /**
     * Show the form for creating a new payment method.
     */
    public function create()
    {
        return view('backend.payment-methods.create'); // Return the create view
    }

    /**
     * Store a newly created payment method in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'logo_url' => 'url',
            'name' => 'required|string|max:100',
        ]);

        $metaInfoData = [];
        if ($request->has('meta_info')) {
            foreach ($request->meta_info as $item) {
                $metaInfoData[$item['key']] = $item['value'];
            }
        }
        $metaInfoJson = json_encode($metaInfoData);

        // Create a new payment method in the database
        $payment_method = PaymentMethod::create([
            'logo_url' => $request->logo_url,
            'name' => $request->name,
            'description' => $request->description,
            'meta_info' => $metaInfoJson,
            'is_default' => $request->has('is_default') ? true : false
        ]);

        // Set is_default false for others if active for this
        $this->setOthersIsDefaultFalseIfActive($payment_method);

        return redirect()->route('backend.payment-method.index')
                         ->with('success', 'Payment method created successfully.');
    }

    /**
     * Display the specified payment method.
     */
    public function show(PaymentMethod $payment_method)
    {
        return view('backend.payment-methods.show', compact('payment_method')); // Return the show view
    }

    /**
     * Show the form for editing the specified payment method.
     */
    public function edit(PaymentMethod $payment_method)
    {
        return view('backend.payment-methods.edit', compact('payment_method')); // Return the edit view
    }

    /**
     * Update the specified payment method in storage.
     */
    public function update(Request $request, PaymentMethod $payment_method)
    {
        // Validate the request data
        $request->validate([
            'logo_url' => 'url',
            'name' => 'required|string|max:100',
        ]);

        $metaInfo = [];
        if ($request->has('meta_info')) {
            foreach ($request->meta_info as $meta) {
                if (!empty($meta['key']) && !empty($meta['value'])) {
                    $metaInfo[$meta['key']] = $meta['value'];
                }
            }
        }

        $data = [
            'logo_url' => $request->logo_url,
            'name' => $request->name,
            'description' => $request->description,
            'meta_info' => json_encode($metaInfo),
            'is_default' => $request->has('is_default') ? true : false
        ];

        // Update the payment_method data
        $payment_method->update($data);

        // Set is_default false for others if active for this
        $this->setOthersIsDefaultFalseIfActive($payment_method);

        return redirect()->route('backend.payment-method.index')
                         ->with('success', 'Payment method updated successfully.');
    }

    /**
     * Remove the specified payment method from storage.
     */
    public function destroy($id)
    {
        $payment_method = PaymentMethod::find($id);

        if ($payment_method) {
            $payment_method->delete();

            return response()->json(['success' => 'Payment method deleted successfully.']);
        }

        return response()->json(['error' => 'Payment method not found.'], 404);
    }

    /**
     * Set is_default false for others if active for this
     */
    public function setOthersIsDefaultFalseIfActive($payment_method)
    {
        if ($payment_method->is_default == 1) {
            PaymentMethod::where('id', '<>', $payment_method->id)->update([
                'is_default' => false
            ]);
        }
    }
}
