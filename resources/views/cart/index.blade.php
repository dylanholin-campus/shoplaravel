@extends('layouts.app')

@section('title', 'Ma Besace')

@section('content')
<h1 class="mb-4">Ma Besace d'aventurier</h1>

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
                            <div class="d-flex align-items-center">
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" width="50" height="50" class="me-3 rounded" style="object-fit: cover;">
                                @else
                                <div class="bg-black rounded d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <small class="text-muted">Img</small>
                                </div>
                                @endif
                                <span class="fw-bold">{{ $product->name }}</span>
                            </div>
                        </td>
                        <td>{{ number_format($product->price, 2) }} €</td>
                        <td>
                            <form action="{{ route('cart.update', $product->id) }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $quantity }}" min="0" class="form-control form-control-sm me-2" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-outline-primary" title="Ajuster la besace">
                                    &#x21bb;
                                </button>
                            </form>
                        </td>
                        <td>{{ number_format($itemTotal, 2) }} €</td>
                        <td>
                            <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Retirer de la besace">
                                    &times;
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-group-divider">
                    <tr>
                        <td colspan="3" class="text-end border-0 pt-3"><strong>Valeur totale du butin :</strong></td>
                        <td colspan="2" class="border-0 pt-3"><strong class="fs-5">{{ number_format($total, 2) }} €</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment vider la besace ?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">Vider la besace</button>
            </form>
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-secondary me-2">Retour aux échoppes</a>
                <form action="{{ route('orders.store') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg">finaliser la commande</button>
                </form>
            </div>
        </div>

        @else
        <div class="text-center py-5">
            <div class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-cart-x text-muted" viewBox="0 0 16 16">
                    <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z" />
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
            </div>
            <h4 class="text-muted">Votre besace est vide</h4>
            <p class="mb-4">Prenez la route et équipez-vous pour votre prochaine aventure.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Explorer les échoppes</a>
        </div>
        @endif
    </div>
</div>
@endsection