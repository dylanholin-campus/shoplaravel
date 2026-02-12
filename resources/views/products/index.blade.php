@extends('layouts.app')

@section('title', 'Nos Produits - ShopLaravel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Les Échoppes de Tamriel</h1>
        <p class="text-secondary mb-0">{{ $products->count() }} relique(s) disponible(s)</p>
    </div>
    @if(auth()->check() && auth()->user()->is_admin)
    <a href="{{ route('products.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Forger un artefact
    </a>
    @endif
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @forelse($products as $product)
    <div class="col">
        <div class="card h-100 shadow-sm transition-hover">
            <div class="card-img-top product-media d-flex align-items-center justify-content-center p-4" style="height: 200px;">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 100%; object-fit: contain;" alt="Illustration de {{ $product->name }}" loading="lazy">
                @else
                <span class="text-secondary fs-5">Relique scellée</span>
                @endif
            </div>

            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title mb-0">{{ $product->name }}</h5>
                    <span class="badge bg-secondary">{{ $product->category?->name ?? 'Divers' }}</span>
                </div>

                <p class="card-text text-muted flex-grow-1 line-clamp-2 mb-2" style="max-width: 100%;">
                    {{ $product->description ?: 'Aucune description disponible.' }}
                </p>

                <p class="small mb-2 {{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                    {{ $product->stock > 0 ? 'En stock : ' . $product->stock : 'Rupture de stock' }}
                </p>

                <h4 class="text-warning fw-bold mb-3">{{ number_format($product->price, 2) }} €</h4>

                <div class="d-grid gap-2">
                    <div class="btn-group">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Examiner</a>
                        @if(auth()->check() && auth()->user()->is_admin)
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning">Retoucher</a>
                        @endif
                    </div>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark w-100" {{ $product->stock < 1 ? 'disabled' : '' }}>
                            {{ $product->stock > 0 ? 'Placer dans la besace' : 'Indisponible' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card p-4 text-center">
            <h4 class="mb-2">Aucune relique disponible</h4>
            <p class="text-secondary mb-0">Le comptoir est vide pour le moment. Revenez bientôt.</p>
        </div>
    </div>
    @endforelse
</div>
@endsection