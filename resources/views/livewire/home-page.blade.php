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

   // mobile filter js 
   $(document).on('click', '.mobile-category-dropdown-btn', function() {
        const dropdown = $('.mobile-category-dropdown');

        // Toggle display
        if (dropdown.css('display') === 'none' || dropdown.css('display') === '') {
            dropdown.css('display', 'block'); // Show the dropdown
        } else {
            dropdown.css('display', 'none'); // Hide the dropdown
        }
    });
</script>
@endsection