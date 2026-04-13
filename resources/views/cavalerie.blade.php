@extends('layouts.layout')

@section('title', 'La Cavalerie - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3 font-heading">La Cavalerie</h1>
            <div class="d-flex justify-content-center mb-4">
                <div class="divider-primary"></div>
            </div>
            <p class="lead text-muted mb-4">
                Une cavalerie adaptée à tous les niveaux et aux différentes activités proposées par le Centre Equestre.
            </p>
        </div>
    </div>

    <!-- Description Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="bg-white p-4 p-lg-5 rounded shadow-sm border-start border-4 border-primary-custom">
                <p class="mb-3 text-muted">
                    Nos chevaux et poneys sont suivis régulièrement par un vétérinaire et un maréchal-ferrant attitrés au Centre Equestre, afin de leur apporter les meilleurs soins et tout le confort dont ils ont besoin. Naturopathe diplômée, Fabienne leur prodigue tous les soins nécessaires à leur quotidien.
                </p>
                <p class="mb-3 text-muted">
                    Un dentiste équin, un ostéopathe et un acupuncteur interviennent également régulièrement.
                </p>
                <p class="mb-0 text-muted">
                    Ils vivent en boxe durant l'hiver pour les protéger des intempéries et au pré pendant le printemps et l'été.
                </p>
            </div>
            
            <div class="mt-4 text-center">
                <a href="{{ route('hommage') }}" class="btn btn-outline-dark rounded-pill px-4">
                    <i class="fas fa-heart me-2 text-danger"></i>En mémoire de nos disparus
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="row justify-content-center mb-5 text-center">
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="p-4 bg-light rounded shadow-sm">
                <div class="display-4 fw-bold text-primary-custom mb-2">{{ $chevaux->count() }}</div>
                <div class="h5 text-secondary-custom">Chevaux</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded shadow-sm">
                <div class="display-4 fw-bold text-primary-custom mb-2">{{ $poneys->count() }}</div>
                <div class="h5 text-secondary-custom">Poneys</div>
            </div>
        </div>
    </div>

    <!-- Gallery Navigation -->
    <div class="row justify-content-center mb-4">
        <div class="col-12 text-center">
            <h3 class="h3 font-heading">Pour les découvrir, choisissez une galerie d'images</h3>
        </div>
    </div>

    <div class="position-relative">
        <div class="sticky-tabs">
            <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-pill px-4" id="pills-chevaux-tab" data-bs-toggle="pill" data-bs-target="#pills-chevaux" type="button" role="tab" aria-controls="pills-chevaux" aria-selected="true">Les Chevaux</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4 ms-3" id="pills-poneys-tab" data-bs-toggle="pill" data-bs-target="#pills-poneys" type="button" role="tab" aria-controls="pills-poneys" aria-selected="false">Les Poneys</button>
                </li>
            </ul>
        </div>

    <!-- Gallery Content -->
    <div class="tab-content" id="pills-tabContent">
        <!-- Chevaux Tab -->
        <div class="tab-pane fade show active" id="pills-chevaux" role="tabpanel" aria-labelledby="pills-chevaux-tab" tabindex="0">
            <div class="row g-4">
                @foreach($chevaux as $cheval)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="card-img-wrapper card-img-fixed">
                            @php
                                $photoUrl = 'https://placehold.co/400x300?text=' . urlencode($cheval->name);
                                if ($cheval->photo_path) {
                                    if (\Illuminate\Support\Str::startsWith($cheval->photo_path, 'http')) {
                                        $photoUrl = $cheval->photo_path;
                                    } else {
                                        $photoUrl = route('ftp.image', ['path' => ltrim($cheval->photo_path, '/')]);
                                    }
                                }
                            @endphp
                            <img src="{{ $photoUrl }}" class="card-img-top h-100 w-100 object-fit-cover" alt="{{ $cheval->name }}">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary-custom fw-bold">{{ $cheval->name }}</h5>
                            <p class="card-text text-muted small">
                                <i class="fas fa-birthday-cake me-2"></i>Né(e) le {{ $cheval->birth_date->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Poneys Tab -->
        <div class="tab-pane fade" id="pills-poneys" role="tabpanel" aria-labelledby="pills-poneys-tab" tabindex="0">
            <div class="row g-4">
                @foreach($poneys as $poney)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="card-img-wrapper card-img-fixed">
                            @php
                                $photoUrl = 'https://placehold.co/400x300?text=' . urlencode($poney->name);
                                if ($poney->photo_path) {
                                    if (\Illuminate\Support\Str::startsWith($poney->photo_path, 'http')) {
                                        $photoUrl = $poney->photo_path;
                                    } else {
                                        $photoUrl = route('ftp.image', ['path' => ltrim($poney->photo_path, '/')]);
                                    }
                                }
                            @endphp
                            <img src="{{ $photoUrl }}" class="card-img-top h-100 w-100 object-fit-cover" alt="{{ $poney->name }}">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary-custom fw-bold">{{ $poney->name }}</h5>
                            <p class="card-text text-muted small">
                                <i class="fas fa-birthday-cake me-2"></i>Né(e) le {{ $poney->birth_date->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
@endsection