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

            $wishlist_items = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();

            return $wishlist_items;

        } else {

            $wishlist_items = Session::get('wishlist', []);

            return $wishlist_items;
        }
    }

    // public static function itemsWithDetails()
    // {
    //     $user_id = (Auth::check()) ? Auth::user()->id : 'session';
        
    //     $wishlist_items = [];

    //     if (self::disk() == 'database') {

    //         $wishlist_items = Wishlist::where('user_id', $user_id)->get();

    //         return $wishlist_items;

    //     } else {

    //         $wishlist_items = Session::get('wishlist', []);

    //         foreach ($wishlist_items as $key => $product_id) {
    //             $product = Product::where('id', $product_id)->select('id', 'name', 'price')->first();

               
    //         }


    //         return $wishlist_items;
    //     }
    // }

    public static function addWishlist($product_id)
    {
        $user_id = (Auth::check()) ? Auth::user()->id : 'session';

        if (self::disk() == 'database') {

            $wishlist_item = new Wishlist();
            $wishlist_item->product_id = $product_id;
            $wishlist_item->user_id = $user_id;
            $wishlist_item->save();

        } else {

            $wishlist = self::items();

            $wishlist[] = $product_id;

            session()->put('wishlist', $wishlist);
        }
    }

    public static function removeWishlist($product_id)
    {
        $user_id = (Auth::check()) ? Auth::user()->id : 'session';

        if (self::disk() == 'database') {

            Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->delete();

        } else {

            $wishlist = self::items();

            $wishlist = array_diff($wishlist, [$product_id]);
            
            session()->put('wishlist', $wishlist);
        }
    }

    public static function syncWishlistToUser($user_id = null)
    {
        $user_id =  (!empty($user_id)) ? $user_id : Auth::user()->id;

        $wishlist = Session::get('wishlist', []);

        foreach ($wishlist as $product_id) {

            if (!Wishlist::where('product_id', $product_id)->where('user_id', $user_id)->exists()) {
                $wishlist = new Wishlist();

                $wishlist->user_id = $user_id;
                $wishlist->product_id = $product_id;
                $wishlist->save();
            }
        }

        Session::forget('wishlist');
    }
}