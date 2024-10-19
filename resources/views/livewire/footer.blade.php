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
      <div class="flex flex-col">
         <h3 class="mt-3 mb-4 font-semibold text-heading lg:mb-7">Explore</h3>
         <ul class="space-y-3">
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/shops">Shops</a></li>
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/authors">Authors</a></li>
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/flash-sales">Flash Deals</a></li>
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/offers">Coupon</a></li>
         </ul>
      </div>
      <div class="flex flex-col">
         <h3 class="mt-3 mb-4 font-semibold text-heading lg:mb-7">Customer Service</h3>
         <ul class="space-y-3">
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/help">FAQ &amp; Helps</a></li>
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/vendor-refund-policies">Vendor Refund Policies</a></li>
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/customer-refund-policies">Customer Refund Policies</a></li>
         </ul>
      </div>
      <div class="flex flex-col">
         <h3 class="mt-3 mb-4 font-semibold text-heading lg:mb-7">Our information</h3>
         <ul class="space-y-3">
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/manufacturers">Manufacturers</a></li>
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/privacy">Privacy policies</a></li>
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/terms">Terms &amp; conditions</a></li>
            <li><a class="text-sm transition-colors text-heading hover:text-accent" href="/contact">Contact Us</a></li>
         </ul>
      </div>
      <div class="col-span-full md:col-span-2 lg:col-auto">
         <div class="flex flex-col">
            {{-- <h3 class="mt-3 mb-7 text-xl font-semibold text-heading">Subscribe Now</h3>
            <p class="mb-7 text-sm text-heading">Subscribe your email for newsletter and featured news based on your interest</p>
            <div class="flex flex-col">
               <form novalidate="">
                  <div class="relative w-full rounded border border-gray-200 bg-gray-50 ltr:pr-11 rtl:pl-11">
                     <input type="email" id="email_subscribe" name="email" placeholder="Write your email here" class="h-14 w-full border-0 bg-transparent text-sm text-body outline-none focus:outline-0 ltr:pl-5 rtl:pr-5">
                     <button class="absolute top-1/2 -mt-2 ltr:right-3 rtl:left-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.045" height="16" viewBox="0 0 16.045 16" class="text-gray-500 transition-colors hover:text-accent">
                           <path id="send" d="M17.633,9.293,3.284,2.079a.849.849,0,0,0-1.2,1.042l2,5.371,9.138,1.523L4.086,11.538l-2,5.371a.812.812,0,0,0,1.2.962l14.349-7.214A.762.762,0,0,0,17.633,9.293Z" transform="translate(-2.009 -1.994)" fill="currentColor"></path>
                        </svg>
                     </button>
                  </div>
               </form>
            </div> --}}
         </div>
      </div>
   </div>
   <div class="flex flex-col items-center w-full gap-2 pt-8 pb-20 mt-8 border-t border-gray-200 lg:mt-0 lg:flex-row lg:justify-between lg:border-t-0 lg:pb-12">
      <span class="order-2 text-sm shrink-0 text-heading lg:order-1">©{{ date('Y') }} <a class="font-medium text-heading" href="{{ env('APP_URL') }}">{{ __setting('site_title') }}</a>. {{ __setting('copyright_link') }}</span>
      <div class="flex flex-wrap items-center justify-center order-1 gap-4 mb-5 lg:order-2 lg:mb-0 lg:justify-end lg:gap-x-5 lg:gap-y-3"></div>
   </div>
</div>