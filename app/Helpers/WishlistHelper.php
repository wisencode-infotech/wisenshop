<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistHelper
{
    public static function disk()
    {
        return (Auth::check()) ? 'database' : 'session';
    }

    public static function items()
    {
        $user_id = (Auth::check()) ? Auth::user()->id : 'session';
        
        $wishlist_items = [];

        if (self::disk() == 'database') {

            $wishlist_items = Wishlist::where('user_id', $user_id)->pluck('product_id', 'product_variation_id')->toArray();

            return $wishlist_items;

        } else {

            $wishlist_items = Session::get('wishlist', []);

            return $wishlist_items;
        }
    }

    public static function addWishlist($product_id, $product_variation_id = null)
    {
        $user_id = (Auth::check()) ? Auth::user()->id : 'session';

        if (self::disk() == 'database') {

            $wishlist_item = new Wishlist();
            $wishlist_item->product_id = $product_id;
            $wishlist_item->product_variation_id = $product_variation_id;
            $wishlist_item->user_id = $user_id;
            $wishlist_item->save();

        } else {

            $wishlist = self::items();

            $wishlist[] = [
                'product_id' => $product_id,
                'product_variation_id' => $product_variation_id
            ];

            session()->put('wishlist', $wishlist);
        }
    }

    public static function removeWishlist($product_id, $product_variation_id = null)
    {
        $user_id = (Auth::check()) ? Auth::user()->id : 'session';

        if (self::disk() == 'database') {

            $wishlist = Wishlist::where('user_id', $user_id)->where('product_id', $product_id);

            if (!empty($product_variation_id))
                $wishlist = $wishlist->where('product_variation_id', $product_variation_id);
            
            $wishlist->delete();

        } else {

            $wishlist = self::items();

            foreach ($wishlist as $key => $wishlist_items) {
                $wishlist_product_id = $wishlist_items['product_id'];
                $wishlist_product_variation_id = $wishlist_items['product_variation_id'] ?? null;

                if ($wishlist_product_id == $product_id && $wishlist_product_variation_id == $product_variation_id)
                    unset($wishlist[$key]);
            }
            
            session()->put('wishlist', $wishlist);
        }
    }

    public static function syncWishlistToUser($user_id = null)
    {
        $user_id =  (!empty($user_id)) ? $user_id : Auth::user()->id;

        $wishlist = Session::get('wishlist', []);

        foreach ($wishlist as $wishlist_items) {

            $product_id = $wishlist_items['product_id'];
            $product_variation_id = $wishlist_items['product_variation_id'] ?? null;

            if (!Wishlist::where('product_id', $product_id)->where('user_id', $user_id)->exists()) {
                $wishlist = new Wishlist();

                $wishlist->user_id = $user_id;
                $wishlist->product_id = $product_id;
                $wishlist->product_variation_id = $product_variation_id;
                $wishlist->save();
            }
        }

        Session::forget('wishlist');
    }

    public static function exists($product_id, $product_variation_id = null)
    {
        $exists = false;

        $wishlist = self::items();

        if (empty($wishlist))
            return $exists;

        foreach ($wishlist as $wishlist_items) {
            $wishlist_product_id = $wishlist_items['product_id'];
            $wishlist_product_variation_id = $wishlist_items['product_variation_id'] ?? null;

            if (!$exists && $wishlist_product_id == $product_id && $wishlist_product_variation_id == $product_variation_id)
                $exists = true;
        }

        return $exists;
    }
}