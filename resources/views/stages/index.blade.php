@extends('layouts.layout')

@section('title', 'Stages - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Nos Stages</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="text-muted lead">Perfectionnez-vous lors de nos stages thématiques.</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($stages as $stage)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="mb-3">
                            <span class="badge bg-primary-custom rounded-pill mb-2">Stage</span>
                            <h3 class="h4 card-title text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">{{ $stage->name }}</h3>
                        </div>
                        
                        <div class="mb-4 flex-grow-1">
                            <p class="text-muted mb-2">
                                <i class="far fa-calendar-alt me-2 text-primary-custom"></i>
                                Du {{ $stage->start_date->format('d/m/Y') }} au {{ $stage->end_date->format('d/m/Y') }}
                            </p>
                            <p class="card-text text-muted line-clamp-3">{{ $stage->description }}</p>
                        </div>

                        <a href="{{ route('stages.show', $stage) }}" class="btn btn-outline-primary-custom rounded-pill mt-auto">
                            Voir le programme <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Aucun stage programmé pour le moment.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
