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

        $categories = [
            [
                'name' => 'Electronics',
                'image_path' => 'electronics.jpg',
                'description' => 'High-quality and branded electronics.',
                'subcategories' => [
                    [
                        'name' => 'Mobile',
                        'image_path' => 'mobiles.jpg',
                        'description' => 'Explore the latest smartphones with innovative features, sleek designs, and powerful performance. Stay connected, productive, and entertained on the go.'
                    ],
                    [
                        'name' => 'Laptop & Computer',
                        'image_path' => 'laptops.jpg',
                        'description' => 'Versatile laptops and powerful computers designed for productivity, gaming, and entertainment. Perfect for work, study, or play with trusted performance and modern features.'
                    ],
                    [
                        'name' => 'LEDs',
                        'image_path' => 'leds.jpg',
                        'description' => 'Bright, energy-efficient, and long-lasting LED lights. Perfect for illuminating homes, offices, and outdoor spaces with style and efficiency.'
                    ]
                ]
            ],
            [
                'name' => 'Men\'s Fashion',
                'image_path' => 'men-fashion.jpg',
                'description' => 'Branded and latest men\'s fashion clothes.',
                'subcategories' => [
                    [
                        'name' => 'T-Shirt',
                        'image_path' => 't-shirt.jpg',
                        'description' => 'Comfortable and stylish t-shirts for everyday wear.'
                    ],
                    [
                        'name' => 'Wathes',
                        'image_path' => 'wathes.jpg',
                        'description' => 'Timeless and elegant watches to suit every occasion.'
                    ],
                    [
                        'name' => 'Jackets',
                        'image_path' => 'jackets.jpg',
                        'description' => 'Fashionable and durable jackets for all weather conditions.'
                    ],
                    [
                        'name' => 'Glasses',
                        'image_path' => 'glasses.jpg',
                        'description' => 'Trendy and protective glasses for both fashion and function.'
                    ],
                    [
                        'name' => 'Perfumes',
                        'image_path' => 'men-perfumes.jpg',
                        'description' => 'Sophisticated and refreshing perfumes with captivating scents.'
                    ]
                ]

            ],
            [
                'name' => 'Women\'s Fashion',
                'image_path' => 'women-fashion.jpg',
                'description' => 'Branded and latest women\'s fashion clothes.',
                'subcategories' => [
                    [
                        'name' => 'Dress',
                        'image_path' => 'dress.jpg',
                        'description' => 'Elegant and stylish dresses for every occasion.'
                    ],
                    [
                        'name' => 'Handbags',
                        'image_path' => 'handbags.jpg',
                        'description' => 'Trendy and spacious handbags for all your essentials.'
                    ],
                    [
                        'name' => 'Watches',
                        'image_path' => 'watches.jpg',
                        'description' => 'Classic and modern watches to complement your style.'
                    ],
                    [
                        'name' => 'Women Perfumes',
                        'image_path' => 'women-perfumes.jpg',
                        'description' => 'Luxurious perfumes with captivating fragrances for every mood.'
                    ]
                ]

            ],
            [
                'name' => 'Kids & Baby Products',
                'image_path' => 'kids-baby.jpg',
                'description' => 'Toys, baby clothes, learning kits, and parenting essentials.',
                'subcategories' => [
                    [
                        'name' => 'Toys',
                        'image_path' => 'toys.jpg',
                        'description' => 'Fun and safe toys to entertain and educate children of all ages.'
                    ],
                    [
                        'name' => 'Diapers',
                        'image_path' => 'diapers.jpg',
                        'description' => 'Soft, absorbent diapers for your baby’s comfort and protection.'
                    ],
                    [
                        'name' => 'Clothes',
                        'image_path' => 'clothes.jpg',
                        'description' => 'Comfortable and stylish clothing for babies and children.'
                    ]
                ]

            ],
            [
                'name' => 'Home Decor Accessories',
                'image_path' => 'home_decor.jpg',
                'description' => 'Home accessories like furniure and decor accessories.',
                'subcategories' => [
                    [
                        'name' => 'Furniture',
                        'image_path' => 'furniture.jpg',
                        'description' => 'Stylish and functional furniture pieces to enhance your living spaces.'
                    ],
                    [
                        'name' => 'Curtains',
                        'image_path' => 'curtains.jpg',
                        'description' => 'Elegant curtains to add privacy, style, and comfort to your home.'
                    ]
                ]


            ],
            [
                'name' => 'Health & Wellness',
                'image_path' => 'health-wellness.jpg',
                'description' => 'Organic supplements, skincare, essential oils, and wellness devices.',
                'subcategories' => [
                    [
                        'name' => 'Supplements',
                        'image_path' => 'supplements.jpg',
                        'description' => 'High-quality supplements to support your health and wellness journey.'
                    ],
                    [
                        'name' => 'Ayurvedic Tablets',
                        'image_path' => 'ayurvedic_tablets.jpg',
                        'description' => 'Natural Ayurvedic tablets to promote holistic health and balance.'
                    ]
                ]


            ],
            [
                'name' => 'Fitness & Outdoor Gear',
                'image_path' => 'fitness-outdoor-gear.jpg',
                'description' => 'Includes workout equipment, yoga mats, sports gear, and camping essentials.',
                'subcategories' => [
                    [
                        'name' => 'Treadmill',
                        'image_path' => 'treadmill.jpg',
                        'description' => 'High-quality treadmills designed for effective workouts and improved fitness.'
                    ],
                    [
                        'name' => 'Massager',
                        'image_path' => 'massager.jpg',
                        'description' => 'Relaxing and efficient massagers to relieve stress and soothe muscles.'
                    ]
                ]

            ],
            [
                'name' => 'Books & Stationery',
                'image_path' => 'books-stationary.jpg',
                'description' => 'Books, journals, planners, art supplies, and office essentials.',
                'subcategories' => [
                    [
                        'name' => 'Religious',
                        'image_path' => 'religious.jpg',
                        'description' => 'Explore spiritual and devotional items to enrich your faith and beliefs.'
                    ],
                    [
                        'name' => 'History',
                        'image_path' => 'history.jpg',
                        'description' => 'Dive into historical books and artifacts to connect with the past.'
                    ],
                    [
                        'name' => 'Sports',
                        'image_path' => 'sports.jpg',
                        'description' => 'Gear and accessories for all your sports and fitness needs.'
                    ]
                ]

            ],
            [
                'name' => 'Beauty & Personal Care',
                'image_path' => 'beauty-care.jpg',
                'description' => 'Makeup, skincare, hair care, grooming tools, and fragrances.',
                'subcategories' => [
                    [
                        'name' => 'Facewash',
                        'image_path' => 'facewash.jpg',
                        'description' => 'Gentle and effective facewash for clean, refreshed, and glowing skin.'
                    ],
                    [
                        'name' => 'Soap',
                        'image_path' => 'soap.jpg',
                        'description' => 'High-quality soaps to cleanse and nourish your skin with natural ingredients.'
                    ]
                ]

            ],
            [
                'name' => 'Footwear',
                'image_path' => 'footwear.jpg',
                'description' => 'Shoes, sandals, sneakers, boots, and specialty footwear.',
                'subcategories' => [
                    [
                        'name' => 'Sport',
                        'image_path' => 'sport.jpg',
                        'description' => 'Durable and stylish sportswear designed for comfort and performance.'
                    ],
                    [
                        'name' => 'Casual',
                        'image_path' => 'casual.jpg',
                        'description' => 'Trendy and comfortable casual wear for everyday style.'
                    ],
                    [
                        'name' => 'Partywear',
                        'image_path' => 'partywear.jpg',
                        'description' => 'Elegant and fashionable partywear for special occasions and celebrations.'
                    ]
                ]

            ],
            [
                'name' => 'Pet Supplies',
                'image_path' => 'pet-supplies.jpg',
                'description' => 'Pet food, grooming products, toys, and accessories for pets.'
            ],
            [
                'name' => 'Travel & Luggage',
                'image_path' => 'travel-luggage.jpg',
                'description' => 'Travel bags, suitcases, organizers, travel accessories like neck pillows, and adapters.',
                'subcategories' => [
                    [
                        'name' => 'Duffel Bag',
                        'image_path' => 'duffel_bag.jpg',
                        'description' => 'Spacious and durable duffel bags for travel, gym, and daily use.'
                    ],
                    [
                        'name' => 'Luggage Bag',
                        'image_path' => 'luggage_bag.jpg',
                        'description' => 'Reliable and stylish luggage bags for hassle-free travel experiences.'
                    ]
                ]

            ],
            [
                'name' => 'Hobbies & Crafts',
                'image_path' => 'hobbies-craft.jpg',
                'description' => 'Art supplies, DIY kits, musical instruments, and collectibles.'
            ],
            [
                'name' => 'Snacks & Sweets',
                'image_path' => 'snacks-sweets.jpg',
                'description' => 'Deliciously curated treats ranging from savory snacks to indulgent sweets, perfect for every craving and occasion.'
            ],
        ];

        foreach ($categories as $category) {

            $source_path = public_path("assets/defaults/images/categories/" . basename($category['image_path']));
            $destination_path = "categories/" . basename($category['image_path']);
            $image_path = $this->imageUploadToSystem($source_path, $destination_path);
            $this->createCategory($category, $image_path);

        }

        // Products seeder

        $categories = Category::all();
        $product_unit_ids = ProductUnit::pluck('id')->toArray();

        foreach ($categories as $category) {
            Product::factory(10)->create([
                'category_id' => $category->id,
                'unit_id' => $product_unit_ids[array_rand($product_unit_ids)]
            ]);
        }

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
                'title' => 'Electronic',
                'image_path' => 'banner1.jpg', 
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'Spices',
                'image_path' => 'banner3.jpg',
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'Baby Products',
                'image_path' => 'baby_care.webp', 
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'Beverages',
                'image_path' => 'beverages.jpg',
                'description' => fake()->paragraph(),
            ],
            [
                'title' => 'Health',
                'image_path' => 'banner4.jpg',
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

    protected function imageUploadToSystem($source_path, $destination_path)
    {
        $image_path = null;
        
        if (file_exists($source_path)) {
            Storage::disk('public')->put($destination_path, file_get_contents($source_path));
    
            $image_path = $destination_path;
        }

        return $image_path;
    }

    protected function createCategory($category, $image_path)
    {
        
        $created_category = Category::create([
            'name' => $category['name'],
            'slug' => Str::slug($category['name']),
            'description' => $category['description'],
            'image_path' => $image_path,
        ]);

        if(!empty($category['subcategories']))
        {
            foreach ($category['subcategories'] as $key => $subcategory) {

                $source_path = public_path("assets/defaults/images/categories/" . basename($subcategory['image_path']));
                $destination_path = "categories/" . basename($subcategory['image_path']);
                $image_path = $this->imageUploadToSystem($source_path, $destination_path);

                Category::create([
                    'name' => $subcategory['name'],
                    'slug' => Str::slug($subcategory['name']),
                    'description' => $subcategory['description'],
                    'image_path' => $image_path,
                    'parent_id' => $created_category->id
                ]);
            }
        }

        return true;
    }

    
}
