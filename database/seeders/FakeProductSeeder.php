<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductUnit;
use Illuminate\Support\Str;

class FakeProductSeeder extends FakeAppSeeder
{
    /**
     * Seed the application's database for fake products.
     */
    public function run(): void
    {
        // Products seeder

        $mobile_category = Category::where('slug', 'electronics-mobile')->select('id', 'slug')->first();

        $products = [];

        $mobile_products = [
            [
                'name' => 'iPhone 15',
                'slug' => 'iphone-15',
                'short_description' => 'Latest iPhone with advanced features.',
                'description' => 'The iPhone 15 comes with an A16 Bionic chip, 5G support, and a 48MP camera for professional-quality photos.',
                'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/iphone-15.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Samsung Galaxy S23',
                'slug' => 'samsung-galaxy-s23',
                'short_description' => 'High-performance smartphone from Samsung.',
                'description' => 'The Galaxy S23 features a powerful Snapdragon 8 Gen 2 chip, 120Hz AMOLED display, and a 50MP camera.',
                'price' => 899.99,
                'stock' => 150,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/samsung-galaxy-s23.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Google Pixel 8',
                'slug' => 'google-pixel-8',
                'short_description' => 'Pure Android experience with an amazing camera.',
                'description' => 'The Pixel 8 is equipped with Google’s custom Tensor G3 chip and offers fantastic camera performance with AI-enhanced features.',
                'price' => 799.99,
                'stock' => 200,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/google-pixel-8.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'OnePlus 11',
                'slug' => 'oneplus-11',
                'short_description' => 'Flagship phone with fast charging and smooth performance.',
                'description' => 'The OnePlus 11 is equipped with Snapdragon 8 Gen 2, a 120Hz AMOLED display, and super fast 100W charging.',
                'price' => 749.99,
                'stock' => 180,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/oneplus-11.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Xiaomi Mi 13 Pro',
                'slug' => 'xiaomi-mi-13-pro',
                'short_description' => 'Top-tier flagship from Xiaomi with Leica camera.',
                'description' => 'The Mi 13 Pro boasts a 50MP Leica camera, Snapdragon 8 Gen 2, and a 120Hz AMOLED display.',
                'price' => 899.00,
                'stock' => 95,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/xiaomi-mi-13-pro.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Oppo Find X6 Pro',
                'slug' => 'oppo-find-x6-pro',
                'short_description' => 'Premium smartphone with excellent cameras.',
                'description' => 'Oppo Find X6 Pro is equipped with a 50MP main sensor, Snapdragon 8 Gen 2, and an immersive AMOLED display.',
                'price' => 999.00,
                'stock' => 110,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/oppo-find-x6-pro.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Realme GT 2 Pro',
                'slug' => 'realme-gt-2-pro',
                'short_description' => 'A premium smartphone at an affordable price.',
                'description' => 'The Realme GT 2 Pro is powered by Snapdragon 8 Gen 1, offering flagship-level performance at a lower price.',
                'price' => 699.99,
                'stock' => 130,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/realme-gt-2-pro.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Asus Zenfone 9',
                'slug' => 'asus-zenfone-9',
                'short_description' => 'Compact and powerful flagship phone.',
                'description' => 'Zenfone 9 offers flagship specs with Snapdragon 8 Gen 1, a compact form factor, and a 50MP camera.',
                'price' => 799.00,
                'stock' => 80,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/asus-zenfone-9.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Sony Xperia 1 IV',
                'slug' => 'sony-xperia-1-iv',
                'short_description' => 'Flagship phone with exceptional display and audio.',
                'description' => 'Xperia 1 IV features a 4K OLED display, Snapdragon 8 Gen 1, and advanced camera features for professionals.',
                'price' => 1399.99,
                'stock' => 50,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/sony-xperia-1-iv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Motorola Edge 30 Pro',
                'slug' => 'motorola-edge-30-pro',
                'short_description' => 'Flagship phone with 144Hz display and Snapdragon 8 Gen 1.',
                'description' => 'The Motorola Edge 30 Pro comes with a 144Hz OLED display, Snapdragon 8 Gen 1, and 50MP main camera.',
                'price' => 799.99,
                'stock' => 170,
                'status' => 1,
                'category' => $mobile_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'mobile/motorola-edge-30-pro.png',
                        'is_primary' => '1'
                    ],
                ]
            ]
        ];

        $products = array_merge($products, $mobile_products);

        $laptop_computer_category = Category::where('slug', 'electronics-laptop-computer')->select('id', 'slug')->first();

        $laptop_computer_products = [
            [
                'name' => 'MacBook Pro 2019 Touch Bar A2141 (Intel Core i9 16 Inch)- Refurbished',
                'slug' => 'macbook-pro-2019-touch-bar-a2141-intel-core-i9-16-inch-refurbished',
                'short_description' => 'MacBook Pro 2019 Touch Bar A2141 (Intel Core i9 16 Inch)- Refurbished.',
                'description' => 'MacBook Pro 2019 Touch Bar A2141 (Intel Core i9 16 Inch)- Refurbished.',
                'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/macbook-pro-2019-touch-bar-a2141-intel-core-i9-16-inch-refurbished.png',
                        'is_primary' => '1'
                    ],
                ]
            ]
        ];

        $products = array_merge($products, $laptop_computer_products);

        foreach ($products as $product) {

            $product_category = $product['category'];

            $fake_product = new Product();
            $fake_product->name = $product['name'];
            $fake_product->slug = $product['slug'];
            $fake_product->short_description = $product['short_description'];
            $fake_product->description = $product['description'];
            $fake_product->price = $product['price'];
            $fake_product->stock = $product['stock'];
            $fake_product->status = $product['status'];
            $fake_product->category_id = $product_category->id ?? 1;
            $fake_product->unit_id = $product['unit_id'];

            $fake_product->save();

            if (!empty($product['images'])) {
                foreach ($product['images'] as $product_image) {

                    $source_path = public_path("assets/defaults/images/products/" . $product_image['path']);
                    $destination_path = "products/" . $product_image['path'];
                    $image_path = $this->imageUploadToSystem($source_path, $destination_path);

                    if (!empty($image_path)) {
                        $fake_product_image = new ProductImage();
                        $fake_product_image->product_id = $fake_product->id;
                        $fake_product_image->image_path = $image_path;
                        $fake_product_image->is_primary = $product_image['is_primary'] ?? '0';
        
                        $fake_product_image->save();
                    }
                }
            }
        }

        $categories = Category::whereNotIn('id', [ $mobile_category->id ])->get();
        $product_unit_ids = ProductUnit::pluck('id')->toArray();

        foreach ($categories as $category) {
            Product::factory(10)->create([
                'category_id' => $category->id,
                'unit_id' => $product_unit_ids[array_rand($product_unit_ids)]
            ]);
        }   
    }
}