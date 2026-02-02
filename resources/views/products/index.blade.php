<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue - Joelino Design</title>
</head>
<body>
    <h1>Nos Créations Industrielles</h1>

    <ul>
        {{-- @forelse fonctionne comme un foreach, mais gère le cas "vide" --}}
        @forelse ($products as $product)
            <li>
                <strong>{{ $product['name'] }}</strong>
                <br>
                Prix : {{ $product['price'] }} €
                {{-- Lien vers le détail (on utilise la route nommée existante !) --}}
                <br>
                <a href="{{ route('products.show', ['id' => $product['id']]) }}">Voir détails</a>
                <hr>
            </li>
        @empty
            {{-- Ce bloc s'affiche UNIQUEMENT si le tableau $products est vide --}}
            <li style="color: red;">Aucun produit disponible pour le moment.</li>
        @endforelse
    </ul>

    <a href="{{ route('home') }}">Retour à l'accueil</a>
</body>
</html>
