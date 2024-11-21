<button data-in-wishlist="{{ $in_wish_list ? 'true' : 'false' }}" wire:click="toggleWishlist" 
        type="button" 
        class="wishlist-button mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full transition-colors text-lg text-accent mr-1
        border {{ $in_wish_list ? 'border-active' : 'border-gray-300' }} p-1">
    @if ($in_wish_list)
        <i class="fa-solid fa-heart text-accent-500" aria-hidden="true"></i>
    @else
        <i class="fa-regular fa-heart" aria-hidden="true"></i>
    @endif
</button>
