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
use App\Models\Language;
use App\Models\Currency;
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
                'site_title' => 'Albertoshop'
            ];

        foreach ($settings as $meta_key => $meta_value) {
            Setting::create([
                'key' => $meta_key,
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


        // Language seeder
        $languages = [
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'es', 'name' => 'Spanish']
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }


        // Currency seeder

        $currencies = [
            ['name' => 'US Dollar', 'code' => 'USD', 'symbol' => '$', 'exchange_rate' => 1.00, 'active' => true],
            ['name' => 'Euro', 'code' => 'EUR', 'symbol' => '€', 'exchange_rate' => 0.85, 'active' => true],
            ['name' => 'British Pound', 'code' => 'GBP', 'symbol' => '£', 'exchange_rate' => 0.76, 'active' => true],
            ['name' => 'Japanese Yen', 'code' => 'JPY', 'symbol' => '¥', 'exchange_rate' => 110.17, 'active' => true],
            ['name' => 'Australian Dollar', 'code' => 'AUD', 'symbol' => 'A$', 'exchange_rate' => 1.34, 'active' => true],
            ['name' => 'Canadian Dollar', 'code' => 'CAD', 'symbol' => 'C$', 'exchange_rate' => 1.26, 'active' => true],
            ['name' => 'Swiss Franc', 'code' => 'CHF', 'symbol' => 'CHF', 'exchange_rate' => 0.92, 'active' => true],
            ['name' => 'Chinese Yuan', 'code' => 'CNY', 'symbol' => '¥', 'exchange_rate' => 6.45, 'active' => true],
            ['name' => 'New Zealand Dollar', 'code' => 'NZD', 'symbol' => 'NZ$', 'exchange_rate' => 1.41, 'active' => true],
            ['name' => 'Indian Rupee', 'code' => 'INR', 'symbol' => '₹', 'exchange_rate' => 73.58, 'active' => true]
        ];

        Currency::insert($currencies);
    }
}
