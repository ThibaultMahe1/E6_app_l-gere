@extends('layouts.layout')

@section('title', 'Aménagements - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Les Aménagements</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="lead text-muted">
                Le Centre Equestre de Pont Château vous propose des installations adaptées à la pratique de l'équitation en toute sécurité.
            </p>
        </div>
    </div>

    <!-- Visite du Centre Equestre Section -->
    <div class="row mb-5 align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="https://placehold.co/800x600?text=Vue+Aérienne+Centre" alt="Vue du centre" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-lg-6">
            <h2 class="h2 text-secondary-custom mb-4" style="font-family: 'Cinzel', serif;">Visite du Centre Equestre</h2>
            <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                Bienvenue dans notre univers dédié au cheval. Nos infrastructures ont été pensées pour le bien-être des équidés et le confort des cavaliers. Que vous soyez débutant ou compétiteur, vous trouverez ici un cadre idéal pour évoluer et partager votre passion.
            </p>
        </div>
    </div>

    <!-- Facilities Grid -->
    <div class="row g-4">
        <!-- Manège -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Manège+Couvert" class="card-img-top" alt="Manège couvert">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Manège Couvert</h5>
                    <p class="card-text text-muted">40 x 20 m</p>
                </div>
            </div>
        </div>

        <!-- Carrière 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Carrière+Sable+1" class="card-img-top" alt="Carrière de sable">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Carrière de Sable</h5>
                    <p class="card-text text-muted">60 x 40 m</p>
                </div>
            </div>
        </div>

        <!-- Carrière 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Carrière+Sable+2" class="card-img-top" alt="Grande Carrière">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Grande Carrière</h5>
                    <p class="card-text text-muted">75 x 75 m</p>
                </div>
            </div>
        </div>

        <!-- Écuries -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Écuries" class="card-img-top" alt="Écuries">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">2 Écuries</h5>
                    <p class="card-text text-muted">17 boxes (3x3m) et 8 boxes (3x3m)</p>
                </div>
            </div>
        </div>

        <!-- Stabulations -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Stabulations+Poneys" class="card-img-top" alt="Stabulations">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Stabulations</h5>
                    <p class="card-text text-muted">2 stabulations pour poneys</p>
                </div>
            </div>
        </div>

        <!-- Pré -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Pré+10ha" class="card-img-top" alt="Pré">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Grands Espaces</h5>
                    <p class="card-text text-muted">Un pré de 10 hectares</p>
                </div>
            </div>
        </div>

        <!-- Paddocks -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Paddocks" class="card-img-top" alt="Paddocks">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Paddocks</h5>
                    <p class="card-text text-muted">Plusieurs paddocks en herbe</p>
                </div>
            </div>
        </div>

        <!-- Balades -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Balades" class="card-img-top" alt="Balades">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Extérieur</h5>
                    <p class="card-text text-muted">Plusieurs itinéraires de balades</p>
                </div>
            </div>
        </div>

        <!-- Selleries -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Selleries" class="card-img-top" alt="Selleries">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Selleries</h5>
                    <p class="card-text text-muted">3 selleries (Club et Propriétaires)</p>
                </div>
            </div>
        </div>

        <!-- Sanitaires -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Sanitaires" class="card-img-top" alt="Sanitaires">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Bloc Sanitaire</h5>
                    <p class="card-text text-muted">5 douches et 3 WC</p>
                </div>
            </div>
        </div>

        <!-- Club House -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <img src="https://placehold.co/600x400?text=Club+House" class="card-img-top" alt="Club House">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary-custom">Club House</h5>
                    <p class="card-text text-muted">Un espace de convivialité</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
@endsection