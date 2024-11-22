function syncLocalCartFromSessionCart() {
    axios.get(_app_base_url + '/fetch-session-preferences')
        .then(response => {
            const cart = response.data.cart;
            const wishlist = response.data.wishlist;

            localStorage.setItem('cart', JSON.stringify(cart));
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
        })
        .catch(error => {
            console.error('Error syncing cart from session:', error);
        });
}

function syncSessionPreferencesFromLocalPreferences() {
    axios.post(_app_base_url + '/sync-session-preferences', {
            _token : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            cart: JSON.parse(localStorage.getItem('cart')),
            wishlist: JSON.parse(localStorage.getItem('wishlist'))
        })
        .then(response => {
            if (response.data.cart_updated) {
                Livewire.dispatch('quantityUpdated');
            }
        })
        .catch(error => {
            console.error('Error syncing cart to session:', error);
        });
}

// Call sync function when the page loads
if (!_user_is_loggedin) {
    window.onload = syncSessionPreferencesFromLocalPreferences();
} else { 
    localStorage.setItem('cart', JSON.stringify({}));
    localStorage.setItem('wishlist', JSON.stringify({}));
}

document.addEventListener('livewire:init', () => {
    Livewire.on('shoppingCartUpdated', (event) => {
        syncLocalCartFromSessionCart();
    });

    Livewire.on('showNotification', detail => {
        var detail = event.detail[0] ?? event.detail;
        const type = detail.type || 'info'; // Default to 'info' type
        const message = detail.message || 'Notification triggered';

        if (typeof toastr !== 'undefined') {
            toastr.options = {
                positionClass: "toast-bottom-center",
                timeOut: 10000,
                closeButton: true,
                progressBar: true,
                onclick: function() {
                    toastr.clear(); // Clear the toast on click
                }
            };
            toastr[type](message); // Show the toast
        } else {
            alert(message); // Fallback to alert if toastr is not available
        }
    });

    Livewire.on('wishListUpdated', function(data) {
        localStorage.setItem('wishlist', JSON.stringify(data));
    });

    Livewire.on('filter_category_updated_event', (event) => {
        const section = document.getElementById('products-search-section');
    
        if (section) {
            const rect = section.getBoundingClientRect();
            const isVisible = rect.top >= 0 && rect.bottom <= window.innerHeight;
    
            // Scroll only if the section is not fully visible
            if (!isVisible) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });

 });