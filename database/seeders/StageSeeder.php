<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    public function run(): void
    {
        $stageType = EventType::firstOrCreate(['name' => 'stage']);
        
        // Stage Toussaint
        $stage1 = Event::create([
            'name' => 'Stage Perfectionnement Saut',
            'description' => 'Un stage intensif de 3 jours pour améliorer votre technique à l\'obstacle. Travail sur les trajectoires, l\'abord et l\'équilibre.',
            'start_date' => now()->addWeeks(2)->startOfWeek(),
            'end_date' => now()->addWeeks(2)->startOfWeek()->addDays(2),
            'daily_schedule' => [
                [
                    'date' => 'Lundi',
                    'description' => 'Matin : Travail sur le plat et barres au sol. Après-midi : Gymnastique à l\'obstacle.',
                    'activities' => ['Détente', 'Position', 'Sauts isolés']
                ],
                [
                    'date' => 'Mardi',
                    'description' => 'Matin : Enchaînement de lignes. Après-midi : Travail sur la précision.',
                    'activities' => ['Lignes courbes', 'Combinaisons', 'Vidéo']
                ],
                [
                    'date' => 'Mercredi',
                    'description' => 'Matin : Reconnaissance de parcours. Après-midi : Enchaînement complet type concours.',
                    'activities' => ['Parcours 80cm', 'Parcours 1m', 'Debriefing']
                ]
            ]
        ]);
        $stage1->eventTypes()->attach($stageType);

        // Stage Initiation
        $stage2 = Event::create([
            'name' => 'Découverte Équitation',
            'description' => 'Stage d\'initiation pour les débutants. Découvrez le monde du cheval en douceur.',
            'start_date' => now()->addWeeks(4)->startOfWeek(),
            'end_date' => now()->addWeeks(4)->startOfWeek()->addDays(1),
            'daily_schedule' => [
                [
                    'date' => 'Jour 1',
                    'description' => 'Matin : Approche du cheval et pansage. Après-midi : Première mise en selle.',
                ],
                [
                    'date' => 'Jour 2',
                    'description' => 'Matin : Jeux à poney. Après-midi : Balade en main.',
                ]
            ]
        ]);
        $stage2->eventTypes()->attach($stageType);
    }
}
