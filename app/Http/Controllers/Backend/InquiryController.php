<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InquiryController extends Controller
{
    /**
     * Display a listing of the Inquiry.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $inquiries = Inquiry::latest()->get();
            $data = $inquiries->map(function ($inquiry) {
                $inquiryData = json_decode($inquiry->data, true); 
                return [
                    'id' => $inquiry->id,
                    'name' => $inquiryData['name'] ?? '',
                    'email' => $inquiryData['email'] ?? '',
                    'subject' => $inquiryData['subject'] ?? '',
                ];
            });

            return DataTables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('name', function($row) {
                    return $row['name'];
                })
                ->addColumn('email', function($row) {
                    return $row['email'];
                })
                ->addColumn('subject', function($row) {
                    return $row['subject'];
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="' . route('backend.inquiry.show', $row['id']) . '" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $currencies = Inquiry::all(); // Fetch all Inquiries
        return view('backend.inquiries.index', compact('currencies'));
    }

    /**
     * Display the specified Inquiry.
     */
    public function show(Inquiry $Inquiry)
    {
        return view('backend.inquiries.show', compact('Inquiry')); // Return the show view
    }


}
