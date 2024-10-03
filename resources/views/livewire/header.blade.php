<header id="site-header" class="site-header-with-search top-0 z-50 w-full transition-all sticky border-b border-border-200 shadow-sm lg:h-22 is-scrolling">
    <div class="fixed inset-0 -z-10 h-[100vh] w-full bg-black/50 hidden"></div>
    <div>
        <div
            class="flex w-full transform-gpu items-center justify-between bg-light px-5 transition-transform duration-300 lg:h-22 lg:px-6 2xl:px-8 lg:absolute lg:border-0 lg:bg-transparent lg:shadow-none">
            <button
                class="group hidden h-full w-6 shrink-0 items-center justify-center focus:text-accent focus:outline-0 ltr:mr-6 rtl:ml-6 lg:flex xl:hidden"><span
                    class="sr-only">{{ __trans('Burger Menu') }}</span>
                <div class="flex w-full flex-col space-y-1.5"><span
                        class="h-0.5 w-1/2 rounded bg-gray-600 transition-all group-hover:w-full"></span><span
                        class="h-0.5 w-full rounded bg-gray-600 transition-all group-hover:w-3/4"></span><span
                        class="h-0.5 w-3/4 rounded bg-gray-600 transition-all group-hover:w-full"></span>
                </div>
            </button>
            <div
                class="flex shrink-0 grow-0 basis-auto flex-wrap items-center ltr:mr-auto rtl:ml-auto lg:w-auto lg:flex-nowrap">
                <a class="inline-flex py-3 mx-auto lg:mx-0" wire:navigate href="{{ route('frontend.home') }}"><span
                        class="relative h-[2.125rem] w-32 overflow-hidden md:w-[8.625rem]">
                        <img
                            alt="Pickbazar" loading="eager" decoding="async" data-nimg="fill"
                            class="object-contain"
                            style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                            sizes="(max-width: 768px) 100vw"
                            src="{{ asset('assets/frontend/img/logo.png') }}">
                        </span>
                </a>
            </div>

            <div class="menuItem group relative mx-3 cursor-pointer py-3 xl:mx-4 rtl:right-50 rtl:space-x-reverse block lg:hidden absolute">
                    <div class="flex items-center gap-2 group-hover:text-accent">
                        <span class="text-brand-dark group-hover:text-brand relative inline-flex items-center py-2 font-normal rtl:left-0">
                            {{ strtoupper(app()->currentLocale()) }}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 7.2" width="12" height="7.2" class="mt-1">
                            <path d="M6.002 5.03L10.539.265a.826.826 0 011.211 0 .94.94 0 010 1.275l-5.141 5.4a.827.827 0 01-1.183.026L.249 1.545a.937.937 0 010-1.275.826.826 0 011.211 0z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <ul class="shadow-dropDown invisible absolute top-full z-30 rounded-md bg-light py-4 opacity-0 shadow transition-all duration-300 group-hover:visible group-hover:opacity-100  xl:w-[100px]">
                        @foreach(getAllLanguages() as $language)
                            <li class="menu-child-item font-chivo hover:filter-green group py-[10px] px-[22px] transition-all duration-200 hover:pl-[25px] hover:opacity-100">
                                <a class="flex items-center font-normal text-heading no-underline transition duration-200 hover:text-accent focus:text-accent" href="{{ route('frontend.change.locale', $language->code) }}">
                                    {{ ucfirst($language->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            <div class="top-product-search-bar hidden absolute top-0 z-20 flex h-full w-full items-center justify-center space-x-4 border-b-accent-300 bg-light px-5 py-1.5 backdrop-blur ltr:left-0 rtl:right-0 rtl:space-x-reverse lg:border lg:bg-opacity-30">
               <form wire:submit.prevent="applyFilters" class="w-full lg:max-w-3xl">
                    <div class="relative flex rounded md:rounded-lg h-11 md:h-12">
                        <label for="grocery-search-header" class="sr-only">{{ __trans('Search your products from here') }}</label>
                        
                        <!-- Use wire:model for Livewire search binding -->
                        <input id="grocery-search-header" type="text" autocomplete="off" 
                               class="search item-center flex h-full w-full appearance-none overflow-hidden truncate rounded-lg text-sm text-heading placeholder-gray-500 transition duration-300 ease-in-out focus:outline-0 focus:ring-0 lg:border-accent-400 search-minimal bg-gray-100 ltr:pl-10 rtl:pr-10 ltr:pr-4 rtl:pl-4 ltr:md:pl-14 rtl:md:pr-14 border border-transparent focus:border-accent focus:bg-light" 
                               name="search" 
                               placeholder="{{ __trans('Search your products from here') }}" 
                               wire:model="search"  >
                        
                        <button class="absolute flex h-full w-10 items-center justify-center text-body transition-colors duration-200 hover:text-accent-hover focus:text-accent-hover focus:outline-0 ltr:left-0 rtl:right-0 md:w-14">
                            <span class="sr-only">{{ __trans('Search') }}</span>
                            <svg viewBox="0 0 17.048 18" class="h-4 w-4">
                                <path d="M380.321,383.992l3.225,3.218c.167.167.341.329.5.506a.894.894,0,1,1-1.286,1.238c-1.087-1.067-2.179-2.131-3.227-3.236a.924.924,0,0,0-1.325-.222,7.509,7.509,0,1,1-3.3-14.207,7.532,7.532,0,0,1,6,11.936C380.736,383.462,380.552,383.685,380.321,383.992Zm-5.537.521a5.707,5.707,0,1,0-5.675-5.72A5.675,5.675,0,0,0,374.784,384.513Z" transform="translate(-367.297 -371.285)" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                </form>

               <button data-variant="custom" class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 px-5 py-0 h-12 hidden border border-accent-400 bg-gray-100 !px-4 text-accent lg:inline-flex">
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
               </button>
            </div>

            <div class="flex shrink-0 items-center space-x-7 rtl:space-x-reverse 2xl:space-x-10">
                <ul
                    class="hidden shrink-0 items-center space-x-7 rtl:space-x-reverse xl:flex 2xl:space-x-10">
                    <li><a wire:navigate href="{{ route('frontend.home') }}" class="flex items-center font-normal text-heading no-underline transition duration-200 hover:text-accent focus:text-accent">{{ __trans('Shop') }}</a></li>
                    <li><a wire:navigate href="{{ route('frontend.contact-us') }}" class="flex items-center font-normal text-heading no-underline transition duration-200 hover:text-accent focus:text-accent">{{ __trans('Contact') }}</a></li>

                    <li class="menuItem group relative mx-3 cursor-pointer py-3 xl:mx-4">
                       <div class="flex items-center gap-2 group-hover:text-accent">
                          <span class="text-brand-dark group-hover:text-brand relative inline-flex items-center py-2 font-normal rtl:left-0"> {{ strtoupper(app()->currentLocale()) }}</span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 7.2" width="12" height="7.2" class="mt-1">
                             <path d="M6.002 5.03L10.539.265a.826.826 0 011.211 0 .94.94 0 010 1.275l-5.141 5.4a.827.827 0 01-1.183.026L.249 1.545a.937.937 0 010-1.275.826.826 0 011.211 0z" fill="currentColor"></path>
                          </svg>
                       </div>
                       <ul class="shadow-dropDown invisible absolute top-full z-30 w-[220px] rounded-md bg-light py-4 opacity-0 shadow transition-all duration-300 group-hover:visible group-hover:opacity-100 ltr:left-0 rtl:right-0 xl:w-[240px]">
                           @foreach(getAllLanguages() as $language)
                                <li class="menu-child-item font-chivo hover:filter-green group py-[10px] px-[22px] transition-all duration-200 hover:pl-[ 25px] hover:opacity-100">
                                    <a class="flex items-center font-normal text-heading no-underline transition duration-200 hover:text-accent focus:text-accent" href="{{ route('frontend.change.locale', $language->code) }}">
                                        {{ ucfirst($language->name) }}
                                    </a>
                                </li>
                            @endforeach
                       </ul>
                    </li>


                   @livewire('cart-icon')
                </ul>
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <div class="hidden lg:inline-flex"></div>

                    @if (auth()->check())
                       <a wire:navigate href="{{ route('frontend.logout') }}" class="hidden h-9 shrink-0 items-center justify-center rounded border border-transparent bg-accent px-3 py-0 text-sm font-semibold leading-none text-light outline-none transition duration-300 ease-in-out hover:bg-accent-hover focus:shadow focus:outline-none focus:ring-1 focus:ring-accent-700 sm:inline-flex">{{ __trans('Logout') }}</a>
                    @else
                        <a wire:navigate href="{{ route('frontend.login') }}"
                        class="hidden h-9 shrink-0 items-center justify-center rounded border border-transparent bg-accent px-3 py-0 text-sm font-semibold leading-none text-light outline-none transition duration-300 ease-in-out hover:bg-accent-hover focus:shadow focus:outline-none focus:ring-1 focus:ring-accent-700 sm:inline-flex">{{ __trans('Login') }}</a>


                    @endif

                </div>
            </div>
        </div>
    </div>
</header>