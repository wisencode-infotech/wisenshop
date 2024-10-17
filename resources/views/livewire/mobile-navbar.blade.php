<nav class="visible fixed bottom-0 z-10 flex h-12 w-full justify-between bg-light py-1.5 px-2 shadow-400 ltr:left-0 rtl:right-0 md:h-14 xl:hidden">
   <button class="mobile-pages-drawer-btn mobile-bottom-menu flex h-full items-center justify-center p-2 focus:text-accent focus:outline-0" tabindex="0">
      <span class="sr-only">{{ __trans('Burger Menu') }}</span>
      <svg width="25.567" height="18" viewBox="0 0 25.567 18" class="false">
         <g transform="translate(-776 -462)">
            <rect width="12.749" height="2.499" rx="1.25" transform="translate(776 462)" fill="currentColor"></rect>
            <rect width="25.567" height="2.499" rx="1.25" transform="translate(776 469.75)" fill="currentColor"></rect>
            <rect width="17.972" height="2.499" rx="1.25" transform="translate(776 477.501)" fill="currentColor"></rect>
         </g>
      </svg>
   </button>
   @if (request()->routeIs('frontend.home'))
   <button class="mobile-bottom-menu top-product-search-btn flex h-full items-center justify-center p-2 focus:text-accent focus:outline-0" tabindex="0">
      <span class="sr-only">{{ __trans('Search') }}</span>
      <i class="fa fa-search"></i>
   </button>
   @endif
   <button wire:navigate href="{{ route('frontend.home') }}" class="mobile-bottom-menu flex h-full items-center justify-center p-2 {{ Request::routeIs('frontend.home') ? 'text-accent' : '' }} focus:text-accent focus:outline-0" tabindex="0">
      <span class="sr-only">{{ __trans('Home') }}</span>
      <i class="fa fa-home"></i>
   </button>
   <button wire:navigate href="{{ route('frontend.cart') }}" class="mobile-bottom-menu product-cart relative flex h-full items-center justify-center p-2 {{ Request::routeIs('frontend.cart') ? 'text-accent' : '' }} focus:text-accent focus:outline-0" tabindex="0">
      <span class="sr-only">{{ __trans('Cart') }}</span>
      <i class="fa fa-shopping-cart"></i>
      <span class="absolute top-0 mt-0.5 rounded-full bg-accent py-1 px-1.5 text-10px font-semibold leading-none text-light ltr:right-0 ltr:-mr-0.5 rtl:left-0 rtl:-ml-0.5">{{ $cart_items_count }}</span>
   </button>
   @if (auth()->check())
      <button wire:navigate href="{{ route('frontend.logout') }}" class="mobile-bottom-menu flex h-full items-center justify-center p-2 focus:text-accent focus:outline-0" tabindex="0">
         <span class="sr-only">{{ __trans('Logout') }}</span>
         <i class="fa fa-sign-out"></i>
      </button>
   @else
      <button wire:navigate href="{{ route('frontend.login') }}" class="mobile-bottom-menu flex h-full items-center justify-center p-2 {{ Request::routeIs('frontend.login') ? 'text-accent' : '' }} focus:text-accent focus:outline-0" tabindex="0">
         <span class="sr-only">{{ __trans('User') }}</span>
         <i class="fa fa-user"></i>
      </button>
   @endif
   
</nav>