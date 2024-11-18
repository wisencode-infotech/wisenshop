<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingGroup;
use Illuminate\Database\Seeder;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingGroup::insert([
            [
                'title' => 'logos',
                'sequence' => 2,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'contact-correspondence',
                'sequence' => 3,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'social-media',
                'sequence' => 4,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'site-colors',
                'sequence' => 5,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'general',
                'sequence' => 6,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'order',
                'sequence' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);

        // Order settings
        $order_settings = [
            'order_number_prefix' => '0000'
        ];

        $setting_sort_number = 1;

        foreach ($order_settings as $key => $value) {
            Setting::updateOrCreate([
                'key' => $key,
            ], [
                'value' => $value,
                'setting_group_id' => 6,
                'sort_number' => $setting_sort_number++
            ]);
        }

        // Logos settings
        $logos_settings = [
            'header_logo' => 'assets/frontend/img/header_logo.png',
            'footer_logo' => 'assets/frontend/img/header_logo.png',
            'fav_logo' => 'assets/frontend/img/header_logo.png',
            'email_header_logo' => 'assets/frontend/img/header_logo.png',
        ];

        $setting_sort_number = 1;

        foreach ($logos_settings as $key => $value) {
            Setting::updateOrCreate([
                'key' => $key,
            ], [
                'value' => $value,
                'setting_group_id' => 1,
                'sort_number' => $setting_sort_number++
            ]);
        }

        // Contact and correspondence settings
        $contact_and_correspondence_settings = [
            'email_footer_content' => '© 2024 '.config('app.name').'. All rights reserved.',
            'phone_number' => '9696669999',
            'email' => 'example@domain.com',
            'address' => '123 Example Street, Sample City, ST 12345',
            'website' => 'https://www.example.com',
            'receiver_emails' => 'receiverA@user.com, receiverB@user.com',
        ];

        $setting_sort_number = 1;

        foreach ($contact_and_correspondence_settings as $key => $value) {
            Setting::updateOrCreate([
                'key' => $key,
            ], [
                'value' => $value,
                'setting_group_id' => 2,
                'sort_number' => $setting_sort_number++
            ]);
        }

        // Social media settings
        $social_media_settings = [
            'twitter_link' => 'https://twitter.com/example',
            'facebook_link' => 'https://facebook.com/example',
            'instagram_link' => 'https://instagram.com/example',
            'copyright_link' => 'Copyright © Wisenshop. All rights reserved worldwide.',
        ];

        $setting_sort_number = 1;
        
        foreach ($social_media_settings as $key => $value) {
            Setting::updateOrCreate([
                'key' => $key,
            ], [
                'value' => $value,
                'setting_group_id' => 3,
                'sort_number' => $setting_sort_number++
            ]);
        }

        // Site colors settings seeder
        $colors_settings = [
            'color-accent' => '0, 159, 127',
            'color-accent-hover' => '0, 119, 95',
            'color-accent-contrast' => '255, 255, 255',
            'color-accent-200' => '1, 147, 118',
            'color-accent-300' => '204, 236, 229',
            'color-accent-400' => '153, 217, 204',
            'color-accent-500' => '77, 188, 165',
            'color-accent-600' => '0, 159, 127',
            'color-accent-700' => '0, 143, 114',
            'color-light' => '255, 255, 255',
            'color-dark' => '0, 0, 0',
            'color-muted-black' => '17, 17, 17',
            'text-base' => '107, 114, 128',
            'text-base-dark' => '75, 85, 99',
            'text-muted' => '156, 163, 175',
            'text-muted-light' => '209, 213, 219',
            'text-sub-heading' => '55, 65, 81',
            'text-heading' => '31, 41, 55',
            'text-bolder' => '31, 41, 55',
            'color-border-50' => '249, 250, 251',
            'color-border-100' => '243, 244, 246',
            'color-border-200' => '229, 231, 235',
            'color-border-base' => '209, 213, 219',
            'color-border-400' => '156, 163, 175'
        ];

        $setting_sort_number = 1;
        
        foreach ($colors_settings as $colors_setting_key => $colors_setting_value) {
            Setting::updateOrCreate([
                'key' => $colors_setting_key,
            ], [
                'value' => $colors_setting_value,
                'setting_group_id' => 4,
                'sort_number' => $setting_sort_number++
            ]);
        }

        // General site setting seeder
        $general_site_settings = [
            'site_title' => 'Wisenshop',
            'site_currency' => 'INR',
            'site_locale' => 'EN',
            'activate_currencies_module' => true,
            'activate_multilangual_module' => true
        ];

        $setting_sort_number = 1;
        
        foreach ($general_site_settings as $key => $value) {
            Setting::updateOrCreate([
                'key' => $key,
            ], [
                'value' => $value,
                'setting_group_id' => 5,
                'sort_number' => $setting_sort_number++
            ]);
        }
    }
}
