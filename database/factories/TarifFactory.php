<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarif>
 */
class TarifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'section' => fake()->word(),
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 100),
            'promo_text' => fake()->optional()->sentence(),
            'frequency' => fake()->optional()->word(),
        ];
    }
}
