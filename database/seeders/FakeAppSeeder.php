<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\SiteBanner;
use App\Models\User;
use App\Models\Setting;
use App\Models\ProductUnit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FakeAppSeeder extends Seeder
{
    /**
     * Seed the application's database for fake entries. specially for test setup.
     */
    public function run(): void
    {
        // User seeder

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('cbd2024!#'),
        ]);

        User::factory(10)->create();

        // Setting seeder
        $settings = [
                'header_logo' => 'assets/frontend/img/logo.png',
                'footer_logo' => 'assets/frontend/img/logo.png',
                'fav_logo' => 'assets/frontend/img/logo.png',
                'phone_number' => '9696669999',
                'email' => 'example@domain.com',
                'address' => '123 Example Street, Sample City, ST 12345',
                'website' => 'https://www.example.com',
                'receiver_emails' => 'receiverA@user.com, receiverB@user.com',
                'twitter_link' => 'https://twitter.com/example',
                'facebook_link' => 'https://facebook.com/example',
                'instagram_link' => 'https://instagram.com/example',
                'copyright_link' => 'Copyright © Albertoshop. All rights reserved worldwide.',
                'site_title' => 'Albertoshop',
                'site_currency' => 'EUR'
            ];

        foreach ($settings as $meta_key => $meta_value) {
            Setting::updateOrCreate([
                'key' => $meta_key
            ], [
                'value' => $meta_value
            ]);
        }

        // Categories seeder

        $categories = ['Cannabis Bulk Flowers', 'Cannabis Bulk Hash', 'Cannabis Bulk Isolate', 'Cannabis Bulk Distilate', 'Cannabis Bulk Terpenes', 'Cannabis Bulk Extracts'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => $category . ' description',
            ]);
        }


        // Products seeder

        $categories = Category::all();

        foreach ($categories as $category) {
            Product::factory(10)->create([
                'category_id' => $category->id,
            ]);
        }

        $product_units = ProductUnit::all();

        foreach ($product_units as $product_unit) {
            Product::factory(10)->create([
                'unit_id' => $product_unit->id,
            ]);
        }

        // Order seeder

        $users = User::all();
        $products = Product::all();

        foreach ($users as $user) {
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'total_price' => 0,
            ]);

            $totalPrice = 0;

            foreach ($products->random(3) as $product) {
                $quantity = rand(1, 5);
                $price = $product->price * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);

                $totalPrice += $price;
            }

            $order->update(['total_price' => $totalPrice]);
        }

        // Payment seeder

        $orders = Order::all();

        foreach ($orders as $order) {
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'credit_card',
                'amount' => $order->total_price,
                'status' => 'completed',
            ]);
        }

        // Site banner seeder

        $site_banners = ['Cash on Delivery', 'Gift Voucher', 'Free Delivery', 'Coupon Saving'];

        foreach ($site_banners as $site_banner) {
            SiteBanner::create([
                'title' => $site_banner,
                'description' => fake()->paragraph()
            ]);
        }
    }
}
