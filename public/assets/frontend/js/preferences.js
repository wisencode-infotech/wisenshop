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

Livewire.on('shoppingCartUpdated', function() {
    syncLocalCartFromSessionCart();
});

Livewire.on('wishListUpdated', function(data) {
    localStorage.setItem('wishlist', JSON.stringify(data));
});