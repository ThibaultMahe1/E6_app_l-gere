@extends('layouts.layout')

@section('title', 'Pensions - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Les Pensions</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="lead text-muted">
                Le Centre Equestre de Pont Château accueille votre cheval à l'année, hébergé en boxe 3x3 avec ouverture sur la carrière ou sur l'écurie.
            </p>
        </div>
    </div>

    <!-- Prestations Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4 p-lg-5">
                    <h3 class="h4 mb-4 text-primary-custom" style="font-family: 'Cinzel', serif;">Les Prestations Incluses</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-tint text-primary-custom mt-1 me-3"></i>
                            <span>Abreuvoir automatique</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-bed text-primary-custom mt-1 me-3"></i>
                            <span>Boxe paillé tous les jours</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-carrot text-primary-custom mt-1 me-3"></i>
                            <span>Foin 2 fois par jour</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-utensils text-primary-custom mt-1 me-3"></i>
                            <span>Alimentation Industrielle (granulés), ou traditionnelle (Orge, Avoine, granulés)</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-broom text-primary-custom mt-1 me-3"></i>
                            <span>Désinfection du boxe hebdomadaire</span>
                        </li>
                    </ul>

                    <h3 class="h4 mb-4 mt-5 text-primary-custom" style="font-family: 'Cinzel', serif;">Options Supplémentaires</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-tree text-primary-custom mt-1 me-3"></i>
                            <span>Sorties au paddock (avec supplément)</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-horse-head text-primary-custom mt-1 me-3"></i>
                            <span>Travail de votre cheval à la demande par moniteur D.E (avec supplément)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section (Placeholders) -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="position-relative overflow-hidden rounded shadow-sm group-hover-zoom">
                <img src="{{ asset('img/pension-1.jpg') }}" onerror="this.src='https://placehold.co/600x400?text=Boxe+Cheval'" class="img-fluid w-100" alt="Boxe Cheval" style="height: 250px; object-fit: cover;">
                <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white p-2 text-center">
                    <small>Boxe spacieux</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="position-relative overflow-hidden rounded shadow-sm group-hover-zoom">
                <img src="{{ asset('img/pension-2.jpg') }}" onerror="this.src='https://placehold.co/600x400?text=Carriere'" class="img-fluid w-100" alt="Carrière" style="height: 250px; object-fit: cover;">
                <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white p-2 text-center">
                    <small>Accès Carrière</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="position-relative overflow-hidden rounded shadow-sm group-hover-zoom">
                <img src="{{ asset('img/pension-3.jpg') }}" onerror="this.src='https://placehold.co/600x400?text=Ecurie'" class="img-fluid w-100" alt="Écurie" style="height: 250px; object-fit: cover;">
                <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white p-2 text-center">
                    <small>Vue Écurie</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarifs Link -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
            <div class="bg-light p-4 rounded border">
                <h4 class="mb-3" style="font-family: 'Cinzel', serif;">Intéressé par nos tarifs ?</h4>
                <a href="#" class="btn btn-primary btn-lg px-5 rounded-pill">
                    Consultez la rubrique "Tarifs" <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Disclaimer -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="fas fa-exclamation-triangle me-3 fa-2x"></i>
                <div>
                    <strong>Important :</strong> Le Centre Equestre de Pont Château se réserve le droit de refuser l'accueil de tout équidé qui ne serait pas à jour de ses vaccinations ou non pucé.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
