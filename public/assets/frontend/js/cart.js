function syncLocalCartFromSessionCart() {
    axios.get(_app_base_url + '/fetch-session-cart')
        .then(response => {
            const cart = response.data.cart;
            localStorage.setItem('cart', JSON.stringify(cart));
        })
        .catch(error => {
            console.error('Error syncing cart from session:', error);
        });
}

function syncSessionCartFromLocalCart() {
    axios.post(_app_base_url + '/sync-session-cart', {
            _token : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            cart: JSON.parse(localStorage.getItem('cart'))
        })
        .then(response => {
            if (response.data.updated) {
                Livewire.dispatch('quantityUpdated');
            }
        })
        .catch(error => {
            console.error('Error syncing cart to session:', error);
        });
}

// Call sync function when the page loads
window.onload = syncSessionCartFromLocalCart();

Livewire.on('shoppingCartUpdated', function() {
    syncLocalCartFromSessionCart();
});