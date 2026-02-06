@extends('layouts.app')

@section('title', 'Nos Produits - Disney Design')

@section('content')
    <h1 class="text-3xl font-bold text-center mb-8">Nos Créations Industrielles</h1>


    <div class="text-right mb-6"> <!-- Bouton pour créer un nouveau produit -->
        <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Ajouter un produit
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="border rounded-lg p-4 shadow hover:shadow-lg transition">
                
                <div class="h-48 bg-gray-200 mb-4 rounded flex items-center justify-center"> <!-- placeholder-->
                    <span class="text-gray-500">Image Produit</span>
                </div>

                <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>  <!-- TITRE -->

                <p class="text-gray-600 mb-4 font-bold">{{ $product->price }} €</p> <!-- PRIX -->

                <div class="flex gap-2"> <!-- BOUTONS D'ACTION - Bouton Voir détails  -->
                    <a href="{{ route('products.show', $product->id) }}"
                       class="flex-1 block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                        Voir
                    </a>
                    
                    <!-- Bouton Modifier (NOUVEAU) -->
                    <a href="{{ route('products.edit', $product->id) }}"
                       class="flex-1 block text-center bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">
                        Modifier
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
