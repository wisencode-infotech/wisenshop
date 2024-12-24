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
            ],
            [
                'name' => 'Dell 23.8" OptiPlex 7410 All-in-One Desktop Computer (Silver)',
                'slug' => 'dell-23-8-optiplex-7410-all-in-one-desktop-computer-silver',
                'short_description' => 'Streamline your productivity and workspace layout with the conveniently designed silver Dell 23.8" OptiPlex 7410 All-in-One Desktop Computer.',
                'description' => 'At the center of the OptiPlex is a 13th Gen Intel Core i5-13500 14-Core processor which boosts performance across a multitude of Performance and Efficiency cores to enhance your workflow. Experience enhanced multitasking with 8GB of DDR5 RAM and keep all of your most essential files saved with the 256GB M.2 PCIe 3.0 x4 NVMe SSD. The 23.8" Full HD 1920 x 1080 IPS display gives you clear and smooth visuals backed by integrated Intel UHD Graphics 770 engine.',
                'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/dell-23-8-optiplex-7410-all-in-one-desktop-computer-silver.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Dell XPS Desktop 8960',
                'slug' => 'dell-xps-desktop-8960',
                'short_description' => 'Dell XPS Desktop 8960 with 14th Gen Intel Core i9-14900K, 64GB DDR5 RAM, 1TB NVMe SSD + 1TB HDD, GeForce RTX 3070Ti 8GB GDDR6X, Windows 11 Pro.',
                'description' => 'The Dell XPS Desktop 8960 is a high-performance desktop computer featuring a 14th Gen Intel Core i9-14900K processor, 64GB DDR5 RAM, 1TB NVMe SSD, 1TB HDD, and an NVIDIA GeForce RTX 3070Ti 8GB GDDR6X graphics card. It comes pre-installed with Windows 11 Pro, offering a powerful and efficient computing experience for both professional and personal use.',
                'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/dell-xps-desktop-8960.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'HP Envy Desktop TE01-4000 PC',
                'slug' => 'hp-envy-desktop-te01-4000-pc',
                'short_description' => 'HP Envy Desktop TE01-4000 PC with Intel Core i7-12700, 16GB RAM, 1TB HDD + 512GB SSD, Intel UHD Graphics 770, Windows 11 Home.',
                'description' => 'The HP Envy Desktop TE01-4000 PC is a powerful and versatile desktop computer designed for both work and entertainment. It features a 12th Gen Intel Core i7-12700 processor, 16GB DDR4 RAM, a combination of 1TB HDD and 512GB SSD for ample storage, and Intel UHD Graphics 770. Pre-installed with Windows 11 Home, it offers seamless performance in a sleek, compact design.',
                'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/hp-envy-desktop-te01-4000.jpg',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Apple iMac 24-inch (M3)',
                'slug' => 'apple-imac-24-inch-m3',
                'short_description' => 'Apple iMac 24-inch (M3) with 8-core CPU, 8-core GPU, 8GB Unified Memory, 256GB SSD, and a stunning 4.5K Retina display.',
                'description' => 'The Apple iMac 24-inch (M3) features Apple’s M3 chip with an 8-core CPU and 8-core GPU for incredible performance and efficiency. Its 4.5K Retina display delivers breathtaking visuals, while 8GB of Unified Memory and a 256GB SSD provide speed and storage for demanding tasks. Available in vibrant colors, it’s a perfect blend of style and functionality.',
                'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/apple-imac-24-inch-m3.jpg',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Apple Mac Mini M2',
                'slug' => 'apple-mac-mini-m2',
                'short_description' => 'Apple Mac Mini M2 with 8-core CPU, 10-core GPU, 8GB Unified Memory, and 256GB SSD. Compact and powerful desktop solution.',
                'description' => 'The Apple Mac Mini M2 is a compact yet powerful desktop computer featuring Apple’s M2 chip with an 8-core CPU and 10-core GPU. It includes 8GB of Unified Memory and a 256GB SSD, making it ideal for creative tasks and professional workflows. With its sleek design and macOS Ventura, it offers outstanding performance in a small form factor.',
                'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/apple-mac-mini-m2.jpg',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'HP All-in-One 24-cr0025m PC',
                'slug' => 'hp-all-in-one-24-cr0025m-pc',
                'short_description' => 'HP All-in-One 24-cr0025m PC with AMD Ryzen 5 5625U, 16GB RAM, 1TB HDD + 256GB SSD, Radeon Graphics, and a 23.8-inch Full HD display.',
                'description' => 'The HP All-in-One 24-cr0025m PC combines performance and style in a space-saving design. Powered by AMD Ryzen 5 5625U, it offers 16GB of RAM, dual storage (1TB HDD + 256GB SSD), and Radeon Graphics. The 23.8-inch Full HD display is perfect for work, entertainment, and everything in between, and it comes pre-installed with Windows 11 Home.',
                'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/hp-all-in-one-24-cr0025m.jpg',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Apple MacBook Air 13-inch (M3)',
                'slug' => 'apple-macbook-air-13-inch-m3',
                'short_description' => 'Apple MacBook Air 13-inch (M3) with an ultra-thin design, M3 chip, 8-core CPU, 10-core GPU, 8GB RAM, 256GB SSD, and a Retina display with True Tone technology.',
                'description' => 'The Apple MacBook Air 13-inch (M3) is a powerful and ultra-lightweight laptop powered by the next-generation M3 chip. Features include an 8-core CPU, 10-core GPU, 8GB RAM, 256GB SSD, Magic Keyboard, and macOS Ventura. Its Retina display delivers stunning visuals, and its battery provides up to 18 hours of usage.',
                'price' => 1199.99,

                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/hp-all-in-one-24-cr0025m.jpg',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Dell XPS 13 (2024)',
                'slug' => 'dell-xps-13-2024',
                'short_description' => 'Dell XPS 13 (2024) with a 13.4-inch InfinityEdge display, Intel Core i7-1355U processor, 16GB RAM, 1TB SSD, and a premium aluminum build.',
                'description' => 'The Dell XPS 13 (2024) continues its legacy of excellence with a sleek aluminum design, 13.4-inch FHD+ InfinityEdge display, and top-tier performance powered by Intel Core i7-1355U. With 16GB LPDDR5 RAM and 1TB SSD storage, this laptop is ideal for productivity and entertainment.',
                'price' => 1299.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/hp-all-in-one-24-cr0025m.jpg',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Lenovo IdeaPad Duet 5 Chromebook',
                'slug' => 'lenovo-ideapad-duet-5-chromebook',
                'short_description' => 'Lenovo IdeaPad Duet 5 Chromebook with a 13.3-inch OLED display, Qualcomm Snapdragon 7c Gen 2, 8GB RAM, and 128GB eMMC storage, running Chrome OS.',
                'description' => 'The Lenovo IdeaPad Duet 5 Chromebook offers a versatile 2-in-1 experience with its detachable keyboard. Featuring a 13.3-inch Full HD OLED display, Qualcomm Snapdragon 7c Gen 2 processor, 8GB RAM, and 128GB eMMC, this Chromebook is perfect for on-the-go multitasking and media consumption.',
                'price' => 499.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/lenovo-ideapad-duet-5-chromebook.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Asus ROG Zephyrus G16 (2024)',
                'slug' => 'asus-rog-zephyrus-g16-2024',
                'short_description' => 'Asus ROG Zephyrus G16 (2024) gaming laptop with Intel Core i9-13900H, NVIDIA GeForce RTX 4070, 16-inch QHD+ 165Hz display, 16GB RAM, and 1TB SSD.',
                'description' => 'The Asus ROG Zephyrus G16 (2024) is designed for gamers and creators. Powered by Intel Core i9-13900H and NVIDIA RTX 4070 GPU, it features a 16-inch QHD+ 165Hz display, 16GB RAM, and a 1TB SSD for ultra-smooth gaming and high-performance tasks.',
                'price' => 2099.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/asus-rog-zephyrus-g16.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'HP Pavilion 14',
                'slug' => 'hp-pavilion-14',
                'short_description' => 'HP Pavilion 14 laptop with a 14-inch FHD display, Intel Core i5-1235U processor, 8GB RAM, 512GB SSD, and long battery life.',
                'description' => 'The HP Pavilion 14 is a compact and lightweight laptop perfect for everyday tasks. It features a 14-inch FHD display, Intel Core i5-1235U processor, 8GB RAM, and 512GB SSD. With long battery life and fast charging, this laptop is a reliable companion for work or study.',
                'price' => 799.99,
                'stock' => 120,
                'status' => 1,
                'category' => $laptop_computer_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'electronics-laptop-computer/hp-pavilion-14.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
        ];

        $products = array_merge($products, $laptop_computer_products);

        $electronics_leds_category = Category::where('slug', 'electronics-leds')->select('id', 'slug')->first();

        $leds_products = [
            [
                'name' => 'Samsung S95C OLED TV',
                'slug' => 'samsung-s95c-oled-tv',
                'short_description' => 'Samsung S95C OLED TV with stunning 4K resolution, HDR10+ support, and vibrant colors for an immersive viewing experience.',
                'description' => 'The Samsung S95C OLED TV offers exceptional picture quality with nearly infinite contrast, perfect black levels, and a sleek design. It includes gaming features like VRR, ALLM, and 144Hz refresh rate for a smooth and immersive experience.',
                'price' => 2999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/samsung-s95c-oled-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'LG G4 OLED TV',
                'slug' => 'lg-g4-oled-tv',
                'short_description' => 'LG G4 OLED TV with self-lit pixels, Dolby Vision IQ, and HDR10 Pro for vivid and lifelike visuals.',
                'description' => 'The LG G4 OLED TV is designed for the ultimate home theater experience. It offers perfect black levels, stunning contrast, and vibrant colors. It supports Dolby Vision IQ, HDR10 Pro, and has smart features powered by webOS.',
                'price' => 2499.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/lg-g4-oled-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Sony A95L QD-OLED TV',
                'slug' => 'sony-a95l-qd-oled-tv',
                'short_description' => 'Sony A95L QD-OLED TV with quantum dot technology, Acoustic Surface Audio+, and 4K HDR for brilliant visuals and sound.',
                'description' => 'The Sony A95L QD-OLED TV combines OLED and quantum dot technology for unparalleled brightness and color accuracy. With Acoustic Surface Audio+ and Google TV, it delivers an extraordinary entertainment experience.',
                'price' => 2799.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/sony-a95l-qd-oled-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'TCL C835 Mini-LED TV',
                'slug' => 'tcl-c835-mini-led-tv',
                'short_description' => 'TCL C835 Mini-LED TV with QLED technology, Dolby Vision, and Game Master Pro for dynamic visuals and smooth gaming.',
                'description' => 'The TCL C835 Mini-LED TV delivers stunning visuals with precise backlight control and vibrant colors. Its Game Master Pro feature enhances gaming performance with low input lag and VRR.',
                'price' => 1299.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/tcl-c835-mini-led-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Vizio MQX Series 4K QLED',
                'slug' => 'vizio-mqx-series-4k-qled',
                'short_description' => 'Vizio MQX Series 4K QLED TV with Dolby Vision, 120Hz refresh rate, and SmartCast for seamless entertainment.',
                'description' => 'The Vizio MQX Series 4K QLED TV offers brilliant picture quality with quantum dot technology and Dolby Vision. Its SmartCast platform provides access to popular streaming apps and voice control.',
                'price' => 699.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/vizio-mqx-series-4k-qled.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Samsung QN900C Neo QLED 8K TV',
                'slug' => 'samsung-qn900c-neo-qled-8k-tv',
                'short_description' => 'Samsung QN900C Neo QLED 8K TV with ultra-fine contrast, AI-powered 8K upscaling, and Infinity Screen design.',
                'description' => 'The Samsung QN900C Neo QLED 8K TV offers unparalleled clarity and detail with AI-powered 8K upscaling. Its sleek Infinity Screen design enhances the viewing experience with virtually no bezels.',
                'price' => 4999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/samsung-qn900c-neo-qled-8k-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Hisense U8H Mini-LED TV',
                'slug' => 'hisense-u8h-mini-led-tv',
                'short_description' => 'Hisense U8H Mini-LED TV with Quantum Dot technology, Dolby Vision, and high brightness for vibrant visuals.',
                'description' => 'The Hisense U8H Mini-LED TV provides outstanding picture quality with advanced Quantum Dot technology and Dolby Vision support. Its high brightness levels ensure excellent performance even in well-lit rooms.',
                'price' => 1199.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/hisense-u8h-mini-led-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'LG C3 OLED TV',
                'slug' => 'lg-c3-oled-tv',
                'short_description' => 'LG C3 OLED TV with self-lit OLED pixels, α9 Gen6 AI Processor, and Cinema HDR for cinematic visuals.',
                'description' => 'The LG C3 OLED TV delivers stunning visuals with self-lit pixels for perfect blacks and infinite contrast. Its α9 Gen6 AI Processor enhances image quality and supports Cinema HDR for immersive entertainment.',
                'price' => 2099.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/lg-c3-oled-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Sony X90L Full Array LED TV',
                'slug' => 'sony-x90l-full-array-led-tv',
                'short_description' => 'Sony X90L Full Array LED TV with XR Contrast Booster, XR Motion Clarity, and Google TV for an all-around great experience.',
                'description' => 'The Sony X90L Full Array LED TV offers precise contrast control, vibrant colors, and smooth motion. With Google TV, you get access to a world of entertainment with built-in voice control.',
                'price' => 1599.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/sony-x90l-full-array-led-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'TCL 6-Series Roku TV',
                'slug' => 'tcl-6-series-roku-tv',
                'short_description' => 'TCL 6-Series Roku TV with Mini-LED technology, Dolby Vision, and Roku smart platform for ease of use.',
                'description' => 'The TCL 6-Series Roku TV combines Mini-LED technology and Dolby Vision for incredible picture quality. Its Roku platform provides seamless access to your favorite streaming services.',
                        'price' => 999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $electronics_leds_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'leds/tcl-6-series-roku-tv.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
        ];

        $products = array_merge($products, $leds_products);

        $t_shirt_category = Category::where('slug', 'mens-fashion-t-shirt')->select('id', 'slug')->first();

        $tshirt_products = [
            [
                'name' => 'Classic Crew Neck T-Shirt',
                'slug' => 'classic-crew-neck-t-shirt',
                'short_description' => 'A versatile crew neck t-shirt made from soft cotton for everyday comfort.',
                'description' => 'This classic crew neck t-shirt features a regular fit and a durable, breathable cotton fabric. Perfect for layering or wearing on its own, it offers comfort throughout the day.',
                'price' => 19.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/classic-crew-neck-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Graphic Print T-Shirt',
                'slug' => 'graphic-print-t-shirt',
                'short_description' => 'A bold t-shirt featuring eye-catching graphic prints for a unique style.',
                'description' => 'This graphic print t-shirt showcases custom designs with high-quality print techniques. Made from soft cotton, it combines style with comfort for casual outings.',
                'price' => 25.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/graphic-print-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Premium Polo T-Shirt',
                'slug' => 'premium-polo-t-shirt',
                'short_description' => 'A stylish polo t-shirt made from premium cotton with a comfortable fit.',
                'description' => 'This premium polo t-shirt offers a refined look with its soft fabric and classic button-down collar. A perfect choice for both casual and semi-formal occasions.',
                'price' => 39.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/premium-polo-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Slim Fit V-Neck T-Shirt',
                'slug' => 'slim-fit-v-neck-t-shirt',
                'short_description' => 'A sleek and modern slim fit v-neck t-shirt for a sharp, stylish look.',
                'description' => 'This slim fit v-neck t-shirt hugs the body for a tailored silhouette. Made from stretchable fabric, it provides a flattering fit and comfort all day long.',
                'price' => 22.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/slim-fit-v-neck-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Henley Button T-Shirt',
                'slug' => 'henley-button-t-shirt',
                'short_description' => 'A casual henley t-shirt with a unique button-up collar design.',
                'description' => 'This henley t-shirt combines comfort and style with its button-up collar and soft cotton fabric. A great option for adding a bit of flair to your everyday wardrobe.',
                'price' => 28.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/henley-button-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Tie-Dye Casual T-Shirt',
                'slug' => 'tie-dye-casual-t-shirt',
                'short_description' => 'A vibrant tie-dye t-shirt that adds a pop of color to your wardrobe.',
                'description' => 'This tie-dye casual t-shirt features a colorful and unique design. Made from soft cotton, it’s perfect for adding a fun and bold touch to your laid-back look.',
                'price' => 21.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/tie-dye-casual-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Raglan Sleeve T-Shirt',
                'slug' => 'raglan-sleeve-t-shirt',
                'short_description' => 'A sporty raglan sleeve t-shirt with contrasting colors for a modern look.',
                'description' => 'This raglan sleeve t-shirt features a classic athletic design with contrasting sleeve colors. It’s made from soft cotton, offering comfort and a relaxed fit.',
                'price' => 24.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/raglan-sleeve-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Tech-Fit Workout T-Shirt',
                'slug' => 'tech-fit-workout-t-shirt',
                'short_description' => 'A moisture-wicking workout t-shirt designed for active men.',
                'description' => 'This tech-fit workout t-shirt is made with breathable, moisture-wicking fabric that keeps you cool and dry during exercise. Its fitted design ensures a comfortable range of motion.',
                'price' => 34.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/tech-fit-workout-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Camouflage Print T-Shirt',
                'slug' => 'camouflage-print-t-shirt',
                'short_description' => 'A stylish camouflage print t-shirt perfect for a rugged outdoor look.',
                'description' => 'This camouflage print t-shirt adds an edgy style to your casual wear. Made from durable cotton, it’s perfect for outdoor activities or a laid-back day.',
                'price' => 27.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/camouflage-print-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Eco-Friendly Bamboo T-Shirt',
                'slug' => 'eco-friendly-bamboo-t-shirt',
                'short_description' => 'A sustainable bamboo t-shirt offering ultra-soft comfort and breathability.',
                'description' => 'Made from eco-friendly bamboo fabric, this t-shirt is both soft and breathable, making it perfect for warm weather. It’s a great option for environmentally conscious fashion lovers.',
                'price' => 32.99,
                'stock' => 120,
                'status' => 1,
                'category' => $t_shirt_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'tshirts/eco-friendly-bamboo-t-shirt.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
        ];

        $products = array_merge($products, $tshirt_products);

        $mens_watches_category = Category::where('slug', 'mens-fashion-watches')->select('id', 'slug')->first();

        $men_watch_products = [
            [
                'name' => 'Sonata Analog Gold Watch',
                'slug' => 'sonata-analog-gold-watch',
                'short_description' => 'Sonata analog watch with a stylish gold-tone finish and a classic round dial.',
                'description' => 'The Sonata Analog Gold Watch features a sleek stainless steel case, a gold-plated strap, and a scratch-resistant glass. A perfect blend of elegance and affordability.',
                'price' => 49.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/sonata-analog-gold-watch.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Titan Neo Chronograph Watch',
                'slug' => 'titan-neo-chronograph-watch',
                'short_description' => 'Titan Neo chronograph watch with a modern design and versatile features.',
                'description' => 'This Titan watch comes with a bold chronograph dial, a stainless steel case, and water resistance. A sophisticated choice for everyday wear or special occasions.',
                'price' => 99.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/titan-neo-chronograph-watch.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Rolex Submariner Diver Watch',
                'slug' => 'rolex-submariner-diver-watch',
                'short_description' => 'Rolex Submariner with superior craftsmanship and professional diving capabilities.',
                'description' => 'The Rolex Submariner features a ceramic bezel, 300m water resistance, and an automatic movement. A luxurious watch designed for adventure and prestige.',
                'price' => 8999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/rolex-submariner-diver-watch.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Casio G-Shock Sports Watch',
                'slug' => 'casio-g-shock-sports-watch',
                'short_description' => 'Casio G-Shock with shock resistance and advanced sports features.',
                'description' => 'This rugged Casio G-Shock watch offers a digital display, stopwatch, and 200m water resistance. Perfect for athletes and outdoor enthusiasts.',
                'price' => 79.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/casio-g-shock-sports-watch.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Fossil Grant Chronograph Watch',
                'slug' => 'fossil-grant-chronograph-watch',
                'short_description' => 'Fossil Grant watch with Roman numerals and a vintage-inspired design.',
                'description' => 'The Fossil Grant Chronograph Watch combines timeless elegance with a modern chronograph feature. Made with a genuine leather strap and stainless steel case.',
                'price' => 149.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/fossil-grant-chronograph-watch.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Timex Expedition Field Watch',
                'slug' => 'timex-expedition-field-watch',
                'short_description' => 'Timex Expedition with a rugged design and Indiglo night-light feature.',
                'description' => 'This Timex watch is built for the outdoors with a durable nylon strap, water resistance, and luminous hands. Ideal for adventurers and nature lovers.',
                'price' => 59.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/timex-expedition-field-watch.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Seiko 5 Automatic Watch',
                'slug' => 'seiko-5-automatic-watch',
                'short_description' => 'Seiko 5 Automatic with a self-winding mechanism and sporty design.',
                'description' => 'The Seiko 5 watch offers a durable stainless steel case, day/date display, and water resistance. A perfect mix of functionality and classic style.',
                'price' => 129.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/seiko-5-automatic-watch.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Citizen Eco-Drive Promaster',
                'slug' => 'citizen-eco-drive-promaster',
                'short_description' => 'Citizen Eco-Drive powered by light with advanced diving features.',
                'description' => 'This Citizen watch uses Eco-Drive technology, eliminating the need for batteries. It includes 200m water resistance, luminous hands, and a rotating bezel.',
                'price' => 249.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/citizen-eco-drive-promaster.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Tommy Hilfiger Multi-Dial Watch',
                'slug' => 'tommy-hilfiger-multi-dial-watch',
                'short_description' => 'Tommy Hilfiger watch with a bold multi-dial display and modern style.',
                'description' => 'This Tommy Hilfiger watch features a stylish design with sub-dials for date and day. Made with a stainless steel case and a premium leather strap.',
                'price' => 179.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/tommy-hilfiger-multi-dial-watch.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Omega Seamaster Aqua Terra',
                'slug' => 'omega-seamaster-aqua-terra',
                'short_description' => 'Omega Seamaster with a luxurious design and professional water resistance.',
                'description' => 'The Omega Seamaster Aqua Terra features a sophisticated dial, Swiss automatic movement, and 150m water resistance. Perfect for both formal and casual occasions.',
                'price' => 4999.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_watches_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-watches/omega-seamaster-aqua-terra.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
        ];

        $products = array_merge($products, $men_watch_products);

        $mens_jackets_category = Category::where('slug', 'mens-fashion-jackets')->select('id', 'slug')->first();

        $men_jacket_products = [
            [
                'name' => 'Levi’s Denim Trucker Jacket',
                'slug' => 'levis-denim-trucker-jacket',
                'short_description' => 'Levi’s classic denim trucker jacket with a timeless design.',
                'description' => 'This Levi’s Denim Trucker Jacket features a durable denim fabric, a button-front closure, and multiple pockets. Perfect for casual wear with a rugged, iconic style.',
                'price' => 89.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/levis-denim-trucker-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'The North Face Resolve 2 Jacket',
                'slug' => 'north-face-resolve-2-jacket',
                'short_description' => 'The North Face waterproof jacket designed for outdoor adventures.',
                'description' => 'The Resolve 2 Jacket by The North Face is made with waterproof and breathable fabric, featuring a hood and adjustable cuffs for extra protection during hikes or rainy weather.',
                'price' => 119.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/north-face-resolve-2-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Columbia Whirlibird Interchange Jacket',
                'slug' => 'columbia-whirlibird-jacket',
                'short_description' => 'Columbia 3-in-1 jacket with weatherproof versatility.',
                'description' => 'The Columbia Whirlibird Interchange Jacket features a waterproof shell and a removable insulated liner. Ideal for skiing, snowboarding, or any winter activity.',
                'price' => 199.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/columbia-whirlibird-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Adidas Essentials 3-Stripes Track Jacket',
                'slug' => 'adidas-essentials-track-jacket',
                'short_description' => 'Adidas lightweight track jacket with iconic 3-stripes design.',
                'description' => 'This Adidas track jacket offers a slim fit with soft, lightweight fabric and a zip closure. Perfect for workouts, sports, or casual wear.',
                'price' => 59.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/adidas-essentials-track-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Patagonia Nano Puff Jacket',
                'slug' => 'patagonia-nano-puff-jacket',
                'short_description' => 'Patagonia lightweight insulated jacket made with recycled materials.',
                'description' => 'The Patagonia Nano Puff Jacket is filled with PrimaLoft insulation for warmth and compressibility. It’s windproof, water-resistant, and eco-friendly.',
                'price' => 229.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/patagonia-nano-puff-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Superdry Everest Parka Jacket',
                'slug' => 'superdry-everest-parka-jacket',
                'short_description' => 'Superdry heavy-duty parka jacket with a faux fur-lined hood.',
                'description' => 'The Superdry Everest Parka features a quilted lining, multiple pockets, and a warm hood with faux fur trim. Built for extreme cold with stylish urban appeal.',
                'price' => 149.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/superdry-everest-parka-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Tommy Hilfiger Hooded Puffer Jacket',
                'slug' => 'tommy-hilfiger-puffer-jacket',
                'short_description' => 'Tommy Hilfiger insulated puffer jacket with signature branding.',
                'description' => 'This hooded puffer jacket by Tommy Hilfiger offers lightweight insulation, a water-resistant finish, and the brand’s iconic logo on the chest.',
                'price' => 129.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/tommy-hilfiger-puffer-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Calvin Klein Wool Blend Overcoat',
                'slug' => 'calvin-klein-wool-overcoat',
                'short_description' => 'Calvin Klein tailored wool overcoat for a sophisticated look.',
                'description' => 'This Calvin Klein overcoat is made from a soft wool blend and features a single-breasted design, slim fit, and notch lapel. Perfect for formal and semi-formal occasions.',
                'price' => 249.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/calvin-klein-wool-overcoat.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'H&M Faux Leather Biker Jacket',
                'slug' => 'hm-faux-leather-biker-jacket',
                'short_description' => 'H&M edgy faux leather biker jacket with zipper details.',
                'description' => 'This biker jacket from H&M is made from high-quality faux leather with quilted details and an asymmetrical zip closure. Perfect for a bold, modern look.',
                'price' => 79.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/hm-faux-leather-biker-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
            [
                'name' => 'Barbour Beacon Sports Jacket',
                'slug' => 'barbour-beacon-sports-jacket',
                'short_description' => 'Barbour waxed sports jacket with heritage-inspired design.',
                'description' => 'The Barbour Beacon Sports Jacket features a waxed cotton outer shell, tailored fit, and tartan lining. A versatile and durable choice for outdoor or casual use.',
                'price' => 299.99,
                'stock' => 120,
                'status' => 1,
                'category' => $mens_jackets_category,
                'unit_id' => 5,
                'images' => [
                    [
                        'path' => 'men-jackets/barbour-beacon-sports-jacket.png',
                        'is_primary' => '1'
                    ],
                ]
            ],
        ];


        $products = array_merge($products, $men_jacket_products);

        $mens_glasses_category = Category::where('slug', 'mens-fashion-glasses')->select('id', 'slug')->first();

        $men_glasses_products = [
                [
                    'name' => 'Ray-Ban Wayfarer Sunglasses',
                    'slug' => 'ray-ban-wayfarer-sunglasses',
                    'short_description' => 'Ray-Ban classic Wayfarer sunglasses with iconic style.',
                    'description' => 'These Ray-Ban Wayfarer sunglasses feature a durable acetate frame, UV protection, and a timeless design that suits all face shapes. Perfect for casual and formal outings.',
                    'price' => 159.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/ray-ban-wayfarer-sunglasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Oakley Holbrook Polarized Sunglasses',
                    'slug' => 'oakley-holbrook-polarized-sunglasses',
                    'short_description' => 'Oakley Holbrook sunglasses with polarized lenses for clarity.',
                    'description' => 'The Oakley Holbrook sunglasses offer a lightweight frame, polarized lenses for glare reduction, and a sporty yet stylish design. Ideal for outdoor activities.',
                    'price' => 199.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/oakley-holbrook-sunglasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Persol Rectangular Eyeglasses',
                    'slug' => 'persol-rectangular-eyeglasses',
                    'short_description' => 'Persol eyeglasses with a sleek rectangular frame and premium quality.',
                    'description' => 'These Persol eyeglasses feature hand-crafted acetate frames, anti-reflective lenses, and a lightweight design for all-day comfort. Perfect for a professional look.',
                    'price' => 249.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/persol-rectangular-eyeglasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Gucci Round Metal Glasses',
                    'slug' => 'gucci-round-metal-glasses',
                    'short_description' => 'Gucci metal glasses with a trendy round design and gold accents.',
                    'description' => 'The Gucci Round Metal Glasses offer a stylish and luxurious look with slim temples, adjustable nose pads, and high-quality lenses. Great for making a fashion statement.',
                    'price' => 349.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/gucci-round-metal-glasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Warby Parker Winston Eyeglasses',
                    'slug' => 'warby-parker-winston-eyeglasses',
                    'short_description' => 'Warby Parker eyeglasses with a bold square frame for a modern look.',
                    'description' => 'These Warby Parker Winston eyeglasses feature a thick acetate frame, scratch-resistant lenses, and an ultra-lightweight design. A stylish choice for everyday wear.',
                    'price' => 99.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/warby-parker-winston-eyeglasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Tom Ford FT5536 Eyeglasses',
                    'slug' => 'tom-ford-ft5536-eyeglasses',
                    'short_description' => 'Tom Ford eyeglasses with a sophisticated rectangular frame.',
                    'description' => 'The Tom Ford FT5536 eyeglasses feature a sleek metal and acetate combination, offering a luxurious look and high-quality lenses with anti-glare coating.',
                    'price' => 299.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/tom-ford-ft5536-eyeglasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Maui Jim Maverick Sunglasses',
                    'slug' => 'maui-jim-maverick-sunglasses',
                    'short_description' => 'Maui Jim aviator sunglasses with polarized lenses for UV protection.',
                    'description' => 'These Maui Jim Maverick sunglasses feature a lightweight titanium frame, polarized lenses for enhanced color and clarity, and an aviator design. Perfect for beach or travel.',
                    'price' => 279.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/maui-jim-maverick-sunglasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Carrera 1001/S Aviator Sunglasses',
                    'slug' => 'carrera-1001s-aviator-sunglasses',
                    'short_description' => 'Carrera stylish aviator sunglasses with a bold double-bridge design.',
                    'description' => 'The Carrera 1001/S sunglasses offer a contemporary twist on the classic aviator style. They feature durable polycarbonate lenses and lightweight metal frames.',
                    'price' => 149.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/carrera-1001s-sunglasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Police SPL872 Sunglasses',
                    'slug' => 'police-spl872-sunglasses',
                    'short_description' => 'Police sleek sunglasses with modern square frames.',
                    'description' => 'The Police SPL872 sunglasses combine urban style with premium craftsmanship. They offer lightweight frames, UV-protective lenses, and a bold design.',
                    'price' => 189.99,
                    'stock' => 95,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/police-spl872-sunglasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Prada Linea Rossa Sport Glasses',
                    'slug' => 'prada-linea-rossa-sport-glasses',
                    'short_description' => 'Prada sporty glasses with a streamlined design and luxury finish.',
                    'description' => 'These Prada Linea Rossa glasses feature a lightweight frame, rubberized temples for comfort, and stylish detailing for a sporty yet sophisticated look.',
                    'price' => 399.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $mens_glasses_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-glasses/prada-linea-rossa-glasses.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];

            $products = array_merge($products, $men_glasses_products);

            $mens_perfumes_category = Category::where('slug', 'mens-fashion-perfumes')->select('id', 'slug')->first();

            $men_perfume_products = [
                [
                    'name' => 'Dior Sauvage Eau de Parfum',
                    'slug' => 'dior-sauvage-eau-de-parfum',
                    'short_description' => 'Dior Sauvage with bold, fresh, and woody notes.',
                    'description' => 'Dior Sauvage Eau de Parfum is a captivating blend of bergamot, amberwood, and a hint of vanilla, perfect for an elegant and masculine scent.',
                    'price' => 149.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/dior-sauvage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Creed Aventus',
                    'slug' => 'creed-aventus',
                    'short_description' => 'Creed Aventus with a fruity and musky fragrance.',
                    'description' => 'Creed Aventus combines notes of pineapple, blackcurrant, and oakmoss to create a luxurious and powerful scent for men.',
                    'price' => 325.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/creed-aventus.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Bleu de Chanel Eau de Parfum',
                    'slug' => 'bleu-de-chanel-eau-de-parfum',
                    'short_description' => 'Bleu de Chanel with an aromatic woody fragrance.',
                    'description' => 'Bleu de Chanel Eau de Parfum features fresh citrus and sandalwood, ideal for a timeless and refined scent.',
                    'price' => 135.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/bleu-de-chanel.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Versace Eros',
                    'slug' => 'versace-eros',
                    'short_description' => 'Versace Eros with a bold and sensual fragrance.',
                    'description' => 'Versace Eros offers a fresh blend of mint, green apple, and tonka bean, inspired by Greek mythology for a confident appeal.',
                    'price' => 99.99,
                    'stock' => 140,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/versace-eros.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Tom Ford Noir Extreme',
                    'slug' => 'tom-ford-noir-extreme',
                    'short_description' => 'Tom Ford Noir Extreme with an oriental woody scent.',
                    'description' => 'Tom Ford Noir Extreme is a bold blend of cardamom, orange blossom, and sandalwood for an intriguing and sophisticated aroma.',
                    'price' => 165.99,
                    'stock' => 75,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/tom-ford-noir-extreme.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Hugo Boss Bottled Night',
                    'slug' => 'hugo-boss-bottled-night',
                    'short_description' => 'Hugo Boss Bottled Night with a deep, woody fragrance.',
                    'description' => 'Hugo Boss Bottled Night features notes of birch leaves, cardamom, and louro amarelo wood for a striking and masculine scent.',
                    'price' => 89.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/hugo-boss-bottled-night.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Giorgio Armani Acqua di Gio',
                    'slug' => 'giorgio-armani-acqua-di-gio',
                    'short_description' => 'Giorgio Armani Acqua di Gio with a fresh aquatic scent.',
                    'description' => 'Acqua di Gio blends sea notes, lime, and jasmine to evoke a sense of freshness and tranquility, perfect for everyday use.',
                    'price' => 125.99,
                    'stock' => 130,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/acqua-di-gio.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Paco Rabanne 1 Million',
                    'slug' => 'paco-rabanne-1-million',
                    'short_description' => 'Paco Rabanne 1 Million with a spicy leather fragrance.',
                    'description' => '1 Million features notes of cinnamon, leather, and amber for a bold and charismatic scent.',
                    'price' => 99.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/paco-rabanne-1-million.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Yves Saint Laurent La Nuit de L’Homme',
                    'slug' => 'ysl-la-nuit-de-lhomme',
                    'short_description' => 'YSL La Nuit de L’Homme with an alluring spicy scent.',
                    'description' => 'La Nuit de L’Homme combines cardamom, cedarwood, and coumarin for a seductive and elegant fragrance.',
                    'price' => 129.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/ysl-la-nuit-de-lhomme.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Burberry London for Men',
                    'slug' => 'burberry-london-for-men',
                    'short_description' => 'Burberry London with a warm, spicy fragrance.',
                    'description' => 'Burberry London blends lavender, bergamot, and tobacco leaf for a refined and classic scent, suitable for evening wear.',
                    'price' => 89.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $mens_perfumes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'men-perfumes/burberry-london.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];

        $products = array_merge($products, $men_perfume_products);    

        $women_dress_category = Category::where('slug', 'womens-fashion-dress')->select('id', 'slug')->first();

        $women_dress_products = [
                [
                    'name' => 'Zara Floral Maxi Dress',
                    'slug' => 'zara-floral-maxi-dress',
                    'short_description' => 'Zara floral maxi dress with a flowy and elegant design.',
                    'description' => 'This Zara floral maxi dress features a lightweight fabric, perfect for casual outings or summer events. It offers a relaxed fit with vibrant floral prints.',
                    'price' => 89.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/zara-floral-maxi-dress.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'H&M Sleeveless Bodycon Dress',
                    'slug' => 'hm-sleeveless-bodycon-dress',
                    'short_description' => 'H&M sleeveless bodycon dress for a chic and modern look.',
                    'description' => 'The H&M bodycon dress features a sleek and stretchable fabric, enhancing the silhouette. Ideal for parties and formal gatherings.',
                    'price' => 59.99,
                    'stock' => 200,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/hm-sleeveless-bodycon-dress.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Forever 21 Off-Shoulder Mini Dress',
                    'slug' => 'forever-21-off-shoulder-mini-dress',
                    'short_description' => 'Forever 21 off-shoulder mini dress with a trendy design.',
                    'description' => 'This mini dress by Forever 21 features an off-shoulder design with ruffle details, perfect for casual or semi-formal outings.',
                    'price' => 49.99,
                    'stock' => 180,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/forever-21-off-shoulder-mini-dress.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Mango Wrap Midi Dress',
                    'slug' => 'mango-wrap-midi-dress',
                    'short_description' => 'Mango wrap midi dress with a flattering fit.',
                    'description' => 'The Mango wrap midi dress features a v-neckline, adjustable waist tie, and a soft fabric, making it versatile for day or evening wear.',
                    'price' => 69.99,
                    'stock' => 140,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/mango-wrap-midi-dress.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Sabyasachi Silk Saree',
                    'slug' => 'sabyasachi-silk-saree',
                    'short_description' => 'Sabyasachi pure silk saree with intricate embroidery.',
                    'description' => 'This luxurious silk saree by Sabyasachi features handwoven patterns, intricate zari work, and a vibrant pallu, perfect for weddings or special occasions.',
                    'price' => 1499.99,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/sabyasachi-silk-saree.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Anarkali Floor-Length Gown',
                    'slug' => 'anarkali-floor-length-gown',
                    'short_description' => 'Elegant Anarkali gown with a flowy silhouette.',
                    'description' => 'This Anarkali gown features a floor-length design with rich embroidery and mirror work, making it perfect for festive and formal occasions.',
                    'price' => 249.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/anarkali-floor-length-gown.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Lehenga Choli with Dupatta',
                    'slug' => 'lehenga-choli-with-dupatta',
                    'short_description' => 'Designer lehenga choli with detailed embellishments.',
                    'description' => 'This stunning lehenga choli set features heavy embroidery, a matching dupatta, and a flattering fit, perfect for weddings or grand celebrations.',
                    'price' => 399.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/lehenga-choli-with-dupatta.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Banarasi Silk Saree',
                    'slug' => 'banarasi-silk-saree',
                    'short_description' => 'Traditional Banarasi silk saree with golden zari work.',
                    'description' => 'The Banarasi silk saree showcases timeless craftsmanship with intricate motifs and a luxurious texture, ideal for weddings and cultural events.',
                    'price' => 999.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/banarasi-silk-saree.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Punjabi Patiala Suit',
                    'slug' => 'punjabi-patiala-suit',
                    'short_description' => 'Comfortable and stylish Punjabi Patiala suit.',
                    'description' => 'This Patiala suit set includes a printed kameez, matching Patiala salwar, and a light dupatta, perfect for casual and festive wear.',
                    'price' => 79.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/punjabi-patiala-suit.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Gucci Silk Evening Gown',
                    'slug' => 'gucci-silk-evening-gown',
                    'short_description' => 'Gucci silk evening gown with a luxurious feel.',
                    'description' => 'This Gucci evening gown is crafted with premium silk, featuring a flowing design and intricate detailing for high-end occasions.',
                    'price' => 899.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $women_dress_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-dresses/gucci-silk-evening-gown.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $women_dress_products); 

        $women_handbag_category = Category::where('slug', 'womens-fashion-handbags')->select('id', 'slug')->first();

        $women_handbag_products = [
                    [
                        'name' => 'Louis Vuitton Neverfull MM',
                        'slug' => 'louis-vuitton-neverfull-mm',
                        'short_description' => 'Iconic Louis Vuitton Neverfull MM tote with monogram canvas.',
                        'description' => 'This luxury tote bag from Louis Vuitton features a spacious interior, durable monogram canvas, and adjustable side laces for added elegance and functionality.',
                        'price' => 1999.99,
                        'stock' => 20,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/louis-vuitton-neverfull-mm.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Coach Tabby Shoulder Bag',
                        'slug' => 'coach-tabby-shoulder-bag',
                        'short_description' => 'Coach Tabby shoulder bag in polished pebble leather.',
                        'description' => 'The Coach Tabby bag offers a contemporary design with a structured silhouette, magnetic snap closure, and detachable straps for versatile styling.',
                        'price' => 349.99,
                        'stock' => 50,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/coach-tabby-shoulder-bag.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Hidesign Cerys Shoulder Bag',
                        'slug' => 'hidesign-cerys-shoulder-bag',
                        'short_description' => 'Hidesign leather shoulder bag with handcrafted detailing.',
                        'description' => 'This Hidesign Cerys bag is made from premium vegetable-tanned leather, featuring a sophisticated design, spacious compartments, and a chic look.',
                        'price' => 199.99,
                        'stock' => 60,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/hidesign-cerys-shoulder-bag.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Da Milano Tote Bag',
                        'slug' => 'da-milano-tote-bag',
                        'short_description' => 'Elegant Da Milano tote bag with textured leather.',
                        'description' => 'The Da Milano tote bag features high-quality textured leather, polished hardware, and ample storage, making it a perfect companion for everyday use.',
                        'price' => 249.99,
                        'stock' => 40,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/da-milano-tote-bag.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Michael Kors Jet Set Crossbody',
                        'slug' => 'michael-kors-jet-set-crossbody',
                        'short_description' => 'Michael Kors Jet Set crossbody bag in saffiano leather.',
                        'description' => 'This crossbody bag by Michael Kors features saffiano leather construction, adjustable straps, and a compact design for effortless style on the go.',
                        'price' => 199.99,
                        'stock' => 80,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/michael-kors-jet-set-crossbody.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Lavie Delsey Satchel',
                        'slug' => 'lavie-delsey-satchel',
                        'short_description' => 'Lavie Delsey satchel with modern and versatile design.',
                        'description' => 'The Lavie Delsey satchel bag features a spacious interior, double handles, and a detachable sling strap, perfect for work and casual outings.',
                        'price' => 59.99,
                        'stock' => 120,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/lavie-delsey-satchel.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Fossil Ryder Leather Tote',
                        'slug' => 'fossil-ryder-leather-tote',
                        'short_description' => 'Fossil Ryder tote bag with a vintage-inspired design.',
                        'description' => 'The Fossil Ryder tote bag offers a timeless look with genuine leather, multiple compartments, and a comfortable carrying experience.',
                        'price' => 179.99,
                        'stock' => 70,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/fossil-ryder-leather-tote.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Zouk Vegan Handbag',
                        'slug' => 'zouk-vegan-handbag',
                        'short_description' => 'Zouk handcrafted vegan handbag with Indian prints.',
                        'description' => 'This Zouk handbag features vibrant Indian-inspired prints, eco-friendly materials, and a functional design, blending tradition and modernity.',
                        'price' => 49.99,
                        'stock' => 150,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/zouk-vegan-handbag.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Caprese Adele Handbag',
                        'slug' => 'caprese-adele-handbag',
                        'short_description' => 'Caprese Adele handbag with sleek and modern style.',
                        'description' => 'The Caprese Adele handbag offers a lightweight design with multiple pockets and durable material, perfect for everyday essentials.',
                        'price' => 79.99,
                        'stock' => 100,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/caprese-adele-handbag.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Baggit Tote Bag',
                        'slug' => 'baggit-tote-bag',
                        'short_description' => 'Baggit tote bag with a minimalist and eco-friendly design.',
                        'description' => 'This Baggit tote bag is crafted with vegan leather, offering a spacious compartment, sturdy handles, and a casual yet stylish look.',
                        'price' => 39.99,
                        'stock' => 140,
                        'status' => 1,
                        'category' => $women_handbag_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-handbags/baggit-tote-bag.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                ];

        $products = array_merge($products, $women_handbag_products);

        $women_watch_category = Category::where('slug', 'womens-fashion-watches')->select('id', 'slug')->first();

        $women_watches_products =[
                    [
                        'name' => 'Michael Kors Parker Chronograph Watch',
                        'slug' => 'michael-kors-parker-watch',
                        'short_description' => 'Michael Kors Parker chronograph watch with a crystal-embellished bezel.',
                        'description' => 'The Michael Kors Parker watch features a stainless-steel case, a stunning crystal bezel, and multifunction sub-dials for an elegant and functional timepiece.',
                        'price' => 299.99,
                        'stock' => 30,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/michael-kors-parker-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Fossil Virginia Quartz Watch',
                        'slug' => 'fossil-virginia-quartz-watch',
                        'short_description' => 'Fossil Virginia quartz watch with a delicate design.',
                        'description' => 'This Fossil Virginia watch offers a sleek, feminine design with stainless steel construction, Roman numeral markers, and crystal accents for added sparkle.',
                        'price' => 159.99,
                        'stock' => 50,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/fossil-virginia-quartz-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Titan Raga Viva Analog Watch',
                        'slug' => 'titan-raga-viva-analog-watch',
                        'short_description' => 'Titan Raga Viva watch with a floral-inspired dial.',
                        'description' => 'The Titan Raga Viva analog watch features a gold-tone case, intricate floral patterns on the dial, and a premium leather strap for a sophisticated touch.',
                        'price' => 119.99,
                        'stock' => 40,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/titan-raga-viva-analog-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Daniel Wellington Petite Melrose Watch',
                        'slug' => 'daniel-wellington-petite-melrose-watch',
                        'short_description' => 'Daniel Wellington Petite Melrose watch with rose gold mesh strap.',
                        'description' => 'The Daniel Wellington Petite Melrose watch offers a minimalist design with a white dial, slim hands, and a sleek rose gold mesh strap for a modern look.',
                        'price' => 199.99,
                        'stock' => 60,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/daniel-wellington-petite-melrose-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Guess Nova Diamond Dial Watch',
                        'slug' => 'guess-nova-diamond-dial-watch',
                        'short_description' => 'Guess Nova watch with diamond accents on the dial.',
                        'description' => 'The Guess Nova watch features a polished stainless steel case, diamond-accented dial, and an elegant bracelet strap for a glamorous look.',
                        'price' => 249.99,
                        'stock' => 25,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/guess-nova-diamond-dial-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Anne Klein Bracelet Watch',
                        'slug' => 'anne-klein-bracelet-watch',
                        'short_description' => 'Anne Klein bracelet watch with a mother-of-pearl dial.',
                        'description' => 'This Anne Klein watch combines classic style with a sleek bracelet design, featuring a mother-of-pearl dial and a gold-tone finish.',
                        'price' => 99.99,
                        'stock' => 80,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/anne-klein-bracelet-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Rado Florence Automatic Watch',
                        'slug' => 'rado-florence-automatic-watch',
                        'short_description' => 'Rado Florence automatic watch with sapphire crystal.',
                        'description' => 'The Rado Florence watch features a sleek stainless steel bracelet, automatic movement, and a scratch-resistant sapphire crystal, offering elegance and durability.',
                        'price' => 999.99,
                        'stock' => 10,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/rado-florence-automatic-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Casio Sheen Swarovski Crystal Watch',
                        'slug' => 'casio-sheen-swarovski-crystal-watch',
                        'short_description' => 'Casio Sheen watch with Swarovski crystal embellishments.',
                        'description' => 'The Casio Sheen watch combines fashion and functionality with Swarovski crystals, a chronograph dial, and a durable stainless steel band.',
                        'price' => 179.99,
                        'stock' => 70,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/casio-sheen-swarovski-crystal-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Tissot Flamingo Ladies Watch',
                        'slug' => 'tissot-flamingo-ladies-watch',
                        'short_description' => 'Tissot Flamingo ladies watch with a sleek and timeless design.',
                        'description' => 'The Tissot Flamingo watch features a stainless steel case, quartz movement, and a minimalist aesthetic, perfect for both casual and formal occasions.',
                        'price' => 299.99,
                        'stock' => 20,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/tissot-flamingo-ladies-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Sonata Ocean Series Watch',
                        'slug' => 'sonata-ocean-series-watch',
                        'short_description' => 'Sonata Ocean Series women’s watch with water resistance.',
                        'description' => 'This Sonata Ocean Series watch is designed for active women, offering water resistance, a durable case, and a sporty design for everyday wear.',
                        'price' => 49.99,
                        'stock' => 100,
                        'status' => 1,
                        'category' => $women_watch_category,
                        'unit_id' => 5,
                        'images' => [
                            [
                                'path' => 'women-watches/sonata-ocean-series-watch.png',
                                'is_primary' => '1'
                            ],
                        ]
                    ],
                ];

        $products = array_merge($products, $women_watches_products);    

        $women_perfume_category = Category::where('slug', 'womens-fashion-women-perfumes')->select('id', 'slug')->first();

        $women_perfumes_products = [
                [
                    'name' => 'Chanel No. 5 Eau de Parfum',
                    'slug' => 'chanel-no-5-eau-de-parfum',
                    'short_description' => 'The iconic Chanel No. 5 Eau de Parfum with timeless floral notes.',
                    'description' => 'Chanel No. 5 is a legendary perfume with an elegant blend of floral aldehydes, jasmine, and rose, creating a timeless and sophisticated fragrance.',
                    'price' => 149.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/chanel-no-5-eau-de-parfum.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Dior J’adore Eau de Parfum',
                    'slug' => 'dior-j-adore-eau-de-parfum',
                    'short_description' => 'Dior J’adore with a luxurious floral bouquet.',
                    'description' => 'Dior J’adore is a radiant and sophisticated fragrance featuring a blend of ylang-ylang, Damascus rose, and jasmine sambac for a floral delight.',
                    'price' => 139.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/dior-j-adore-eau-de-parfum.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Gucci Bloom Eau de Parfum',
                    'slug' => 'gucci-bloom-eau-de-parfum',
                    'short_description' => 'Gucci Bloom with a blend of tuberose and jasmine.',
                    'description' => 'Gucci Bloom captures the essence of a thriving garden with notes of tuberose, jasmine, and Rangoon creeper, offering a fresh and vibrant fragrance.',
                    'price' => 119.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/gucci-bloom-eau-de-parfum.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Yves Saint Laurent Black Opium',
                    'slug' => 'yves-saint-laurent-black-opium',
                    'short_description' => 'YSL Black Opium with bold and addictive notes.',
                    'description' => 'YSL Black Opium is a seductive fragrance with a mix of coffee, vanilla, and orange blossom, offering a bold and glamorous scent.',
                    'price' => 129.99,
                    'stock' => 35,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/yves-saint-laurent-black-opium.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Lancome La Vie Est Belle',
                    'slug' => 'lancome-la-vie-est-belle',
                    'short_description' => 'Lancome La Vie Est Belle with sweet and floral tones.',
                    'description' => 'Lancome La Vie Est Belle features notes of iris, praline, and patchouli, creating a warm, sweet, and luxurious fragrance.',
                    'price' => 124.99,
                    'stock' => 45,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/lancome-la-vie-est-belle.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Calvin Klein Euphoria',
                    'slug' => 'calvin-klein-euphoria',
                    'short_description' => 'Calvin Klein Euphoria with exotic fruit and floral notes.',
                    'description' => 'Calvin Klein Euphoria is an enchanting fragrance with notes of pomegranate, orchid, and mahogany, creating a mysterious and seductive scent.',
                    'price' => 89.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/calvin-klein-euphoria.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Versace Bright Crystal',
                    'slug' => 'versace-bright-crystal',
                    'short_description' => 'Versace Bright Crystal with fresh and vibrant notes.',
                    'description' => 'Versace Bright Crystal is a delightful fragrance with a blend of pomegranate, peony, and lotus flower, offering a fresh and feminine scent.',
                    'price' => 99.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/versace-bright-crystal.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Burberry Her Eau de Parfum',
                    'slug' => 'burberry-her-eau-de-parfum',
                    'short_description' => 'Burberry Her with a fruity and floral composition.',
                    'description' => 'Burberry Her is a vibrant fragrance with notes of dark berries, jasmine, and musk, creating a youthful and energetic scent.',
                    'price' => 109.99,
                    'stock' => 55,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/burberry-her-eau-de-parfum.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Narciso Rodriguez For Her',
                    'slug' => 'narciso-rodriguez-for-her',
                    'short_description' => 'Narciso Rodriguez For Her with sensual musk notes.',
                    'description' => 'Narciso Rodriguez For Her is a sophisticated fragrance with a blend of musk, amber, and floral notes, offering a soft and alluring scent.',
                    'price' => 129.99,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/narciso-rodriguez-for-her.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Fogg I Am Queen Perfume',
                    'slug' => 'fogg-i-am-queen-perfume',
                    'short_description' => 'Fogg I Am Queen with an exotic and long-lasting scent.',
                    'description' => 'Fogg I Am Queen is an Indian fragrance featuring a unique blend of floral, fruity, and woody notes, perfect for everyday wear.',
                    'price' => 29.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $women_perfume_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'women-perfumes/fogg-i-am-queen-perfume.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $women_perfumes_products);

         $kids_toy_category = Category::where('slug', 'kids-baby-products-toys')->select('id', 'slug')->first();

        $kids_toy_products = [
                [
                    'name' => 'LEGO Classic Creative Bricks',
                    'slug' => 'lego-classic-creative-bricks',
                    'short_description' => 'A LEGO set with colorful bricks to inspire creativity.',
                    'description' => 'The LEGO Classic Creative Bricks set includes a variety of colorful bricks, wheels, and eyes to encourage imaginative play and creativity.',
                    'price' => 29.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/lego-classic-creative-bricks.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Barbie Dreamhouse Playset',
                    'slug' => 'barbie-dreamhouse-playset',
                    'short_description' => 'A deluxe Barbie Dreamhouse with lights and sound effects.',
                    'description' => 'The Barbie Dreamhouse Playset includes multiple rooms, an elevator, and over 70 accessories for hours of creative role-play fun.',
                    'price' => 199.99,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/barbie-dreamhouse-playset.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Hot Wheels Ultimate Garage',
                    'slug' => 'hot-wheels-ultimate-garage',
                    'short_description' => 'Hot Wheels garage with multiple parking levels and a shark attack feature.',
                    'description' => 'The Hot Wheels Ultimate Garage includes parking for over 90 cars, a loop track, and an exciting shark attack challenge for endless racing adventures.',
                    'price' => 119.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/hot-wheels-ultimate-garage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Play-Doh Modeling Compound 10-Pack',
                    'slug' => 'play-doh-modeling-compound-10-pack',
                    'short_description' => 'A 10-pack of Play-Doh modeling compound in vibrant colors.',
                    'description' => 'This Play-Doh pack includes 10 cans of colorful modeling compound for creative sculpting and imaginative play.',
                    'price' => 14.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/play-doh-modeling-compound-10-pack.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Nerf Elite 2.0 Commander Blaster',
                    'slug' => 'nerf-elite-2-commander-blaster',
                    'short_description' => 'A Nerf blaster with a rotating barrel and 12-dart capacity.',
                    'description' => 'The Nerf Elite 2.0 Commander Blaster features a 6-dart rotating barrel, tactical rails, and comes with 12 Nerf Elite darts for action-packed fun.',
                    'price' => 24.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/nerf-elite-2-commander-blaster.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Fisher-Price Laugh & Learn Smart Stages Chair',
                    'slug' => 'fisher-price-laugh-and-learn-smart-stages-chair',
                    'short_description' => 'Interactive chair with songs and learning activities for toddlers.',
                    'description' => 'The Fisher-Price Laugh & Learn Smart Stages Chair features songs, phrases, and interactive activities to help toddlers learn and play.',
                    'price' => 49.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/fisher-price-laugh-and-learn-smart-stages-chair.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Melissa & Doug Wooden Building Blocks',
                    'slug' => 'melissa-and-doug-wooden-building-blocks',
                    'short_description' => 'A set of 100 wooden blocks in various shapes and colors.',
                    'description' => 'This Melissa & Doug wooden block set includes 100 durable wooden blocks in bright colors and classic shapes for creative building.',
                    'price' => 19.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/melissa-and-doug-wooden-building-blocks.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'VTech KidiZoom Smartwatch DX2',
                    'slug' => 'vtech-kidizoom-smartwatch-dx2',
                    'short_description' => 'A kid-friendly smartwatch with games, a camera, and learning activities.',
                    'description' => 'The VTech KidiZoom Smartwatch DX2 features a built-in camera, interactive games, and a durable design perfect for young kids.',
                    'price' => 64.99,
                    'stock' => 35,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/vtech-kidizoom-smartwatch-dx2.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Little Tikes Cozy Coupe',
                    'slug' => 'little-tikes-cozy-coupe',
                    'short_description' => 'A classic ride-on toy car for kids.',
                    'description' => 'The Little Tikes Cozy Coupe is a durable ride-on car with a working horn, removable floorboard, and fun graphics for endless play.',
                    'price' => 59.99,
                    'stock' => 20,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/little-tikes-cozy-coupe.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Crayola Inspiration Art Case',
                    'slug' => 'crayola-inspiration-art-case',
                    'short_description' => 'A 140-piece Crayola art set with crayons, markers, and more.',
                    'description' => 'The Crayola Inspiration Art Case includes 140 art supplies, including crayons, markers, and colored pencils, all organized in a portable case.',
                    'price' => 29.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $kids_toy_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-toys/crayola-inspiration-art-case.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $kids_toy_products);

        $kids_diapers_category = Category::where('slug', 'kids-baby-products-diapers')->select('id', 'slug')->first();

        $kids_diaper_products = [
                [
                    'name' => 'Pampers Premium Care Diapers',
                    'slug' => 'pampers-premium-care-diapers',
                    'short_description' => 'Pampers Premium Care Diapers with ultra-soft material and superior leakage protection.',
                    'description' => 'Pampers Premium Care Diapers offer 5-star skin protection with breathable material, wetness indicator, and extra dryness for ultimate comfort.',
                    'price' => 29.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/pampers-premium-care-diapers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Huggies Little Snugglers',
                    'slug' => 'huggies-little-snugglers',
                    'short_description' => 'Huggies Little Snugglers with a pocketed waistband for newborns.',
                    'description' => 'Huggies Little Snugglers are designed with a gentle absorb liner, leak lock system, and umbilical cord cut-out for newborns.',
                    'price' => 24.99,
                    'stock' => 200,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/huggies-little-snugglers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Mamypoko Pants Extra Absorb',
                    'slug' => 'mamypoko-pants-extra-absorb',
                    'short_description' => 'Mamypoko Pants with extra absorbency for all-night protection.',
                    'description' => 'Mamypoko Pants Extra Absorb diapers feature an easy-to-wear pant style with up to 12 hours of protection and a soft, comfortable fit.',
                    'price' => 19.99,
                    'stock' => 250,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/mamypoko-pants-extra-absorb.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Luvs Ultra Leakguards Diapers',
                    'slug' => 'luvs-ultra-leakguards-diapers',
                    'short_description' => 'Luvs diapers with night lock technology for leakage protection.',
                    'description' => 'Luvs Ultra Leakguards feature triple leakguards, soft material, and an absorbent core for day and night protection.',
                    'price' => 21.99,
                    'stock' => 180,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/luvs-ultra-leakguards-diapers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'The Honest Company Baby Diapers',
                    'slug' => 'honest-company-baby-diapers',
                    'short_description' => 'Plant-based baby diapers with cute designs and excellent absorbency.',
                    'description' => 'Honest Company diapers are hypoallergenic, eco-friendly, and feature adorable designs with enhanced leak protection and softness.',
                    'price' => 27.99,
                    'stock' => 130,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/honest-company-baby-diapers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Huggies Little Movers',
                    'slug' => 'huggies-little-movers',
                    'short_description' => 'Huggies diapers with double grip strips for active babies.',
                    'description' => 'Huggies Little Movers provide a snug fit with leak lock protection, ideal for babies on the go, ensuring comfort and dryness.',
                    'price' => 25.99,
                    'stock' => 170,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/huggies-little-movers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pampers Cruisers 360° Fit',
                    'slug' => 'pampers-cruisers-360-fit',
                    'short_description' => 'Pampers Cruisers diapers with a 360° stretchy waistband.',
                    'description' => 'Pampers Cruisers 360° Fit diapers are designed with stretchy waistbands, air-dry channels, and superior absorbency for a comfortable fit.',
                    'price' => 26.99,
                    'stock' => 140,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/pampers-cruisers-360-fit.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Seventh Generation Free & Clear Diapers',
                    'slug' => 'seventh-generation-free-and-clear-diapers',
                    'short_description' => 'Eco-friendly diapers made with sustainably sourced materials.',
                    'description' => 'Seventh Generation Free & Clear diapers are hypoallergenic, made without harmful chemicals, and feature excellent leak protection for sensitive skin.',
                    'price' => 29.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/seventh-generation-free-and-clear-diapers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Himalaya Total Care Baby Pants',
                    'slug' => 'himalaya-total-care-baby-pants',
                    'short_description' => 'Himalaya baby diapers with an anti-rash shield.',
                    'description' => 'Himalaya Total Care Baby Pants are enriched with aloe vera and yashad bhasma to prevent rashes and provide gentle care for baby skin.',
                    'price' => 17.99,
                    'stock' => 220,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/himalaya-total-care-baby-pants.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Bambo Nature Eco-Friendly Diapers',
                    'slug' => 'bambo-nature-eco-friendly-diapers',
                    'short_description' => 'Bambo Nature eco-friendly diapers with a soft and breathable design.',
                    'description' => 'Bambo Nature diapers are environmentally friendly and dermatologically tested, offering excellent absorbency and comfort for babies.',
                    'price' => 31.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $kids_diapers_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-diapers/bambo-nature-eco-friendly-diapers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $kids_diaper_products); 

        $kids_clothes_category = Category::where('slug', 'kids-baby-products-clothes')->select('id', 'slug')->first();

        $kids_clothes_products = [
                [
                    'name' => 'Carter’s Baby Boys’ 3-Piece Set',
                    'slug' => 'carters-baby-boys-3-piece-set',
                    'short_description' => 'A cozy 3-piece outfit with a bodysuit, pants, and hoodie.',
                    'description' => 'This Carter’s Baby Boys’ 3-piece set includes a soft cotton bodysuit, stretchy pants, and a hoodie with cute animal prints, perfect for everyday wear.',
                    'price' => 29.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/carters-baby-boys-3-piece-set.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Gini & Jony Cotton T-Shirt',
                    'slug' => 'gini-and-jony-cotton-t-shirt',
                    'short_description' => 'A soft cotton t-shirt for boys with playful prints.',
                    'description' => 'The Gini & Jony Cotton T-Shirt is made from breathable fabric, offering a relaxed fit with vibrant designs for kids’ comfort and style.',
                    'price' => 12.99,
                    'stock' => 200,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/gini-and-jony-cotton-t-shirt.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Babyhug Full Sleeve Party Dress',
                    'slug' => 'babyhug-full-sleeve-party-dress',
                    'short_description' => 'Elegant party dress for girls with floral patterns.',
                    'description' => 'The Babyhug Full Sleeve Party Dress features delicate floral embroidery, a satin bow, and a comfortable fit, perfect for special occasions.',
                    'price' => 34.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/babyhug-full-sleeve-party-dress.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Adidas Kids Tracksuit',
                    'slug' => 'adidas-kids-tracksuit',
                    'short_description' => 'A comfortable tracksuit for active kids.',
                    'description' => 'This Adidas Kids Tracksuit includes a full-zip jacket and matching pants, made with soft fabric for sporty style and all-day comfort.',
                    'price' => 49.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/adidas-kids-tracksuit.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'H&M Kids Denim Jacket',
                    'slug' => 'hm-kids-denim-jacket',
                    'short_description' => 'A stylish denim jacket for boys and girls.',
                    'description' => 'The H&M Kids Denim Jacket features a button-down design with a classic fit, perfect for layering over casual outfits.',
                    'price' => 39.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/hm-kids-denim-jacket.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Mothercare Baby Sleepsuit',
                    'slug' => 'mothercare-baby-sleepsuit',
                    'short_description' => 'A soft sleepsuit for babies with snap buttons.',
                    'description' => 'The Mothercare Baby Sleepsuit is made from 100% cotton, featuring adorable prints and easy snap buttons for quick diaper changes.',
                    'price' => 18.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/mothercare-baby-sleepsuit.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'US Polo Assn. Kids Polo Shirt',
                    'slug' => 'us-polo-assn-kids-polo-shirt',
                    'short_description' => 'A classic polo shirt for boys with a logo design.',
                    'description' => 'The US Polo Assn. Kids Polo Shirt is crafted from breathable cotton fabric, perfect for casual wear with its stylish logo and tailored fit.',
                    'price' => 24.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/us-polo-assn-kids-polo-shirt.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pepe Jeans Kids Slim Fit Jeans',
                    'slug' => 'pepe-jeans-kids-slim-fit-jeans',
                    'short_description' => 'Stylish slim-fit jeans for kids with stretch fabric.',
                    'description' => 'The Pepe Jeans Kids Slim Fit Jeans are designed with a trendy look, featuring durable stretch fabric and a comfortable waistband for everyday wear.',
                    'price' => 29.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/pepe-jeans-kids-slim-fit-jeans.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Zara Kids Printed Sweatshirt',
                    'slug' => 'zara-kids-printed-sweatshirt',
                    'short_description' => 'A trendy printed sweatshirt for kids.',
                    'description' => 'The Zara Kids Printed Sweatshirt features a cozy fabric and eye-catching designs, ideal for casual outings during cooler days.',
                    'price' => 27.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/zara-kids-printed-sweatshirt.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Gap Kids Striped Dress',
                    'slug' => 'gap-kids-striped-dress',
                    'short_description' => 'A striped dress for girls with a flared skirt.',
                    'description' => 'The Gap Kids Striped Dress is made from soft cotton fabric with a playful striped pattern, featuring a comfortable fit and flared skirt for all-day wear.',
                    'price' => 32.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $kids_clothes_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'kids-clothes/gap-kids-striped-dress.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];

        $products = array_merge($products, $kids_clothes_products);    
            
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