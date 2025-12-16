@extends('layouts.layout')

@section('title', 'Actualités - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header Section (Matching Site D.A.) -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Actualités</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="lead text-muted">
                Suivez toute l'actualité du Centre Équestre en direct sur notre fil Facebook.
            </p>
        </div>
    </div>

    <!-- Facebook Feed Section -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="bg-white p-0 rounded shadow-sm text-center overflow-hidden">
                <!-- 
                    Facebook Widget
                    HACK: Facebook limits width to 500px. 
                    We use CSS transform scale to make it look bigger (approx 1.5x) 
                    and adjust margins to compensate for the scaling.
                -->
                <div class="d-flex justify-content-center overflow-hidden py-4">
                    <div style="transform: scale(1.5); transform-origin: top center; margin-bottom: 250px;">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcentreequestrepontchateau&tabs=timeline&width=500&height=1000&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true" 
                                width="500" 
                                height="1000" 
                                style="border:none;overflow:hidden;" 
                                scrolling="no" 
                                frameborder="0" 
                                allowfullscreen="true" 
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                        </iframe>
                    </div>
                </div>
                
                <div class="p-3 bg-light border-top">
                    <a href="https://www.facebook.com/centreequestrepontchateau" target="_blank" class="btn btn-primary">
                        <i class="fab fa-facebook me-2"></i>Voir sur Facebook
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fb-page-container {
        display: flex;
        justify-content: center;
        background: #f0f2f5;
        padding: 1rem;
        border-radius: 8px;
    }
</style>
@endsection
