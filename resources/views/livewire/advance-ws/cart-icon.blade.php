
@if ($current_page == 'frontend.product-detail')
<button name="cart" class="cart-icon" wire:navigate href="{{ route('frontend.cart') }}">
    <i class="fa fa-shopping-cart text-lg"></i>
    <span class="count">{{ $itemCount }}</span>
</button>
@else
<button name="cart" class="cart-icon" wire:click="$dispatch('toggleMiniCart')">
    <i class="fa fa-shopping-cart text-lg"></i>
    <span class="count">{{ $itemCount }}</span>
</button>
@endif
