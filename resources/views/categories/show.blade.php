@extends('layouts.app')

@section('title', $category->name . ' - ShopLaravel')

@section('content')
<div class="row mb-5 text-center">
    <div class="col-lg-8 mx-auto">
        <h1 class="display-4 fw-bold">{{ $category->name }}</h1>
        <p class="lead text-muted">{{ $category->description }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary mt-3">
            &larr; Retour à la boutique
        </a>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @forelse($products as $product)
    <div class="col">
        <div class="card h-100 shadow-sm transition-hover">
            <div class="card-img-top bg-black d-flex align-items-center justify-content-center p-4" style="height: 200px;">
                @if($product->image ?? false)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 100%; object-fit: contain;" alt="{{ $product->name }}">
                @else
                <span class="text-secondary fs-5">Image Produit</span>
                @endif
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text fw-bold text-primary">{{ number_format($product->price, 2) }} €</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir le produit</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center py-5">
            <h4 class="alert-heading">Oups !</h4>
            <p>Aucun produit dans cette catégorie pour le moment.</p>
        </div>
    </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection