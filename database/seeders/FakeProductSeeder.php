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

        $home_decore_category = Category::where('slug', 'home-decor-accessories-furniture')->select('id', 'slug')->first();

        $home_decore_furniture_products = [
                [
                    'name' => 'Ikea Kallax Shelf Unit',
                    'slug' => 'ikea-kallax-shelf-unit',
                    'short_description' => 'A versatile shelf unit for stylish storage solutions.',
                    'description' => 'The Ikea Kallax Shelf Unit offers a modern design with multiple compartments, perfect for books, decorative items, or storage baskets. Durable and easy to assemble.',
                    'price' => 89.99,
                    'stock' => 75,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/ikea-kallax-shelf-unit.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Urban Ladder Vesta Sofa Set',
                    'slug' => 'urban-ladder-vesta-sofa-set',
                    'short_description' => 'A comfortable 3-seater sofa with modern aesthetics.',
                    'description' => 'The Urban Ladder Vesta Sofa Set combines plush cushions with a sleek wooden frame. Perfect for living rooms, offering style and comfort.',
                    'price' => 399.99,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/urban-ladder-vesta-sofa-set.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Ashley North Shore Dining Table',
                    'slug' => 'ashley-north-shore-dining-table',
                    'short_description' => 'An elegant dining table with a rich wood finish.',
                    'description' => 'The Ashley North Shore Dining Table features a classic design with intricate detailing, crafted from high-quality wood for durability and sophistication.',
                    'price' => 599.99,
                    'stock' => 20,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/ashley-north-shore-dining-table.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'West Elm Mid-Century Nightstand',
                    'slug' => 'west-elm-mid-century-nightstand',
                    'short_description' => 'A stylish nightstand with clean lines and ample storage.',
                    'description' => 'The West Elm Mid-Century Nightstand combines retro charm with functionality. Features a drawer and an open shelf for storage.',
                    'price' => 199.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/west-elm-mid-century-nightstand.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pepperfry Alexis TV Unit',
                    'slug' => 'pepperfry-alexis-tv-unit',
                    'short_description' => 'A modern TV unit with storage compartments.',
                    'description' => 'The Pepperfry Alexis TV Unit features a sleek design with multiple shelves for media devices and decorative items, perfect for contemporary homes.',
                    'price' => 149.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/pepperfry-alexis-tv-unit.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Wayfair Aisha Coffee Table',
                    'slug' => 'wayfair-aisha-coffee-table',
                    'short_description' => 'A chic coffee table with a tempered glass top.',
                    'description' => 'The Wayfair Aisha Coffee Table features a durable glass surface and a sleek metal frame, adding elegance to your living room décor.',
                    'price' => 129.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/wayfair-aisha-coffee-table.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Godrej Interio Slimline Wardrobe',
                    'slug' => 'godrej-interio-slimline-wardrobe',
                    'short_description' => 'A sturdy and spacious wardrobe with a sleek design.',
                    'description' => 'The Godrej Interio Slimline Wardrobe offers ample storage with shelves and a hanging rod, crafted with durable materials and a modern finish.',
                    'price' => 349.99,
                    'stock' => 25,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/godrej-interio-slimline-wardrobe.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'CB2 Peekaboo Acrylic Console Table',
                    'slug' => 'cb2-peekaboo-acrylic-console-table',
                    'short_description' => 'A minimalist console table with a transparent design.',
                    'description' => 'The CB2 Peekaboo Acrylic Console Table adds a modern touch to any room. Crafted from durable acrylic, it blends seamlessly into various interiors.',
                    'price' => 299.99,
                    'stock' => 35,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/cb2-peekaboo-acrylic-console-table.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pottery Barn Cushioned Armchair',
                    'slug' => 'pottery-barn-cushioned-armchair',
                    'short_description' => 'A cozy armchair with plush cushions for relaxation.',
                    'description' => 'The Pottery Barn Cushioned Armchair is designed for comfort and style, featuring soft upholstery and sturdy wooden legs.',
                    'price' => 259.99,
                    'stock' => 45,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/pottery-barn-cushioned-armchair.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Nilkamal Plastic Chair Set',
                    'slug' => 'nilkamal-plastic-chair-set',
                    'short_description' => 'A set of durable and lightweight plastic chairs.',
                    'description' => 'The Nilkamal Plastic Chair Set is perfect for indoor and outdoor use, featuring an ergonomic design and sturdy construction for long-lasting use.',
                    'price' => 79.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $home_decore_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-furniture/nilkamal-plastic-chair-set.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];

        $products = array_merge($products, $home_decore_furniture_products); 

        $home_decore_curtains_category = Category::where('slug', 'home-decor-accessories-curtains')->select('id', 'slug')->first();

        $home_decore_curtains_products = [
                [
                    'name' => 'Ikea LENDA Curtains',
                    'slug' => 'ikea-lenda-curtains',
                    'short_description' => 'Elegant cotton curtains with tiebacks.',
                    'description' => 'The Ikea LENDA Curtains are made of 100% cotton, offering a soft texture and semi-sheer light filtration. Includes tiebacks for a stylish look.',
                    'price' => 29.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/ikea-lenda-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Amazon Basics Blackout Curtains',
                    'slug' => 'amazon-basics-blackout-curtains',
                    'short_description' => 'Energy-efficient blackout curtains for bedrooms.',
                    'description' => 'These Amazon Basics Blackout Curtains block out sunlight, reduce noise, and help save energy. Perfect for bedrooms and living spaces.',
                    'price' => 34.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/amazon-basics-blackout-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Urban Ladder Sheer Curtains',
                    'slug' => 'urban-ladder-sheer-curtains',
                    'short_description' => 'Sheer curtains for a soft and airy look.',
                    'description' => 'The Urban Ladder Sheer Curtains offer a delicate and lightweight design, allowing natural light to filter through while maintaining privacy.',
                    'price' => 24.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/urban-ladder-sheer-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Home Centre Jacquard Curtains',
                    'slug' => 'home-centre-jacquard-curtains',
                    'short_description' => 'Premium jacquard curtains for a luxurious touch.',
                    'description' => 'These Home Centre Jacquard Curtains feature intricate patterns and a rich texture, ideal for adding sophistication to your living room or bedroom.',
                    'price' => 39.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/home-centre-jacquard-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Wayfair Grommet Top Curtains',
                    'slug' => 'wayfair-grommet-top-curtains',
                    'short_description' => 'Stylish grommet top curtains for easy hanging.',
                    'description' => 'The Wayfair Grommet Top Curtains are easy to hang and remove, featuring a durable fabric that complements both modern and traditional interiors.',
                    'price' => 29.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/wayfair-grommet-top-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pepperfry Cotton Printed Curtains',
                    'slug' => 'pepperfry-cotton-printed-curtains',
                    'short_description' => 'Vibrant cotton curtains with eye-catching prints.',
                    'description' => 'These Pepperfry Cotton Printed Curtains add a pop of color and personality to any room, crafted from soft and breathable fabric.',
                    'price' => 27.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/pepperfry-cotton-printed-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pottery Barn Velvet Curtains',
                    'slug' => 'pottery-barn-velvet-curtains',
                    'short_description' => 'Luxurious velvet curtains for an elegant look.',
                    'description' => 'The Pottery Barn Velvet Curtains are crafted from plush velvet fabric, providing a rich texture and enhancing the ambiance of any room.',
                    'price' => 59.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/pottery-barn-velvet-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'H&M Patterned Curtains',
                    'slug' => 'hm-patterned-curtains',
                    'short_description' => 'Cotton curtains with stylish patterns.',
                    'description' => 'These H&M Patterned Curtains are made from 100% cotton, featuring chic patterns that bring a modern and artistic vibe to your home.',
                    'price' => 25.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/hm-patterned-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Macy’s Thermal Insulated Curtains',
                    'slug' => 'macys-thermal-insulated-curtains',
                    'short_description' => 'Energy-saving thermal insulated curtains.',
                    'description' => 'Macy’s Thermal Insulated Curtains provide excellent light blocking and temperature control, helping reduce energy costs while enhancing privacy.',
                    'price' => 49.99,
                    'stock' => 55,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/macys-thermal-insulated-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'FabIndia Handwoven Curtains',
                    'slug' => 'fabindia-handwoven-curtains',
                    'short_description' => 'Traditional handwoven curtains with earthy tones.',
                    'description' => 'The FabIndia Handwoven Curtains feature a blend of traditional craftsmanship and modern design, made from high-quality natural fibers.',
                    'price' => 44.99,
                    'stock' => 45,
                    'status' => 1,
                    'category' => $home_decore_curtains_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'home-decor-curtains/fabindia-handwoven-curtains.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];

        $products = array_merge($products, $home_decore_curtains_products);

        $health_wellness_suppliment_category = Category::where('slug', 'health-wellness-supplements')->select('id', 'slug')->first();

        $health_wellness_suppliments_products = [
                [
                    'name' => 'Optimum Nutrition Whey Protein',
                    'slug' => 'optimum-nutrition-whey-protein',
                    'short_description' => 'High-quality whey protein for muscle building and recovery.',
                    'description' => 'Optimum Nutrition Whey Protein provides 24g of premium protein per serving, with essential amino acids for muscle growth and recovery. Ideal for post-workout use.',
                    'price' => 59.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 2,
                    'images' => [
                        [
                            'path' => 'health-supplements/optimum-nutrition-whey-protein.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Garden of Life Multivitamin for Women',
                    'slug' => 'garden-of-life-multivitamin-for-women',
                    'short_description' => 'Organic multivitamin designed for women’s health.',
                    'description' => 'This Garden of Life Multivitamin is packed with essential vitamins, probiotics, and antioxidants to support energy, immunity, and skin health.',
                    'price' => 39.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-supplements/garden-of-life-multivitamin-for-women.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Nordic Naturals Omega-3 Fish Oil',
                    'slug' => 'nordic-naturals-omega-3-fish-oil',
                    'short_description' => 'High-potency omega-3 fish oil for heart and brain health.',
                    'description' => 'Nordic Naturals Omega-3 Fish Oil provides 1280mg of omega-3s per serving, supporting cardiovascular, brain, and joint health.',
                    'price' => 29.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-supplements/nordic-naturals-omega-3-fish-oil.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'MuscleBlaze Creatine Monohydrate',
                    'slug' => 'muscleblaze-creatine-monohydrate',
                    'short_description' => '100% pure creatine monohydrate for strength and endurance.',
                    'description' => 'MuscleBlaze Creatine Monohydrate improves strength, boosts performance, and enhances muscle recovery. Ideal for athletes and gym enthusiasts.',
                    'price' => 19.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 2,
                    'images' => [
                        [
                            'path' => 'health-supplements/muscleblaze-creatine-monohydrate.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Nature’s Bounty Vitamin C Gummies',
                    'slug' => 'natures-bounty-vitamin-c-gummies',
                    'short_description' => 'Delicious vitamin C gummies to boost immunity.',
                    'description' => 'Nature’s Bounty Vitamin C Gummies provide 250mg of vitamin C per serving to support immune health. Great-tasting and easy to consume.',
                    'price' => 14.99,
                    'stock' => 200,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-supplements/natures-bounty-vitamin-c-gummies.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'ON ZMA Sleep Support',
                    'slug' => 'on-zma-sleep-support',
                    'short_description' => 'Zinc and magnesium formula for better sleep and recovery.',
                    'description' => 'ON ZMA Sleep Support promotes restful sleep and enhances muscle recovery with its unique blend of zinc, magnesium, and vitamin B6.',
                    'price' => 24.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-supplements/on-zma-sleep-support.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Himalaya Ashwagandha Capsules',
                    'slug' => 'himalaya-ashwagandha-capsules',
                    'short_description' => 'Natural stress relief and energy booster.',
                    'description' => 'Himalaya Ashwagandha Capsules support stress management, improve energy levels, and enhance overall vitality. Made with pure herbal extracts.',
                    'price' => 11.99,
                    'stock' => 300,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-supplements/himalaya-ashwagandha-capsules.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'NOW Foods Probiotic-10',
                    'slug' => 'now-foods-probiotic-10',
                    'short_description' => 'Advanced probiotic formula for digestive health.',
                    'description' => 'NOW Foods Probiotic-10 contains 10 probiotic strains and 25 billion CFU per serving, supporting gut health and boosting immunity.',
                    'price' => 32.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-supplements/now-foods-probiotic-10.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'GNC Mega Men Multivitamin',
                    'slug' => 'gnc-mega-men-multivitamin',
                    'short_description' => 'Comprehensive multivitamin for men’s health.',
                    'description' => 'GNC Mega Men Multivitamin offers essential nutrients, antioxidants, and amino acids to support energy, muscle health, and immunity.',
                    'price' => 39.99,
                    'stock' => 95,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-supplements/gnc-mega-men-multivitamin.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Doctor’s Best Collagen Peptides',
                    'slug' => 'doctors-best-collagen-peptides',
                    'short_description' => 'Hydrolyzed collagen for healthy skin, hair, and joints.',
                    'description' => 'Doctor’s Best Collagen Peptides support skin elasticity, strong nails, and joint health. Easy to mix in water or smoothies.',
                    'price' => 27.99,
                    'stock' => 85,
                    'status' => 1,
                    'category' => $health_wellness_suppliment_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-supplements/doctors-best-collagen-peptides.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $health_wellness_suppliments_products);

        $health_wellness_ayurvedic_tablet_category = Category::where('slug', 'health-wellness-ayurvedic-tablets')->select('id', 'slug')->first();

        $health_wellness_ayurvedic_tablets_products = [
                [
                    'name' => 'Himalaya Liv.52 Tablets',
                    'slug' => 'himalaya-liv52-tablets',
                    'short_description' => 'Ayurvedic liver health supplement.',
                    'description' => 'Himalaya Liv.52 Tablets support liver function, detoxification, and healthy metabolism. Made with natural ingredients like caper bush and chicory.',
                    'price' => 6.99,
                    'stock' => 200,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/himalaya-liv52-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Patanjali Divya Mukta Vati',
                    'slug' => 'patanjali-divya-mukta-vati',
                    'short_description' => 'Natural support for blood pressure management.',
                    'description' => 'Patanjali Divya Mukta Vati is formulated to maintain healthy blood pressure levels. It contains herbs like arjuna, brahmi, and shankhpushpi.',
                    'price' => 9.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/patanjali-divya-mukta-vati.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Baidhyanath Chyawanprash Tablets',
                    'slug' => 'baidhyanath-chyawanprash-tablets',
                    'short_description' => 'Ayurvedic immunity-boosting tablets.',
                    'description' => 'Baidhyanath Chyawanprash Tablets provide the benefits of traditional chyawanprash in a convenient tablet form, boosting immunity and overall wellness.',
                    'price' => 5.99,
                    'stock' => 300,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/baidhyanath-chyawanprash-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Dabur Ashwagandha Tablets',
                    'slug' => 'dabur-ashwagandha-tablets',
                    'short_description' => 'Herbal tablets for stress and energy support.',
                    'description' => 'Dabur Ashwagandha Tablets help reduce stress, enhance energy levels, and improve overall vitality. Contains pure ashwagandha root extract.',
                    'price' => 7.49,
                    'stock' => 250,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/dabur-ashwagandha-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Kerala Ayurveda Manjishtadi Tablets',
                    'slug' => 'kerala-ayurveda-manjishtadi-tablets',
                    'short_description' => 'Detoxification and skin health tablets.',
                    'description' => 'Kerala Ayurveda Manjishtadi Tablets promote blood purification and healthy skin. Made with herbs like manjistha and neem.',
                    'price' => 8.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/kerala-ayurveda-manjishtadi-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Zandu Guduchi Tablets',
                    'slug' => 'zandu-guduchi-tablets',
                    'short_description' => 'Natural immunity booster tablets.',
                    'description' => 'Zandu Guduchi Tablets contain guduchi (giloy), a powerful adaptogen that enhances immunity, supports digestion, and combats fatigue.',
                    'price' => 6.49,
                    'stock' => 180,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/zandu-guduchi-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Charak Livomyn Tablets',
                    'slug' => 'charak-livomyn-tablets',
                    'short_description' => 'Liver support and detoxification tablets.',
                    'description' => 'Charak Livomyn Tablets support liver health by promoting detoxification and protection against liver damage. Enriched with herbal ingredients.',
                    'price' => 10.99,
                    'stock' => 140,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/charak-livomyn-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Sri Sri Tattva Shatavari Tablets',
                    'slug' => 'sri-sri-tattva-shatavari-tablets',
                    'short_description' => 'Tablets for women’s health and hormonal balance.',
                    'description' => 'Sri Sri Tattva Shatavari Tablets support hormonal balance, enhance lactation, and promote overall women’s health. Made with pure shatavari root.',
                    'price' => 9.49,
                    'stock' => 130,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/sri-sri-tattva-shatavari-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Ayush Kwath Tablets',
                    'slug' => 'ayush-kwath-tablets',
                    'short_description' => 'Ayurvedic immunity-boosting tablets.',
                    'description' => 'Ayush Kwath Tablets combine tulsi, dalchini, sunthi, and krishna marich to boost immunity and combat seasonal illnesses.',
                    'price' => 4.99,
                    'stock' => 500,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/ayush-kwath-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Herbal Hills Triphala Tablets',
                    'slug' => 'herbal-hills-triphala-tablets',
                    'short_description' => 'Digestive health and detoxification tablets.',
                    'description' => 'Herbal Hills Triphala Tablets are made with a blend of amla, haritaki, and bibhitaki to support digestion, detoxification, and regular bowel movements.',
                    'price' => 7.99,
                    'stock' => 210,
                    'status' => 1,
                    'category' => $health_wellness_ayurvedic_tablet_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'health-ayurvedic-tablets/herbal-hills-triphala-tablets.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $health_wellness_ayurvedic_tablets_products); 

        $fitness_outdoor_treadmill_category = Category::where('slug', 'fitness-outdoor-gear-treadmill')->select('id', 'slug')->first();

        $fitness_outdoor_treadmill_products = [
                [
                    'name' => 'NordicTrack Commercial 1750 Treadmill',
                    'slug' => 'nordictrack-commercial-1750-treadmill',
                    'short_description' => 'High-performance treadmill with iFit compatibility.',
                    'description' => 'The NordicTrack Commercial 1750 features a powerful motor, incline and decline settings, and a 14-inch HD touchscreen for immersive workouts. Perfect for home fitness.',
                    'price' => 1999.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/nordictrack-commercial-1750.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Sole F85 Folding Treadmill',
                    'slug' => 'sole-f85-folding-treadmill',
                    'short_description' => 'Sturdy and foldable treadmill for home use.',
                    'description' => 'Sole F85 Folding Treadmill offers a spacious running deck, powerful motor, and advanced cushioning for joint protection. Ideal for intense cardio sessions.',
                    'price' => 1799.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/sole-f85-folding-treadmill.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Horizon Fitness T101 Treadmill',
                    'slug' => 'horizon-fitness-t101-treadmill',
                    'short_description' => 'Compact treadmill with Bluetooth connectivity.',
                    'description' => 'Horizon Fitness T101 Treadmill is perfect for beginners, offering Bluetooth audio, incline settings, and an easy-fold design for convenience.',
                    'price' => 699.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/horizon-fitness-t101.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'ProForm Pro 9000 Treadmill',
                    'slug' => 'proform-pro-9000-treadmill',
                    'short_description' => 'Premium treadmill with interactive training.',
                    'description' => 'ProForm Pro 9000 Treadmill features a 22-inch HD touchscreen, incline/decline settings, and ProShox cushioning for a comfortable workout experience.',
                    'price' => 2499.99,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/proform-pro-9000.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'LifeSpan TR1200i Folding Treadmill',
                    'slug' => 'lifespan-tr1200i-folding-treadmill',
                    'short_description' => 'Durable and compact folding treadmill.',
                    'description' => 'The LifeSpan TR1200i Treadmill is designed for home fitness with a robust motor, shock-absorbing deck, and easy-to-fold design for storage.',
                    'price' => 999.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/lifespan-tr1200i.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Peloton Tread',
                    'slug' => 'peloton-tread',
                    'short_description' => 'Interactive treadmill with live and on-demand classes.',
                    'description' => 'The Peloton Tread offers a sleek design, a 24-inch HD touchscreen, and access to live and on-demand fitness classes for an engaging workout experience.',
                    'price' => 3495.99,
                    'stock' => 20,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/peloton-tread.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Bowflex Treadmill 22',
                    'slug' => 'bowflex-treadmill-22',
                    'short_description' => 'Smart treadmill with JRNY app integration.',
                    'description' => 'Bowflex Treadmill 22 comes with a 22-inch touchscreen, adjustable incline, and immersive JRNY app integration for personalized workouts.',
                    'price' => 2699.99,
                    'stock' => 35,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/bowflex-treadmill-22.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Sunny Health & Fitness SF-T4400 Treadmill',
                    'slug' => 'sunny-health-fitness-sf-t4400-treadmill',
                    'short_description' => 'Budget-friendly treadmill for light workouts.',
                    'description' => 'The Sunny Health & Fitness SF-T4400 Treadmill offers a compact design, LCD monitor, and manual incline settings for beginners and casual fitness enthusiasts.',
                    'price' => 399.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/sunny-sf-t4400.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Xterra Fitness TR150 Folding Treadmill',
                    'slug' => 'xterra-fitness-tr150-folding-treadmill',
                    'short_description' => 'Compact folding treadmill with adjustable speeds.',
                    'description' => 'Xterra Fitness TR150 is a lightweight treadmill with 12 preset programs, 3 incline levels, and a foldable design for easy storage.',
                    'price' => 499.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/xterra-tr150.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Schwinn 810 Treadmill',
                    'slug' => 'schwinn-810-treadmill',
                    'short_description' => 'Feature-packed treadmill with Bluetooth connectivity.',
                    'description' => 'Schwinn 810 Treadmill offers Bluetooth, a cushioned running deck, and built-in fitness programs for an efficient and comfortable workout.',
                    'price' => 799.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $fitness_outdoor_treadmill_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-treadmill/schwinn-810.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];

        $products = array_merge($products, $fitness_outdoor_treadmill_products);   

        $fitness_outdoor_massager_category = Category::where('slug', 'fitness-outdoor-gear-massager')->select('id', 'slug')->first();

        $fitness_outdoor_massager_products = [
                [
                    'name' => 'Theragun Pro Percussion Massager',
                    'slug' => 'theragun-pro-percussion-massager',
                    'short_description' => 'Professional-grade deep tissue percussion massager.',
                    'description' => 'The Theragun Pro is a high-performance percussion massager with customizable speeds, ergonomic design, and interchangeable heads for targeted muscle relief.',
                    'price' => 599.99,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/theragun-pro-massager.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Hyperice Hypervolt 2 Pro',
                    'slug' => 'hyperice-hypervolt-2-pro',
                    'short_description' => 'Quiet and powerful percussion massager.',
                    'description' => 'Hyperice Hypervolt 2 Pro offers a quiet operation, five intensity levels, and interchangeable attachments for effective muscle recovery and pain relief.',
                    'price' => 399.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/hypervolt-2-pro-massager.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'RENPHO Deep Tissue Massage Gun',
                    'slug' => 'renpho-deep-tissue-massage-gun',
                    'short_description' => 'Affordable and lightweight massage gun.',
                    'description' => 'The RENPHO Massage Gun is portable, lightweight, and comes with multiple speed settings and attachments for a relaxing and rejuvenating experience.',
                    'price' => 129.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/renpho-massage-gun.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Ekrin Athletics B37 Massage Gun',
                    'slug' => 'ekrin-athletics-b37-massage-gun',
                    'short_description' => 'Ergonomic and long-lasting massage gun.',
                    'description' => 'The Ekrin Athletics B37 Massage Gun is designed for endurance, offering long battery life, quiet operation, and multiple attachments for muscle recovery.',
                    'price' => 229.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/ekrin-b37-massage-gun.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Bob and Brad C2 Massage Gun',
                    'slug' => 'bob-and-brad-c2-massage-gun',
                    'short_description' => 'Compact and powerful percussion massager.',
                    'description' => 'Bob and Brad C2 Massage Gun is lightweight, portable, and features adjustable speeds for targeted muscle therapy and relaxation.',
                    'price' => 89.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/bob-and-brad-c2-massager.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'LifePro Sonic Handheld Percussion Massager',
                    'slug' => 'lifepro-sonic-handheld-percussion-massager',
                    'short_description' => 'Affordable handheld massager for full-body relief.',
                    'description' => 'LifePro Sonic Percussion Massager features customizable speeds, multiple attachments, and a durable design for effective pain relief and relaxation.',
                    'price' => 99.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/lifepro-sonic-massager.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Achedaway Pro Massage Gun',
                    'slug' => 'achedaway-pro-massage-gun',
                    'short_description' => 'Premium deep tissue massager.',
                    'description' => 'The Achedaway Pro Massage Gun offers adjustable speed settings, quiet operation, and durable construction for professional-grade muscle relief.',
                    'price' => 349.99,
                    'stock' => 25,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/achedaway-pro-massager.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'TimTam Power Massager Pro',
                    'slug' => 'timtam-power-massager-pro',
                    'short_description' => 'High-intensity massager for deep tissue relief.',
                    'description' => 'TimTam Power Massager Pro is designed for athletes, offering a heated tip, powerful motor, and ergonomic grip for advanced muscle recovery.',
                    'price' => 499.99,
                    'stock' => 20,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/timtam-power-massager-pro.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Opove Apex Massage Gun',
                    'slug' => 'opove-apex-massage-gun',
                    'short_description' => 'Durable and portable massage gun.',
                    'description' => 'The Opove Apex Massage Gun is lightweight and portable, featuring multiple speed settings and interchangeable heads for effective muscle relaxation.',
                    'price' => 179.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/opove-apex-massager.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Addsfit Mini Massage Gun',
                    'slug' => 'addsfit-mini-massage-gun',
                    'short_description' => 'Compact and travel-friendly massager.',
                    'description' => 'Addsfit Mini Massage Gun is small yet powerful, ideal for travel. Features adjustable intensity levels and multiple attachments for on-the-go recovery.',
                    'price' => 119.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $fitness_outdoor_massager_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'fitness-outdoor-massager/addsfit-mini-massager.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $fitness_outdoor_massager_products); 

        $book_stationery_religious_category = Category::where('slug', 'books-stationery-religious')->select('id', 'slug')->first();

        $book_stationery_religious_products = [
                [
                    'name' => 'Bhagavad Gita - Pocket Edition',
                    'slug' => 'bhagavad-gita-pocket-edition',
                    'short_description' => 'Compact edition of the Bhagavad Gita with Sanskrit verses and translations.',
                    'description' => 'This pocket-sized edition of the Bhagavad Gita includes original Sanskrit verses, their English translations, and commentary. Ideal for spiritual seekers and travelers.',
                    'price' => 9.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/bhagavad-gita-pocket-edition.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Holy Bible - King James Version',
                    'slug' => 'holy-bible-kjv',
                    'short_description' => 'Classic King James Version of the Holy Bible.',
                    'description' => 'The Holy Bible in the King James Version (KJV) offers a timeless translation of the scriptures. Perfect for daily study and devotional use.',
                    'price' => 14.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/holy-bible-kjv.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Quran with English Translation',
                    'slug' => 'quran-with-english-translation',
                    'short_description' => 'Complete Quran with Arabic text and English translation.',
                    'description' => 'This Quran includes Arabic text alongside an English translation for a better understanding of Islamic teachings. A great addition for spiritual learning.',
                    'price' => 19.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/quran-english-translation.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Hanuman Chalisa - Illustrated Edition',
                    'slug' => 'hanuman-chalisa-illustrated',
                    'short_description' => 'Beautifully illustrated Hanuman Chalisa with meaning.',
                    'description' => 'This edition of Hanuman Chalisa features Sanskrit verses, their English meanings, and vibrant illustrations. Perfect for devotional reading.',
                    'price' => 7.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/hanuman-chalisa-illustrated.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Sri Guru Granth Sahib - Pocket Edition',
                    'slug' => 'guru-granth-sahib-pocket-edition',
                    'short_description' => 'Compact version of Sri Guru Granth Sahib with translations.',
                    'description' => 'This pocket edition of Sri Guru Granth Sahib provides original verses and their translations. A must-have for followers of Sikhism.',
                    'price' => 24.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/guru-granth-sahib-pocket.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Daily Prayer Journal',
                    'slug' => 'daily-prayer-journal',
                    'short_description' => 'A guided journal for daily prayers and reflections.',
                    'description' => 'The Daily Prayer Journal includes prompts for prayers, gratitude, and reflections. Ideal for enhancing your spiritual practice.',
                    'price' => 12.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/daily-prayer-journal.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Buddhist Sutras - English Edition',
                    'slug' => 'buddhist-sutras-english-edition',
                    'short_description' => 'A collection of important Buddhist Sutras with English translations.',
                    'description' => 'This book includes selected Buddhist Sutras with English translations and commentaries. Perfect for meditation and understanding Buddhist teachings.',
                    'price' => 16.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/buddhist-sutras.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Ramayana - Illustrated Edition',
                    'slug' => 'ramayana-illustrated-edition',
                    'short_description' => 'Illustrated version of the Ramayana epic.',
                    'description' => 'This edition of the Ramayana includes stunning illustrations and simplified text for readers of all ages. A must-have for anyone interested in Indian mythology.',
                    'price' => 29.99,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/ramayana-illustrated.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Torah with English Translation',
                    'slug' => 'torah-english-translation',
                    'short_description' => 'The Torah with Hebrew text and English translation.',
                    'description' => 'This Torah edition provides the original Hebrew text alongside an English translation, ideal for spiritual learning and practice.',
                    'price' => 22.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/torah-english-translation.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Zen Calligraphy Set',
                    'slug' => 'zen-calligraphy-set',
                    'short_description' => 'A complete calligraphy set for Zen-inspired writing.',
                    'description' => 'This Zen Calligraphy Set includes brushes, ink, and a guidebook for creating beautiful spiritual calligraphy. Perfect for mindfulness and relaxation.',
                    'price' => 34.99,
                    'stock' => 45,
                    'status' => 1,
                    'category' => $book_stationery_religious_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-religious/zen-calligraphy-set.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $book_stationery_religious_products); 

        $book_stationery_history_category = Category::where('slug', 'books-stationery-history')->select('id', 'slug')->first();

        $book_stationery_history_products = [
                [
                    'name' => 'Sapiens: A Brief History of Humankind',
                    'slug' => 'sapiens-brief-history-humankind',
                    'short_description' => 'A groundbreaking history of the human species by Yuval Noah Harari.',
                    'description' => 'Sapiens explores the history of humankind, covering the cognitive revolution, agricultural developments, and the unification of humanity through fascinating storytelling and insights.',
                    'price' => 24.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/sapiens-history.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'The Silk Roads: A New History of the World',
                    'slug' => 'the-silk-roads-history',
                    'short_description' => 'A panoramic history of the Silk Roads by Peter Frankopan.',
                    'description' => 'The Silk Roads provides a fresh perspective on world history, exploring the influence of trade routes on culture, economics, and politics over centuries.',
                    'price' => 19.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/the-silk-roads.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'A People’s History of the United States',
                    'slug' => 'peoples-history-united-states',
                    'short_description' => 'Howard Zinn’s groundbreaking history of the U.S. from the perspective of marginalized groups.',
                    'description' => 'A People’s History of the United States retells American history from the viewpoints of workers, women, African Americans, Native Americans, and more.',
                    'price' => 18.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/peoples-history-us.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'The History of Ancient Egypt',
                    'slug' => 'history-ancient-egypt',
                    'short_description' => 'An in-depth exploration of the ancient Egyptian civilization.',
                    'description' => 'This book takes readers through the fascinating history of ancient Egypt, covering its pharaohs, pyramids, and cultural achievements.',
                    'price' => 22.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/history-ancient-egypt.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Guns, Germs, and Steel',
                    'slug' => 'guns-germs-steel',
                    'short_description' => 'Jared Diamond’s Pulitzer Prize-winning exploration of human societies.',
                    'description' => 'This book examines the impact of geography, agriculture, and technology on the development of civilizations throughout history.',
                    'price' => 20.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/guns-germs-steel.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'The History of the Peloponnesian War',
                    'slug' => 'history-peloponnesian-war',
                    'short_description' => 'Thucydides’ classic account of the Peloponnesian War.',
                    'description' => 'This historical masterpiece provides a detailed account of the conflict between Athens and Sparta, offering insights into ancient warfare and politics.',
                    'price' => 14.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/peloponnesian-war.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'India: A History',
                    'slug' => 'india-a-history',
                    'short_description' => 'John Keay’s comprehensive history of the Indian subcontinent.',
                    'description' => 'This book covers the rich and diverse history of India, from its ancient beginnings to modern times, blending scholarship with vivid storytelling.',
                    'price' => 21.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/india-history.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'A Short History of Nearly Everything',
                    'slug' => 'short-history-nearly-everything',
                    'short_description' => 'Bill Bryson’s engaging account of science and history.',
                    'description' => 'This book explores the history of the universe, Earth, and life in an accessible and entertaining way, making complex topics easy to understand.',
                    'price' => 17.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/short-history-everything.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'The Rise and Fall of the Third Reich',
                    'slug' => 'rise-fall-third-reich',
                    'short_description' => 'William L. Shirer’s definitive history of Nazi Germany.',
                    'description' => 'This comprehensive history details the rise of Adolf Hitler, the Nazi party, and their devastating impact during World War II.',
                    'price' => 25.99,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/rise-fall-third-reich.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Historical Atlas of the World',
                    'slug' => 'historical-atlas-world',
                    'short_description' => 'An illustrated history of the world through maps.',
                    'description' => 'This atlas provides a visual representation of historical events, civilizations, and developments with detailed maps and explanations.',
                    'price' => 29.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $book_stationery_history_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-history/historical-atlas-world.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $book_stationery_history_products); 

        $book_stationery_sport_category = Category::where('slug', 'books-stationery-sports')->select('id', 'slug')->first();

        $book_stationery_sport_products = [
                [
                    'name' => 'The Mamba Mentality: How I Play',
                    'slug' => 'mamba-mentality-how-i-play',
                    'short_description' => 'Kobe Bryant’s insights on basketball and life.',
                    'description' => 'In this book, basketball legend Kobe Bryant details his mindset, preparation, and strategies, providing valuable lessons for athletes and fans alike.',
                    'price' => 29.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/mamba-mentality.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Soccer IQ: Things That Smart Players Do',
                    'slug' => 'soccer-iq-smart-players',
                    'short_description' => 'A guide to improving soccer skills and strategy.',
                    'description' => 'Soccer IQ offers practical tips for players to enhance their game sense, decision-making, and performance on the field.',
                    'price' => 17.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/soccer-iq.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Cricket: The Game of Life',
                    'slug' => 'cricket-game-of-life',
                    'short_description' => 'A fascinating exploration of cricket by Scyld Berry.',
                    'description' => 'This book delves into the cultural and historical impact of cricket, sharing inspiring stories from the game.',
                    'price' => 21.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/cricket-game-life.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Open: An Autobiography',
                    'slug' => 'open-autobiography',
                    'short_description' => 'Andre Agassi’s candid and inspiring autobiography.',
                    'description' => 'In this powerful autobiography, tennis legend Andre Agassi shares his struggles, victories, and lessons from his career and personal life.',
                    'price' => 19.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/open-autobiography.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'The Champion’s Mind',
                    'slug' => 'champions-mind',
                    'short_description' => 'A guide to mental fitness for athletes by Jim Afremow.',
                    'description' => 'The Champion’s Mind offers tools and strategies for athletes to build mental resilience, confidence, and focus for peak performance.',
                    'price' => 15.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/champions-mind.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Basketball: A Love Story',
                    'slug' => 'basketball-love-story',
                    'short_description' => 'A comprehensive history of basketball.',
                    'description' => 'This book celebrates basketball through captivating stories, interviews, and insights from players, coaches, and fans.',
                    'price' => 26.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/basketball-love-story.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'The Art of Running',
                    'slug' => 'art-of-running',
                    'short_description' => 'A guide to mastering running techniques.',
                    'description' => 'The Art of Running combines science and art to help runners improve their technique, endurance, and overall performance.',
                    'price' => 14.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/art-of-running.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'The Boys in the Boat',
                    'slug' => 'boys-in-the-boat',
                    'short_description' => 'The story of the American rowing team at the 1936 Olympics.',
                    'description' => 'This book chronicles the inspiring journey of the U.S. rowing team that triumphed at the Berlin Olympics against all odds.',
                    'price' => 18.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/boys-in-the-boat.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Playing It My Way',
                    'slug' => 'playing-it-my-way',
                    'short_description' => 'Sachin Tendulkar’s autobiography.',
                    'description' => 'Playing It My Way provides a glimpse into the life and career of Sachin Tendulkar, one of the greatest cricketers in history.',
                    'price' => 22.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/playing-it-my-way.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Sports Writing Journal',
                    'slug' => 'sports-writing-journal',
                    'short_description' => 'A premium journal for sports enthusiasts.',
                    'description' => 'This journal is perfect for recording training goals, strategies, and achievements. A great tool for athletes and coaches.',
                    'price' => 9.99,
                    'stock' => 140,
                    'status' => 1,
                    'category' => $book_stationery_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'book-stationery-sports/sports-writing-journal.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];

        $products = array_merge($products, $book_stationery_sport_products);   

        $beauty_facewash_category = Category::where('slug', 'beauty-personal-care-facewash')->select('id', 'slug')->first();

        $beauty_facewash_products = [
                [
                    'name' => 'Neutrogena Oil-Free Acne Wash',
                    'slug' => 'neutrogena-oil-free-acne-wash',
                    'short_description' => 'Oil-free facewash for acne-prone skin with salicylic acid.',
                    'description' => 'Neutrogena Oil-Free Acne Wash deeply cleanses and treats acne with salicylic acid, leaving your skin clear and refreshed.',
                    'price' => 12.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/neutrogena-oil-free-acne-wash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Cetaphil Gentle Skin Cleanser',
                    'slug' => 'cetaphil-gentle-skin-cleanser',
                    'short_description' => 'Gentle facewash for sensitive and dry skin.',
                    'description' => 'Cetaphil Gentle Skin Cleanser soothes and hydrates while gently removing dirt, oil, and impurities from sensitive skin.',
                    'price' => 10.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/cetaphil-gentle-skin-cleanser.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Himalaya Purifying Neem Face Wash',
                    'slug' => 'himalaya-purifying-neem-facewash',
                    'short_description' => 'Neem-based herbal facewash for clear skin.',
                    'description' => 'Himalaya Neem Face Wash contains natural neem extracts to prevent acne and pimples, leaving your skin fresh and clear.',
                    'price' => 6.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/himalaya-purifying-neem-facewash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Mamaearth Ubtan Face Wash',
                    'slug' => 'mamaearth-ubtan-face-wash',
                    'short_description' => 'Turmeric-based facewash for glowing skin.',
                    'description' => 'Mamaearth Ubtan Face Wash with turmeric and saffron gently exfoliates and brightens your skin for a natural glow.',
                    'price' => 7.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/mamaearth-ubtan-face-wash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Clean & Clear Morning Energy Face Wash',
                    'slug' => 'clean-clear-morning-energy-face-wash',
                    'short_description' => 'Refreshing facewash for an energizing start to the day.',
                    'description' => 'Clean & Clear Morning Energy Face Wash revitalizes your skin with natural fruit extracts and leaves it oil-free and fresh.',
                    'price' => 5.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/clean-clear-morning-energy-face-wash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'WOW Skin Science Apple Cider Vinegar Face Wash',
                    'slug' => 'wow-apple-cider-vinegar-face-wash',
                    'short_description' => 'Facewash with apple cider vinegar for oily and acne-prone skin.',
                    'description' => 'WOW Apple Cider Vinegar Face Wash balances oil production, clears acne, and rejuvenates your skin naturally.',
                    'price' => 11.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/wow-apple-cider-vinegar-face-wash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pond’s Pure White Activated Charcoal Face Wash',
                    'slug' => 'ponds-pure-white-charcoal-face-wash',
                    'short_description' => 'Charcoal facewash for deep cleansing.',
                    'description' => 'Pond’s Pure White Face Wash removes dirt, impurities, and pollution with activated charcoal for visibly clear skin.',
                    'price' => 4.99,
                    'stock' => 130,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/ponds-pure-white-charcoal-face-wash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Biotique Bio Honey Gel Face Wash',
                    'slug' => 'biotique-bio-honey-gel-face-wash',
                    'short_description' => 'Ayurvedic facewash for all skin types.',
                    'description' => 'Biotique Bio Honey Gel Face Wash contains honey and herbal extracts for gentle cleansing and nourishing your skin naturally.',
                    'price' => 8.99,
                    'stock' => 140,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/biotique-bio-honey-gel-face-wash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Garnier Men Oil Clear Face Wash',
                    'slug' => 'garnier-men-oil-clear-face-wash',
                    'short_description' => 'Oil control facewash for men.',
                    'description' => 'Garnier Men Oil Clear Face Wash removes excess oil, dirt, and pollution for an instantly fresh and matte finish.',
                    'price' => 6.49,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/garnier-men-oil-clear-face-wash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Plum Green Tea Pore Cleansing Face Wash',
                    'slug' => 'plum-green-tea-face-wash',
                    'short_description' => 'Facewash with green tea for oily and acne-prone skin.',
                    'description' => 'Plum Green Tea Face Wash cleanses pores and controls excess oil, leaving your skin refreshed and blemish-free.',
                    'price' => 9.99,
                    'stock' => 95,
                    'status' => 1,
                    'category' => $beauty_facewash_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-facewash/plum-green-tea-face-wash.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $beauty_facewash_products);   

        $beauty_soap_category = Category::where('slug', 'beauty-personal-care-soap')->select('id', 'slug')->first();

        $beauty_soap_products = [
                [
                    'name' => 'Dove Beauty Bar',
                    'slug' => 'dove-beauty-bar',
                    'short_description' => 'Moisturizing beauty bar for soft, smooth skin.',
                    'description' => 'Dove Beauty Bar cleanses and nourishes the skin with its ¼ moisturizing cream, leaving it soft, smooth, and radiant.',
                    'price' => 3.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/dove-beauty-bar.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Lux Velvet Touch Soap',
                    'slug' => 'lux-velvet-touch-soap',
                    'short_description' => 'Lux soap with a silky, smooth fragrance.',
                    'description' => 'Lux Velvet Touch Soap is infused with the fragrance of white roses and offers a smooth, silky touch to the skin with every wash.',
                    'price' => 2.49,
                    'stock' => 130,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/lux-velvet-touch-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Liril Lemon Soap',
                    'slug' => 'liril-lemon-soap',
                    'short_description' => 'Refreshing lemon-scented soap.',
                    'description' => 'Liril Lemon Soap gives a refreshing citrus experience, energizing the skin and keeping it fresh throughout the day.',
                    'price' => 1.99,
                    'stock' => 180,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/liril-lemon-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Nivea Creme Soft Soap',
                    'slug' => 'nivea-creme-soft-soap',
                    'short_description' => 'Gentle soap with a soft cream formula.',
                    'description' => 'Nivea Creme Soft Soap gently cleanses the skin while nourishing it with its soft cream formula for smooth, moisturized skin.',
                    'price' => 4.49,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/nivea-creme-soft-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pears Transparent Soap',
                    'slug' => 'pears-transparent-soap',
                    'short_description' => 'Gentle soap for clear skin.',
                    'description' => 'Pears Transparent Soap cleanses and moisturizes, giving you soft and clear skin with its gentle, natural formula.',
                    'price' => 2.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/pears-transparent-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Cinthol Intense Soap',
                    'slug' => 'cinthol-intense-soap',
                    'short_description' => 'Long-lasting freshness with intense fragrance.',
                    'description' => 'Cinthol Intense Soap delivers an energizing fragrance with its special formula that ensures long-lasting freshness throughout the day.',
                    'price' => 1.89,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/cinthol-intense-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Mysore Sandal Soap',
                    'slug' => 'mysore-sandal-soap',
                    'short_description' => 'Traditional sandalwood soap.',
                    'description' => 'Mysore Sandal Soap is known for its refreshing fragrance of pure sandalwood, leaving the skin soft and fragrant all day long.',
                    'price' => 5.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/mysore-sandal-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Pond’s White Beauty Soap',
                    'slug' => 'ponds-white-beauty-soap',
                    'short_description' => 'Brightening soap for radiant skin.',
                    'description' => 'Pond’s White Beauty Soap is formulated to lighten and brighten the skin, revealing a glowing and radiant complexion.',
                    'price' => 3.49,
                    'stock' => 140,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/ponds-white-beauty-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Shahnaz Husain Shafair Skin Whitening Soap',
                    'slug' => 'shahnaz-husain-shafair-whitening-soap',
                    'short_description' => 'Skin whitening soap with herbal ingredients.',
                    'description' => 'Shahnaz Husain Shafair Soap helps in lightening and brightening the skin with its unique blend of herbal ingredients.',
                    'price' => 8.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/shahnaz-husain-shafair-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Herbal Essences Refreshing Citrus Soap',
                    'slug' => 'herbal-essences-refreshing-citrus-soap',
                    'short_description' => 'Citrus-scented soap for a refreshing shower.',
                    'description' => 'Herbal Essences Refreshing Citrus Soap invigorates your senses with its zesty citrus fragrance while cleansing and nourishing your skin.',
                    'price' => 4.49,
                    'stock' => 130,
                    'status' => 1,
                    'category' => $beauty_soap_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'beauty-soap/herbal-essences-refreshing-citrus-soap.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];

        $products = array_merge($products, $beauty_soap_products);   

        $footware_sport_category = Category::where('slug', 'footwear-sport')->select('id', 'slug')->first();

        $footware_sport_products = [
                [
                    'name' => 'Nike Air Zoom Pegasus 39',
                    'slug' => 'nike-air-zoom-pegasus-39',
                    'short_description' => 'Lightweight running shoes for enhanced speed and comfort.',
                    'description' => 'Nike Air Zoom Pegasus 39 features a breathable upper, responsive cushioning, and durable rubber outsole, perfect for long-distance runs.',
                    'price' => 129.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/nike-air-zoom-pegasus-39.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Adidas Ultraboost 22',
                    'slug' => 'adidas-ultraboost-22',
                    'short_description' => 'High-performance running shoes with superior cushioning.',
                    'description' => 'Adidas Ultraboost 22 provides unmatched energy return with Boost midsole technology and a supportive fit for maximum comfort.',
                    'price' => 179.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/adidas-ultraboost-22.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Puma Velocity Nitro',
                    'slug' => 'puma-velocity-nitro',
                    'short_description' => 'Comfortable running shoes with nitrogen-infused foam.',
                    'description' => 'Puma Velocity Nitro offers lightweight responsiveness and excellent grip for runners seeking a smooth ride.',
                    'price' => 119.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/puma-velocity-nitro.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'ASICS Gel-Kayano 29',
                    'slug' => 'asics-gel-kayano-29',
                    'short_description' => 'Stability-focused running shoes with advanced cushioning.',
                    'description' => 'ASICS Gel-Kayano 29 combines FlyteFoam technology and GEL cushioning for maximum support and comfort.',
                    'price' => 159.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/asics-gel-kayano-29.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Reebok Nano X2',
                    'slug' => 'reebok-nano-x2',
                    'short_description' => 'Cross-training shoes with a durable design.',
                    'description' => 'Reebok Nano X2 is built for multi-directional movement, featuring Flexweave technology and responsive cushioning.',
                    'price' => 139.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/reebok-nano-x2.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Under Armour HOVR Sonic 5',
                    'slug' => 'under-armour-hovr-sonic-5',
                    'short_description' => 'Smart running shoes with HOVR cushioning technology.',
                    'description' => 'Under Armour HOVR Sonic 5 offers connected fitness features, responsive cushioning, and a breathable upper for superior performance.',
                    'price' => 139.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/under-armour-hovr-sonic-5.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'New Balance Fresh Foam 1080v12',
                    'slug' => 'new-balance-fresh-foam-1080v12',
                    'short_description' => 'Cushioned running shoes for ultimate comfort.',
                    'description' => 'New Balance Fresh Foam 1080v12 delivers plush cushioning and a smooth transition for runners of all levels.',
                    'price' => 149.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/new-balance-fresh-foam-1080v12.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Salomon Speedcross 5',
                    'slug' => 'salomon-speedcross-5',
                    'short_description' => 'Trail running shoes with excellent grip.',
                    'description' => 'Salomon Speedcross 5 provides superior traction and stability for rugged terrains, making it perfect for trail running enthusiasts.',
                    'price' => 129.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/salomon-speedcross-5.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Skechers Go Run Razor Excess 2',
                    'slug' => 'skechers-go-run-razor-excess-2',
                    'short_description' => 'Performance running shoes with Hyper Burst cushioning.',
                    'description' => 'Skechers Go Run Razor Excess 2 offers responsive cushioning and a lightweight design for a faster, smoother run.',
                    'price' => 124.99,
                    'stock' => 85,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/skechers-go-run-razor-excess-2.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Brooks Ghost 15',
                    'slug' => 'brooks-ghost-15',
                    'short_description' => 'Neutral running shoes with soft cushioning.',
                    'description' => 'Brooks Ghost 15 features DNA LOFT cushioning for a smooth ride and a secure fit for everyday running.',
                    'price' => 139.99,
                    'stock' => 75,
                    'status' => 1,
                    'category' => $footware_sport_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'sports-footwear/brooks-ghost-15.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $footware_sport_products); 

        $footware_casual_category = Category::where('slug', 'footwear-casual')->select('id', 'slug')->first();

        $footware_casual_products = [
                [
                    'name' => 'Nike Court Vision Low Sneakers',
                    'slug' => 'nike-court-vision-low-sneakers',
                    'short_description' => 'Stylish low-top sneakers for everyday wear.',
                    'description' => 'Nike Court Vision Low Sneakers combine retro basketball style with modern comfort, perfect for casual outings.',
                    'price' => 74.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/nike-court-vision-low-sneakers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Adidas Advantage Shoes',
                    'slug' => 'adidas-advantage-shoes',
                    'short_description' => 'Classic sneakers with a sleek design.',
                    'description' => 'Adidas Advantage Shoes offer clean lines, a leather upper, and cloudfoam cushioning for all-day comfort.',
                    'price' => 65.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/adidas-advantage-shoes.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Puma Smash V2 Sneakers',
                    'slug' => 'puma-smash-v2-sneakers',
                    'short_description' => 'Comfortable sneakers with a timeless design.',
                    'description' => 'Puma Smash V2 Sneakers feature a suede upper, cushioned sole, and rubber outsole for durability and everyday style.',
                    'price' => 59.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/puma-smash-v2-sneakers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Converse Chuck Taylor All Star',
                    'slug' => 'converse-chuck-taylor-all-star',
                    'short_description' => 'Iconic high-top sneakers for casual wear.',
                    'description' => 'Converse Chuck Taylor All Star shoes bring classic style with a canvas upper and vulcanized rubber sole for ultimate versatility.',
                    'price' => 60.00,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/converse-chuck-taylor-all-star.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Skechers Go Walk Arch Fit',
                    'slug' => 'skechers-go-walk-arch-fit',
                    'short_description' => 'Lightweight slip-on shoes with arch support.',
                    'description' => 'Skechers Go Walk Arch Fit shoes provide excellent arch support and lightweight cushioning for unmatched comfort.',
                    'price' => 85.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/skechers-go-walk-arch-fit.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Vans Old Skool Sneakers',
                    'slug' => 'vans-old-skool-sneakers',
                    'short_description' => 'Classic skate shoes with timeless appeal.',
                    'description' => 'Vans Old Skool Sneakers feature a durable canvas and suede upper, padded collar, and waffle outsole for style and performance.',
                    'price' => 69.99,
                    'stock' => 130,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/vans-old-skool-sneakers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Red Tape Casual Loafers',
                    'slug' => 'red-tape-casual-loafers',
                    'short_description' => 'Stylish loafers with a comfortable fit.',
                    'description' => 'Red Tape Casual Loafers combine premium leather construction with a slip-on design for versatile everyday wear.',
                    'price' => 49.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/red-tape-casual-loafers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Clarks Tilden Walk Shoes',
                    'slug' => 'clarks-tilden-walk-shoes',
                    'short_description' => 'Elegant formal-casual leather shoes.',
                    'description' => 'Clarks Tilden Walk Shoes are crafted from premium leather, featuring an OrthoLite footbed for maximum comfort during casual outings.',
                    'price' => 89.99,
                    'stock' => 75,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/clarks-tilden-walk-shoes.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Woodland Leather Sandals',
                    'slug' => 'woodland-leather-sandals',
                    'short_description' => 'Durable leather sandals for a rugged look.',
                    'description' => 'Woodland Leather Sandals feature sturdy construction with adjustable straps, making them perfect for casual outdoor adventures.',
                    'price' => 54.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/woodland-leather-sandals.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Bata Slip-On Shoes',
                    'slug' => 'bata-slip-on-shoes',
                    'short_description' => 'Comfortable slip-on shoes for daily use.',
                    'description' => 'Bata Slip-On Shoes are designed with a lightweight sole and cushioned footbed, offering unbeatable ease and style.',
                    'price' => 44.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $footware_casual_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'casual-footwear/bata-slip-on-shoes.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $footware_casual_products); 

        $footware_partywear_category = Category::where('slug', 'footwear-partywear')->select('id', 'slug')->first();

        $footware_partywear_products = [
                [
                    'name' => 'Steve Madden Daisie Pumps',
                    'slug' => 'steve-madden-daisie-pumps',
                    'short_description' => 'Elegant high-heel pumps for party occasions.',
                    'description' => 'Steve Madden Daisie Pumps feature a sleek design with a pointed toe and stiletto heel, making them perfect for glamorous events.',
                    'price' => 99.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/steve-madden-daisie-pumps.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Jimmy Choo Romy Glitter Pumps',
                    'slug' => 'jimmy-choo-romy-glitter-pumps',
                    'short_description' => 'Sparkling glitter pumps for special events.',
                    'description' => 'Jimmy Choo Romy Glitter Pumps add a touch of sparkle with their glittered finish, elegant pointed toe, and a comfortable stiletto heel.',
                    'price' => 499.99,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/jimmy-choo-romy-glitter-pumps.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Aldo Galelith Sandals',
                    'slug' => 'aldo-galelith-sandals',
                    'short_description' => 'Chic heeled sandals with a metallic finish.',
                    'description' => 'Aldo Galelith Sandals are designed with a strappy metallic upper, cushioned footbed, and block heel for a modern partywear look.',
                    'price' => 89.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/aldo-galelith-sandals.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Zara Embellished Stilettos',
                    'slug' => 'zara-embellished-stilettos',
                    'short_description' => 'Glamorous stilettos with rhinestone detailing.',
                    'description' => 'Zara Embellished Stilettos feature a satin finish, rhinestone embellishments, and a sleek silhouette perfect for formal occasions.',
                    'price' => 79.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/zara-embellished-stilettos.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Gucci Marmont Platform Sandals',
                    'slug' => 'gucci-marmont-platform-sandals',
                    'short_description' => 'Luxurious platform sandals for high-fashion parties.',
                    'description' => 'Gucci Marmont Platform Sandals feature the iconic GG motif, leather straps, and a comfortable block heel for standout style.',
                    'price' => 799.99,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/gucci-marmont-platform-sandals.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Michael Kors Glitter Platform Heels',
                    'slug' => 'michael-kors-glitter-platform-heels',
                    'short_description' => 'Dazzling platform heels with a glitter finish.',
                    'description' => 'Michael Kors Glitter Platform Heels are crafted with a glamorous glitter upper, ankle strap, and a chunky heel for added comfort and height.',
                    'price' => 149.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/michael-kors-glitter-platform-heels.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Clarks Deva Mae Sandals',
                    'slug' => 'clarks-deva-mae-sandals',
                    'short_description' => 'Sophisticated block heel sandals for parties.',
                    'description' => 'Clarks Deva Mae Sandals combine style and comfort with their suede upper, block heel, and cushioned footbed for all-night wear.',
                    'price' => 99.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/clarks-deva-mae-sandals.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Bata Gold Heeled Sandals',
                    'slug' => 'bata-gold-heeled-sandals',
                    'short_description' => 'Affordable gold-toned party sandals.',
                    'description' => 'Bata Gold Heeled Sandals feature a metallic gold upper, a sturdy block heel, and a comfortable footbed for festive occasions.',
                    'price' => 39.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/bata-gold-heeled-sandals.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Red Tape Party Loafers',
                    'slug' => 'red-tape-party-loafers',
                    'short_description' => 'Chic loafers with a glossy finish.',
                    'description' => 'Red Tape Party Loafers are crafted with premium patent leather, a slip-on design, and a cushioned sole for a sharp yet comfortable look.',
                    'price' => 49.99,
                    'stock' => 95,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/red-tape-party-loafers.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'H&M Sequin Strap Heels',
                    'slug' => 'hm-sequin-strap-heels',
                    'short_description' => 'Party-ready heels with sequin details.',
                    'description' => 'H&M Sequin Strap Heels feature glittering sequin straps, a slim stiletto heel, and a cushioned sole for a striking party look.',
                    'price' => 59.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $footware_partywear_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'partywear-footwear/hm-sequin-strap-heels.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $footware_partywear_products);   

        $travel_duffel_bag_category = Category::where('slug', 'travel-luggage-duffel-bag')->select('id', 'slug')->first();

        $travel_duffel_bag_products = [
                [
                    'name' => 'Nike Brasilia Duffel Bag',
                    'slug' => 'nike-brasilia-duffel-bag',
                    'short_description' => 'Durable and spacious duffel bag for gym and travel.',
                    'description' => 'Nike Brasilia Duffel Bag features a water-resistant bottom, multiple compartments, and an adjustable strap for versatile use.',
                    'price' => 45.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/nike-brasilia-duffel-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Adidas Defender III Duffel Bag',
                    'slug' => 'adidas-defender-iii-duffel-bag',
                    'short_description' => 'Stylish and lightweight duffel bag.',
                    'description' => 'Adidas Defender III Duffel Bag comes with reinforced panels, a large main compartment, and padded straps for comfort.',
                    'price' => 39.99,
                    'stock' => 120,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/adidas-defender-iii-duffel-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Under Armour Undeniable Duffel 4.0',
                    'slug' => 'under-armour-undeniable-duffel-4-0',
                    'short_description' => 'Water-resistant duffel bag for all conditions.',
                    'description' => 'Under Armour Undeniable Duffel 4.0 is designed with UA Storm technology, abrasion-resistant bottom, and multiple pockets.',
                    'price' => 55.00,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/under-armour-undeniable-duffel-4-0.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Samsonite Andante 2 Wheeled Duffel Bag',
                    'slug' => 'samsonite-andante-2-wheeled-duffel-bag',
                    'short_description' => 'Spacious duffel bag with wheels for easy transport.',
                    'description' => 'Samsonite Andante 2 Duffel Bag features inline wheels, multiple compartments, and durable construction for travel.',
                    'price' => 99.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/samsonite-andante-2-wheeled-duffel-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Herschel Supply Co. Novel Duffel Bag',
                    'slug' => 'herschel-supply-co-novel-duffel-bag',
                    'short_description' => 'Stylish duffel bag with a dedicated shoe compartment.',
                    'description' => 'Herschel Novel Duffel Bag features a signature striped liner, waterproof zipper, and separate shoe storage for convenience.',
                    'price' => 89.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/herschel-supply-co-novel-duffel-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Patagonia Black Hole Duffel Bag',
                    'slug' => 'patagonia-black-hole-duffel-bag',
                    'short_description' => 'Highly durable and weather-resistant duffel bag.',
                    'description' => 'Patagonia Black Hole Duffel Bag offers ample storage, water-resistant material, and reinforced handles for rugged use.',
                    'price' => 129.00,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/patagonia-black-hole-duffel-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Wildcraft Hypadura Duffel Bag',
                    'slug' => 'wildcraft-hypadura-duffel-bag',
                    'short_description' => 'Heavy-duty duffel bag for outdoor adventures.',
                    'description' => 'Wildcraft Hypadura Duffel Bag is designed with durable material, multiple compartments, and padded straps for convenience.',
                    'price' => 64.99,
                    'stock' => 75,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/wildcraft-hypadura-duffel-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'American Tourister Road Quest Duffel',
                    'slug' => 'american-tourister-road-quest-duffel',
                    'short_description' => 'Compact duffel bag for short trips.',
                    'description' => 'American Tourister Road Quest Duffel features a sleek design, lightweight build, and spacious compartments for travel.',
                    'price' => 49.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/american-tourister-road-quest-duffel.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Tumi Alpha 3 Duffel Bag',
                    'slug' => 'tumi-alpha-3-duffel-bag',
                    'short_description' => 'Premium duffel bag for business and travel.',
                    'description' => 'Tumi Alpha 3 Duffel Bag offers exceptional quality, multiple compartments, and leather trim for a luxurious look.',
                    'price' => 395.00,
                    'stock' => 30,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/tumi-alpha-3-duffel-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Puma Challenger Duffel Bag',
                    'slug' => 'puma-challenger-duffel-bag',
                    'short_description' => 'Lightweight and practical duffel bag.',
                    'description' => 'Puma Challenger Duffel Bag features a spacious interior, adjustable straps, and durable construction for gym or travel.',
                    'price' => 34.99,
                    'stock' => 150,
                    'status' => 1,
                    'category' => $travel_duffel_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'duffel-bags/puma-challenger-duffel-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $travel_duffel_bag_products); 

        $travel_luggage_bag_category = Category::where('slug', 'travel-luggage-luggage-bag')->select('id', 'slug')->first();

        $travel_luggage_bag_products = [
                [
                    'name' => 'Samsonite Winfield 3 Hardside Luggage',
                    'slug' => 'samsonite-winfield-3-hardside-luggage',
                    'short_description' => 'Durable and lightweight hardside luggage for travel.',
                    'description' => 'Samsonite Winfield 3 Hardside Luggage features a sleek design, spinner wheels, and a TSA-approved lock for secure travel.',
                    'price' => 189.99,
                    'stock' => 100,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/samsonite-winfield-3-hardside-luggage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'American Tourister Stratum XLT',
                    'slug' => 'american-tourister-stratum-xlt',
                    'short_description' => 'Stylish and durable luggage for all trips.',
                    'description' => 'American Tourister Stratum XLT luggage comes with scratch-resistant texture, spinner wheels, and a comfortable grip handle.',
                    'price' => 119.99,
                    'stock' => 90,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/american-tourister-stratum-xlt.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Delsey Paris Helium Aero Luggage',
                    'slug' => 'delsey-paris-helium-aero-luggage',
                    'short_description' => 'Premium luggage with an expandable design.',
                    'description' => 'Delsey Paris Helium Aero Luggage features a polycarbonate shell, double spinner wheels, and a TSA lock for security.',
                    'price' => 159.99,
                    'stock' => 80,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/delsey-paris-helium-aero-luggage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Travelpro Maxlite 5 Softside Luggage',
                    'slug' => 'travelpro-maxlite-5-softside-luggage',
                    'short_description' => 'Lightweight and durable softside luggage.',
                    'description' => 'Travelpro Maxlite 5 Softside Luggage offers multiple compartments, expandable design, and spinner wheels for smooth travel.',
                    'price' => 139.99,
                    'stock' => 70,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/travelpro-maxlite-5-softside-luggage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Briggs & Riley Baseline Luggage',
                    'slug' => 'briggs-and-riley-baseline-luggage',
                    'short_description' => 'Luxury luggage with lifetime warranty.',
                    'description' => 'Briggs & Riley Baseline Luggage features an expandable design, durable fabric, and smooth spinner wheels for effortless travel.',
                    'price' => 479.00,
                    'stock' => 50,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/briggs-and-riley-baseline-luggage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'VIP Check-in Luggage Bag',
                    'slug' => 'vip-check-in-luggage-bag',
                    'short_description' => 'Affordable and stylish luggage for frequent travelers.',
                    'description' => 'VIP Check-in Luggage Bag is lightweight, durable, and features smooth wheels and a retractable handle for convenience.',
                    'price' => 89.99,
                    'stock' => 110,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/vip-check-in-luggage-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Skybags Polycarbonate Luggage',
                    'slug' => 'skybags-polycarbonate-luggage',
                    'short_description' => 'Stylish and sturdy luggage for every journey.',
                    'description' => 'Skybags Polycarbonate Luggage is equipped with spinner wheels, a TSA lock, and a scratch-resistant shell for protection.',
                    'price' => 109.99,
                    'stock' => 75,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/skybags-polycarbonate-luggage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Aristocrat Wave Plus Luggage',
                    'slug' => 'aristocrat-wave-plus-luggage',
                    'short_description' => 'Compact and lightweight luggage for short trips.',
                    'description' => 'Aristocrat Wave Plus Luggage features a tough exterior, multi-directional wheels, and spacious compartments for easy packing.',
                    'price' => 74.99,
                    'stock' => 95,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/aristocrat-wave-plus-luggage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Tumi V4 Expandable Luggage',
                    'slug' => 'tumi-v4-expandable-luggage',
                    'short_description' => 'Luxury expandable luggage for business travelers.',
                    'description' => 'Tumi V4 Expandable Luggage offers superior quality, smooth wheels, and a premium design for frequent travelers.',
                    'price' => 495.00,
                    'stock' => 40,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/tumi-v4-expandable-luggage.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
                [
                    'name' => 'Wildcraft Hypadura Luggage Bag',
                    'slug' => 'wildcraft-hypadura-luggage-bag',
                    'short_description' => 'Rugged and durable luggage for outdoor travel.',
                    'description' => 'Wildcraft Hypadura Luggage Bag is crafted with tough material, multiple compartments, and smooth wheels for adventurous travelers.',
                    'price' => 129.99,
                    'stock' => 60,
                    'status' => 1,
                    'category' => $travel_luggage_bag_category,
                    'unit_id' => 5,
                    'images' => [
                        [
                            'path' => 'luggage-bags/wildcraft-hypadura-luggage-bag.png',
                            'is_primary' => '1'
                        ],
                    ]
                ],
            ];


        $products = array_merge($products, $travel_luggage_bag_products);   

            
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

        $parent_category_ids = Category::select('id')
            ->where(function($query) {
                $query->whereNull('parent_id')->orWhere('parent_id', 0);
            })
            ->whereNotIn('slug', [
                'pet-supplies',
                'hobbies-crafts',
                'snacks-sweets'
            ])
            ->pluck('id')
            ->toArray();

        $category_ids_to_exclude = array_merge($parent_category_ids, [ 
            $mobile_category->id,
            $laptop_computer_category->id,
            $electronics_leds_category->id,
            $t_shirt_category->id,
            $mens_watches_category->id,
            $mens_jackets_category->id,
            $mens_glasses_category->id,
            $women_dress_category->id,
            $women_handbag_category->id,
            $women_watch_category->id,
            $women_perfume_category->id,
            $kids_toy_category->id,
            $kids_diapers_category->id,
            $kids_clothes_category->id,
            $home_decore_category->id,
            $home_decore_curtains_category->id,
            $health_wellness_suppliment_category->id,
            $health_wellness_ayurvedic_tablet_category->id,
            $fitness_outdoor_treadmill_category->id,
            $fitness_outdoor_massager_category->id,
            $book_stationery_religious_category->id,
            $book_stationery_history_category->id,
            $book_stationery_sport_category->id,
            $beauty_facewash_category->id,
            $beauty_soap_category->id,
            $footware_sport_category->id,
            $footware_casual_category->id,
            $footware_partywear_category->id,
            $travel_duffel_bag_category->id,
            $travel_luggage_bag_category->id
        ]);

        $categories = Category::whereNotIn('id', $category_ids_to_exclude)->get();
        $product_unit_ids = ProductUnit::pluck('id')->toArray();

        foreach ($categories as $category) {
            Product::factory(10)->create([
                'category_id' => $category->id,
                'unit_id' => $product_unit_ids[array_rand($product_unit_ids)]
            ]);
        }   
    }
}