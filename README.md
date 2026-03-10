<h1 align="center">Centre Équestre de Pontchâteau</h1>

<p align="center">
  <strong>Application web de gestion pour un centre équestre</strong><br>
  <em>Projet réalisé dans le cadre d'un stage en entreprise</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3.1-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Alpine.js-3.4-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white" alt="Alpine.js">
  <img src="https://img.shields.io/badge/MariaDB-11-003545?style=for-the-badge&logo=mariadb&logoColor=white" alt="MariaDB 11">
  <img src="https://img.shields.io/badge/Docker-Sail-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker">
</p>

---

## Sommaire

- [Présentation](#-présentation)
- [Fonctionnalités](#-fonctionnalités)
- [Stack technique](#-stack-technique)
- [Architecture](#-architecture)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Base de données](#-base-de-données)
- [Tests](#-tests)
- [Contexte du stage](#-contexte-du-stage)

---

## Présentation

Cette application web a été développée pour le **Centre Équestre de Pontchâteau** dans le cadre d'un **stage en entreprise**. Elle propose une vitrine complète du centre ainsi qu'un espace membre permettant la gestion des inscriptions aux cours, stages et événements.

Le site offre aux visiteurs une présentation détaillée des activités du centre (équitation harmonique, projet pédagogique, centre de loisirs, pensions…) et aux cavaliers inscrits un accès à un planning interactif pour gérer leurs réservations.

---

## Fonctionnalités

### Partie publique
- **Pages vitrine** : présentation du centre, philosophie d'équitation harmonique, projet pédagogique, aménagements, centre de loisirs, pensions
- **Cavalerie** : consultation des chevaux et poneys du centre avec fiches détaillées
- **Hommage** : page mémorielle pour les chevaux décédés
- **Tarifs** : grille tarifaire organisée par catégorie (cheval/poney) et section (enseignement, options, cartes, à la carte, propriétaire)
- **Planning** : calendrier interactif des cours et événements (FullCalendar)
- **Stages** : consultation et détail des stages proposés
- **Galeries photos** : albums photos avec visionneuse
- **Revue de presse** : articles et mentions presse du centre
- **Actualités** : fil d'actualités du centre
- **Plan d'accès** et **formulaire de contact**

### Espace membre
- **Inscription / Connexion** avec vérification par email
- **Profil utilisateur** : modification et suppression de compte
- **Planning personnel** : vue des cours auxquels l'utilisateur est inscrit
- **Inscription aux événements** : abonnement aux cours, stages et compétitions avec sélection du cheval
- **Règle des 48h** : impossibilité de s'inscrire moins de 48h avant le début d'un événement

### Administration
- **Gestion des rôles** : administrateur, enseignant, utilisateur (via Silber Bouncer)
- **Gestion des événements** : création, modification et suppression de cours, stages, compétitions et balades
- **Gestion de la cavalerie** : ajout et suivi des chevaux avec planning d'activités
- **Gestion des galeries** : création d'albums et upload de photos
- **Gestion des tarifs** : mise à jour de la grille tarifaire
- **Gestion des adhérents** : suivi des formules d'abonnement et crédits

---

## Stack technique

### Backend
| Technologie | Version | Rôle |
|-------------|---------|------|
| **Laravel** | 12 | Framework PHP |
| **PHP** | 8.2+ | Langage serveur |
| **MariaDB** | 11 | Base de données relationnelle |
| **Redis** | Alpine | Cache et sessions |
| **Silber Bouncer** | 1.0 | Gestion des rôles et permissions |

### Frontend
| Technologie | Version | Rôle |
|-------------|---------|------|
| **Tailwind CSS** | 3.1 | Framework CSS utilitaire |
| **Alpine.js** | 3.4 | Réactivité côté client |
| **Bootstrap** | 5.3 | Composants UI |
| **FullCalendar** | 6.1 | Calendrier interactif |
| **Vite** | 7.0 | Bundler et serveur de développement |
| **Axios** | 1.11 | Client HTTP |

### Outils de développement
| Outil | Rôle |
|-------|------|
| **Laravel Sail** | Environnement Docker local |
| **Pest** | Framework de tests |
| **PHPStan / Larastan** | Analyse statique du code |
| **Laravel Pint** | Formatage du code |
| **Mailpit** | Test d'envoi d'emails |

---

## Architecture

```
app/
├── Http/
│   ├── Controllers/       # Contrôleurs de l'application
│   ├── Middleware/         # Middlewares personnalisés
│   └── Requests/          # Form Requests (validation)
├── Models/                # Modèles Eloquent
├── Providers/             # Service Providers
└── View/                  # Composants Blade
database/
├── factories/             # Factories pour les tests
├── migrations/            # Migrations de la BDD
└── seeders/               # Données de démonstration
resources/
└── views/                 # Vues Blade
routes/
├── web.php                # Routes principales
└── auth.php               # Routes d'authentification
tests/
├── Feature/               # Tests fonctionnels
└── Unit/                  # Tests unitaires
```

### Schéma relationnel simplifié

```
┌──────────┐     ┌──────────────┐     ┌────────────┐
│  users   │────▶│  adherents   │     │   horses   │
│          │     └──────────────┘     │            │
│          │                          └────────────┘
│          │     ┌──────────────┐           │
│          │◀───▶│  event_user  │     ┌─────┴──────┐
└──────────┘     │  (pivot)     │     │  horse     │
                 └──────┬───────┘     │  schedules │
                        │             └────────────┘
                 ┌──────┴───────┐
                 │   events     │────▶ event_prices
                 │              │────▶ event_types (pivot)
                 └──────────────┘

┌──────────┐     ┌────────────────┐
│ galleries│────▶│ gallery_photos │
└──────────┘     └────────────────┘

┌──────────────┐     ┌──────────┐
│ press_reviews│     │  tarifs  │
└──────────────┘     └──────────┘
```

### Code couleur du planning

| Type d'événement | Couleur |
|------------------|---------|
| Cours | `#bf9b6e` |
| Stages | `#340604` |
| Concours | `#2c3e50` |
| Balades | `#198754` |

---

## Prérequis

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) installé et fonctionnel
- [Composer](https://getcomposer.org/) (pour l'installation initiale)
- [Node.js](https://nodejs.org/) >= 18 et npm

---

## Installation

**1. Cloner le dépôt**
```bash
git clone <url-du-depot>
cd E6_app_l-gere
```

**2. Installer les dépendances PHP**
```bash
composer install
```

**3. Configurer l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Lancer les conteneurs Docker via Sail**
```bash
./vendor/bin/sail up -d
```

**5. Installer les dépendances frontend**
```bash
./vendor/bin/sail npm install
```

**6. Exécuter les migrations et seeders**
```bash
./vendor/bin/sail artisan migrate --seed
```

**7. Compiler les assets**
```bash
./vendor/bin/sail npm run dev
```

**8. Accéder à l'application**

| Service | URL |
|---------|-----|
| Application | [http://localhost](http://localhost) |
| Mailpit (emails) | [http://localhost:8025](http://localhost:8025) |
| Vite (HMR) | [http://localhost:5173](http://localhost:5173) |

---

## Base de données

### Services Docker

| Service | Image | Port |
|---------|-------|------|
| **laravel.test** | PHP 8.4 (Sail) | `80`, `5173` |
| **mariadb** | MariaDB 11 | `3306` |
| **redis** | Redis Alpine | `6379` |
| **mailpit** | Mailpit | `8025`, `1025` |

### Principales tables

| Table | Description |
|-------|-------------|
| `users` | Comptes utilisateurs avec rôles |
| `adherents` | Adhérents avec formule d'abonnement |
| `events` | Événements (cours, stages, concours, balades) |
| `event_types` | Types d'événements |
| `event_user` | Inscriptions aux événements (table pivot) |
| `event_prices` | Tarification par événement |
| `horses` | Chevaux et poneys du centre |
| `horse_schedules` | Plannings d'activité des chevaux |
| `tarifs` | Grille tarifaire du centre |
| `galleries` | Albums photos |
| `gallery_photos` | Photos des galeries |
| `press_reviews` | Revue de presse |

---

## Tests

```bash
# Lancer tous les tests
./vendor/bin/sail artisan test

# Lancer les tests avec Pest
./vendor/bin/sail pest

# Analyse statique avec PHPStan
./vendor/bin/sail php ./vendor/bin/phpstan analyse
```

---

## Contexte du stage

Ce projet a été réalisé dans le cadre d'un **stage en entreprise**, avec pour objectif la conception et le développement d'une application web complète pour un centre équestre.

### Compétences mobilisées

- **Conception** : analyse des besoins, modélisation de la base de données, architecture MVC
- **Développement backend** : Laravel 12, Eloquent ORM, authentification, autorisation (RBAC)
- **Développement frontend** : Tailwind CSS, Alpine.js, intégration FullCalendar
- **DevOps** : conteneurisation Docker, configuration de l'environnement de développement
- **Qualité** : tests automatisés (Pest), analyse statique (PHPStan), formatage de code (Pint)
- **Gestion de projet** : versionnement Git, organisation du code, documentation

---

<p align="center">
  Développé lors d'un stage en entreprise<br>
  <strong>Laravel 12</strong> · <strong>Tailwind CSS</strong> · <strong>Alpine.js</strong> · <strong>MariaDB</strong>
</p>
