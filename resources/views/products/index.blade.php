@extends('layouts.app')

@section('title', 'Nos Produits - ShopLaravel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Nos Créations Industrielles</h1>
    @if(auth()->check() && auth()->user()->is_admin)
    <a href="{{ route('products.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Ajouter un produit
    </a>
    @endif
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($products as $product)
    <div class="col">
        <div class="card h-100 shadow-sm transition-hover">
            <div class="card-img-top bg-black d-flex align-items-center justify-content-center p-4" style="height: 200px;">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 100%; object-fit: contain;" alt="{{ $product->name }}">
                @else
                <span class="text-secondary fs-5">Image Produit</span>
                @endif
            </div>

            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title mb-0">{{ $product->name }}</h5>
                    <span class="badge bg-secondary">{{ $product->category?->name ?? 'Divers' }}</span>
                </div>

                <p class="card-text text-muted flex-grow-1 text-truncate" style="max-width: 100%;">
                    {{ $product->description ?? '' }}
                </p>

                <h4 class="text-primary fw-bold mb-3">{{ number_format($product->price, 2) }} €</h4>

                <div class="d-grid gap-2">
                    <div class="btn-group">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir</a>
                        @if(auth()->check() && auth()->user()->is_admin)
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning">Modifier</a>
                        @endif
                    </div>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection