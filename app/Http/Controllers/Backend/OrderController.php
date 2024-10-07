<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;


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
            $status_filter = $request->input('status_filter');

            $query = Order::query();
            if ($status_filter) {
                $query->where('status', $status_filter);
            }

            $data = $query->latest()->get();

            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('user_name', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('status', function ($row) {
                    $status = config('general.order_statuses.' . $row->status);
                    $status_color = config('general.order_statuses_color.' . $row->status);
                    return '<span class="badge rounded-pill badge-soft-' . $status_color . ' font-size-12">' . $status . '</span>';
                })
                ->addColumn('amount', function ($row) {
                    return $row->total_price . ' ' . __appCurrencySymbol();
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('backend.order.show', $row) . '" class="edit btn btn-primary btn-sm">View</a>';
                    $status = config('general.order_statuses.' . $row->status);
                    if ($status == 'Pending') {
                        $btn .= '&nbsp' . '<a href="' . route('backend.order.update.status', $row) . '" class="update-order-status btn btn-warning btn-sm">Export & Accept</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'user_name', 'status'])
                ->make(true);
        }

        $categories = Order::all(); // Fetch all categories
        return view('backend.orders.index', compact('categories'));
    }

    /**
     * Display the specified category.
     */
    public function show(Order $order)
    {
        $status = config('general.order_statuses.' . $order->status);
        $status_color = config('general.order_statuses_color.' . $order->status);
        return view('backend.orders.show', compact('order', 'status', 'status_color'));
    }

    public function updateStatus(Order $order)
    {
        $this->order_service->setRecord($order);
        $this->order_service->updateStatus(2);

        return response()->json([
            'order' => $order,
            'success' => 200,
            'message' => 'Order Accepted successfully.',
        ]);
    }

    public function bulkExport(Request $request)
    {
        $options = [];

        $action = $request->action ?? 'default'; // multi-orders-with-view

        $options['action'] = $action;

        $orders = Order::query();

        if ($request->has('status') && is_numeric($request->status)) {
            $orders->where('status', $request->status);

            $options['export_as'] = 'pending-orders-' . date('YmdHis') . '.pdf';
        }

        return $this->bulkExportWithMultiOrders($orders->get(), $options);
    }

    public function bulkExportWithMultiOrders($orders, $options = [])
    {
        $dompdf_options = new Options();
        $dompdf_options->set('defaultFont', 'DejaVu Sans');
        $dompdf_options->set('isRemoteEnabled', true); // Enable remote file access
        $dompdf_options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing

        $dompdf = new Dompdf($dompdf_options);

        $html = '';

        if ($options['action'] == 'export-multi-orders-with-view') {
            $html = view('backend.orders.pdf.orders-info-pdf', compact('orders'))->render();
        }

        $export_name = $options['export_as'] ?? 'exported-orders.pdf';

        $dompdf->loadHtml($html);
        $dompdf->render();

        return $dompdf->stream($export_name, ['Attachment' => false]);
    }

}
