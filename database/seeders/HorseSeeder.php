<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 horses
        \App\Models\Horse::factory()->count(10)->create([
            'type' => 'cheval',
        ]);

        // Create 10 ponies
        \App\Models\Horse::factory()->count(10)->create([
            'type' => 'poney',
        ]);
    }
}
