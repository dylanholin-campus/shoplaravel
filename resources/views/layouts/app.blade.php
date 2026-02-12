<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ShopLaravel')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Crimson+Text:wght@400;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --tes-bg-900: #0f1110;
            --tes-bg-800: #161816;
            --tes-bg-700: #1e211d;
            --tes-text: #e8e2cf;
            --tes-muted: #b8af95;
            --tes-gold: #c5a46a;
            --tes-gold-soft: #8f7446;
            --tes-danger: #8f3c33;
            --bs-body-bg: var(--tes-bg-900);
            --bs-body-color: var(--tes-text);
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: var(--tes-text);
            font-family: 'Crimson Text', Georgia, serif;
            background:
                radial-gradient(circle at 20% 0%, rgba(197, 164, 106, 0.08), transparent 45%),
                radial-gradient(circle at 80% 100%, rgba(143, 116, 70, 0.10), transparent 45%),
                linear-gradient(160deg, #0d0f0e 0%, #171914 45%, #10110f 100%);
        }

        main {
            flex: 1;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .navbar-brand,
        .btn {
            font-family: 'Cinzel', serif;
            letter-spacing: 0.02em;
        }

        .tes-navbar {
            background: linear-gradient(180deg, rgba(27, 29, 25, .96), rgba(15, 16, 14, .96)) !important;
            border-bottom: 1px solid rgba(197, 164, 106, 0.35);
            box-shadow: 0 6px 20px rgba(0, 0, 0, .35);
        }

        .navbar .nav-link {
            color: #ddd5bf;
            transition: color .2s ease;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--tes-gold) !important;
        }

        .navbar-text {
            color: var(--tes-muted) !important;
        }

        .card {
            background: linear-gradient(180deg, rgba(31, 34, 29, .95), rgba(21, 23, 20, .95));
            border: 1px solid rgba(197, 164, 106, .25);
            box-shadow: 0 10px 24px rgba(0, 0, 0, .28);
        }

        .card-header {
            background: linear-gradient(90deg, rgba(197, 164, 106, .15), rgba(197, 164, 106, .05)) !important;
            border-bottom: 1px solid rgba(197, 164, 106, .2) !important;
        }

        .list-group-item {
            background-color: var(--tes-bg-700);
            border-color: rgba(197, 164, 106, .15);
            color: var(--tes-text);
        }

        .table,
        .table td,
        .table th {
            color: var(--tes-text);
            border-color: rgba(197, 164, 106, .14) !important;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(197, 164, 106, .08);
        }

        .btn-primary {
            --bs-btn-bg: #7e5f35;
            --bs-btn-border-color: #7e5f35;
            --bs-btn-hover-bg: #987546;
            --bs-btn-hover-border-color: #987546;
            --bs-btn-active-bg: #6d512c;
            --bs-btn-active-border-color: #6d512c;
        }

        .btn-secondary {
            --bs-btn-bg: #30362f;
            --bs-btn-border-color: #4a5346;
            --bs-btn-hover-bg: #3a4338;
            --bs-btn-hover-border-color: #5d6b58;
            --bs-btn-active-bg: #2a3029;
            --bs-btn-active-border-color: #3f493d;
        }

        .btn-success {
            --bs-btn-bg: #3e5a3a;
            --bs-btn-border-color: #4e7447;
            --bs-btn-hover-bg: #4b6d45;
            --bs-btn-hover-border-color: #5e8757;
            --bs-btn-active-bg: #375132;
            --bs-btn-active-border-color: #466740;
        }

        .btn-dark {
            --bs-btn-bg: #1b1f1a;
            --bs-btn-border-color: #4a5346;
            --bs-btn-hover-bg: #232923;
            --bs-btn-hover-border-color: #5b6656;
            --bs-btn-active-bg: #161a16;
            --bs-btn-active-border-color: #444d40;
        }

        .btn-outline-primary {
            --bs-btn-color: var(--tes-gold);
            --bs-btn-border-color: var(--tes-gold-soft);
            --bs-btn-hover-bg: #8e7144;
            --bs-btn-hover-border-color: #8e7144;
            --bs-btn-hover-color: #151515;
        }

        .btn-outline-warning {
            --bs-btn-color: #d7b67a;
            --bs-btn-border-color: #8f7446;
            --bs-btn-hover-bg: #a6844f;
            --bs-btn-hover-border-color: #a6844f;
            --bs-btn-hover-color: #171717;
        }

        .btn-outline-danger {
            --bs-btn-color: #cc8b81;
            --bs-btn-border-color: #8f3c33;
            --bs-btn-hover-bg: #8f3c33;
            --bs-btn-hover-border-color: #8f3c33;
            --bs-btn-hover-color: #f7ece8;
        }

        .btn-outline-light {
            --bs-btn-color: #ddd5bf;
            --bs-btn-border-color: #98845f;
            --bs-btn-hover-bg: #98845f;
            --bs-btn-hover-border-color: #98845f;
            --bs-btn-hover-color: #161616;
        }

        .badge.bg-danger {
            background-color: var(--tes-danger) !important;
        }

        .badge.bg-secondary {
            background-color: #4a5346 !important;
        }

        .badge.bg-info {
            background-color: #3d6170 !important;
        }

        .badge.bg-warning {
            background-color: #9f7d4a !important;
            color: #151515 !important;
        }

        .alert {
            border: 1px solid rgba(197, 164, 106, .28);
        }

        .alert-success {
            background: rgba(68, 98, 63, .25);
            color: #d9ebd3;
        }

        .alert-danger {
            background: rgba(143, 60, 51, .25);
            color: #f0d7d3;
        }

        .alert-info {
            background: rgba(79, 93, 120, .3);
            color: #d8e0f0;
        }

        .alert-warning {
            background: rgba(159, 125, 74, .28);
            color: #f8ecd6;
        }

        .form-control,
        .form-select {
            background-color: #1c1f1b;
            border-color: rgba(197, 164, 106, .28);
            color: var(--tes-text);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--tes-gold-soft);
            box-shadow: 0 0 0 .2rem rgba(197, 164, 106, .18);
        }

        footer {
            background: linear-gradient(180deg, #11130f, #0b0c0b) !important;
            border-top: 1px solid rgba(197, 164, 106, 0.25) !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark tes-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Marché de Tamriel</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Sanctuaire</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                            href="{{ route('products.index') }}">Échoppes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cart.index') ? 'active' : '' }}"
                            href="{{ route('cart.index') }}">
                            Besace
                            @php($cartCount = collect(session('cart', []))->sum())
                            @if($cartCount > 0)
                            <span class="badge bg-danger rounded-pill ms-1">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">Chroniques</a>
                    </li>

                    @auth
                    <li class="nav-item ms-lg-3">
                        <span class="navbar-text me-2">
                            Que les Divins vous guident, {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}"
                            href="{{ route('orders.index') }}">Mes Commandes</a>
                    </li>

                    @if (Route::has('logout'))
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">
                                Quitter la Guilde
                            </button>
                        </form>
                    </li>
                    @endif
                    @else
                    @if(Route::has('login'))
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link" href="{{ route('login') }}">Rejoindre la Guilde</a>
                    </li>
                    @endif

                    @if(Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Prêter Serment</a>
                    </li>
                    @endif
                    @endauth
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
            <p class="mb-0 text-secondary">&copy; {{ date('Y') }} Marché de Tamriel - Les routes de l'or vous appartiennent.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>