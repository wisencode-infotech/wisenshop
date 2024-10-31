function initializeCategoryDropdown() {
    // Toggle dropdown visibility on button click
    $('.mobile-category-dropdown-btn').on('click', function () {
        console.log(1);
        $('.mobile-category-dropdown').toggleClass('hidden');
    });

    // Add click event listener to each category item
    $('[role="custom-menuitem"] span').on('click', function () {
        const categoryImage = $(this).find('img').attr('src');
        const categoryName = $(this).find('.category-name').text();

        $('.category-image-selected').attr('src', categoryImage);
        $('.selected-category-name').text(categoryName);
        $('.mobile-category-dropdown').addClass('hidden');
    });
}

// Initialize dropdown when DOM is ready
$(document).ready(function () {
    initializeCategoryDropdown();
});