<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\SiteBanner;
use App\Models\User;
use App\Models\ProductUnit;
use App\Models\Currency;
use App\Models\HomePageSetting;
use App\Models\ProductReview;
use App\Models\Notification;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FakeAppSeeder extends Seeder
{
    /**
     * Seed the application's database for fake entries. specially for test setup.
     */
    public function run(): void
    {
        // User roles seeder

        UserRole::insert([
            [
                'id' => 1,
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'role' => 'customer',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);

        // User seeder

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@wisenshop.com',
            'password' => Hash::make('wisenshop450#!'),
            'user_role_id' => 1
        ]);

        User::factory(10)->create();

        // Categories seeder
        (new FakeCategorySeeder())->run();

        // Categories seeder
        (new FakeProductSeeder())->run();

        HomePageSetting::updateOrCreate(
            ['meta_key' => 'display_specific_categories_on_page_load'],
            ['meta_value' => Category::select('id')->first()->id ?? 1]
        );

        // Order seeder

        $users = User::all();
        $products = Product::all();
        $currency_ids = Currency::pluck('id')->toArray();

        foreach ($users as $user) {
            $order = Order::create([
                'user_id' => $user->id,
                'currency_id' => $currency_ids[array_rand($currency_ids)],
                'status' => array_rand(config('general.order_statuses')),
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

        // Payment methods seeder

        $payment_methods = [
            [
                'name' => 'Cash on Delivery',
                'description' => 'Pay on Delivery',
                'logo_url' => 'https://img.freepik.com/premium-vector/cash-delivery_569841-175.jpg?w=826',
                'is_default' => true
            ]
        ];

        foreach ($payment_methods as $payment_method) {
            PaymentMethod::create($payment_method);
        }

        // Payment seeder

        $orders = Order::all();
        $payment_method_ids = PaymentMethod::pluck('id')->toArray();

        foreach ($orders as $order) {
            Payment::create([
                'order_id' => $order->id,
                'payment_method_id' => $payment_method_ids[array_rand($payment_method_ids)],
                'amount' => $order->total_price,
                'status' => 'completed',
            ]);
        }

        // Products review seeder

        $product_ids = Product::pluck('id')->toArray();

        $user_ids = User::pluck('id')->toArray();

        $product_review_counter = 0;

        while ($product_review_counter <= 200) {
            ProductReview::create([
                'user_id' => $user_ids[array_rand($user_ids)],
                'product_id' => $product_ids[array_rand($product_ids)],
                'rating' => rand(1, 5),
                'review' => fake()->paragraph()
            ]);

            $product_review_counter++;
        }

        // Notification seeder

        $user_ids = User::pluck('id')->toArray();

        $notification_types = ['order'];

        $global_status = [true, false];

        $notification_counter = 0;

        while ($notification_counter <= 200) {
            Notification::create([
                'title'     => fake()->sentence(),
                'message'   => fake()->paragraph(),
                'user_id'   => $user_ids[array_rand($user_ids)],
                'is_global' => $global_status[array_rand($global_status)],
                'type'      => $notification_types[array_rand($notification_types)],
                'url'       => fake()->url(),
                'meta_data' => json_encode(['key' => fake()->word()]),
                'is_read'   => rand(0, 1) == 1,
            ]);

            $notification_counter++;
        }

       // Site banner seeder
        $site_banners = [
            [
                'title' => 'Balck Friday Speacial',
                'image_path' => 'banner-1.png', 
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'GearUp For Winter Fun',
                'image_path' => 'banner-2.png',
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'Big Sale',
                'image_path' => 'banner-3.png', 
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'Balck Friday Speacial',
                'image_path' => 'banner-4.png',
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'Exclusive Discount',
                'image_path' => 'banner-5.png',
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'Speacial Offer',
                'image_path' => 'banner-6.png',
                'description' => fake()->paragraph(),
            ],
        ];

        foreach ($site_banners as $banner) {
            $source_path = public_path("assets/defaults/images/site-banners/" . basename($banner['image_path']));
            $destination_path = "site-banners/" . basename($banner['image_path']);
            $image_path = $this->imageUploadToSystem($source_path, $destination_path);

            SiteBanner::create([
                'title' => '',
                'description' => '',
                'image_path' => $image_path,
            ]);
        }

    }

    public function imageUploadToSystem($source_path, $destination_path)
    {
        $image_path = null;
        
        if (file_exists($source_path)) {
            Storage::disk('public')->put($destination_path, file_get_contents($source_path));
    
            $image_path = $destination_path;
        }

        return $image_path;
    }
    
}
