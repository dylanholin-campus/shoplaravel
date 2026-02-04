@extends('layouts.app')

@section('title', $product->name . ' - Disney Design')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
        
        <div class="text-xl text-blue-600 font-bold mb-6">
            {{ $product->price }} €
        </div>

        <p class="text-gray-700 mb-8 leading-relaxed">
            {{ $product->description ?? 'Aucune description pour ce produit.' }}
        </p>

        <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">
            ← Retour aux produits
        </a>
    </div>
@endsection
