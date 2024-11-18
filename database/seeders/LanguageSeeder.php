<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'es', 'name' => 'Spanish'],
            ['code' => 'fr', 'name' => 'French'],
            ['code' => 'de', 'name' => 'German'],
            ['code' => 'zh', 'name' => 'Chinese'],
            ['code' => 'hi', 'name' => 'Hindi'],
            ['code' => 'ar', 'name' => 'Arabic'],
            ['code' => 'pt', 'name' => 'Portuguese'],
            ['code' => 'ru', 'name' => 'Russian'],
            ['code' => 'ja', 'name' => 'Japanese'],
            ['code' => 'it', 'name' => 'Italian'],
            ['code' => 'ko', 'name' => 'Korean'],
            ['code' => 'tr', 'name' => 'Turkish'],
            ['code' => 'vi', 'name' => 'Vietnamese'],
            ['code' => 'th', 'name' => 'Thai'],
            ['code' => 'nl', 'name' => 'Dutch'],
            ['code' => 'pl', 'name' => 'Polish'],
            ['code' => 'sv', 'name' => 'Swedish'],
            ['code' => 'no', 'name' => 'Norwegian'],
            ['code' => 'da', 'name' => 'Danish'],
            ['code' => 'fi', 'name' => 'Finnish'],
            ['code' => 'he', 'name' => 'Hebrew'],
            ['code' => 'el', 'name' => 'Greek'],
            ['code' => 'hu', 'name' => 'Hungarian'],
            ['code' => 'cs', 'name' => 'Czech'],
            ['code' => 'ro', 'name' => 'Romanian'],
            ['code' => 'uk', 'name' => 'Ukrainian'],
            ['code' => 'id', 'name' => 'Indonesian']
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
