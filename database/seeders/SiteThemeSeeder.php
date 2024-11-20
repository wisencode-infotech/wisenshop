<?php

namespace Database\Seeders;

use App\Models\SiteTheme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            [
                'name' => 'Default',
                'description' => 'Classis e-commerce theme',
                'identifier' => 'default'
            ],
            [
                'name' => 'Advanced WS',
                'description' => 'Wisenshop advanced theme',
                'identifier' => 'advance-ws'
            ]
        ];

        foreach ($themes as $theme) {
            SiteTheme::create($theme);
        }
    }
}
