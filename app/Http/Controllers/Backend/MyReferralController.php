<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class MyReferralController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = [];

            $user = Auth::user();

            if (!empty($user->affiliate_code))
                $data = User::where('referral_code', $user->affiliate_code)->get();

            return Datatables::of($data)
                ->addIndexColumn() // Adds row index
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->addColumn('email', function($row) {
                    return $row->email;
                })
                ->addColumn('address', function($row) {
                    return $row->address ?? 'N/A';
                })
                ->rawColumns([])
                ->make(true);
        }

        return view('backend.referral.index');

    }
}
