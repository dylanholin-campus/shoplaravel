@extends('layouts.app')

@section('title', $product->name . ' - ShopLaravel')

@section('content')
<div class="row">
    <div class="col-md-6 mb-4">
        @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow-sm w-100" alt="{{ $product->name }}">
        @else
        <div class="bg-black d-flex align-items-center justify-content-center rounded shadow-sm" style="height: 400px;">
            <span class="fs-3 text-muted">Aucune image disponible</span>
        </div>
        @endif
    </div>

    <div class="col-md-6">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produits</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <h1 class="display-4 fw-bold mb-3">{{ $product->name }}</h1>
        <p class="h3 text-primary mb-4">{{ number_format($product->price, 2) }} €</p>

        <p class="lead mb-5">
            {{ $product->description ?? 'Aucune description pour ce produit.' }}
        </p>

        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-grid gap-2 d-md-block">
            @csrf
            <button type="submit" class="btn btn-dark btn-lg px-5 me-md-2">Ajouter au panier</button>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-lg">Retour</a>
        </form>

        <div class="mt-4 pt-3 border-top">
            <small class="text-muted">Catégorie: {{ $product->category?->name ?? 'Non classé' }}</small>
        </div>
    </div>
</div>
@endsection