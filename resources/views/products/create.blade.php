@extends('layouts.app')

@section('title', 'Créer un nouveau produit - Disney Design')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Ajouter un nouveau produit</h1>

    <!-- 
        MODIFICATION 1 : Affichage global des erreurs
    -->
    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
        <p class="font-bold">Oups ! Il y a des problèmes avec votre saisie :</p>
        <ul class="list-disc pl-5 mt-2">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <!-- Champ Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nom du produit</label>
            <input
                type="text"
                name="name"
                id="name"
                class="w-full border rounded px-3 py-2 @error('name') border-red-500 bg-red-50 @enderror"
                value="{{ old('name') }}"
                required>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Slug -->
        <div class="mb-4">
            <label for="slug" class="block text-gray-700 font-bold mb-2">Slug (URL)</label>
            <input
                type="text"
                name="slug"
                id="slug"
                class="w-full border rounded px-3 py-2 @error('slug') border-red-500 bg-red-50 @enderror"
                value="{{ old('slug') }}"
                required>
            @error('slug')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Price -->
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Prix (€)</label>
            <input
                type="number"
                step="0.01"
                name="price"
                id="price"
                class="w-full border rounded px-3 py-2 @error('price') border-red-500 bg-red-50 @enderror"
                value="{{ old('price') }}"
                required>
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Stock -->
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-bold mb-2">Stock</label>
            <input
                type="number"
                name="stock"
                id="stock"
                class="w-full border rounded px-3 py-2 @error('stock') border-red-500 bg-red-50 @enderror"
                value="{{ old('stock') }}"
                required>
            @error('stock')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Category -->
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Catégorie</label>
            <select
                name="category_id"
                id="category_id"
                class="w-full border rounded px-3 py-2 @error('category_id') border-red-500 bg-red-50 @enderror"
                required>
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="w-full border rounded px-3 py-2 @error('description') border-red-500 bg-red-50 @enderror">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Active -->
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    name="active"
                    value="1"
                    class="form-checkbox text-blue-600"
                    {{ old('active') ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Produit actif (visible en ligne)</span>
            </label>
            @error('active')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Boutons -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Annuler</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Enregistrer</button>
        </div>
    </form>
</div>
@endsection