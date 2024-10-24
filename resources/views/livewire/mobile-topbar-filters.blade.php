<div class="sticky z-20 flex h-14 items-center justify-between border-t border-b border-border-200 bg-light py-3 px-5 md:h-16 lg:px-6 xl:hidden top-[58px] lg:top-[84px]">
   
   <div class="relative inline-block ltr:text-left rtl:text-right" data-headlessui-state="">
      <button class="mobile-category-dropdown-btn flex h-11 shrink-0 items-center text-sm font-semibold text-heading focus:outline-0 md:text-[15px] xl:px-4 rounded border-border-200 bg-light xl:min-w-150 xl:border xl:text-accent" id="headlessui-menu-button-:Rpp4m:" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
         <span class="flex h-5 w-5 items-center justify-center ltr:mr-2 rtl:ml-2">
            <img class="category-image-selected" alt="category-images" src="{{ asset('assets/frontend/img/category.png') }}" />
         </span>
         <span class="whitespace-nowrap selected-category-name">{{ __trans('All') }}</span>
         <span class="flex pt-1 ltr:ml-auto ltr:pl-2.5 rtl:mr-auto rtl:pr-2.5">
            <svg width="10" height="6" viewBox="0 0 10 6">
               <path d="M128,192l5,5,5-5Z" transform="translate(-128 -192)" fill="currentColor"></path>
            </svg>
         </span>
      </button>
      <div class="mobile-category-dropdown hidden absolute mt-2 h-56 max-h-56 min-h-40 w-56 overflow-hidden rounded bg-light py-2 shadow-700 focus:outline-none focus-visible:outline-0 sm:max-h-72 lg:h-72 2xl:h-auto 2xl:max-h-screen ltr:left-0 ltr:origin-top-right rtl:left-0 rtl:origin-top-left ltr:xl:right-auto ltr:xl:left-0 ltr:xl:origin-top-left rtl:xl:left-auto rtl:xl:left-0 rtl:xl:origin-top-right transform opacity-100 scale-100" aria-labelledby="headlessui-menu-button-:Rpp4m:" id="headlessui-menu-items-:r29:" role="menu" tabindex="0">
         <div data-overlayscrollbars-initialize="" class="os-theme-thin-dark h-full w-full" role="none" data-overlayscrollbars="host">
            <div class="os-size-observer">
               <div class="os-size-observer-listener ltr"></div>
            </div>
            <div data-overlayscrollbars-contents="" role="none" data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px; overflow-y: scroll;">

               <div id="headlessui-menu-item-:r2a:" role="custom-menuitem" tabindex="-1" data-headlessui-state="">
                  <span role="button" tabindex="0" class="flex w-full items-center space-x-4 px-5 py-2.5 text-sm font-semibold capitalize transition duration-200 hover:text-accent focus:outline-0 focus-visible:outline-0 rtl:space-x-reverse text-body-dark" x-on:click="$dispatch('category-selected', { category_id: [] })">
                     <span class="flex h-5 w-5 items-center justify-center">
                        <img src="{{ asset('assets/frontend/img/category.png') }}" style="height:20px:width:20px"  />
                     </span>
                     <span class="category-name">{{ __trans('All') }}</span>
                  </span>
               </div>

               @foreach($product_categories as $category)
                <div id="headlessui-menu-item-{{ $category->id }}" role="custom-menuitem" tabindex="-1" data-headlessui-state="">
                    <span role="button" tabindex="0" class="flex w-full items-center space-x-4 px-5 py-2.5 text-sm font-semibold capitalize transition duration-200 hover:text-accent focus:outline-0 focus-visible:outline-0 rtl:space-x-reverse text-body-dark" x-on:click="$dispatch('category-selected', { category_id: [{{ $category->id }}] })">
                        <span class="flex h-5 w-5 items-center justify-center">
                            <img src="{{ $category->image_url }}" style="height:20px; width:20px;" />
                        </span>
                        <span class="category-name">{{ $category->name }}</span>
                    </span>

                    @if($category->subcategories && count($category->subcategories) > 0)
                        <div style="margin-left: 15%;">
                            @foreach($category->subcategories as $subcategory)
                                <div id="headlessui-menu-item-{{ $subcategory->id }}" role="custom-menuitem" tabindex="-1" data-headlessui-state="">
                                    <span role="button" tabindex="0" class="flex w-full items-center space-x-4 px-5 py-2.5 text-sm font-semibold capitalize transition duration-200 hover:text-accent focus:outline-0 focus-visible:outline-0 rtl:space-x-reverse text-body-dark" x-on:click="$dispatch('category-selected', { category_id: [{{ $subcategory->id }}] })">
                                        <span class="flex h-5 w-5 items-center justify-center">
                                            <img src="{{ $subcategory->image_url }}" style="height:20px; width:20px;" />
                                        </span>
                                        <span class="category-name">{{ $subcategory->name }}</span>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
            </div>
            <div class="os-scrollbar os-scrollbar-horizontal os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable">
               <div class="os-scrollbar-track">
                  <div class="os-scrollbar-handle" style="width: 100%;"></div>
               </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-visible os-scrollbar-cornerless">
               <div class="os-scrollbar-track">
                  <div class="os-scrollbar-handle" style="height: 52%;"></div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <button class="mobile-filter-btn flex h-8 items-center rounded border border-border-200 bg-gray-100 bg-opacity-90 py-1 px-3 text-sm font-semibold text-heading transition-colors duration-200 hover:border-accent-hover hover:bg-accent hover:text-light focus:border-accent-hover focus:bg-accent focus:text-light focus:outline-0 md:h-10 md:py-1.5 md:px-4 md:text-base">
      <svg width="18" height="14" class="ltr:mr-2 rtl:ml-2" viewBox="0 0 18 14">
         <path d="M942.581,1295.564H925.419c-.231,0-.419-.336-.419-.75s.187-.75.419-.75h17.163c.231,0,.419.336.419.75S942.813,1295.564,942.581,1295.564Z" transform="translate(-925 -1292.064)" fill="currentColor"></path>
         <path d="M942.581,1951.5H925.419c-.231,0-.419-.336-.419-.75s.187-.75.419-.75h17.163c.231,0,.419.336.419.75S942.813,1951.5,942.581,1951.5Z" transform="translate(-925 -1939.001)" fill="currentColor"></path>
         <path d="M1163.713,1122.489a2.5,2.5,0,1,0,1.768.732A2.483,2.483,0,0,0,1163.713,1122.489Z" transform="translate(-1158.213 -1122.489)" fill="currentColor"></path>
         <path d="M2344.886,1779.157a2.5,2.5,0,1,0,.731,1.768A2.488,2.488,0,0,0,2344.886,1779.157Z" transform="translate(-2330.617 -1769.425)" fill="currentColor"></path>
      </svg>
      {{ __trans('Filter') }}
   </button>
</div>

