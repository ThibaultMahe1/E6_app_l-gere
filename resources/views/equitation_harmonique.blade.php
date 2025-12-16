@extends('layouts.layout')

@section('title', 'Équitation Harmonique® - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Équitation Harmonique®</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
            <p class="lead text-muted mb-4">
                Une approche qui vise à instaurer un équilibre parfait entre le cavalier et son cheval, en mettant en avant la synergie, la fluidité et la compréhension mutuelle.
            </p>
            <a href="{{ asset('storage/concept equitation harmonique.pdf') }}" download class="btn btn-outline-primary rounded-pill px-4">
                <img src="{{ asset('img-style/enveloppe.svg') }}" alt="PDF" style="width: 20px; filter: brightness(0) invert(1);" class="me-2">
                Télécharger au format PDF
            </a>
        </div>
    </div>

    <!-- Introduction -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="bg-white p-4 p-lg-5 rounded shadow-sm border-start border-4 border-primary-custom">
                <p class="mb-0" style="font-size: 1.1rem; line-height: 1.8;">
                    Empruntant un chemin plus complet que les méthodes axées exclusivement sur la performance sportive brute, l'Équitation Harmonique® intègre à la fois la technique équestre et une connexion approfondie avec l'animal, favorisant ainsi une meilleure réactivité, une communication plus fine, et une performance optimisée.
                </p>
            </div>
        </div>
    </div>

    <!-- The 7 Pillars -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-5">
            <h2 class="h1 mb-3" style="color: var(--secondary-color);">Nos "7 piliers de la sagesse" équestres</h2>
        </div>

        <div class="col-lg-10 mx-auto">
            <!-- Pillar 1 -->
            <div class="row align-items-center mb-5">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <div class="display-3 fw-bold text-primary-custom opacity-25">01</div>
                </div>
                <div class="col-md-10">
                    <h3 class="h4 text-primary-custom mb-3">Technique et Sensibilité : un Duo Gagnant</h3>
                    <p class="text-muted">L'Équitation Harmonique® ne se limite pas à un travail sur le ressenti ou la connexion émotionnelle. Elle repose aussi sur une technique rigoureuse, enrichie par une écoute active du cheval. Les cavaliers apprennent à affiner leurs gestes, leur position et leur usage des aides pour favoriser une communication non verbale plus efficace.</p>
                </div>
            </div>

            <!-- Pillar 2 -->
            <div class="row align-items-center mb-5">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <div class="display-3 fw-bold text-primary-custom opacity-25">02</div>
                </div>
                <div class="col-md-10">
                    <h3 class="h4 text-primary-custom mb-3">Gestion du Stress et Optimisation des Performances</h3>
                    <p class="text-muted">En favorisant un état de calme maîtrisé chez le cavalier et le cheval, cette méthode réduit significativement le stress y compris en situation de compétition. Un cavalier capable de rester centré et en phase avec son cheval pourra mieux gérer les imprévus et les obstacles.</p>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="row align-items-center mb-5">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <div class="display-3 fw-bold text-primary-custom opacity-25">03</div>
                </div>
                <div class="col-md-10">
                    <h3 class="h4 text-primary-custom mb-3">Énergie dirigée avec Justesse et Prévention des Blessures</h3>
                    <p class="text-muted">En harmonisant leurs mouvements avec ceux du cheval, les cavaliers utilisent leur énergie de manière plus efficiente. L'équitation devient alors plus fluide et moins contraignante pour le corps. Cet alignement physique réduit le risque de blessures et améliore la longévité des deux partenaires.</p>
                </div>
            </div>

            <!-- Pillar 4 -->
            <div class="row align-items-center mb-5">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <div class="display-3 fw-bold text-primary-custom opacity-25">04</div>
                </div>
                <div class="col-md-10">
                    <h3 class="h4 text-primary-custom mb-3">L'Harmonie : Clé de la Performance</h3>
                    <p class="text-muted">En compétition, la précision est essentielle. L'Équitation Harmonique® permet d'atteindre cet objectif en cultivant une compréhension subtile des signaux émis par le cheval. Ce lien de symbiose améliore non seulement la qualité des performances mais aussi la confiance du cheval.</p>
                </div>
            </div>

            <!-- Pillar 5 -->
            <div class="row align-items-center mb-5">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <div class="display-3 fw-bold text-primary-custom opacity-25">05</div>
                </div>
                <div class="col-md-10">
                    <h3 class="h4 text-primary-custom mb-3">Adaptabilité à Tous les Niveaux de Compétition</h3>
                    <p class="text-muted">Que ce soit en dressage, en saut d'obstacles ou en concours complet, l'Équitation Harmonique® s'applique à toutes les disciplines. De nombreux champions soulignent l'importance de la connexion et de l'écoute de leur cheval pour réussir.</p>
                </div>
            </div>

            <!-- Pillar 6 -->
            <div class="row align-items-center mb-5">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <div class="display-3 fw-bold text-primary-custom opacity-25">06</div>
                </div>
                <div class="col-md-10">
                    <h3 class="h4 text-primary-custom mb-3">Développement de la Relation Cavalier-Cheval</h3>
                    <p class="text-muted">Cette approche accorde une place primordiale à la relation. En instaurant une relation de confiance et en respectant les besoins émotionnels et physiques du cheval, le cavalier construit une véritable complicité, base indispensable pour des résultats constants.</p>
                </div>
            </div>

            <!-- Pillar 7 -->
            <div class="row align-items-center mb-5">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <div class="display-3 fw-bold text-primary-custom opacity-25">07</div>
                </div>
                <div class="col-md-10">
                    <h3 class="h4 text-primary-custom mb-3">Une Approche Moderne et Évolutive</h3>
                    <p class="text-muted">L'Équitation Harmonique® s'inscrit dans une vision moderne, où l'efficacité repose sur l'alliance de la technique et de l'écoute. Elle s'adapte aux nouvelles exigences du sport équestre, valorisant le bien-être animal et l'optimisation des performances sur le long terme.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Conclusion -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card bg-dark text-white border-0 rounded-3 overflow-hidden">
                <div class="card-body p-5 text-center">
                    <h3 class="mb-4" style="font-family: 'Cinzel', serif; color: var(--primary-color);">La Voie vers l'Excellence</h3>
                    <p class="lead mb-0">
                        L'Équitation Harmonique® n'est pas une méthode ésotérique ou déconnectée des réalités de la compétition. Elle est, au contraire, une approche globale qui permet d'accéder à un niveau de performance supérieur en alliant technique, sensibilité et complicité avec le cheval.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
