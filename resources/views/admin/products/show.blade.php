@extends('layouts.app')

@section('title', 'Détail produit (Admin) - ShopLaravel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">{{ $product->name }}</h1>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Retour</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <p><strong>Slug :</strong> {{ $product->slug }}</p>
        <p><strong>Catégorie :</strong> {{ $product->category?->name }}</p>
        <p><strong>Prix :</strong> {{ number_format($product->price, 2, ',', ' ') }} €</p>
        <p><strong>Stock :</strong> {{ $product->stock }}</p>
        <p><strong>Actif :</strong> {{ $product->active ? 'Oui' : 'Non' }}</p>
        <p><strong>Description :</strong> {{ $product->description ?: '—' }}</p>
    </div>
</div>
@endsection