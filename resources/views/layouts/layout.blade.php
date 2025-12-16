<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

    <header>
        <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
            <div class="container-fluid px-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img-style/logo.png') }}" alt="logo" class="logo-img">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav align-items-center gap-3">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Accueil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::routeIs('equitation-harmonique') || Request::routeIs('projet-pedagogique') || Request::routeIs('amenagements') || Request::routeIs('cavalerie') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Centre
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('equitation-harmonique') }}">Équitation Harmonique®</a></li>
                                <li><a class="dropdown-item" href="{{ route('projet-pedagogique') }}">Projet Pédagogique</a></li>
                                <li><a class="dropdown-item" href="{{ route('amenagements') }}">Aménagements</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('cavalerie') }}">Cavalerie</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::routeIs('planning') || Request::routeIs('actualites') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Activités
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('planning') }}">Planning</a></li>
                                <li><a class="dropdown-item" href="#">Stages</a></li>
                                <li><a class="dropdown-item" href="{{ route('centre-de-loisirs') }}">Centres de Loisirs</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('actualites') }}">Actualité</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Informations
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('pensions') }}">Pensions</a></li>
                                <li><a class="dropdown-item" href="{{ route('tarifs') }}">Tarifs</a></li>
                                <li><a class="dropdown-item" href="#">Plan d’accès</a></li>
                                <li><a class="dropdown-item" href="#">Revue de presse</a></li>
                                <li><a class="dropdown-item" href="#">Galeries</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Nous Contacter</a></li>
                            </ul>
                        </li>
                        
                        <!-- User Menu -->
                        <li class="nav-item dropdown user-menu">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 {{ Request::routeIs('profile.*') || Request::routeIs('my-planning') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-icon-wrapper">
                                    <img src="{{ asset('img-style/utilisateur.svg') }}" alt="User" class="user-icon">
                                </div>
                                @auth
                                    <span class="d-lg-none">{{ Auth::user()->name }}</span>
                                @endauth
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if (!Auth::check())
                                    <li><a class="dropdown-item" href="{{ url('/login') }}">Se connecter</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/register') }}">Créer un compte</a></li>
                                @else
                                    <li class="px-3 py-1 text-muted small d-none d-lg-block">Connecté en tant que<br><strong>{{ Auth::user()->name }}</strong></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mon profil</a></li>
                                    <li><a class="dropdown-item" href="{{ route('my-planning') }}">Mon planning</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                Déconnexion
                                            </a>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('hero')

    <main class="flex-grow-1">
        <div class="container content-wrapper">
            @yield('content')
        </div>
    </main>

    <footer class="footer mt-auto">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6 col-lg-4">
                    <h4 class="footer-title">Informations</h4>
                    <ul class="list-unstyled footer-links">
                        <li>
                            <img src="{{ asset('img-style/appel-telephonique.svg') }}" alt="Phone" class="footer-icon">
                            <span>02 40 29 25 45</span>
                        </li>
                        <li>
                            <img src="{{ asset('img-style/marqueur.svg') }}" alt="Location" class="footer-icon">
                            <span>Le Ht Coët Roz, 44160 Pontchâteau</span>
                        </li>
                        <li>
                            <img src="{{ asset('img-style/enveloppe.svg') }}" alt="Email" class="footer-icon">
                            <span>ce.pontchateau@wanadoo.fr</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h4 class="footer-title">Liens Utiles</h4>
                    <ul class="list-unstyled footer-links">
                        <li>
                            <img src="{{ asset('img-style/ffe3c.png') }}" alt="FFE" class="footer-logo">
                            <a href="#">Fédération Française d'Équitation</a>
                        </li>
                        <li>
                            <img src="{{ asset('img-style/logoend.gif') }}" alt="CRE" class="footer-logo">
                            <a href="#">Comité Régional d'Équitation</a>
                        </li>
                        <li>
                            <i class="fas fa-newspaper me-2 text-white-50"></i>
                            <a href="{{ route('actualites') }}">Actualités du Club</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h4 class="footer-title">Suivez-nous</h4>
                    <ul class="list-unstyled footer-links">
                        <li>
                            <img src="{{ asset('img-style/facebook.svg') }}" alt="Facebook" class="footer-icon">
                            <a href="#">Facebook : Cavaliers Coet Roz</a>
                        </li>
                    </ul>
                    <div class="mt-4">
                        <p class="small text-white-50">© {{ date('Y') }} Centre Équestre Pontchâteau. Tous droits réservés.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Navbar Scroll Effect -->
    <script>
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.custom-navbar').classList.add('scrolled');
            } else {
                document.querySelector('.custom-navbar').classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>
