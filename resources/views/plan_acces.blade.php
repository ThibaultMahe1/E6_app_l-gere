@extends('layouts.layout')

@section('title', 'Plan d\'accès - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Plan d'accès</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
        </div>
    </div>

    <div class="row g-5">
        <!-- Text Directions -->
        <div class="col-lg-5">
            <div class="card h-100 border-0 shadow-sm" style="background-color: #fdfbf7;">
                <div class="card-body p-4">
                    <h3 class="h4 text-primary-custom mb-4" style="font-family: 'Cinzel', serif;">Se rendre au Centre Équestre</h3>
                    
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <i class="fas fa-car text-primary-custom fa-lg mt-1"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="h6 fw-bold">Par la N165, de Nantes ou de St Nazaire</h5>
                            <p class="text-muted mb-0">Prendre la sortie Pont Château Centre.</p>
                        </div>
                    </div>

                    <ul class="timeline-simple list-unstyled ps-4 border-start border-primary-custom ms-2">
                        <li class="mb-3 ps-3 position-relative">
                            <span class="position-absolute top-0 start-0 translate-middle p-1 bg-white border border-primary-custom rounded-circle" style="left: -1px !important;"></span>
                            <span class="text-muted">Suivre Pont Château centre.</span>
                        </li>
                        <li class="mb-3 ps-3 position-relative">
                            <span class="position-absolute top-0 start-0 translate-middle p-1 bg-white border border-primary-custom rounded-circle" style="left: -1px !important;"></span>
                            <span class="text-muted">Avant d'entrer dans Pont Château, prendre la <strong>1ère rue à gauche</strong>, direction <em>Parc de Coët Roz</em>.</span>
                        </li>
                        <li class="mb-3 ps-3 position-relative">
                            <span class="position-absolute top-0 start-0 translate-middle p-1 bg-white border border-primary-custom rounded-circle" style="left: -1px !important;"></span>
                            <span class="text-muted">Passer devant la salle des fêtes.</span>
                        </li>
                        <li class="mb-3 ps-3 position-relative">
                            <span class="position-absolute top-0 start-0 translate-middle p-1 bg-white border border-primary-custom rounded-circle" style="left: -1px !important;"></span>
                            <span class="text-muted">Passer le pont au-dessus de la RN 165.</span>
                        </li>
                        <li class="mb-3 ps-3 position-relative">
                            <span class="position-absolute top-0 start-0 translate-middle p-1 bg-white border border-primary-custom rounded-circle" style="left: -1px !important;"></span>
                            <span class="text-muted">Continuer jusqu'au Centre Équestre.</span>
                        </li>
                    </ul>

                    <div class="alert alert-warning border-0 d-flex align-items-center mt-3" role="alert" style="background-color: rgba(191, 155, 110, 0.2); color: #8a6d3b;">
                        <i class="fas fa-map-marker-alt me-3 fa-lg"></i>
                        <div>
                            <strong>Arrivée :</strong><br>
                            Entrée sur votre droite.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="col-lg-7">
            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                <iframe 
                    width="100%" 
                    height="100%" 
                    style="border:0; min-height: 450px;" 
                    loading="lazy" 
                    allowfullscreen 
                    src="https://maps.google.com/maps?q=Centre+Equestre+de+Pont+Chateau+Coët+Roz&t=&z=15&ie=UTF8&iwloc=&output=embed">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
