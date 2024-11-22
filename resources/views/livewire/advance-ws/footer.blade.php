<footer class="footer-style-3">
   <!-- container -->
   <div class="container">
      <!-- row -->
      <div class="row">
         <!-- column -->
         <div class="col-12">
            <!-- footer top -->
            <div class="footer-top">
               <!-- site-brand -->
               <div class="site-brand">
                  <a href="index-three.html">
                     <img alt="{{ config('app.title') }}" loading="eager" decoding="async" data-nimg="fill" class="img-thumbnail" sizes="(max-width: 768px) 100vw" srcset="{{  asset(__setting('footer_logo')) }}" src="{{  asset(__setting('footer_logo')) }}" style="max-height: 50px;">
                  </a>
               </div>
               <!-- footer menu -->
               <div class="footer-cms-menu">
                  <div class="row">
                  @foreach($menu_sections as $menu_section)
                     
                        @if (count($menu_section->menuItems) != 0)
                        <div class="col">
                           <h3 class="mt-3 mb-4 font-semibold text-white lg:mb-7">{{ $menu_section->name }}</h3>
                        <ul class="menu space-y-3">
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

                  <p class="mt-2"><a href="mailto:info@webbycrown.com" class="mail-link">info@webbycrown.com</a></p>
               </div>
            </div>
            <!-- footer bottom -->
            <div class="footer-bottom">
               <!-- row -->
               <div class="row">
                  <!-- column -->
                  <div class="col-12 col-md-6">
                     <!-- site-copyright -->
                     <div class="site-copyright">
                        <p>
                           <a class="font-medium text-heading" href="{{ env('APP_URL') }}">{{ __setting('site_title') }}. {{ __setting('copyright_link') }}</a>
                        </p>
                     </div>
                  </div>
                  <!-- column -->
                  <div class="col-12 col-md-6">
                     <!-- payments icon -->
                     <div class="payments-icon">
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>