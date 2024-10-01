@section('title', 'Home')

<div>
    <livewire:sliders />
    <livewire:mobile-topbar-filters />
    <div class="flex border-t border-solid border-border-200 border-opacity-70">
        <livewire:product-category-sidebar />
        <livewire:products />
    </div>
    <livewire:product-cart-button />
</div>

@section('scripts')

 <script>
    // products load js
    window.onscroll = function() {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {

        }
    };

    // sliders component js
    var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
            nextEl: ".swiper-container .next",
            prevEl: ".swiper-container .prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true, // Enable clickable pagination
        },
        mousewheel: true,
        keyboard: true,
        slidesPerView: 1, // Default to show 1 item
        spaceBetween: 10, // Space between slides (adjust as needed)

        breakpoints: {
            // Responsive breakpoints
            640: {
                slidesPerView: 1, // 1 slide for small screens (mobile)
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2, // 2 slides for medium screens (tablets)
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4, // 4 slides for larger screens (desktops)
                spaceBetween: 30,
            },
        },
    });

</script>

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