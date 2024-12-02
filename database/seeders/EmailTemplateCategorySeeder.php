<?php

namespace Database\Seeders;

use App\Models\EmailTemplateCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'order',
                'description' => 'Templates related to orders and transactions.',
                'is_active' => true
            ],
            [
                'name' => 'registration',
                'description' => 'Templates for user registration and account setup.',
                'is_active' => true
            ],
            [
                'name' => 'general',
                'description' => 'General-purpose templates for various use cases.',
                'is_active' => true
            ],
            [
                'name' => 'marketing',
                'description' => 'Templates for promotional and marketing emails.',
                'is_active' => true
            ],
            [
                'name' => 'support',
                'description' => 'Templates for customer support and inquiries.',
                'is_active' => true
            ],
        ];

        foreach ($categories as $category) {
            EmailTemplateCategory::create($category);
        }
    }
}
