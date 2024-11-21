<div class="bg-gray-100 border-t border-gray-300 py-10 px-6 md:px-12 lg:px-20">
   <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
      <!-- Logo and Contact Information -->
      <div class="flex flex-col items-start space-y-4">
         <a href="/" class="inline-block">
            <img src="{{ asset(__setting('footer_logo')) }}" alt="{{ config('app.title') }}" class="w-32 h-auto object-contain">
         </a>
         <p class="text-sm text-gray-700">
            <a href="https://www.google.com/maps/place/NY State Thruway, New York, USA" class="hover:underline">
               {{ __setting('address') }}
            </a>
         </p>
         <p class="text-sm text-gray-700">
            <a href="mailto:{{ __setting('email') }}" class="hover:underline">
               {{ __setting('email') }}
            </a>
         </p>
         <p class="text-sm text-gray-700">
            <a href="tel:{{ __setting('phone_number') }}" class="hover:underline">
               {{ __setting('phone_number') }}
            </a>
         </p>
         <!-- Social Links -->
         <div class="flex space-x-4 mt-4">
            <a href="{{ __setting('facebook_link') }}" target="_blank" class="text-gray-600 hover:text-blue-600">
               <i class="fa fa-facebook"></i>
            </a>
            <a href="{{ __setting('twitter_link') }}" target="_blank" class="text-gray-600 hover:text-blue-400">
               <i class="fa fa-twitter"></i>
            </a>
            <a href="{{ __setting('instagram_link') }}" target="_blank" class="text-gray-600 hover:text-pink-500">
               <i class="fa fa-instagram"></i>
            </a>
         </div>
      </div>

      <!-- Dynamic Menu Sections -->
      @foreach($menu_sections as $menu_section)
         @if(count($menu_section->menuItems) != 0)
         <div>
            <h4 class="text-lg font-semibold text-gray-800 mb-4">{{ $menu_section->name }}</h4>
            <ul class="space-y-3">
               @foreach($menu_section->menuItems as $menu)
                  <li>
                     @if($menu->is_external == 1)
                     <a href="{{ $menu->url }}" target="_blank" class="text-sm text-gray-700 hover:text-blue-600">
                        {{ $menu->name }}
                     </a>
                     @elseif($menu->is_external == 0 && $menu->is_system_built == 0)
                     <a href="{{ route('frontend.page-detail', ['page_slug' => $menu->slug]) }}" wire:navigate class="text-sm text-gray-700 hover:text-blue-600">
                        {{ $menu->name }}
                     </a>
                     @elseif($menu->is_external == 0 && $menu->is_system_built == 1)
                     <a href="{{ url($menu->slug) }}" wire:navigate class="text-sm text-gray-700 hover:text-blue-600">
                        {{ $menu->name }}
                     </a>
                     @endif
                  </li>
               @endforeach
            </ul>
         </div>
         @endif
      @endforeach
   </div>

   <!-- Footer Bottom Section -->
   <div class="mt-10 border-t border-gray-300 pt-6 flex flex-col md:flex-row justify-between items-center">
      <span class="text-sm text-gray-600">
         ©{{ date('Y') }} <a href="{{ env('APP_URL') }}" class="font-medium text-blue-600">{{ __setting('site_title') }}</a>. {{ __setting('copyright_link') }}
      </span>
      <div class="flex flex-wrap items-center gap-4 mt-4 md:mt-0">
         <!-- Additional Links or Buttons (Optional) -->
      </div>
   </div>
</div>