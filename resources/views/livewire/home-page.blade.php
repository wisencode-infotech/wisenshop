@section('title', 'Home')
<div>
    <livewire:sliders lazy />

    <livewire:mobile-topbar-filters defer />

    <div id="products-search-section">
        <livewire:product-search-bar defer />
    </div>

    <div class="flex border-t border-solid border-border-200 border-opacity-70">
        <livewire:product-category-sidebar :default_categories="$default_categories" />
        <livewire:products lazy :category_id="$default_categories" />
    </div>
    <livewire:product-cart-button />
</div>

@section('scripts')

<script src="{{ asset('assets/frontend/js/mobile-category-filter.js') }}" defer></script>

@endsection