<div class="w-full pt-4 pb-20 lg:py-6 px-4 xl:px-0">
    <div class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-3">
        @foreach($products as $product)
        <article class="product-card cart-type-helium h-full overflow-hidden rounded border border-border-200 bg-light transition-shadow duration-200 hover:shadow-sm">
            <div class="relative flex h-48 w-auto items-center justify-center sm:h-64"><span class="sr-only">Product Image</span><img alt="Apples" loading="lazy" decoding="async" data-nimg="fill" class="block object-contain product-image" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" sizes="(max-width: 768px) 100vw" src="{{ $product->display_image_url }}">
                <div class="absolute top-3 rounded-full bg-yellow-500 px-1.5 text-xs font-semibold leading-6 text-light ltr:right-3 rtl:left-3 sm:px-2 md:top-4 md:px-2.5 ltr:md:right-4 rtl:md:left-4">20%</div>
            </div>
            <header class="relative p-3 md:p-5 md:py-6">
                <h3 role="button" class="mb-2 text-sm font-semibold truncate text-heading">{{ $product->name }}</h3>
                <p class="text-xs text-muted">1lb</p>
                <div class="relative flex items-center justify-between mt-7 min-h-6 md:mt-8">
                    <div class="relative"><del class="absolute text-xs italic text-opacity-75 -top-4 text-muted md:-top-5">${{ $product->price }}</del><span class="text-sm font-semibold text-accent md:text-base">${{ $product->price }}</span></div>
                    <div><button class="order-5 flex items-center justify-center rounded-full border-2 border-border-100 bg-light px-3 py-2 text-sm font-semibold text-accent transition-colors duration-300 hover:border-accent hover:bg-accent hover:text-light focus:border-accent focus:bg-accent focus:text-light focus:outline-0 sm:order-4 sm:justify-start sm:px-5"><svg class="h-4 w-4 ltr:mr-2.5 rtl:ml-2.5" viewBox="0 0 14.4 12">
                                <g transform="translate(-288 -413.89)">
                                    <path fill="currentColor" d="M298.7,418.289l-2.906-4.148a.835.835,0,0,0-.528-.251.607.607,0,0,0-.529.251l-2.905,4.148h-3.17a.609.609,0,0,0-.661.625v.191l1.651,5.84a1.336,1.336,0,0,0,1.255.945h8.588a1.261,1.261,0,0,0,1.254-.945l1.651-5.84v-.191a.609.609,0,0,0-.661-.625Zm-5.419,0,1.984-2.767,1.98,2.767Zm1.984,5.024a1.258,1.258,0,1,1,1.319-1.258,1.3,1.3,0,0,1-1.319,1.258Zm0,0"></path>
                                </g>
                            </svg><span>Cart</span></button></div>
                </div>
            </header>
        </article>
         @endforeach
    </div>

    @if($products->hasMorePages())
    <div class="flex justify-center mt-8 mb-4 sm:mb-6 lg:mb-2 lg:mt-12">
        <button wire:click="loadMore" data-variant="normal" class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 text-sm font-semibold h-11 md:text-base">Load More</button>
    </div>
    @endif

    <!-- Loader Indicator -->
    <div wire:loading wire:target="loadMore" class="text-center my-4">
        Loading more products...
    </div>
</div>

<script>
    // Optional: You can also automatically trigger loading more products when the user scrolls to the bottom.
    window.onscroll = function() {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            Livewire.emit('loadMore');
        }
    };
</script>