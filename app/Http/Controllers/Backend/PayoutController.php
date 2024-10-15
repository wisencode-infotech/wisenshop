<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FranchiseAffiliatePayout;
use Yajra\DataTables\DataTables;

class PayoutController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = FranchiseAffiliatePayout::latest();

            if(__currentUserRole() == 'franchise'){
                $data = $data->where('user_id', auth()->user()->id);
            }

            $data = $data->get();

            return Datatables::of($data)
                ->addIndexColumn() // Adds row index
                ->addColumn('amount', function($row) {
                    return $row->amount;
                })
                ->addColumn('iban', function($row) {
                    return $row->iban;
                })
                ->addColumn('user_id', function($row) {
                    if(__currentUserRole() == 'franchise'){
                        return '-';
                    }

                    return $row->user->name;
                })
                ->addColumn('status', function($row) {
                    if ($row->status == 'pending') {
                        return '<span class="badge rounded-pill badge-soft-primary font-size-12">Pending</span>';
                    } else {
                        return '<span class="badge rounded-pill badge-soft-info font-size-12">Approved</span>';
                    }
                })
                ->addColumn('action', function($row) {

                    $btn = '';

                    if(__currentUserRole() == 'franchise' &&  $row->status == 'pending'){
                        $btn = '<a href="'.route('backend.payout.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    }

                    if(__currentUserRole() == 'admin' &&  $row->status == 'pending'){
                        $btn = '<button class="btn btn-success btn-sm approve" data-id="'.$row->id.'">Approved</button>';
                    }
                    
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.payouts.index');
    }

    public function create()
    {
        return view('backend.payouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'iban' => 'required|string|max:34',
        ]);

        FranchiseAffiliatePayout::create([
            'user_id' => auth()->user()->id,
            'amount' => $request->amount,
            'iban' => $request->iban,
            'status' => 'pending',
        ]);

        return redirect()->route('backend.payout.index')->with('success', 'Payout created successfully.');
    }

    public function edit($id)
    {
        $payout = FranchiseAffiliatePayout::findOrFail($id);

        if ($payout->user_id !== auth()->user()->id) {
            return redirect()->route('backend.payout.index')->with('error', 'Unauthorized action.');
        }

        return view('backend.payouts.edit', compact('payout'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'iban' => 'required|string|max:34',
        ]);

        $payout = FranchiseAffiliatePayout::findOrFail($id);

        if($payout->status == 'approved'){
            return redirect()->route('backend.payout.index')->with('error', 'Unauthorized action.');    
        }

        $payout->update([
            'amount' => $request->amount,
            'iban' => $request->iban,
        ]);

        return redirect()->route('backend.payout.index')->with('success', 'Payout updated successfully.');
    }

    public function approve($id)
    {
        $payout = FranchiseAffiliatePayout::findOrFail($id);
        $payout->status = 'approved';
        $payout->save();

        return response()->json(['success' => 'Payout approved successfully.']);
    }
}
