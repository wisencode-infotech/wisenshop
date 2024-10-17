<?php

namespace App\Livewire;

use App\Helpers\WishlistHelper;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\ProductVariation;
use App\Helpers\CartHelper;

class MyWishlist extends Component
{
    public $wishlist_products;

    public function mount()
    {
        $this->setProducts();
    }

    public function setProducts()
    {
        $wishlistItems = WishlistHelper::items();

        $this->wishlist_products = collect();

        foreach ($wishlistItems as $item) {
           
            $product = Product::find($item['product_id']);

            $data = new \stdClass();
            $data->product_id = $product->id;
            $data->name = $product->name;
            $data->display_image_url = $product->display_image_url;
            $data->average_rating = $product->average_rating;
            $data->category_name = $product->category->name;
            $data->category_id = $product->category_id;
            $data->slug = $product->slug;
            $data->product_variation_id = $item['product_variation_id'];
            
            if (!is_null($item['product_variation_id'])) {
                $variation = ProductVariation::find($item['product_variation_id']);

                if ($variation) {
                    // Set variation details
                    $data->price = $variation->price;
                    $data->stock = $variation->stock;
                    $data->variation_name = $variation->name;
                }
            } else {
                $data->price = $product->price;
                $data->stock = $product->stock;
                $data->variation_name = null;
            }
            $this->wishlist_products->push($data);
        }
    }

    public function addToCart($product_id, $product_variation_id = null)
    {
        CartHelper::saveQuantity($product_id, $product_variation_id, 1);

        $this->dispatch('itemAdded');

        $this->dispatch('quantityUpdated', ['product_id' => $product_id, 'product_variation_id' => $product_variation_id, 'quantity' => 1]);

        $this->dispatch('shoppingCartUpdated');

        WishlistHelper::removeWishlist($product_id, $product_variation_id);

        $this->setProducts();
    }

    public function removeFromWishlist($product_id, $product_variation_id = null)
    {
        WishlistHelper::removeWishlist($product_id, $product_variation_id);

        $this->setProducts();

        session()->flash('message', 'Item removed from wishlist.');
    }

    public function render()
    {
        return view('livewire.my-wishlist');
    }
}
