@extends('layouts.layout')

@section('title')
Acceuil
@endsection

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/test-photo-carrouselle.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/test-photo-carrouselle.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/test-photo-carrouselle.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row align-items-start acceuil">
            <div class="col-md-6">

                <div class="separation">
                    <h3>presentation</h3>
                </div>
                <div class="presentation">
                    <p>Situé dans le Parc de Coët Roz, sur un site de 12 hectares, à 45 mns de Nantes et 30 mns de Saint Nazaire, le Centre Equestre de Pont Château vous accueille toute l'année pour la pratique de l'équitation dans les meilleures conditions.
                        Pour les cavaliers de tous niveaux et tous âges, à partir de 3 ans, le Centre équestre de Pont Château vous propose, la découverte de l'équitation, la pratique régulière ou l'initiation à la compétition, à travers différentes activités et plusieurs formules d'abonnement.<br><br>

                        Grâce à ses installations, le Centre Equestre accueille vos chevaux et poneys en pension au boxe ou au pré, ainsi que des formules de travail à la carte.</p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="img/img1.jpg" alt="" class="img-fluid">

            </div>
        </div>
        <div class="row align-items-start acceuil">
            <div class="col-md-6">
                <img src="img/img2.jpg" alt="" class="img-fluid">

            </div>
            <div class="col-md-6">
                <div class="separation">
                    <h3>La pratique de l'équitation au Centre Equestre de Pont Château</h3>
                </div>
                <div class="presentation">
                    <p>Dispensées par un moniteur diplômé d'état, toutes les activités sont adaptées aux attentes et au niveau de chaque cavalier, du débutant au confirmé, en reprise ou en cours particulier. <br><br>

                        - Saut d'obstacles <br>
                        - Dressage <br>
                        - initiation TREC<br>
                        - Voltige<br>
                        - Pony Games<br>
                        - Balades<br>
                        - Baby Poney<br>
                        - Stages pendant les vacances scolaires<br>
                        - Passage des examens fédéraux (galops)<br>
                        - Animations<br>
                        - Accueil des centres de loisirs et de vacances (avec ou sans hébergement)<br>
                        - Equithérapie<br><br>

                        Acteur dans la vie locale, le Centre Equestre de Pont Château participe régulièrement aux manifestations sportives et culturelles de la région ( floralies, 14 Juillet…) et s'associe tous les ans à la FFE dans l'organisation de la Fête du Cheval.</p>
                </div>

            </div>
        </div>

    </div>
@endsection
