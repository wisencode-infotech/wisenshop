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
            ['code' => 'en', 'name' => 'English', 'is_active' => true],
            ['code' => 'es', 'name' => 'Spanish', 'is_active' => true],
            ['code' => 'fr', 'name' => 'French', 'is_active' => false],
            ['code' => 'de', 'name' => 'German', 'is_active' => false],
            ['code' => 'zh', 'name' => 'Chinese', 'is_active' => false],
            ['code' => 'hi', 'name' => 'Hindi', 'is_active' => true],
            ['code' => 'ar', 'name' => 'Arabic', 'is_active' => false],
            ['code' => 'pt', 'name' => 'Portuguese', 'is_active' => false],
            ['code' => 'ru', 'name' => 'Russian', 'is_active' => false],
            ['code' => 'ja', 'name' => 'Japanese', 'is_active' => false],
            ['code' => 'it', 'name' => 'Italian', 'is_active' => false],
            ['code' => 'ko', 'name' => 'Korean', 'is_active' => false],
            ['code' => 'tr', 'name' => 'Turkish', 'is_active' => false],
            ['code' => 'vi', 'name' => 'Vietnamese', 'is_active' => false],
            ['code' => 'th', 'name' => 'Thai', 'is_active' => false],
            ['code' => 'nl', 'name' => 'Dutch', 'is_active' => false],
            ['code' => 'pl', 'name' => 'Polish', 'is_active' => false],
            ['code' => 'sv', 'name' => 'Swedish', 'is_active' => false],
            ['code' => 'no', 'name' => 'Norwegian', 'is_active' => false],
            ['code' => 'da', 'name' => 'Danish', 'is_active' => false],
            ['code' => 'fi', 'name' => 'Finnish', 'is_active' => false],
            ['code' => 'he', 'name' => 'Hebrew', 'is_active' => false],
            ['code' => 'el', 'name' => 'Greek', 'is_active' => false],
            ['code' => 'hu', 'name' => 'Hungarian', 'is_active' => false],
            ['code' => 'cs', 'name' => 'Czech', 'is_active' => false],
            ['code' => 'ro', 'name' => 'Romanian', 'is_active' => false],
            ['code' => 'uk', 'name' => 'Ukrainian', 'is_active' => false],
            ['code' => 'id', 'name' => 'Indonesian', 'is_active' => false]
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
