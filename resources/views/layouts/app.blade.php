<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopLaravel')</title> 
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; display: flex; flex-direction: column; min-height: 100vh; }
        header { background: #333; color: white; padding: 1rem; }
        header a { color: white; text-decoration: none; margin-right: 15px; }
        main { flex: 1; padding: 2rem; }
        footer { background: #eee; padding: 1rem; text-align: center; margin-top: auto; }
    </style>
</head>
<body>

    <header>
        <nav>
            <strong>ShopLaravel</strong>
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('products.index') }}">Produits</a>
            <a href="{{ route('about') }}">À propos</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} ShopLaravel - Tous droits réservés.</p>
    </footer>

</body>
</html>
