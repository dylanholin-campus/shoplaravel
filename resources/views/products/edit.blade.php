@extends('layouts.app')

@section('title', 'Modifier ' . $product->name)

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Modifier le produit "{{ $product->name }}"</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nom :</label>
            <input type="text" name="name" id="name"
                value="{{ old('name', $product->name) }}"
                class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border rounded px-3 py-2">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Prix (€) :</label>
            <input type="number" name="price" id="price" step="0.01"
                value="{{ old('price', $product->price) }}"
                class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-bold mb-2">Stock :</label>
            <input type="number" name="stock" id="stock"
                value="{{ old('stock', $product->stock) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Catégorie :</label>
            <select name="category_id" id="category_id" required class="w-full border rounded px-3 py-2">
                <option value="">Choisir...</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6 flex items-center">
            <input type="hidden" name="active" value="0">
            <input type="checkbox" name="active" id="active" value="1" class="mr-2"
                {{ old('active', $product->active) ? 'checked' : '' }}>
            <label for="active" class="text-gray-700">Actif</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
            Mettre à jour
        </button>
    </form>
</div>
@endsection