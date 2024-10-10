<aside class="hidden shrink-0 ltr:mr-8 rtl:ml-8 xl:block xl:w-80">
    <div class="overflow-hidden rounded border border-border-200 bg-light">
        <ul class="py-7">
            <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.profile' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.profile') }}">{{ __trans('Profile') }}</a></li>
            <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.my-orders' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.my-orders') }}">{{ __trans('My Orders') }}</a></li>
            <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.cart' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.cart') }}">{{ __trans('My Cart') }}</a></li>
            <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.my-wishlist' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.my-wishlist') }}">{{ __trans('My Wishlists') }}</a></li>
            <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent {{ $current_route == 'frontend.contact-us' ? '!border-accent text-accent' : '' }}" wire:navigate href="{{ route('frontend.contact-us') }}">Contact Us</a></li>
        </ul>
        <ul class="border-t border-border-200 bg-light py-4">
            <li class="block py-2 px-11 "><button class="font-semibold text-heading transition-colors hover:text-accent focus:text-accent" wire:navigate href="{{ route('frontend.logout') }}">{{ __trans('Logout') }}</button></li>
        </ul>
    </div>
</aside> 