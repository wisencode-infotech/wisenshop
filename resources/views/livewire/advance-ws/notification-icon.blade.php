<button name="notification" class="notification" wire:navigate href="{{ route('frontend.notifications.index') }}">
    <i class="fa fa-bell"></i>
    <span class="count">{{ $total_unread_notification }}</span>
</button>