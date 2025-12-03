<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header class="header">
        <a href="{{ url('/') }}"><img src="{{ asset('img-style/logo.png') }}" alt="logo" title="logo" class="logo"></a>

        <div class="d-flex boutton-header">
            <div class="menus-deroulant">
                <a class="" href="{{ url('/') }}" role="button" aria-expanded="false">acceuil</a>
            </div>
            <div class="menus-deroulant">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Centre</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Équitation Harmonique®</a></li>
                    <li><a class="dropdown-item" href="#">Projet Pédagogique</a></li>
                    <li><a class="dropdown-item" href="#">Aménagements</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Cavalerie</a></li>
                </ul>
            </div>
            <div class="menus-deroulant">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Activités</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Planning</a></li>
                    <li><a class="dropdown-item" href="#">Stages</a></li>
                    <li><a class="dropdown-item" href="#">Centres de Loisirs</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Actualité</a></li>
                </ul>
            </div>
            <div class="menus-deroulant">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Informations</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Pensions</a></li>
                    <li><a class="dropdown-item" href="#">Tarifs</a></li>
                    <li><a class="dropdown-item" href="#">Plan d’accès</a></li>
                    <li><a class="dropdown-item" href="#">Revue de presse</a></li>
                    <li><a class="dropdown-item" href="#">Galeries</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Nous Contacter</a></li>
                </ul>
            </div>
            <div class="menus-deroulant droite">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="{{ asset('img-style/utilisateur.svg') }}" alt=""></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('/login') }}">se connecter</a></li>
                    <li><a class="dropdown-item" href="{{ url('/register') }}">crée un compte</a></li>
                </ul>
            </div>

        </div>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="mt-5 footer">
        <div class="row align-items-start">
            <div class="col">
                <h4>information </h4>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center">
                        <img src="{{ asset('img-style/appel-telephonique.svg') }}" alt="">
                        <p class="mb-0 ms-2">02 40 29 25 45</p>
                    </li>
                    <li class="d-flex align-items-center">
                        <img src="{{ asset('img-style/marqueur.svg') }}" alt="">
                        <p class="mb-0 ms-2">Le Ht Coët Roz, 44160 Pontchâteau</p>
                    </li>
                    <li class="d-flex align-items-center">
                        <img src="{{ asset('img-style/enveloppe.svg') }}" alt="">
                        <p class="mb-0 ms-2">ce.pontchateau@wanadoo.fr</p>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h4>lien utile</h4>
                <ul class="list-unstyled">
                    <li class="mb-2 d-flex align-items-center">
                        <img src="{{ asset('img-style/ffe3c.png') }}" alt="">
                        <a class="ms-2" href="#">federation française d'équitation</a>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <img src="{{ asset('img-style/logoend.gif') }}" alt="">
                        <a class="ms-2" href="#">Le comité Régional d'équitation des Pays de La Loire</a>
                    </li>
                    <li class="d-flex align-items-center">
                        <img src="{{ asset('img-style/facebook.svg') }}" alt="">
                        <a class="ms-2" href="#">Facebook : Cavaliers Coet Roz - Centre équestre Pontchâteau</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle (for dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
