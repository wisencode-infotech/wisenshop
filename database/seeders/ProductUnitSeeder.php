<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductUnit;

class ProductUnitSeeder extends Seeder
{
    public function run()
    {
        $units = [
            ['name' => 'Kilogram', 'short_name' => 'kg'],
            ['name' => 'Gram', 'short_name' => 'g'],
            ['name' => 'Liter', 'short_name' => 'L'],
            ['name' => 'Milliliter', 'short_name' => 'ml'],
            ['name' => 'Piece', 'short_name' => 'pc', 'can_have_variations' => '1'],
            ['name' => 'Dozen', 'short_name' => 'dz'],
        ];

        foreach ($units as $unit) {
            ProductUnit::create($unit);
        }
    }
}
