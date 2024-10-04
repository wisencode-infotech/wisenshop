<div class="w-full pt-4 pb-20 lg:py-6 px-4 xl:px-0 mt-4">

    @if(count($products) == 0)

        <div class="flex flex-col items-center w-7/12 mx-auto">
            <div class="w-full h-full flex items-center justify-center">
                <img alt="Sorry, No Product Found :(" loading="lazy" width="600" height="453" decoding="async" data-nimg="1" class="w-full h-full object-contain" src="{{ asset('assets/frontend/img/no-result.png') }}" style="color: transparent;">
            </div>
            <h3 class="w-full text-center text-xl font-semibold text-body my-7">{{ __trans('Sorry, No Product Found') }} :(</h3>
        </div>

    @else

        <div class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-3">
            @foreach ($products as $product)
                <article
                    class="product-card cart-type-helium h-full overflow-hidden rounded border border-border-200 bg-light transition-shadow duration-200 hover:shadow-sm">
                    <div class="cursor-pointer relative flex h-48 w-auto items-center justify-center sm:h-64">
                        
                        <span class="sr-only">{{ __trans('Product') }} {{ __trans('Image') }}</span>

                        <img alt="{{ $product->title }}" loading="lazy" decoding="async" data-nimg="fill"
                            class="block object-contain product-image"
                            style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                            wire:navigate href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}"
                            sizes="(max-width: 768px) 100vw" src="{{ $product->display_image_url }}">

                        <div class="absolute top-0 left-0 py-1 px-2">
                            <livewire:wishlist-button :product_id="$product->id" />
                        </div>

                    </div>
                    <header class="relative p-3 md:p-5 md:py-6">
                        <h3 role="button" wire:navigate href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}" class="mb-2 text-sm font-semibold truncate text-heading">{{ $product->name }}
                        </h3>
                        <p class="text-xs text-muted pr-9">{{ \Str::limit($product->description, 70) }}</p>
                        <div class="relative flex items-center justify-between mt-7 min-h-6 md:mt-8">
                            
                            <div class="flex overflow-hidden order-5 sm:order-4 w-9 sm:w-24 h-24 sm:h-10 bg-accent text-light rounded-full flex-col-reverse sm:flex-row absolute sm:relative bottom-0 sm:bottom-auto ltr:right-0 rtl:left-0 ltr:sm:right-auto ltr:sm:left-auto">

                            @livewire('quantity-selector', ['productId' => $product->id, key(uniqid())])
                            
                            </div>

                            <div class="relative"><del
                                    class="absolute text-xs italic text-opacity-75 -top-4 text-muted md:-top-5">${{ $product->price }}</del><span
                                    class="text-sm font-semibold text-accent md:text-base">${{ $product->discounted_price }}</span>
                            </div>
                            <div class="hidden">
                                <button wire:navigate href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}"
                                    class="order-5 flex items-center justify-center rounded-full border-2 border-border-100 bg-light px-3 py-2 text-sm font-semibold text-accent transition-colors duration-300 hover:border-accent hover:bg-accent hover:text-light focus:border-accent focus:bg-accent focus:text-light focus:outline-0 sm:order-4 sm:justify-start sm:px-5" title="View Product">
                                    <span>
                                        <i class="fa-solid fa-eye"></i></span>
                                </button>
                            </div>
                        </div>
                    </header>
                </article>
            @endforeach
        </div>

        @if ($products->hasMorePages())
            <div class="flex justify-center mt-8 mb-4 sm:mb-6 lg:mb-2 lg:mt-12">
                <!-- Default Button Text -->
                <button wire:click="loadMore" data-variant="normal"
                    class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 text-sm font-semibold h-11 md:text-base">

                    <!-- Show "Load More" when not loading -->
                    <span wire:loading.remove>{{ __trans('Load More') }}</span>

                    <!-- Show "Load More..." while loading -->
                    <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                </button>
            </div>
        @endif

        
    @endif
</div>

