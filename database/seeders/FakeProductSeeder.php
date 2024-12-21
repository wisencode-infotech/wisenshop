<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
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
        $categories = Category::all();
        $product_unit_ids = ProductUnit::pluck('id')->toArray();

        foreach ($categories as $category) {
            Product::factory(10)->create([
                'category_id' => $category->id,
                'unit_id' => $product_unit_ids[array_rand($product_unit_ids)]
            ]);
        }   
    }
}