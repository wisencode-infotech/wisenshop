<div class="account-left-menu">
    <ul>
        <li class="{{ $current_route == 'frontend.profile' ? 'active' : '' }}">
            <a wire:navigate href="{{ route('frontend.profile') }}">
               <i class="fa-regular fa-user"></i>
               {{ __trans('Profile') }}
            </a>
        </li>
        <li class="{{ $current_route == 'frontend.my-orders' ? 'active' : '' }}">
            <a wire:navigate href="{{ route('frontend.my-orders') }}">
                <i class="fa fa-box"></i>
                {{ __trans('Orders') }}
            </a>
        </li>
        <li class="{{ $current_route == 'frontend.contact-us' ? 'active' : '' }}">
            <a wire:navigate href="{{ route('frontend.contact-us') }}">
                <i class="fa-regular fa-envelope"></i>
                {{ __trans('Contact Us') }}
            </a>
        </li>
        @if (auth()->check())

        <li class="{{ $current_route == 'frontend.notifications.index' ? 'active' : '' }}">
            <a wire:navigate href="{{ route('frontend.notifications.index') }}">
                <i class="fa-regular fa-bell"></i>
                {{ __trans('Notification') }}
            </a>
        </li>

        <li>
            <a wire:navigate href="{{ route('frontend.logout') }}">
                <i class="fas fa-sign-out-alt"></i>
                {{ __trans('Logout') }}
            </a>
        </li>
        @endif
    </ul>
</div>