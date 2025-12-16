<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horse>
 */
class HorseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'birth_date' => fake()->date(),
            'photo_path' => null, // We can set a default placeholder in the view if null
            'type' => fake()->randomElement(['cheval', 'poney']),
        ];
    }
}
