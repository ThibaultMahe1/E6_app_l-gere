@extends('layouts.layout')

@section('title', $gallery->title . ' - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row align-items-center mb-5">
        <div class="col-auto">
            <a href="{{ route('galeries.index') }}" class="btn btn-outline-primary-custom rounded-pill">
                <i class="fas fa-arrow-left me-2"></i>Retour
            </a>
        </div>
        <div class="col text-center">
            <h1 class="display-5 text-primary-custom mb-2" style="font-family: 'Cinzel', serif;">{{ $gallery->title }}</h1>
            <p class="text-muted"><i class="far fa-calendar-alt me-2"></i>{{ $gallery->date->format('d/m/Y') }}</p>
        </div>
        <div class="col-auto" style="width: 100px;"></div> <!-- Spacer for balance -->
    </div>

    <!-- Photos Grid - Masonry-like -->
    <div class="row g-3" id="gallery-grid">
        @forelse($photos as $photo)
            @php
                $photoUrl = 'https://placehold.co/600x400';
                if ($photo->image_path) {
                    if (Str::startsWith($photo->image_path, 'http')) {
                        $photoUrl = $photo->image_path;
                    } else {
                        $photoUrl = route('ftp.image', ['path' => ltrim($photo->image_path, '/')]);
                    }
                }
            @endphp
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="gallery-item position-relative overflow-hidden rounded shadow-sm" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#photoModal" data-bs-image="{{ $photoUrl }}" data-bs-title="{{ $photo->title }}">
                    <img src="{{ $photoUrl }}" class="w-100 object-fit-cover d-block img-fluid" style="height: 250px; object-fit: cover;" alt="{{ $photo->title }}">
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucune photo dans cette galerie.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Modal for Lightbox -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0 shadow-none">
            <div class="modal-body p-0 position-relative text-center">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3 bg-white opacity-75" data-bs-dismiss="modal" aria-label="Close"></button>
                <img src="" id="modalImage" class="img-fluid rounded shadow-lg" style="max-height: 90vh;" alt="">
                <h5 id="modalTitle" class="text-white mt-3 text-shadow"></h5>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var photoModal = document.getElementById('photoModal');
        photoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var imageUrl = button.getAttribute('data-bs-image');
            var title = button.getAttribute('data-bs-title');
            
            var modalImg = photoModal.querySelector('#modalImage');
            var modalTitle = photoModal.querySelector('#modalTitle');
            
            modalImg.src = imageUrl;
            modalImg.alt = title;
            modalTitle.textContent = title;
        });
    });
</script>

<style>
    .gallery-item img {
        transition: transform 0.3s ease;
    }
    .gallery-item:hover img {
        transform: scale(1.03);
    }
    .text-shadow {
        text-shadow: 0 2px 4px rgba(0,0,0,0.8);
    }
</style>
@endsection
