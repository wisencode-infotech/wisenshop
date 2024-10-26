<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FooterMenuSectionItem;

class FooterMenuSectionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footer_menu_items = [
            [
                'name' => 'Shops',
                'url' => null,
                'slug' => '/',
                'is_external' => false,
                'is_system_built' => true,
                'footer_menu_section_id' => 1,
                'content' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deals',
                'url' => '/',
                'slug' => null,
                'is_external' => true,
                'is_system_built' => false,
                'footer_menu_section_id' => 1,
                'content' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coupon',
                'url' => null,
                'slug' => 'coupon',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 1,
                'content' => 'comming soon....',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FAQ & Helps',
                'url' => null,
                'slug' => 'faq-help',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 2,
                'content' => 'comming soon....',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer Refund Policies',
                'url' => null,
                'slug' => 'customer-refund-policy',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 2,
                'content' => 'comming soon....',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Privacy policies',
                'url' => null,
                'slug' => 'privacy-policy',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 3,
                'content' => 'comming soon....',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Terms & conditions',
                'url' => null,
                'slug' => 'term-condition',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 3,
                'content' => 'comming soon....',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Contact Us',
                'url' => null,
                'slug' => 'contact-us',
                'is_external' => false,
                'is_system_built' => true,
                'footer_menu_section_id' => 3,
                'content' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        FooterMenuSectionItem::insert($footer_menu_items);
    }
}
