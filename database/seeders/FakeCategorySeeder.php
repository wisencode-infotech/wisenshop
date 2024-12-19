<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;

class FakeCategorySeeder extends FakeAppSeeder
{
    /**
     * Seed the application's database for fake categories and their respected sub categories.
     */
    public function run(): void
    {
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
                        'name' => 'Watches',
                        'image_path' => 'men-watches.jpg',
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
                        'image_path' => 'wpmen-watches.jpg',
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
                    'slug' => Str::slug($category['name']) . '-' . Str::slug($subcategory['name']),
                    'description' => $subcategory['description'],
                    'image_path' => $image_path,
                    'parent_id' => $created_category->id
                ]);
            }
        }

        return true;
    }
}