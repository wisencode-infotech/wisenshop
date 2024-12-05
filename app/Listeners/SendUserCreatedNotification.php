<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendUserCreatedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param UserCreated $event
     * @return void
     */
    public function handle(UserCreated $event): void
    {
        // Send an email using the UserCreatedMail Mailable
        Mail::to($event->user->email)->send(new UserCreatedMail($event->user));
    }
}
