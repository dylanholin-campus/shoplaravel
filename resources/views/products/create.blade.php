@extends('layouts.app')

@section('title', 'Créer un nouveau produit - Disney Design')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Ajouter un nouveau produit</h1>

    <!-- ACTION : Route vers 'store' pour sauvegarder -->
    <form action="{{ route('products.store') }}" method="POST">

        <!-- Protection CSRF OBLIGATOIRE -->
        @csrf

        <!-- Champ Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nom du produit :</label>
            <input type="text" name="name" id="name"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Ex: Chaise Vintage" required>
        </div>

        <!-- Champ Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Description détaillée..."></textarea>
        </div>

        <!-- Champ Price -->
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Prix (€) :</label>
            <input type="number" name="price" id="price" step="0.01"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                placeholder="0.00" required>
        </div>

        <!-- Champ Stock -->
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-bold mb-2">Stock :</label>
            <input type="number" name="stock" id="stock"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                value="0">
        </div>

        <!-- Champ Active (Checkbox) -->
        <div class="mb-6 flex items-center">
            <!-- Astuce : Un input hidden pour envoyer '0' si la case n'est pas cochée -->
            <input type="hidden" name="active" value="0">
            <input type="checkbox" name="active" id="active" value="1"
                class="mr-2 h-5 w-5 text-blue-600" checked>
            <label for="active" class="text-gray-700">Produit actif (visible en ligne)</label>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit"
            class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition w-full">
            Créer le produit
        </button>
    </form>
</div>
@endsection