<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationIcon extends Component
{
    public $notifications;
    public $total_unread_notification;
    public $context;

    protected $listeners = ['refreshNotificationIcon' => 'refreshNotifications'];

    public function mount($context = 'header')
    {
        $this->loadNotifications();
        $this->updateUnreadCount();
        $this->context = $context;
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
        return __appLivewireView('notification-icon', [
            'notifications' => $this->notifications,
            'total_unread_notification' => $this->total_unread_notification,
            'context' => $this->context,
        ]);
    }
}
