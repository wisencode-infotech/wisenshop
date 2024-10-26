<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FooterMenuSection;

class FooterMenuSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footer_menu = [
            ['name' => 'Explore', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Customer Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Our information', 'created_at' => now(), 'updated_at' => now()],
        ];

        FooterMenuSection::insert($footer_menu);
    }
}
