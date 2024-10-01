<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $discount_types = ['percentage', 'amount'];

        $start_date = fake()->dateTimeBetween('now', '+30 days');
        $end_date = fake()->dateTimeBetween($start_date, '+60 days');

        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(10, 100),
            'status' => true,
            'discount_type' => $discount_types[array_rand($discount_types)],
            'discount_value' => fake()->randomFloat(2, 0, 100),
            'discount_start_date' => $start_date->format('Y-m-d H:i:s'),
            'discount_end_date' => $end_date->format('Y-m-d H:i:s')
        ];
    }
}
