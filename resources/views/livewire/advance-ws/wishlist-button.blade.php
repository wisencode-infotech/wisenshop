<button data-in-wishlist="{{ $in_wish_list ? 'true' : 'false' }}" wire:click="toggleWishlist" 
        type="button" 
        class="wishlist-button btn-transparent {{ $in_wish_list ? '' : '' }} p-1">
    @if ($in_wish_list)
        <i class="fa-solid fa-heart theme-{{ __appActiveTheme() }}-text-accent" aria-hidden="true"></i>
    @else
        <i class="fa-regular fa-heart" aria-hidden="true"></i>
    @endif
</button>
