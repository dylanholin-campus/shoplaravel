@extends('layouts.app')

@section('title', 'Catalogue - Disney Design')

@section('content')
    <h1>Nos Créations Industrielles</h1>

    <ul>
        @forelse ($products as $product)
        <li>
            <strong>{{ $product['name'] }}</strong>
            <br>
            Prix : {{ $product['price'] }} €
            <br>
            <a href="{{ route('products.show', ['id' => $product['id']]) }}">Voir détails</a>
            <hr>
        </li>
        @empty
        <li style="color: red;">Aucun produit disponible pour le moment.</li>
        @endforelse
    </ul>

    <a href="{{ route('home') }}">Retour à l'accueil</a>
@endsection
