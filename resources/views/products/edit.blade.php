@extends('layouts.app')

@section('title', 'Modifier ' . $product->name)

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Modifier le produit "{{ $product->name }}"</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT') <!-- ← C'EST ÇA ! -->

        <!-- Le reste de ton formulaire... -->
    </form>


    <!-- Name avec old() et valeur actuelle -->
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Nom :</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
        <textarea name="description" id="description" rows="4">{{ old('description', $product->description) }}</textarea>
    </div>

    <!-- Price -->
    <div class="mb-4">
        <label for="price" class="block text-gray-700 font-bold mb-2">Prix (€) :</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" required>
    </div>

    <!-- Stock -->
    <div class="mb-4">
        <label for="stock" class="block text-gray-700 font-bold mb-2">Stock :</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}">
    </div>

    <!-- Catégorie (si tu l'as ajoutée) -->
    <div class="mb-4">
        <label for="category_id" class="block text-gray-700 font-bold mb-2">Catégorie :</label>
        <select name="category_id" id="category_id" required>
            <option value="">Choisir...</option>
            <option value="1" {{ old('category_id', $product->category_id) == 1 ? 'selected' : '' }}>Meuble</option>
            <option value="2" {{ old('category_id', $product->category_id) == 2 ? 'selected' : '' }}>Éclairage</option>
        </select>
    </div>

    <!-- Active (Checkbox) -->
    <div class="mb-6 flex items-center">
        <input type="hidden" name="active" value="0">
        <input type="checkbox" name="active" id="active" value="1"
            {{ old('active', $product->active) ? 'checked' : '' }}>
        <label for="active" class="text-gray-700">Actif</label>
    </div>

    <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
        Mettre à jour
    </button>
    </form>
</div>
@endsection