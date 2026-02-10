<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopLaravel')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            /* Personnalisation du mode sombre avec une teinte bleutée "bleu permanent" */
            --bs-body-bg: #0b1426;
            /* Bleu nuit très sombre */
            --bs-body-color: #e0e6ed;
            --bs-dark-rgb: 11, 20, 38;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        /* Ajustements pour les cartes en mode "Dark Blue" */
        .card {
            background-color: #162035;
            /* Légèrement plus clair que le fond */
            border-color: #2c3e50;
        }

        .list-group-item {
            background-color: #162035;
            border-color: #2c3e50;
        }

        /* Ajustement footer */
        footer {
            background-color: #080f1c !important;
            /* Plus sombre que le body */
            border-top: 1px solid #2c3e50 !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm" style="--bs-bg-opacity: .2;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">ShopLaravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cart.index') ? 'active' : '' }}" href="{{ route('cart.index') }}">
                            Panier
                            @php
                            $cartCount = array_sum(session('cart', []));
                            @endphp

                            @if($cartCount > 0)
                            <span class="badge bg-danger rounded-pill ms-1">
                                {{ $cartCount }}
                            </span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">À propos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        {{-- Messages flash --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0 text-secondary">&copy; {{ date('Y') }} ShopLaravel - Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>