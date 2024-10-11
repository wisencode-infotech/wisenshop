<aside class="hidden shrink-0 ltr:mr-8 rtl:ml-8 xl:block xl:w-80">
    <div class="overflow-hidden rounded border border-border-200 bg-light">
        <ul class="py-7">
            @if (auth()->check())
            <li class="py-1">
                <a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.profile' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.profile') }}">
                    <i class="fas fa-user"></i> {{ __trans('Profile') }}
                </a>
            </li>
            <li class="py-1">
                <a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.my-orders' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.my-orders') }}">
                    <i class="fas fa-box"></i> {{ __trans('My Orders') }}
                </a>
            </li>
            <li class="py-1">
                <a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.notifications.index' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.notifications.index') }}">
                    <i class="fas fa-bell"></i> {{ __trans('Notifications') }}
                </a>
            </li>
            @endif

            
            <li class="py-1">
                <a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.cart' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.cart') }}">
                    <i class="fas fa-shopping-cart"></i> {{ __trans('My Cart') }}
                </a>
            </li>

            <li class="py-1">
                <a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.my-wishlist' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.my-wishlist') }}">
                    <i class="fas fa-heart"></i> {{ __trans('My Wishlists') }}
                </a>
            </li>
            
            <li class="py-1">
                <a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.contact-us' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.contact-us') }}">
                    <i class="fas fa-envelope"></i> Contact Us
                </a>
            </li>
        </ul>
        @if (auth()->check())
        <ul class="border-t border-border-200 bg-light py-4">
            <li class="block py-2 px-11 ">
                <button class="font-semibold text-heading transition-colors hover:text-accent focus:text-accent" wire:navigate href="{{ route('frontend.logout') }}">
                    <i class="fas fa-sign-out-alt"></i> {{ __trans('Logout') }}
                </button>
            </li>
        </ul>
        @endif
    </div>
</aside>
