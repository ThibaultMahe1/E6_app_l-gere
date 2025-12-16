@extends('layouts.layout')

@section('title', 'Projet Pédagogique - Centre Équestre Pontchâteau')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="display-4 text-primary-custom mb-3" style="font-family: 'Cinzel', serif;">Notre Projet Pédagogique</h1>
            <div class="d-flex justify-content-center mb-4">
                <div style="width: 100px; height: 3px; background-color: var(--primary-color);"></div>
            </div>
        </div>
    </div>

    <!-- Les Objectifs -->
    <div class="row mb-5">
        <div class="col-12 mb-4">
            <h2 class="h2 text-secondary-custom mb-4" style="font-family: 'Cinzel', serif;">Les Objectifs</h2>
        </div>

        <!-- Equidé Section -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="h3 text-primary-custom mb-3">Equidé</h3>
                    <p class="text-muted">
                        La ligne directrice de notre enseignement est la formation du cavalier à la compréhension, au respect, à l’écoute du cheval et à l’accompagnement de l’animal dans toutes les étapes de sa vie. Nous veillons à former des futurs détenteurs d’équidés responsables, respectueux et informés.
                    </p>
                    <p class="text-muted">
                        Nos équidés vivent en semi-liberté, alternant repos au box les nuits plus froides d’hiver avec sorties diurnes au pré en groupe et pâturages à temps complet avec leurs congénères dès le printemps.
                    </p>
                    <p class="text-muted">
                        Nous les soignons, les accompagnons toute leur vie et conservons nos retraités au sein de la famille dont ils se sont entourés au fil du temps.
                    </p>
                    <p class="text-muted">
                        Nous faisons naître quelques poulains, un par an, qui ne sont pas destinés au commerce et passeront toute leur existence dans l’environnement affectif qu’ils ont toujours connu.
                    </p>
                    <p class="text-muted">
                        Nous les formons au travail d’école et adaptons leurs temps d’activité à leurs besoins, compétences et état de santé. Les séances sont variées, favorisant la curiosité naturelle du cheval et son épanouissement harmonieux tant physique que psychologique.
                    </p>
                </div>
            </div>
        </div>

        <!-- Cavalier Section -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="h3 text-primary-custom mb-3">Cavalier</h3>
                    <p class="text-muted mb-4">
                        Nous proposons aux amoureux des chevaux une pratique adaptée à leurs attentes qu’elles soient de loisirs ou de compétition, à visée professionnelle ou détente.
                    </p>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h4 class="h5 text-secondary-custom mb-3">Cavalier Loisirs</h4>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>L’autonomie / responsabilisation</li>
                                <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>Développer la confiance en soi</li>
                                <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>Respect de l’autre et vie en groupe</li>
                                <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>Respect du cheval</li>
                                <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>Épanouissement et ouverture d’esprit</li>
                                <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>Respect du rythme de l’enfant</li>
                                <li class="mb-2"><i class="fas fa-check text-primary-custom me-2"></i>Implication et respect de l’environnement</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 class="h5 text-secondary-custom mb-3">Cavalier Compétition</h4>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-2"><i class="fas fa-trophy text-primary-custom me-2"></i>L’autonomie / responsabilisation</li>
                                <li class="mb-2"><i class="fas fa-trophy text-primary-custom me-2"></i>Dépassement de soi</li>
                                <li class="mb-2"><i class="fas fa-trophy text-primary-custom me-2"></i>Se mesurer aux autres</li>
                                <li class="mb-2"><i class="fas fa-trophy text-primary-custom me-2"></i>Promotion du « collectif »</li>
                                <li class="mb-2"><i class="fas fa-trophy text-primary-custom me-2"></i>Respect du cheval</li>
                                <li class="mb-2"><i class="fas fa-trophy text-primary-custom me-2"></i>Respect des règles</li>
                                <li class="mb-2"><i class="fas fa-trophy text-primary-custom me-2"></i>Respect du travail et de l’effort</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cavalier Loisirs - Les moyens mis en place -->
    <div class="row mb-5">
        <div class="col-12 mb-4">
            <h2 class="h2 text-secondary-custom mb-4" style="font-family: 'Cinzel', serif;">Cavalier Loisirs : Les moyens mis en place</h2>
        </div>

        <div class="col-lg-12">
            <div class="accordion shadow-sm" id="accordionLoisirs">
                
                <!-- Autonomie et confiance en soi -->
                <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fw-bold text-primary-custom bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Autonomie et confiance en soi
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionLoisirs">
                        <div class="accordion-body text-muted">
                            <h5 class="text-dark mt-2">S’autonomiser</h5>
                            <p>Chaque séance équestre démarre et se termine par les soins au cheval, le cavalier prépare son cheval, il réalise les soins préparatoires, le pansage, l’équipement et observe l’état de son cheval avant de monter. Il veille également au confort de sa monture après la séance en le séchant, lui curant les pieds et déposant le matériel qu’il veillera à ranger correctement pour faciliter la tâche du cavalier suivant et préserver la qualité. Il pourra également raccompagner son cheval au pré pour son repos.</p>
                            <p>Ce temps nécessaire de pratique à pied se fait d’abord avec l’aide, puis sous la supervision de l’enseignant pour finalement se faire seul, en toute autonomie.</p>
                            <p>Le cavalier est conduit à prendre rapidement en charge seul la préparation de sa séance. Il peut consulter le montoir affiché dans la salle de club, puis préparer lui même son cheval (aller le chercher au pré pour les cavaliers plus expérimentés), et se rendre sur le terrain de pratique à l’appel de l’enseignant. Tous les moyens sont laissés à sa disposition pour cette bonne exécution.</p>

                            <h5 class="text-dark mt-4">Vaincre sa peur</h5>
                            <p>Le fait de seller son poney ou son cheval seul après l’avoir brossé, donne confiance au cavalier et le rassure et crée un lien affectif important. L’enseignant va faire comprendre comment fonctionne un cheval ou un poney à pied ou monté. Une pédagogie d’encouragement est mise en place dans toutes les activités : les enseignants soulignent le point que l’enfant ou l’adulte a bien réalisé et adaptent les exercices de façon à ce que l’enfant ou l’adulte, puisse réussir. Bien entendu les conseils permettent une progression.</p>

                            <h5 class="text-dark mt-4">Créer un climat de confiance</h5>
                            <p>La cavalerie est adaptée et importante ce qui permet à chaque cavalier d’avoir un poney ou un cheval qui lui convient et qui lui donne confiance, sans forcément que ce soit le même chaque semaine. L’enseignant va former les pratiquants pour qu’ils soient autonomes, capables d’assurer leur propre sécurité et respecter leur environnement naturel et humain, le cheval ou le poney, les encourager à poser les questions nécessaires si des explications complémentaires doivent être apportées.</p>
                        </div>
                    </div>
                </div>

                <!-- Respect de l’autre et apprentissage de la vie en groupe -->
                <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fw-bold text-primary-custom bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Respect de l’autre et apprentissage de la vie en groupe
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionLoisirs">
                        <div class="accordion-body text-muted">
                            <ul class="list-unstyled">
                                <li class="mb-3"><strong>Favoriser la notion d’entraide :</strong> les enfants plus âgés et plus expérimentés aidant les plus novices à la préparation.</li>
                                <li class="mb-3"><strong>Ne pas se moquer des autres :</strong> Pendant les cours les cavaliers ne doivent pas se moquer de leurs camarades lorsque ceux-ci ne réussissent pas un exercice. Les situations en équipe les incitent à s’encourager les uns les autres pour faire avancer le collectif.</li>
                                <li class="mb-3"><strong>Respect et écoute de l’autre :</strong> Pendant les cours les enfants apprennent à écouter l’enseignant et les consignes de sécurité sans lui couper la parole.</li>
                                <li class="mb-3"><strong>Respect des différences physiques :</strong> Un enfant handicapé, ou ayant un trouble de comportement peut être intégré dans les cours et les enfants acceptent les différences en constatant que les exercices sont réussis par tous.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Respect du cheval -->
                <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fw-bold text-primary-custom bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Respect du cheval
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionLoisirs">
                        <div class="accordion-body text-muted">
                            <p>Dès le début des toutes premières séances, les cavaliers sont accompagnés par les enseignants qui leur apprennent le bon abord de l’animal, la bonne gestuelle lors des soins préparatoires. Ils sont ensuite sensibilisés, lors du travail monté sur leur mode de communication, le tact nécessaire, le renforcement positif et la construction d’une séance de travail intégrant des temps d’échauffements, de récupération, de retour au calme, etc.</p>
                        </div>
                    </div>
                </div>

                <!-- Épanouissement de l’enfant et du cavalier et ouverture d’esprit -->
                <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed fw-bold text-primary-custom bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Épanouissement de l’enfant et du cavalier et ouverture d’esprit
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionLoisirs">
                        <div class="accordion-body text-muted">
                            <p>Les enfants sont impliqués parfois dans le déroulement des séances grâce au choix de l’activité. L’enseignant peut leur proposer des jeux ou un travail plus technique. La pédagogie ludique basée sur une bonne connaissance de l’enfant (modes d’apprentissage, individualisation, importance de l’âge) et sur la notion de réussite (situations adaptées au niveau des enfants) va leur permettre d’évoluer au mieux avec leur poney.</p>
                            <p>L’enseignant va faire progresser l’enfant en ayant des objectifs techniques clairs derrière la forme ludique (ne pas faire jouer pour jouer).</p>
                            <p>Tout au long de l’année des activités variées tant à cheval qu’à pied sont proposées afin de permettre au cavalier d’avoir une approche complète du cheval et former des pratiquants polyvalents (dressage, voltige, saut, attelage, TREC, pony games, longes, longues rênes, stretching du cheval, etc). L’accent est également mis sur les connaissances théoriques en hippologie, sécurité, règlements ainsi que la découverte de l’environnement.</p>
                        </div>
                    </div>
                </div>

                <!-- Respect du rythme de l’enfant -->
                <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed fw-bold text-primary-custom bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Respect du rythme de l’enfant
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionLoisirs">
                        <div class="accordion-body text-muted">
                            <p>Adapter l’activité selon la forme ou la fatigue. Les enseignants surveillent la concentration des cavaliers pendant les cours pour ne pas les épuiser par des exercices qu’ils ne sont pas encore capables de réaliser. Ils adaptent les activités au fil de l’année pour des reprises en douceur et des progressions échelonnées.</p>
                        </div>
                    </div>
                </div>

                <!-- Implication/Engagement/Respect de l’environnement -->
                <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed fw-bold text-primary-custom bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Implication / Engagement / Respect de l’environnement
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionLoisirs">
                        <div class="accordion-body text-muted">
                            <p>La possibilité est donnée à chacun de s’investir dans la vie associative pour permettre au club de s’améliorer et de progresser. Chaque cavalier est automatiquement adhérent à l’association des cavaliers et peut participer à la vie du club en donnant de son temps, lors des animations, des compétitions ou lors de leur préparation.</p>
                            <p>Monter à poney ou à cheval est générateur d’obligations envers l’animal et son environnement. Il faut lui prodiguer des soins nécessaires à son bien-être, respecter ses temps de pause, d’alimentation, d’abreuvement, s’en occuper avant et après son cours, ranger son matériel et veiller à ne pas polluer son environnement en laissant traîner brosses et cure-pied, papiers de bonbons, déchets plastiques et restes de pique-nique. D’une manière plus générale, l’habitat du cheval étant naturel le cavalier prendra soin des ressources nécessaires à la vie du cheval en ne gaspillant pas l’eau, économisant l’énergie, ramassant et triant ses déchets.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection