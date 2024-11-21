<nav class="w-full mx-auto fixed bg-cusgray z-30 py-2 md:px-0 duration-200">
    <div class="px-2 navtop relative max-w-6xl mx-auto flex justify-between place-items-center py-1.5">
       <div class="burger flex items-center">
          <button>
             <svg class="w-7 h-7 text-cusblack" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
             </svg>
          </button>
          <h3 class="hidden md:inline text-md mr-2 font-semibold ml-3 text-cusblack">{{ __setting('site_title') }}</h3>
       </div>
       <div class="profile flex items-center place-items-center">
          <div class="w-8 relative flex items-center h-8 mr-1 rounded-full hover:bg-gray-200 active:bg-gray-300 cursor-pointer duration-200" wire:navigate href="{{ route('frontend.home') }}">
             <svg class="w-6 h-6 text-cusblack m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
             </svg>
          </div>
          @livewire('cart-icon')

          @if (auth()->check())

            @livewire('notification-icon', ['context' => 'header']) 

          @endif

          <div class="w-8 relative flex items-center h-8 mr-1 rounded-full hover:bg-gray-200 active:bg-gray-300 cursor-pointer duration-200" wire:navigate href="{{ route('frontend.my-wishlist') }}">
             <svg class="w-6 m-auto h-6 text-cusblack" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
             </svg>
          </div>
          <button class="w-8 relative flex items-center h-8 rounded-full hover:bg-gray-200 active:bg-gray-300 cursor-pointer duration-200">
             <svg class="w-6 m-auto h-6 text-cusblack" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
             </svg>
          </button>
       </div>
    </div>
    <div></div>
 </nav>