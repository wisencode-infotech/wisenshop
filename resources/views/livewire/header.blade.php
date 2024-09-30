<header id="site-header" class="site-header-with-search top-0 z-50 w-full transition-all sticky border-b border-border-200 shadow-sm lg:h-22 is-scrolling">
    <div class="fixed inset-0 -z-10 h-[100vh] w-full bg-black/50 hidden"></div>
    <div>
        <div
            class="flex w-full transform-gpu items-center justify-between bg-light px-5 transition-transform duration-300 lg:h-22 lg:px-6 2xl:px-8 lg:absolute lg:border-0 lg:bg-transparent lg:shadow-none">
            <button
                class="group hidden h-full w-6 shrink-0 items-center justify-center focus:text-accent focus:outline-0 ltr:mr-6 rtl:ml-6 lg:flex xl:hidden"><span
                    class="sr-only">Burger Menu</span>
                <div class="flex w-full flex-col space-y-1.5"><span
                        class="h-0.5 w-1/2 rounded bg-gray-600 transition-all group-hover:w-full"></span><span
                        class="h-0.5 w-full rounded bg-gray-600 transition-all group-hover:w-3/4"></span><span
                        class="h-0.5 w-3/4 rounded bg-gray-600 transition-all group-hover:w-full"></span>
                </div>
            </button>
            <div
                class="flex shrink-0 grow-0 basis-auto flex-wrap items-center ltr:mr-auto rtl:ml-auto lg:w-auto lg:flex-nowrap">
                <a class="inline-flex py-3 mx-auto lg:mx-0" href="pickbazar-graphql.redq.html"><span
                        class="relative h-[2.125rem] w-32 overflow-hidden md:w-[8.625rem]">
                        <img
                            alt="Pickbazar" loading="eager" decoding="async" data-nimg="fill"
                            class="object-contain"
                            style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                            sizes="(max-width: 768px) 100vw"
                            src="{{ asset('assets/frontend/img/logo.png') }}">
                        </span></a>
            </div>
            <div class="flex shrink-0 items-center space-x-7 rtl:space-x-reverse 2xl:space-x-10">
                <ul
                    class="hidden shrink-0 items-center space-x-7 rtl:space-x-reverse xl:flex 2xl:space-x-10">
                    <li><a wire:navigate href="{{ route('frontend.home') }}" class="flex items-center font-normal text-heading no-underline transition duration-200 hover:text-accent focus:text-accent">Shops</a></li>
                    <li><a wire:navigate href="{{ route('frontend.contact-us') }}" class="flex items-center font-normal text-heading no-underline transition duration-200 hover:text-accent focus:text-accent">Contact</a></li>
                </ul>
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <div class="hidden lg:inline-flex"></div><a wire:navigate href="{{ route('frontend.contact-us') }}"
                        class="hidden h-9 shrink-0 items-center justify-center rounded border border-transparent bg-accent px-3 py-0 text-sm font-semibold leading-none text-light outline-none transition duration-300 ease-in-out hover:bg-accent-hover focus:shadow focus:outline-none focus:ring-1 focus:ring-accent-700 sm:inline-flex">Become a Seller</a>
                </div>
            </div>
        </div>
    </div>
</header>