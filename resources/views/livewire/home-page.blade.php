@section('title', 'Home')

<div>
    @livewire('sliders')
    <div class="flex border-t border-solid border-border-200 border-opacity-70">
        @livewire('product-category-sidebar')
        @livewire('products')
    </div>
</div>