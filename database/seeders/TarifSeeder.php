<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarif;

class TarifSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('TarifSeeder is running!');
        // === CHEVAUX ===

        // Enseignement
        Tarif::create([
            'category' => 'cheval',
            'section' => 'enseignement',
            'title' => '1er trimestre',
            'description' => '8 sept. - 20 déc. (13 séances)',
            'price' => 245.00,
        ]);
        Tarif::create([
            'category' => 'cheval',
            'section' => 'enseignement',
            'title' => '2e trimestre',
            'description' => '5 janv. - 28 mars (11 séances)',
            'price' => 210.00,
        ]);
        Tarif::create([
            'category' => 'cheval',
            'section' => 'enseignement',
            'title' => '3e trimestre',
            'description' => '7 avril - 4 juillet (11 séances)',
            'price' => 210.00,
        ]);
        Tarif::create([
            'category' => 'cheval',
            'section' => 'enseignement',
            'title' => 'Forfait Annuel',
            'description' => '35 séances',
            'price' => 645.00,
            'promo_text' => '(au lieu de 660 €)',
        ]);

        // Option Sérénité
        Tarif::create([
            'category' => 'cheval',
            'section' => 'option',
            'title' => 'Option Sérénité',
            'description' => '3 rattrapages/an',
            'price' => 30.00,
        ]);

        // Cartes
        Tarif::create([
            'category' => 'cheval',
            'section' => 'cartes',
            'title' => 'Carte 10 séances',
            'description' => 'Valable 4 mois',
            'price' => 220.00,
        ]);
        Tarif::create([
            'category' => 'cheval',
            'section' => 'cartes',
            'title' => 'Carte Découverte',
            'description' => '5 séances (1 seule fois/cavalier)',
            'price' => 95.00,
        ]);

        // A la carte
        Tarif::create([
            'category' => 'cheval',
            'section' => 'a_la_carte',
            'title' => 'Heure passager',
            'price' => 26.00,
        ]);
        Tarif::create([
            'category' => 'cheval',
            'section' => 'a_la_carte',
            'title' => 'Cours particulier',
            'description' => 'Max 3 cavaliers',
            'price' => 38.00,
        ]);

        // Propriétaires
        Tarif::create([
            'category' => 'cheval',
            'section' => 'proprietaire',
            'title' => 'Pension Box',
            'price' => 365.00,
            'frequency' => '/mois',
        ]);
        Tarif::create([
            'category' => 'cheval',
            'section' => 'proprietaire',
            'title' => 'Adhésion Annuelle',
            'price' => 85.00,
        ]);
        Tarif::create([
            'category' => 'cheval',
            'section' => 'proprietaire',
            'title' => 'Carte 10 séances (Proprio)',
            'price' => 60.00,
        ]);


        // === PONEYS ===

        // Enseignement
        Tarif::create([
            'category' => 'poney',
            'section' => 'enseignement',
            'title' => '1er trimestre',
            'description' => '8 sept. - 20 déc. (13 séances)',
            'price' => 210.00,
        ]);
        Tarif::create([
            'category' => 'poney',
            'section' => 'enseignement',
            'title' => '2e trimestre',
            'description' => '5 janv. - 28 mars (11 séances)',
            'price' => 170.00,
        ]);
        Tarif::create([
            'category' => 'poney',
            'section' => 'enseignement',
            'title' => '3e trimestre',
            'description' => '7 avril - 4 juillet (11 séances)',
            'price' => 170.00,
        ]);
        Tarif::create([
            'category' => 'poney',
            'section' => 'enseignement',
            'title' => 'Forfait Annuel',
            'description' => '35 séances',
            'price' => 530.00,
            'promo_text' => '(au lieu de 550 €)',
        ]);
        
        // Option
         Tarif::create([
            'category' => 'poney',
            'section' => 'option',
            'title' => 'Option Sérénité',
            'description' => '3 rattrapages/an',
            'price' => 30.00,
        ]);

        // Cartes
        Tarif::create([
            'category' => 'poney',
            'section' => 'cartes',
            'title' => 'Carte 10 séances',
            'description' => 'Valable 4 mois',
            'price' => 170.00,
        ]);
        Tarif::create([
            'category' => 'poney',
            'section' => 'cartes',
            'title' => 'Carte Découverte',
            'description' => '5 séances (1 seule fois/cavalier)',
            'price' => 75.00,
        ]);

        // A la carte
        Tarif::create([
            'category' => 'poney',
            'section' => 'a_la_carte',
            'title' => 'Heure passager',
            'price' => 19.00,
        ]);
        Tarif::create([
            'category' => 'poney',
            'section' => 'a_la_carte',
            'title' => 'Cours particulier',
            'description' => 'Max 3 cavaliers',
            'price' => 38.00,
        ]);
    }
}
