<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ShippingMethod::insert([
            [
                'name' => 'Free Shipping',
                'description' => 'Free shipping for orders over $50',
                'price' => 0.00,
                'delivery_time' => '5-7 business days',
                'is_active' => true,
            ]
        ]);
    }
}
