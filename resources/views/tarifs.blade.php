@extends('layouts.layout')

@section('title', 'Tarifs - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Tarifs & Inscriptions</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <h2 class="h4 text-muted">Saison 2024 - 2025</h2>
        </div>
    </div>

    <!-- General Info Section -->
    <div class="row g-4 mb-5">
        <!-- Inscriptions -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="h4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Inscriptions</h3>
                    <p class="text-muted">
                        Un certificat médical est conseillé pour la pratique d'une activité sportive (arrêté gouvernemental du 10 juin 1971, article 6).
                    </p>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>La vaccination antitétanique est recommandée.</li>
                        <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>Les responsables légaux des cavaliers mineurs doivent impérativement remplir le formulaire d'inscription avec autorisation de soins en cas d'accident.</li>
                    </ul>
                    <div class="d-grid gap-2 mt-4">
                        <a href="{{ asset('storage/fiche de renseignement adulte.pdf') }}" target="_blank" class="btn btn-outline-secondary">
                            <i class="fas fa-file-pdf me-2"></i>Formulaire Inscription Adulte (PDF)
                        </a>
                        <a href="{{ asset('storage/fiche_renseignement_enf.pdf') }}" target="_blank" class="btn btn-outline-secondary">
                            <i class="fas fa-file-pdf me-2"></i>Formulaire Inscription Enfant (PDF)
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Licence & Sécurité -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="h4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Licence FFE</h3>
                    <p class="text-muted small">
                        La licence sportive est délivrée par la Fédération Française d'Equitation. Elle est obligatoire et comprend une assurance.
                    </p>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Licence Junior (-18 ans)
                            <span class="badge rounded-pill" style="background-color: var(--primary-color);">29 €</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Licence Adulte (+18 ans)
                            <span class="badge rounded-pill" style="background-color: var(--primary-color);">40 €</span>
                        </li>
                    </ul>

                    <h3 class="h4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Sécurité</h3>
                    <p class="text-muted small mb-0">
                        <i class="fas fa-hard-hat text-primary-custom me-2"></i>Le port de la bombe est obligatoire.<br>
                        <i class="fas fa-shield-alt text-primary-custom me-2"></i>Protège-dos obligatoire pour le cross et l'obstacle (mineurs).
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="row justify-content-center mb-5">
        <div class="col-12 text-center">
            <h3 class="h3 mb-4" style="font-family: 'Cinzel', serif;">Consultez nos tarifs</h3>
            <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-pill px-4" id="pills-chevaux-tab" data-bs-toggle="pill" data-bs-target="#pills-chevaux" type="button" role="tab" aria-controls="pills-chevaux" aria-selected="true">Tarifs Chevaux</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4 ms-3" id="pills-poneys-tab" data-bs-toggle="pill" data-bs-target="#pills-poneys" type="button" role="tab" aria-controls="pills-poneys" aria-selected="false">Tarifs Poneys</button>
                </li>
            </ul>
        </div>
    </div>

    <!-- Tabs Content -->
    <div class="tab-content" id="pills-tabContent">
        
        <!-- Tarifs Chevaux Tab -->
        <div class="tab-pane fade show active" id="pills-chevaux" role="tabpanel" aria-labelledby="pills-chevaux-tab" tabindex="0">
            <div class="mb-5">
                <div class="text-center mb-4">
                    <h2 class="display-5 text-primary-custom" style="font-family: 'Cinzel', serif;">Tarifs Chevaux</h2>
                    <p class="text-muted">Saison 2025-2026 (Applicables à partir du 1er juin 2025)</p>
                </div>

                <div class="card shadow-sm border-0 overflow-hidden mb-4">
                    <div class="card-header text-white text-center py-3" style="background-color: var(--primary-color);">
                        <h3 class="h5 mb-0" style="font-family: 'Cinzel', serif;">Forfaits Enseignement</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Forfait</th>
                                    <th>Période</th>
                                    <th>Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedTarifs['cheval']['enseignement'] as $tarif)
                                    @if(str_contains(strtolower($tarif->title), 'annuel'))
                                        <tr style="background-color: rgba(191, 155, 110, 0.1);">
                                            <td class="fw-bold text-primary-custom">{{ $tarif->title }}</td>
                                            <td>{{ $tarif->description }}</td>
                                            <td class="fw-bold text-primary-custom">
                                                {{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} € 
                                                @if($tarif->promo_text)
                                                    <small class="text-muted fw-normal">{{ $tarif->promo_text }}</small>
                                                @endif
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{ $tarif->title }}</td>
                                            <td>{{ $tarif->description }}</td>
                                            <td class="fw-bold">{{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} €</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($groupedTarifs['cheval']['option']->isNotEmpty())
                        <div class="card-footer bg-light text-center">
                            @foreach($groupedTarifs['cheval']['option'] as $option)
                                <small class="text-muted">{{ $option->title }} ({{ $option->description }}) : <strong>+{{ rtrim(rtrim(number_format($option->price, 2, ',', ' '), '0'), ',') }} €</strong></small>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="row g-4">
                    <!-- Cartes & Découverte -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="h5 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Cartes & Découverte</h4>
                                <ul class="list-group list-group-flush">
                                    @foreach($groupedTarifs['cheval']['cartes'] as $tarif)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $tarif->title }}</strong><br>
                                            @if($tarif->description)
                                                <small class="text-muted">{{ $tarif->description }}</small>
                                            @endif
                                        </div>
                                        <span class="fw-bold">{{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} €</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- À la carte -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="h5 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">À la carte</h4>
                                <ul class="list-group list-group-flush">
                                    @foreach($groupedTarifs['cheval']['a_la_carte'] as $tarif)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $tarif->title }}</strong><br>
                                            @if($tarif->description)
                                                <small class="text-muted">{{ $tarif->description }}</small>
                                            @endif
                                        </div>
                                        <span class="fw-bold">{{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} €</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Propriétaires -->
                    @if($groupedTarifs['cheval']['proprietaire']->isNotEmpty())
                    <div class="col-12">
                        <div class="card border-0 shadow-sm bg-light">
                            <div class="card-body">
                                <h4 class="h5 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Propriétaires</h4>
                                <div class="row text-center">
                                    @foreach($groupedTarifs['cheval']['proprietaire'] as $tarif)
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="p-3 bg-white rounded shadow-sm h-100">
                                            <div class="fw-bold mb-1">{{ $tarif->title }}</div>
                                            <div class="text-primary-custom h4 mb-0">
                                                {{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} €
                                                @if($tarif->frequency)<small>{{ $tarif->frequency }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ asset('storage/tarifs_2025_2026.pdf') }}" target="_blank" class="btn text-white rounded-pill px-4" style="background-color: var(--primary-color);">
                        <i class="fas fa-download me-2"></i>Télécharger les Tarifs Chevaux (PDF)
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarifs Poneys Tab -->
        <div class="tab-pane fade" id="pills-poneys" role="tabpanel" aria-labelledby="pills-poneys-tab" tabindex="0">
            <div class="mb-5">
                <div class="text-center mb-4">
                    <h2 class="display-5 text-primary-custom" style="font-family: 'Cinzel', serif;">Tarifs Poneys</h2>
                    <p class="text-muted">Saison 2025-2026</p>
                </div>

                <div class="card shadow-sm border-0 overflow-hidden mb-4">
                    <div class="card-header text-white text-center py-3" style="background-color: var(--primary-color);">
                        <h3 class="h5 mb-0" style="font-family: 'Cinzel', serif;">Forfaits Enseignement</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Forfait</th>
                                    <th>Période</th>
                                    <th>Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedTarifs['poney']['enseignement'] as $tarif)
                                    @if(str_contains(strtolower($tarif->title), 'annuel'))
                                        <tr style="background-color: rgba(52, 6, 4, 0.05);">
                                            <td class="fw-bold text-primary-custom">{{ $tarif->title }}</td>
                                            <td>{{ $tarif->description }}</td>
                                            <td class="fw-bold text-primary-custom">
                                                {{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} €
                                                @if($tarif->promo_text)
                                                    <small class="text-muted fw-normal">{{ $tarif->promo_text }}</small>
                                                @endif
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{ $tarif->title }}</td>
                                            <td>{{ $tarif->description }}</td>
                                            <td class="fw-bold">{{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} €</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($groupedTarifs['poney']['option']->isNotEmpty())
                        <div class="card-footer bg-light text-center">
                            @foreach($groupedTarifs['poney']['option'] as $option)
                                <small class="text-muted">{{ $option->title }} ({{ $option->description }}) : <strong>+{{ rtrim(rtrim(number_format($option->price, 2, ',', ' '), '0'), ',') }} €</strong></small>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="row g-4">
                    <!-- Cartes & Découverte -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="h5 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Cartes & Découverte</h4>
                                <ul class="list-group list-group-flush">
                                    @foreach($groupedTarifs['poney']['cartes'] as $tarif)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $tarif->title }}</strong><br>
                                            @if($tarif->description)
                                                <small class="text-muted">{{ $tarif->description }}</small>
                                            @endif
                                        </div>
                                        <span class="fw-bold">{{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} €</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- À la carte -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="h5 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">À la carte</h4>
                                <ul class="list-group list-group-flush">
                                    @foreach($groupedTarifs['poney']['a_la_carte'] as $tarif)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $tarif->title }}</strong><br>
                                            @if($tarif->description)
                                                <small class="text-muted">{{ $tarif->description }}</small>
                                            @endif
                                        </div>
                                        <span class="fw-bold">{{ rtrim(rtrim(number_format($tarif->price, 2, ',', ' '), '0'), ',') }} €</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ asset('storage/tarifs_2025_2026poney.pdf') }}" target="_blank" class="btn text-white rounded-pill px-4" style="background-color: var(--primary-color);">
                        <i class="fas fa-download me-2"></i>Télécharger les Tarifs Poneys (PDF)
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Conditions -->
    <div class="alert alert-light border text-center text-muted small mt-5">
        <p class="mb-1">Les forfaits et les cartes ne sont pas remboursables. Les cartes sont valables 4 mois à compter de la date d'achat.</p>
        <p class="mb-1">Les rattrapages ne sont proposés que si l'option Sérénité a été souscrite au moment de l'inscription.</p>
        <p class="mb-0">Les tarifs incluent des prestations soumises à la TVA au taux en vigueur.</p>
    </div>

</div>
@endsection
