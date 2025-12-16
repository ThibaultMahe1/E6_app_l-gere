@extends('layouts.layout')

@section('title', 'Centres de Loisirs - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Centres de Loisirs & Scolaires</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="lead text-muted">
                Accueil de groupes, centres aérés et projets scolaires au cœur de la nature.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <!-- Introduction -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-4 p-md-5">
                    <h3 class="h4 mb-4 text-primary-custom" style="font-family: 'Cinzel', serif;">Une offre sur mesure pour les groupes</h3>
                    <p class="mb-4">
                        Vous êtes à la recherche de nouvelles activités, de nouveaux lieux d'accueil pour les enfants que vous recevrez pendant les vacances scolaires, le mercredi tout au long de l'année ou dans le cadre d'un projet scolaire.
                    </p>
                    <p>
                        Nous pouvons vous proposer plusieurs solutions :
                    </p>
                    <ul class="list-unstyled ms-3 mb-4">
                        <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i> Camps à la semaine</li>
                        <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i> Demi-journée ou journée complète</li>
                        <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i> Passage à l'heure</li>
                    </ul>
                    <p>
                        Vous souhaitez organiser ponctuellement une ou plusieurs sorties équitation ? Nous pouvons étudier avec vous la mise à disposition d'un créneau horaire hebdomadaire pendant les vacances ou tout au long de l'année.
                    </p>
                </div>
            </div>

            <!-- Facilities & Equipment -->
            <div class="row mb-5">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-horse-head fa-3x text-primary-custom"></i>
                            </div>
                            <h4 class="text-center mb-3" style="font-family: 'Cinzel', serif;">Cavalerie & Équipements</h4>
                            <p>
                                Le Centre Equestre de Pont-Château dispose d'une cavalerie adaptée (chevaux et poneys), et de tous les équipements nécessaires à la pratique d'une équitation ludique, ou d'une activité de découverte du monde du cheval.
                            </p>
                            <p class="mb-0">
                                Nos prestations incluent le prêt d'une bombe pour chaque enfant (port de la bombe aux normes EN 1384 obligatoire pour toute pratique équestre), et la mise à disposition de tout le matériel équestre.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-campground fa-3x text-primary-custom"></i>
                            </div>
                            <h4 class="text-center mb-3" style="font-family: 'Cinzel', serif;">Accueil & Camping</h4>
                            <p>
                                Nous mettons également à votre disposition le terrain de camping pour les nuits en camps, ou pour les pique-niques, ainsi que les sanitaires pour les enfants et les animateurs.
                            </p>
                            <p class="mb-0">
                                Toutes les activités équestres sont assurées par un moniteur diplômé d'État.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-light p-4 p-md-5 rounded shadow-sm text-center mb-5" style="border-left: 5px solid var(--primary-color);">
                <h3 class="h4 mb-4" style="font-family: 'Cinzel', serif; color: var(--secondary-color);">Nous contacter</h3>
                <p class="mb-4">
                    Nous nous tenons à votre disposition pour étudier toutes vos demandes, n'hésitez pas à nous contacter :
                </p>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <i class="fas fa-phone-alt text-primary-custom mb-2"></i><br>
                        <strong>02.40.19.15.45</strong>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <i class="fas fa-envelope text-primary-custom mb-2"></i><br>
                        <a href="mailto:ce.pontchateau@wanadoo.fr" class="text-decoration-none text-dark">ce.pontchateau@wanadoo.fr</a>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-map-marker-alt text-primary-custom mb-2"></i><br>
                        Centre Equestre de Pont Château<br>
                        Coët Roz - 44 160 Pontchâteau
                    </div>
                </div>
            </div>

            <!-- Gallery Link -->
            <div class="text-center">
                <a href="#" class="btn btn-lg text-white px-5 py-3" style="background-color: var(--primary-color); font-family: 'Cinzel', serif;">
                    <i class="fas fa-images me-2"></i> Un séjour au Centre Equestre ? Visitez la galerie
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
