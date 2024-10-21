@section('title', 'Home')
<div>
    <livewire:sliders lazy />

    <livewire:mobile-topbar-filters defer />

    <div id="products-search-section">
        <livewire:product-search-bar defer />
    </div>

    <div class="flex border-t border-solid border-border-200 border-opacity-70">
        <livewire:product-category-sidebar :default_categories="$default_categories" defer />
        <livewire:products lazy :category_id="$default_categories" />
    </div>
    <livewire:product-cart-button defer />
</div>

@section('scripts')

<!-- mobile category filter js  -->
<script>
     function initializeCategoryDropdown() {
        // Toggle dropdown visibility on button click
        $('.mobile-category-dropdown-btn').on('click', function () {
            console.log(1);
            $('.mobile-category-dropdown').toggleClass('hidden');
        });

        // Add click event listener to each category item
        $('[role="custom-menuitem"] a').on('click', function () {
            // Get the image URL and name of the selected category
            const categoryImage = $(this).find('img').attr('src');
            const categoryName = $(this).find('.category-name').text();

            // Update the selected category image and name
            $('.category-image-selected').attr('src', categoryImage);
            $('.selected-category-name').text(categoryName);

            // Hide the dropdown
            $('.mobile-category-dropdown').addClass('hidden');
        });
    }

    // Initialize dropdown when DOM is ready
    $(document).ready(function () {
        initializeCategoryDropdown();
    });
</script>
@endsection