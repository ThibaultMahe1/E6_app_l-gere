<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate events around now (last month to next 2 months) to ensure visibility in calendar
        $startDate = $this->faker->dateTimeBetween('-1 month', '+2 months');
        $endDate = (clone $startDate)->modify('+' . rand(1, 4) . ' hours');

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
