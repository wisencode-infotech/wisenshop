<button wire:click="toggleWishlist" 
        type="button" 
        class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-full transition-colors text-xl text-accent mr-1
        border {{ $inWishlist ? 'border-green-500' : 'border-gray-300' }}">
    @if ($inWishlist)
        <i class="fa-solid fa-heart text-green-500" aria-hidden="true"></i>
    @else
        <i class="fa-regular fa-heart" aria-hidden="true"></i>
    @endif
</button>