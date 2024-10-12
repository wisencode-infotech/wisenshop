<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    /**
     * Display a listing of the notification.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Notification::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('user_id', function($row) {
                    return $row->user->name;
                })
                ->addColumn('title', function($row) {
                    return $row->title;
                })
                ->addColumn('message', function($row) {
                    return $row->message;
                })
                ->addColumn('is_read', function($row) {
                    if($row->is_read == 0)
                    {
                        return '<span class="badge rounded-pill badge-soft-danger font-size-12">UnRead</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill badge-soft-secondary font-size-12">Read</span>';
                    }
                })
                 ->addColumn('type', function($row) {
                    return strtoupper($row->type);
                })
                ->addColumn('action', function($row) {
                    if ($row->is_read == 0) {
                        $btn = '<a href="javascript:void(0);" data-id="' . $row->id . '" data-status="1" class="update-notification-status btn btn-secondary btn-sm">Mark as Read</a>&nbsp;';
                    } else {
                        $btn = '<a href="javascript:void(0);" data-id="' . $row->id . '" data-status="0" class="update-notification-status btn btn-danger btn-sm">Mark as UnRead</a>&nbsp;';
                    }
                    if (!empty($row->url)) {
                        $btn .= '<a href="' . $row->url . '" target="_blank"><i class="fa fa-link"></i></a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'type', 'is_read'])
                ->make(true);
        }

        $notifications = Notification::all(); // Fetch all notifications
        return view('backend.notifications.index', compact('notifications'));
    }

   
   public function ChangeMarkAsReadUnRead($notificationId, $status)
    {
        $notification = Notification::findOrFail($notificationId);
        $notification->is_read = $status;
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => $status == 1 ? 'Notification marked as read.' : 'Notification marked as unread.'
        ]);
    }

   
}
