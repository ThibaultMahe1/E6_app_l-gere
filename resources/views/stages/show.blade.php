@extends('layouts.layout')

@section('title', $stage->name . ' - Stages')

@section('content')
<div class="container py-5">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('stages.index') }}" class="text-decoration-none text-muted transition-colors hover:text-primary-custom">
            <i class="fas fa-arrow-left me-2"></i>Retour aux stages
        </a>
    </div>

    <div class="row g-5">
        <!-- Main Content -->
        <div class="col-lg-8">
            <h1 class="display-5 text-primary-custom mb-4 font-heading">{{ $stage->name }}</h1>
            
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-4">
                    <h3 class="h5 mb-3 text-primary-custom">Description</h3>
                    <p class="text-muted mb-0">{{ $stage->description }}</p>
                </div>
            </div>

            <!-- Daily Schedule -->
            @if($stage->daily_schedule)
                <h3 class="h4 text-primary-custom mb-4 font-heading">Programme du stage</h3>
                
                <div class="accordion custom-accordion" id="stageScheduleAccordion">
                    @foreach($stage->daily_schedule as $day)
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded overflow-hidden">
                            <h2 class="accordion-header" id="headingDay{{ $loop->index }}">
                                <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }} bg-white text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDay{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapseDay{{ $loop->index }}">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center me-3 day-circle">
                                            <span class="fw-bold small">{{ $loop->iteration }}</span>
                                        </div>
                                        <span class="fw-bold font-heading">{{ $day['date'] ?? 'Jour ' . $loop->iteration }}</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseDay{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="headingDay{{ $loop->index }}" data-bs-parent="#stageScheduleAccordion">
                                <div class="accordion-body bg-light bg-opacity-10 pt-4 pb-4">
                                    <p class="mb-3 text-muted">{{ $day['description'] ?? 'Programme à venir' }}</p>
                                    
                                    @if(isset($day['activities']) && is_array($day['activities']))
                                        <div class="border-top pt-3">
                                            <h6 class="text-primary-custom small text-uppercase fw-bold mb-3"><i class="fas fa-check-circle me-2"></i>Activités prévues</h6>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach($day['activities'] as $activity)
                                                    <span class="badge bg-white text-dark border shadow-sm fw-normal py-2 px-3">
                                                        {{ $activity }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
@else
                <div class="alert alert-light border">
                    <i class="fas fa-info-circle me-2 text-primary-custom"></i>
                    Le programme détaillé sera communiqué prochainement.
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top sticky-offset-100">
                <div class="card-body p-4">
                    <h3 class="h5 mb-4 text-primary-custom border-bottom pb-2">Informations Pratiques</h3>
                    
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3 d-flex">
                            <i class="far fa-calendar-alt mt-1 me-3 text-primary-custom"></i>
                            <div>
                                <strong>Dates :</strong><br>
                                Du {{ $stage->start_date->format('d/m/Y') }}<br>
                                au {{ $stage->end_date->format('d/m/Y') }}
                            </div>
                        </li>
                        <li class="mb-3 d-flex">
                            <i class="far fa-clock mt-1 me-3 text-primary-custom"></i>
                            <div>
                                <strong>Durée :</strong><br>
                                {{ $stage->start_date->diffInDays($stage->end_date) + 1 }} jours
                            </div>
                        </li>
                        
                        @if($stage->prices->isNotEmpty())
                        <li class="mb-3 d-flex border-top pt-3">
                            <i class="fas fa-euro-sign mt-1 me-3 text-primary-custom"></i>
                            <div class="w-100">
                                <strong>Tarifs :</strong><br>
                                <ul class="list-unstyled mt-2 mb-0">
                                    @foreach($stage->prices as $price)
                                        <li class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="text-muted small">{{ $price->label }}</span>
                                            <span class="fw-bold">{{ number_format($price->price, 2) }} €</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endif
                    </ul>

                    @auth
                        <!-- Logic for subscription could go here -->
                        <div class="d-grid">
                            <button class="btn btn-primary-custom rounded-pill">S'inscrire</button>
                        </div>
                    @else
                        <div class="alert alert-light text-center mb-0">
                            <small>Connectez-vous pour vous inscrire à ce stage.</small>
                            <a href="{{ route('login') }}" class="btn btn-outline-primary-custom btn-sm w-100 mt-2 rounded-pill">Se connecter</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
