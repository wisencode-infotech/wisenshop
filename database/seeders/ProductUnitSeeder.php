<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductUnit;

class ProductUnitSeeder extends Seeder
{
    public function run()
    {
        $units = [
            ['name' => 'Kilogram', 'short_name' => 'kg', 'can_have_variations' => '1'],
            ['name' => 'Gram', 'short_name' => 'g', 'can_have_variations' => '1'],
            ['name' => 'Liter', 'short_name' => 'L', 'can_have_variations' => '1'],
            ['name' => 'Milliliter', 'short_name' => 'ml', 'can_have_variations' => '1'],
            ['name' => 'Piece', 'short_name' => 'pc', 'can_have_variations' => '0'],
            ['name' => 'Dozen', 'short_name' => 'dz', 'can_have_variations' => '1'],
        ];

        foreach ($units as $unit) {
            ProductUnit::create($unit);
        }
    }
}
