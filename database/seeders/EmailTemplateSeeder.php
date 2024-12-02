<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use App\Models\EmailTemplateCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'order_confirmation',
                'subject' => 'Order Confirmation: {order_id}',
                'body_html' => '<p>Dear {customer_name},</p><p>Your order {order_id} has been confirmed.</p>',
                'body_text' => 'Dear {customer_name},\nYour order {order_id} has been confirmed.',
                'locale' => 'en',
                'is_active' => true,
            ],
            [
                'name' => 'user_registration',
                'subject' => 'Welcome, {user_name}!',
                'body_html' => '<p>Welcome {user_name},</p><p>Thank you for registering!</p>',
                'body_text' => 'Welcome {user_name},\nThank you for registering!',
                'locale' => 'en',
                'is_active' => true,
            ],
            [
                'name' => 'password_reset',
                'subject' => 'Reset Your Password',
                'body_html' => '<p>Click <a href="{reset_link}">here</a> to reset your password.</p>',
                'body_text' => 'Click the following link to reset your password: {reset_link}',
                'locale' => 'en',
                'is_active' => true,
            ],
            [
                'name' => 'promotion_announcement',
                'subject' => 'Exciting Promotions Just for You!',
                'body_html' => '<p>Dear {customer_name},</p><p>Check out our latest promotions.</p>',
                'body_text' => 'Dear {customer_name},\nCheck out our latest promotions.',
                'locale' => 'en',
                'is_active' => true,
            ],
        ];

        $categories = EmailTemplateCategory::select('id')->pluck('id')->all();

        foreach ($templates as $template) {
            $template['email_template_category_id'] = $categories[array_rand($categories)];
            EmailTemplate::create($template);
        }
    }
}
