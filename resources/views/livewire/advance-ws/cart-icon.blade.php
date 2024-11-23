<button name="cart" class="cart-icon" wire:click="$dispatch('toggleMiniCart')">
    <i class="fa fa-shopping-cart text-lg"></i>
    <span class="count">{{ $itemCount }}</span>
</button>
