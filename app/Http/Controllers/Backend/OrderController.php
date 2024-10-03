<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    protected $order_service;

    public function __construct(OrderService $order_service)
    {
        $this->order_service = $order_service;
    }

    public function index(Request $request)
    {

         if ($request->ajax()) {
            $data = Order::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('user_name', function($row) {
                    return $row->user->name;
                })
                ->addColumn('status', function($row) {
                    if($row->status == 'pending')
                    {
                        return '<span class="badge bg-warning">'.$row->status.'</span>';
                    }
                    elseif ($row->status == 'completed') {
                        return '<span class="badge bg-success">'.$row->status.'</span>';   
                    }
                    else
                    {
                        return '<span class="badge bg-info">'.$row->status.'</span>';
                    }
                })
                ->addColumn('amount', function($row) {
                    return $row->total_price;
                })
                ->rawColumns(['user_name', 'status'])
                ->make(true);
        }

        $categories = Order::all(); // Fetch all categories
        return view('backend.orders.index', compact('categories'));
    }
}
