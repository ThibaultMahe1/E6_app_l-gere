@extends('layouts.layout')

@section('title', 'Hommage - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">En Mémoire</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="lead text-muted mb-4">
                Hommage à nos compagnons qui nous ont quittés. Ils resteront à jamais dans nos cœurs.
            </p>
        </div>
    </div>

    @if($chevaux->isEmpty() && $poneys->isEmpty())
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="text-muted">Aucun hommage pour le moment.</p>
            </div>
        </div>
    @else
        <!-- Gallery Navigation -->
        <div class="position-relative">
            <div style="position: sticky; top: 80px; z-index: 1020; background-color: var(--bg-color); padding: 10px 0; margin-bottom: 20px;">
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
                    <div class="row g-4 justify-content-center">
                        @foreach($chevaux as $cheval)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm hover-card" onclick="openModal('{{ $cheval->id }}')" style="cursor: pointer;">
                                <div class="card-img-wrapper" style="height: 250px; overflow: hidden;">
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
                                    <img src="{{ $photoUrl }}" class="card-img-top h-100 w-100 object-fit-cover grayscale-img" alt="{{ $cheval->name }}">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title text-primary-custom fw-bold">{{ $cheval->name }}</h5>
                                    <p class="card-text text-muted small">
                                        <i class="fas fa-star me-2"></i>{{ $cheval->birth_date->format('Y') }} - ...
                                    </p>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $cheval->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $cheval->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content bg-transparent border-0">
                                        <div class="modal-body p-0 text-center position-relative">
                                            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <img src="{{ $photoUrl }}" class="img-fluid rounded shadow-lg" alt="{{ $cheval->name }}">
                                            <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                                <h3 class="text-white mb-0" style="font-family: 'Cinzel', serif;">{{ $cheval->name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Poneys Tab -->
                <div class="tab-pane fade" id="pills-poneys" role="tabpanel" aria-labelledby="pills-poneys-tab" tabindex="0">
                    <div class="row g-4 justify-content-center">
                        @foreach($poneys as $poney)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm hover-card" onclick="openModal('{{ $poney->id }}')" style="cursor: pointer;">
                                <div class="card-img-wrapper" style="height: 250px; overflow: hidden;">
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
                                    <img src="{{ $photoUrl }}" class="card-img-top h-100 w-100 object-fit-cover grayscale-img" alt="{{ $poney->name }}">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title text-primary-custom fw-bold">{{ $poney->name }}</h5>
                                    <p class="card-text text-muted small">
                                        <i class="fas fa-star me-2"></i>{{ $poney->birth_date->format('Y') }} - ...
                                    </p>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $poney->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $poney->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content bg-transparent border-0">
                                        <div class="modal-body p-0 text-center position-relative">
                                            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <img src="{{ $photoUrl }}" class="img-fluid rounded shadow-lg" alt="{{ $poney->name }}">
                                            <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                                <h3 class="text-white mb-0" style="font-family: 'Cinzel', serif;">{{ $poney->name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <div class="row justify-content-center mt-5">
        <div class="col-auto">
            <a href="{{ route('cavalerie') }}" class="btn btn-outline-primary rounded-pill px-4">
                <i class="fas fa-arrow-left me-2"></i>Retour à la cavalerie
            </a>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        var myModal = new bootstrap.Modal(document.getElementById('modal-' + id));
        myModal.show();
    }
</script>

<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
    .grayscale-img {
        filter: grayscale(100%);
        transition: filter 0.3s ease;
    }
    .hover-card:hover .grayscale-img {
        filter: grayscale(0%);
    }
    .nav-pills .nav-link {
        color: var(--primary-color);
        background-color: transparent;
        border: 1px solid var(--primary-color);
    }
    .nav-pills .nav-link.active {
        background-color: var(--primary-color);
        color: white;
    }
</style>
@endsection
