$(document).on('click', '.mobile-filter-btn', function () {
  const filter_section = $('.mobile-header-filter-section');
  const mobile_filter_products_drawer_section = $('.mobile-filter-products-drawer-section');
  filter_section.removeClass('hidden');
  mobile_filter_products_drawer_section.removeClass('hidden');
});

$(document).on('click', '.mobile-header-filter-close-btn', function () {
  const filter_section = $('.mobile-header-filter-section');
  const mobile_filter_products_drawer_section = $('.mobile-filter-products-drawer-section');
  filter_section.addClass('hidden');
  mobile_filter_products_drawer_section.addClass('hidden');
});

$(document).on('click', '.mobile-pages-drawer-btn', function () {
  const filter_section = $('.mobile-header-filter-section');
  const mobile_filter_products_drawer_section = $('.mobile-pages-drawer-section');
  filter_section.removeClass('hidden');
  mobile_filter_products_drawer_section.removeClass('hidden');
});

$(document).on('click', '.mobile-header-filter-close-btn', function () {
  const filter_section = $('.mobile-header-filter-section');
  const mobile_filter_products_drawer_section = $('.mobile-pages-drawer-section');
  filter_section.addClass('hidden');
  mobile_filter_products_drawer_section.addClass('hidden');
});

$(document).on('click', '.top-product-search-btn', function () {
  const filter_section = document.querySelector('.top-product-search-bar');
  filter_section.classList.remove('hidden');
});

$(document).on('click', '.remove-search-filter', function () {
  const filter_section = document.querySelector('.top-product-search-bar');
  filter_section.classList.add('hidden');
});

$(document).on('click', '.products-filter', function () {
  $('.mobile-pages-drawer-section').hide();
  const filter_section = $('.mobile-header-filter-section');
  const mobile_filter_products_drawer_section = $('.mobile-filter-products-drawer-section');
  filter_section.removeClass('hidden');
  mobile_filter_products_drawer_section.removeClass('hidden');
});

$(document).on('click', '.mobile-bottom-menu', function () {
  setAllMobileMenusAsInactiveButThis(this);
});

function setAllMobileMenusAsInactiveButThis(menu_element = null) {
  $(".mobile-bottom-menu").removeClass('text-accent');
  if (menu_element != null && typeof menu_element != 'undefined')
    $(menu_element).addClass('text-accent');
}

$(document).on('click', function (event) {
  if (!$(event.target).closest('.profile_menu_section, .profile_menu_btn').length) {
    $('.profile_menu_section').addClass('hidden');
  }
  if (!$(event.target).closest('.notification_menu_section, .notification_menu_btn').length) {
    $('.notification_menu_section').addClass('hidden');
  }
});

$('.profile_menu_btn').on('click', function () {
  $('.profile_menu_section').toggleClass('hidden');
});

$('.notification_menu_btn').on('click', function () {
  $('.notification_menu_section').toggleClass('hidden');
});

$('#grocery-search-header').on('focus', function() {
  var scrollValue;

  if (window.innerWidth <= 380) {  
    scrollValue = 200;  
  }else if (window.innerWidth <= 576) { 
    scrollValue = 220;  
  } else if (window.innerWidth <= 768) { 
    scrollValue = 220; 
  } else if (window.innerWidth <= 992) { 
    scrollValue = 220; 
  }else if (window.innerWidth <= 1039) { 
    scrollValue = 190;  
  } else if (window.innerWidth <= 1200) { 
    scrollValue = 220; 
  } else { 
    scrollValue = 220;
  }

  console.log(window.innerWidth);
  $('html, body').animate({ scrollTop: scrollValue }, 500);
});

$(document).on('click', '.clear-search', function () {
  $('.filter-suggestion-box').hide();
  $('#grocery-search-header').val('');
  $(this).hide();
});

$(document).on('click', '.wishlist-button', function (e) {
  e.preventDefault();
  let inWishlist = $(this).data('in-wishlist') === 'true';

  if (inWishlist) {
      $(this).find('i').removeClass('fa-solid fa-heart text-accent-500')
                       .addClass('fa-regular fa-heart');
      $(this).removeClass('border-active').addClass('border-gray-300');
  } else {
      $(this).find('i').removeClass('fa-regular fa-heart')
                       .addClass('fa-solid fa-heart text-accent-500');
      $(this).removeClass('border-gray-300').addClass('border-active');
  }
  
  $(this).data('in-wishlist', !inWishlist);
});

