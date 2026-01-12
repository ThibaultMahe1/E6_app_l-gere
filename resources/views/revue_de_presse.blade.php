@extends('layouts.layout')

@section('title', 'Revue de presse - Centre Équestre Pontchâteau')

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
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Revue de Presse</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="text-muted lead">Retrouvez les articles parlant du centre équestre.</p>
        </div>
    </div>

    <!-- Articles List -->
    <div class="row g-4 justify-content-center" id="reviewsContainer">
        <div id="noResults" class="col-12 text-center py-5" style="display: none;">
            <p class="text-muted fs-5">Aucun article ne correspond à votre recherche.</p>
        </div>

        @forelse($reviews as $review)
            <div class="col-lg-8 review-item">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h3 class="h4 card-title text-primary-custom" style="font-family: 'Cinzel', serif;">{{ $review->title }}</h3>
                            <span class="badge bg-light text-muted border">{{ $review->date->format('d/m/Y') }}</span>
                        </div>
                        <p class="card-text text-muted mb-4">{{ $review->description }}</p>
                        <a href="{{ $review->link }}" target="_blank" class="btn btn-outline-primary-custom rounded-pill">
                            Lire l'article <i class="fas fa-external-link-alt ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucun article de presse pour le moment.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');
        const reviewItems = document.querySelectorAll('.review-item');
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

        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            let visibleCount = 0;

            reviewItems.forEach(function(item) {
                const title = item.querySelector('.card-title').textContent.toLowerCase();
                const description = item.querySelector('.card-text').textContent.toLowerCase();
                const date = item.querySelector('.badge').textContent.toLowerCase();

                if (title.includes(searchTerm) || description.includes(searchTerm) || date.includes(searchTerm)) {
                    item.style.display = ''; // Show
                    visibleCount++;
                } else {
                    item.style.display = 'none'; // Hide
                }
            });

            // Toggle "No Results" message
            if (visibleCount === 0 && reviewItems.length > 0) {
                noResultsMsg.style.display = 'block';
            } else {
                noResultsMsg.style.display = 'none';
            }
        });
    });
</script>
@endsection
