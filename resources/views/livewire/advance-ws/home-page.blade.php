@section('title', 'Home')

<div>
    <div class="container">
        <div class="row">
            <livewire:sliders lazy />
        </div>
    </div>
    <section class="shop-page-grid-section style-3  section-two">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <livewire:product-category-sidebar :default_categories="$default_categories" />
                </div>
                <div class="col-12 col-md-9">
                    <livewire:products lazy :category_id="$default_categories" :per_page="__homeSetting('number_of_products_per_page')" />
                </div>
            </div>
        </div>
    </section>
</div>

@section('scripts')

@endsection