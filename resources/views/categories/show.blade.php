@extends('layouts.app')

@section('title', $category->name . ' - Disney Design')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <!-- En-tête de la catégorie -->
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800">{{ $category->name }}</h1>
        <p class="text-gray-600 mt-2 text-lg">{{ $category->description }}</p>
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mt-4 inline-block">
            ← Retour aux produits
        </a>
    </div>

    <!-- Liste des produits de la catégorie -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="border rounded-lg p-4 shadow hover:shadow-lg transition bg-white">
                <div class="h-48 bg-gray-200 mb-4 rounded flex items-center justify-center">
                    <span class="text-gray-500">Image</span>
                </div>
                
                <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                <p class="text-gray-600 font-bold mb-4">{{ $product->price }} €</p>
                
                <a href="{{ route('products.show', $product->id) }}" 
                   class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                    Voir le produit
                </a>
            </div>
        @empty
            <div class="col-span-3 text-center py-12 bg-gray-50 rounded-lg">
                <p class="text-gray-500 text-xl">Aucun produit dans cette catégorie pour le moment.</p>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination (si tu as mis ->paginate() dans le controller) -->
    <div class="mt-8">
        {{ $products->links() }} 
    </div>
</div>
@endsection
