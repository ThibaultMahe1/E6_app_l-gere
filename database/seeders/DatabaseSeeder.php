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
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'role' => 'admin',
                'password' => bcrypt('password'),
                'phone_number' => '0123456789',
            ]
        );
        
        Bouncer::assign('admin')->to($admin);
        
        // Enseignant User
        $enseignant = User::firstOrCreate(
            ['email' => 'enseignant@example.com'],
            [
                'name' => 'Enseignant',
                'role' => 'enseignant',
                'password' => bcrypt('password'),
                'phone_number' => '0987654321',
            ]
        );
        
        Bouncer::assign('enseignant')->to($enseignant);
        Bouncer::allow('enseignant')->to(['manage-events', 'view-planning']);

        // Regular User
        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'User',
                'password' => bcrypt('password'),
                'phone_number' => '0123456780',
            ]
        );

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
