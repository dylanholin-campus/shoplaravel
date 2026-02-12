@extends('layouts.app')

@section('title', 'Ma Besace')

@section('content')
<style>
    .cart-page .card-body {
        padding: 2rem;
    }

    .cart-page .table {
        font-size: 1.05rem;
    }

    .cart-page .table td,
    .cart-page .table th {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .cart-page .product-thumb {
        width: 72px;
        height: 72px;
    }

    .cart-page .qty-input {
        width: 88px !important;
        min-height: 42px;
        font-weight: 600;
    }

    .cart-page .icon-btn {
        min-width: 42px;
        min-height: 42px;
    }

    @media (max-width: 768px) {
        .cart-page .card-body {
            padding: 1.25rem;
        }

        .cart-page .table {
            font-size: 1rem;
        }
    }
</style>

<div class="cart-page">
    <div class="mb-4">
        <h1 class="display-6 mb-1">Ma Besace d'aventurier</h1>
        <p class="text-secondary mb-0 fs-5">{{ isset($products) ? $products->count() : 0 }} type(s) d'objet dans votre besace</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if(isset($products) && $products->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Artefact</th>
                            <th>Valeur</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Gestes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        @php
                        // CORRECTION ICI : On utilise la propriété injectée par le contrôleur
                        $quantity = $product->quantity;
                        $itemTotal = $product->price * $quantity;
                        @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="product-thumb rounded" style="object-fit: cover;" alt="{{ $product->name }}">
                                    @else
                                    <div class="product-thumb bg-black rounded d-flex align-items-center justify-content-center">
                                        <small class="text-muted">Img</small>
                                    </div>
                                    @endif
                                    <span class="fw-bold fs-5">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="fw-semibold">{{ number_format($product->price, 2) }} €</td>
                            <td>
                                <form action="{{ route('cart.update', $product->id) }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <label for="qty-{{ $product->id }}" class="visually-hidden">Quantité pour {{ $product->name }}</label>
                                    <input id="qty-{{ $product->id }}" type="number" name="quantity" value="{{ $quantity }}" min="0" class="form-control qty-input text-center" inputmode="numeric">
                                    <button type="submit" class="btn btn-outline-primary icon-btn" title="Ajuster la besace" aria-label="Mettre à jour la quantité">
                                        &#x21bb;
                                    </button>
                                </form>
                            </td>
                            <td class="fw-semibold">{{ number_format($itemTotal, 2) }} €</td>
                            <td>
                                <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger icon-btn" title="Retirer de la besace" aria-label="Retirer {{ $product->name }}">
                                        &times;
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-group-divider">
                        <tr>
                            <td colspan="3" class="text-end border-0 pt-4"><strong class="fs-5">Valeur totale du butin :</strong></td>
                            <td colspan="2" class="border-0 pt-4"><strong class="fs-3">{{ number_format($total, 2) }} €</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-stretch align-items-lg-center gap-3 mt-4">
                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment vider la besace ?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-lg w-100">Vider la besace</button>
                </form>
                <div class="d-flex flex-wrap gap-2 justify-content-end">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg">Retour aux échoppes</a>
                    <form action="{{ route('orders.store') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg">Finaliser la commande</button>
                    </form>
                </div>
            </div>

            @else
            <div class="text-center py-5">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="86" height="86" fill="currentColor" class="bi bi-cart-x text-muted" viewBox="0 0 16 16">
                        <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z" />
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>
                </div>
                <h4 class="text-muted">Votre besace est vide</h4>
                <p class="mb-4 fs-5">Prenez la route et équipez-vous pour votre prochaine aventure.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Explorer les échoppes</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection