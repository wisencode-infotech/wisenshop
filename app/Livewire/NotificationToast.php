<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationToast extends Component
{
    public $notifications = [];

    protected $listeners = ['notify'];

    /**
     * Handle incoming notification event.
     * 
     * @param string $type The notification type (e.g., success, error)
     * @param string $message The notification message
     */
    public function notify($type, $message)
    {
        // Add notification to array
        $this->notifications[] = [
            'type' => $type,
            'message' => $message,
        ];

        // Dispatch a browser event to show the notification
        $this->dispatch('showNotification', ['type' => $type, 'message' => $message]);

        $this->skipRender();
    }

    public function render()
    {
        return '<div></div>';
    }
}
