<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TarifController extends Controller
{
    public function index(): View
    {
        $tarifs = Tarif::all();

        // Organize tariffs directly by category and section for easy access in the view
        $groupedTarifs = [
            'cheval' => [
                'enseignement' => $tarifs->where('category', 'cheval')->where('section', 'enseignement'),
                'option' => $tarifs->where('category', 'cheval')->where('section', 'option'),
                'cartes' => $tarifs->where('category', 'cheval')->where('section', 'cartes'),
                'a_la_carte' => $tarifs->where('category', 'cheval')->where('section', 'a_la_carte'),
                'proprietaire' => $tarifs->where('category', 'cheval')->where('section', 'proprietaire'),
            ],
            'poney' => [
                'enseignement' => $tarifs->where('category', 'poney')->where('section', 'enseignement'),
                'option' => $tarifs->where('category', 'poney')->where('section', 'option'),
                'cartes' => $tarifs->where('category', 'poney')->where('section', 'cartes'),
                'a_la_carte' => $tarifs->where('category', 'poney')->where('section', 'a_la_carte'),
            ],
        ];

        return view('tarifs', ['groupedTarifs' => $groupedTarifs]);
    }
}
