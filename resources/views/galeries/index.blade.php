@extends('layouts.layout')

@section('title', 'Galeries - Centre Équestre Pontchâteau')

@section('content')
<!-- Search Bar (Fixed) -->
<div class="position-fixed" style="top: 100px; right: 30px; z-index: 1000;">
    <div class="d-flex align-items-center bg-white rounded-pill shadow-sm p-1">
        <input type="text" id="searchInput" class="border-0 bg-transparent" placeholder="Rechercher..." style="width: 0; padding: 0; opacity: 0; transition: all 0.4s ease; outline: none;">
        <button id="searchBtn" class="btn rounded-circle text-white d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background-color: var(--primary-color);">
            <img src="{{ asset('img-style/chercher.svg') }}" alt="Rechercher" style="width: 20px; height: 20px;">
        </button>
    </div>
</div>

<div class="container py-5">
    <!-- Header -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Galeries Photos</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="text-muted lead">Découvrez en images la vie du club, nos événements et nos pensionnaires.</p>
        </div>
    </div>

    <!-- Galleries Grid -->
    <div class="row g-4 justify-content-center" id="galleriesContainer">
        <div id="noResults" class="col-12 text-center py-5" style="display: none;">
            <p class="text-muted fs-5">Aucune galerie ne correspond à votre recherche.</p>
        </div>

        @forelse($galleries as $gallery)
            <div class="col-md-6 col-lg-4 gallery-item">
                <a href="{{ route('galeries.show', $gallery) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card gallery-card">
                        <div class="card-img-wrapper position-relative" style="height: 250px; overflow: hidden;">
                            @php
                                $imageUrl = 'https://placehold.co/600x400?text=Galerie';
                                if ($gallery->cover_image) {
                                    if (Str::startsWith($gallery->cover_image, 'http')) {
                                        $imageUrl = $gallery->cover_image;
                                    } else {
                                        $imageUrl = route('ftp.image', ['path' => ltrim($gallery->cover_image, '/')]);
                                    }
                                }
                            @endphp
                            <img src="{{ $imageUrl }}" class="card-img-top h-100 w-100 object-fit-cover transition-transform" alt="{{ $gallery->title }}">
                            <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0 transition-opacity" style="background-color: rgba(52, 6, 4, 0.4);">
                                <i class="fas fa-images text-white fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body text-center bg-white">
                            <h3 class="h5 card-title text-primary-custom mb-2 font-cinzel">{{ $gallery->title }}</h3>
                            <p class="text-muted small mb-0">
                                <i class="far fa-calendar-alt me-2"></i>{{ $gallery->date->format('d/m/Y') }}
                            </p>
                            <p class="text-muted small">
                                {{ $gallery->photos->count() }} photos
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucune galerie disponible pour le moment.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        const noResultsMsg = document.getElementById('noResults');

        // Toggle Search Bar Animation
        searchBtn.addEventListener('click', function() {
            if (searchInput.offsetWidth === 0) {
                searchInput.style.width = '250px';
                searchInput.style.padding = '0 15px';
                searchInput.style.opacity = '1';
                searchInput.focus();
            } else {
                if (searchInput.value === '') {
                    searchInput.style.width = '0';
                    searchInput.style.padding = '0';
                    searchInput.style.opacity = '0';
                }
            }
        });

        // Close on blur if empty
        searchInput.addEventListener('blur', function() {
            if (this.value === '') {
                this.style.width = '0';
                this.style.padding = '0';
                this.style.opacity = '0';
            }
        });

        // Filter Logic
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            let visibleCount = 0;

            galleryItems.forEach(function(item) {
                const title = item.querySelector('.card-title').textContent.toLowerCase();
                const date = item.querySelector('.text-muted.small').textContent.toLowerCase();

                if (title.includes(searchTerm) || date.includes(searchTerm)) {
                    item.style.display = ''; // Show
                    visibleCount++;
                } else {
                    item.style.display = 'none'; // Hide
                }
            });

            // Toggle "No Results" message
            if (visibleCount === 0 && galleryItems.length > 0) {
                noResultsMsg.style.display = 'block';
            } else {
                noResultsMsg.style.display = 'none';
            }
        });
    });
</script>

<style>
    .hover-card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }
    .hover-card:hover .overlay {
        opacity: 1 !important;
    }
    .hover-card:hover img {
        transform: scale(1.05); 
    }
    .transition-transform {
        transition: transform 0.5s ease;
    }
    .transition-opacity {
        transition: opacity 0.3s ease;
    }
</style>
@endsection
