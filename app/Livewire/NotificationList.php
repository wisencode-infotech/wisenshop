<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class NotificationList extends Component
{
    use WithPagination;

    public $perPage = 5;

    public function mount(){
        Notification::where('is_read', 0)
            ->where('user_id', Auth::user()->id)
            ->update(['is_read' => 1]);

        $this->dispatch('refreshNotificationIcon');
    }

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function render()
    {
        $notifications = Notification::where(function($query) {
            $query->where('user_id', Auth::user()->id)
                  ->orWhere('is_global', 1);
        })
        ->orderBy('created_at', 'desc')
        ->paginate($this->perPage);

        return __appLivewireView('notification-list', ['notifications' => $notifications]);
    }
}
