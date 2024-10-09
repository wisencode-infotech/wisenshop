$(document).on('click', '.mobile-filter-btn', function() {
    const filter_section = $('.mobile-header-filter-section');
    const mobile_filter_products_drawer_section = $('.mobile-filter-products-drawer-section');
    filter_section.removeClass('hidden');
    mobile_filter_products_drawer_section.removeClass('hidden');
});

$(document).on('click', '.mobile-header-filter-close-btn', function() {
    const filter_section = $('.mobile-header-filter-section');
    const mobile_filter_products_drawer_section = $('.mobile-filter-products-drawer-section');
    filter_section.addClass('hidden');
    mobile_filter_products_drawer_section.addClass('hidden');
});

$(document).on('click', '.mobile-pages-drawer-btn', function() {
    const filter_section = $('.mobile-header-filter-section');
    const mobile_filter_products_drawer_section = $('.mobile-pages-drawer-section');
    filter_section.removeClass('hidden');
    mobile_filter_products_drawer_section.removeClass('hidden');
});

$(document).on('click', '.mobile-header-filter-close-btn', function() {
    const filter_section = $('.mobile-header-filter-section');
    const mobile_filter_products_drawer_section = $('.mobile-pages-drawer-section');
    filter_section.addClass('hidden');
    mobile_filter_products_drawer_section.addClass('hidden');
});

$(document).on('click', '.top-product-search-btn', function() {
    const filter_section = document.querySelector('.top-product-search-bar');
    filter_section.classList.remove('hidden'); 
});

$(document).on('click', '.remove-search-filter', function() {
    const filter_section = document.querySelector('.top-product-search-bar');
    filter_section.classList.add('hidden'); 
});

$(document).on('click', '.products-filter', function() {
    $('.mobile-pages-drawer-section').hide();
    const filter_section = $('.mobile-header-filter-section');
    const mobile_filter_products_drawer_section = $('.mobile-filter-products-drawer-section');
    filter_section.removeClass('hidden');
    mobile_filter_products_drawer_section.removeClass('hidden');
});

$(document).on('click', '.mobile-bottom-menu', function() {
    setAllMobileMenusAsInactiveButThis(this);
});

function setAllMobileMenusAsInactiveButThis(menu_element = null)
{
    $(".mobile-bottom-menu").removeClass('text-accent');

    if (menu_element != null && typeof menu_element != 'undefined')
        $(menu_element).addClass('text-accent');
}

$('.profile_menu_btn').on('click', function() {
    $('.profile_menu_section').toggleClass('hidden');
});

// function toggleSearchBarVisibility() {
//     const filter_section = document.querySelector('.top-product-search-bar');
//     const searchBarVisible = localStorage.getItem('searchBarVisible');

//     if (window.location.pathname === "/" && searchBarVisible === 'true') {
//         filter_section.classList.remove('hidden'); 
//         localStorage.removeItem('searchBarVisible');
//     }
// }

// toggleSearchBarVisibility();

// $(document).on('click', '.top-product-search-btn', function() {
//     localStorage.setItem('searchBarVisible', 'true');
// });