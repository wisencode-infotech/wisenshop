<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationIcon extends Component
{
    public $notifications;
    public $total_unread_notification;

    protected $listeners = ['refreshNotificationIcon' => 'refreshNotifications'];

    public function mount()
    {
        $this->loadNotifications();
        $this->updateUnreadCount();
    }

    public function loadNotifications()
    {
        $this->notifications = Notification::where(function($query) {
                $query->where('user_id', Auth::id())
                      ->orWhere('is_global', 1);
            })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function updateUnreadCount()
    {
        $this->total_unread_notification = Notification::where('is_read', 0)
            ->where(function($query) {
                $query->where('user_id', Auth::id())
                      ->orWhere('is_global', 1);
            })->count();
    }

    public function refreshNotifications()
    {
        $this->loadNotifications();
        $this->updateUnreadCount();
    }

    public function render()
    {
        return view('livewire.notification-icon', [
            'notifications' => $this->notifications,
            'total_unread_notification' => $this->total_unread_notification
        ]);
    }
}
