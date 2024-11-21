<div class="flex w-full flex-col border-t border-gray-800 border-t-border-100 bg-white px-5 md:px-10 lg:border-b-8 lg:px-[50px] xl:px-16">
   <div class="grid w-full grid-cols-[repeat(auto-fill,minmax(260px,1fr))] gap-6 pt-16 md:grid-cols-3 lg:pt-24 lg:pb-16 xl:grid-cols-[repeat(auto-fill,minmax(220px,1fr))] xl:gap-8 2xl:grid-cols-5">
      <div class="flex flex-col">
         <div class="mb-[2px] flex h-16 items-start"><a class="inline-flex" href="/"><span class="relative h-[2.125rem] w-32 overflow-hidden md:w-[8.625rem]"><img alt="{{ config('app.title') }}" loading="eager" decoding="async" data-nimg="fill" class="object-contain" sizes="(max-width: 768px) 100vw" srcset="{{  asset(__setting('footer_logo')) }}" src="{{  asset(__setting('footer_logo')) }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></span></a></div>
         <a class="text-sm not-italic mb-7 text-heading" href="https://www.google.com/maps/place/NY State Thruway, New York, USA">{{ __setting('address') }}</a><a class="mb-1 text-sm text-heading" href="mailto:{{ __setting('email') }}">{{ __setting('email') }}</a><a class="text-sm text-heading" href="tel:{{ __setting('phone_number') }}">{{ __setting('phone_number') }}</a>
         <div>
            <div class="flex items-center gap-4 mt-4">
               <a class="text-accent hover:text-accent-hover" target="_blank" href="{{ __setting('facebook_link') }}">
                  <i class="fa fa-facebook"></i>
               </a>
               <a class="text-accent hover:text-accent-hover" target="_blank" href="{{ __setting('twitter_link') }}">
                  <i class="fa fa-twitter"></i>
               </a>
               <a class="text-accent hover:text-accent-hover" target="_blank" href="{{ __setting('instagram_link') }}">
                  <i class="fa fa-instagram"></i>
               </a>
            </div>
         </div>
      </div>

      @foreach($menu_sections as $menu_section)

         @if(count($menu_section->menuItems) != 0)
         <div class="flex flex-col" wire:key="menu-section-{{ $menu_section->id }}">
            <h3 class="mt-3 mb-4 font-semibold text-heading lg:mb-7">{{ $menu_section->name }}</h3>
            <ul class="space-y-3">
               @foreach($menu_section->menuItems as $menu)
                  <li wire:key="menu-item-{{ $menu->id }}">

                     @if($menu->is_external == 1)
                        <a class="text-sm transition-colors text-heading hover:text-accent" href="{{ $menu->url }}" target="_blank">{{ $menu->name }}</a>
                     @elseif($menu->is_external == 0 && $menu->is_system_built == 0)
                         <a class="text-sm transition-colors text-heading hover:text-accent" wire:navigate href="{{ route('frontend.page-detail', ['page_slug' => $menu->slug]) }}">{{ $menu->name }}</a>
                     @elseif($menu->is_external == 0 && $menu->is_system_built == 1)
                        <a class="text-sm transition-colors text-heading hover:text-accent" wire:navigate href="{{ url($menu->slug) }}">{{ $menu->name }}</a>
                     @endif
                     
                  </li>
               @endforeach
            </ul>
         </div>
         @endif

      @endforeach

   </div>
   <div class="flex flex-col items-center w-full gap-2 pt-8 pb-20 mt-8 border-t border-gray-200 lg:mt-0 lg:flex-row lg:justify-between lg:border-t-0 lg:pb-12">
      <span class="order-2 text-sm shrink-0 text-heading lg:order-1">©{{ date('Y') }} <a class="font-medium text-heading" href="{{ env('APP_URL') }}">{{ __setting('site_title') }}</a>. {{ __setting('copyright_link') }}</span>
      <div class="flex flex-wrap items-center justify-center order-1 gap-4 mb-5 lg:order-2 lg:mb-0 lg:justify-end lg:gap-x-5 lg:gap-y-3"></div>
   </div>
</div>