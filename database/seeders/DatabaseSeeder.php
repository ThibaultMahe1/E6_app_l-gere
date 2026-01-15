<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        
        Bouncer::assign('admin')->to($admin);

        // Regular User
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        // Call other seeders
        $this->call([
            EventTypeSeeder::class,
            EventSeeder::class,
            HorseSeeder::class,
            TarifSeeder::class,
            GallerySeeder::class,
            PressReviewSeeder::class,
            StageSeeder::class,
        ]);

        // Assign types to events
        $coursType = \App\Models\EventType::where('name', 'cours')->first();
        $concoursType = \App\Models\EventType::where('name', 'concours')->first();
        
        \App\Models\Event::all()->each(function ($event) use ($coursType, $concoursType) {
            // Randomly assign a type, or none
            if (rand(0, 10) > 2) {
                $type = rand(0, 1) ? $coursType : $concoursType;
                if ($type) {
                    $event->eventTypes()->attach($type->id);
                }
            }
        });

        // Assign 3 events to Admin
        $events = \App\Models\Event::inRandomOrder()->take(3)->get();
        $admin->events()->attach($events);
    }
}
