<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
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
    }
}
