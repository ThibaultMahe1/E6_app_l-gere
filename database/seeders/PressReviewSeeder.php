<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PressReview;
use Carbon\Carbon;

class PressReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PressReview::create([
            'title' => 'Concours de saut d\'obstacles : une réussite',
            'description' => 'Le centre équestre de Pontchâteau a accueilli ce week-end plus de 200 cavaliers pour son concours annuel.',
            'date' => Carbon::parse('2024-05-15'),
            'link' => 'https://www.ouest-france.fr/pays-de-la-loire/pontchateau-44160/pontchateau-le-concours-hippique-a-fait-le-plein-ce-week-end',
        ]);

        PressReview::create([
            'title' => 'Les bienfaits de l\'équitation pour les enfants',
            'description' => 'Rencontre avec l\'équipe pédagogique du club qui nous explique l\'apport du contact avec le cheval.',
            'date' => Carbon::parse('2024-09-02'),
            'link' => '#',
        ]);
        
        PressReview::create([
            'title' => 'Nouveaux aménagements au centre équestre',
            'description' => 'La carrière principale fait peau neuve avec un nouveau sol fibré.',
            'date' => Carbon::parse('2025-01-10'),
            'link' => '#',
        ]);
    }
}
