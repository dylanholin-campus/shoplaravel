@extends('layouts.app')

@section('title', 'Nos Produits - Disney Design')

@section('content')
<h1 class="text-3xl font-bold text-center mb-8">Nos Créations Industrielles</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($products as $product)
    <div class="border rounded-lg p-4 shadow hover:shadow-lg transition">
        <!-- placeholder car j'ai pas encore d'image-->
        <div class="h-48 bg-gray-200 mb-4 rounded flex items-center justify-center">
            <span class="text-gray-500">Image Produit</span>
        </div>

        <!-- TITRE : syntaxe objet -->
        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>

        <!-- PRIX : syntaxe objet -->
        <p class="text-gray-600 mb-4">{{ $product->price }} €</p>

        <!-- LIEN : syntaxe objet pour l'ID -->
        <a href="{{ route('products.show', $product->id) }}"
            class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Voir détails
        </a>
    </div>
    @endforeach
</div>
@endsection