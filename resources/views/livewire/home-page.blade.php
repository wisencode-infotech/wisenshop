@section('title', 'Home')

<div>
    <livewire:sliders />
    <livewire:mobile-topbar-filters />
    <div class="flex border-t border-solid border-border-200 border-opacity-70">
        <livewire:product-category-sidebar />
        <livewire:products />
    </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        // Get the category dropdown button and dropdown
        const categoryDropdownBtn = document.querySelector('.mobile-category-dropdown-btn');
        const categoryDropdown = document.querySelector('.mobile-category-dropdown');
        const categoryImageSelected = document.querySelector('.category-image-selected');
        const selectedCategoryName = document.querySelector('.selected-category-name');

        // Toggle dropdown visibility on button click
        categoryDropdownBtn.addEventListener('click', function () {
            categoryDropdown.classList.toggle('hidden');
        });

        // Add click event listener to each category item
        const categoryItems = document.querySelectorAll('[role="custom-menuitem"] a');

        categoryItems.forEach(item => {
            item.addEventListener('click', function () {
                // Get the image URL and name of the selected category
                const categoryImage = item.querySelector('img').src;
                const categoryName = item.querySelector('.category-name').textContent;

                // Update the selected category image and name
                categoryImageSelected.src = categoryImage;
                selectedCategoryName.textContent = categoryName;

                // Hide the dropdown
                categoryDropdown.classList.add('hidden');
            });
        });
    });
</script>
@endsection