@extends('layouts.layout')

@section('title', 'Accueil - Centre Équestre Pontchâteau')

@section('hero')
<div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/test-photo-carrouselle.jpg') }}" class="d-block w-100" style="height: 80vh; object-fit: cover;" alt="Centre Équestre">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h2 class="display-4 text-white">Bienvenue au Centre Équestre</h2>
                <p class="lead">Passion, Nature et Excellence à Pontchâteau</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/test-photo-carrouselle.jpg') }}" class="d-block w-100" style="height: 80vh; object-fit: cover;" alt="Équitation">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h2 class="display-4 text-white">Des Installations de Qualité</h2>
                <p class="lead">Pour le confort des cavaliers et des chevaux</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/test-photo-carrouselle.jpg') }}" class="d-block w-100" style="height: 80vh; object-fit: cover;" alt="Compétition">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h2 class="display-4 text-white">Enseignement & Compétition</h2>
                <p class="lead">Progressez à votre rythme avec nos moniteurs diplômés</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>
@endsection

@section('content')
<div class="row align-items-center mb-5">
    <div class="col-lg-6">
        <div class="pe-lg-4">
            <h2 class="mb-4 text-primary-custom border-bottom pb-2 d-inline-block">Présentation</h2>
            <p class="lead text-muted">Situé dans le Parc de Coët Roz, sur un site de 12 hectares, à 45 mns de Nantes et 30 mns de Saint Nazaire.</p>
            <p>Le Centre Equestre de Pont Château vous accueille toute l'année pour la pratique de l'équitation dans les meilleures conditions.
            Pour les cavaliers de tous niveaux et tous âges, à partir de 3 ans, le Centre équestre de Pont Château vous propose, la découverte de l'équitation, la pratique régulière ou l'initiation à la compétition, à travers différentes activités et plusieurs formules d'abonnement.</p>
            <p>Grâce à ses installations, le Centre Equestre accueille vos chevaux et poneys en pension au boxe ou au pré, ainsi que des formules de travail à la carte.</p>
            <a href="#" class="btn btn-primary mt-3">En savoir plus</a>
        </div>
    </div>
    <div class="col-lg-6 mt-4 mt-lg-0">
        <div class="position-relative">
            <img src="{{ asset('img/img1.jpg') }}" alt="Présentation" class="img-fluid rounded shadow-lg">
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm hover-card">
            <img src="{{ asset('img/img2.jpg') }}" class="card-img-top" alt="Installations" style="height: 200px; object-fit: cover;">
            <div class="card-body text-center">
                <h4 class="card-title text-primary-custom">Installations</h4>
                <p class="card-text">Des carrières, manèges et écuries modernes pour une pratique optimale.</p>
                <a href="#" class="btn btn-outline-primary btn-sm">Découvrir</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm hover-card">
            <img src="{{ asset('img/img1.jpg') }}" class="card-img-top" alt="Enseignement" style="height: 200px; object-fit: cover;">
            <div class="card-body text-center">
                <h4 class="card-title text-primary-custom">Enseignement</h4>
                <p class="card-text">Une équipe pédagogique qualifiée pour vous accompagner du débutant au confirmé.</p>
                <a href="#" class="btn btn-outline-primary btn-sm">Nos cours</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm hover-card">
            <img src="{{ asset('img/img2.jpg') }}" class="card-img-top" alt="Compétition" style="height: 200px; object-fit: cover;">
            <div class="card-body text-center">
                <h4 class="card-title text-primary-custom">Compétition</h4>
                <p class="card-text">Sorties en concours club, amateur et pro. Coaching personnalisé.</p>
                <a href="#" class="btn btn-outline-primary btn-sm">Résultats</a>
            </div>
        </div>
    </div>
</div>
@endsection
