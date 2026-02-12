@extends('layouts.app')

@section('title', 'Détail Commande #' . $order->id)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Commande #{{ $order->id }}</h1>
        <p class="text-muted mb-0">{{ $order->created_at->format('d/m/Y à H:i') }}</p>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Retour</a>
</div>

<div class="row g-3">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-light border-bottom">
                <h5 class="mb-0">Articles commandés</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" width="40" height="40" class="me-3 rounded" style="object-fit: cover;">
                                        @else
                                        <div class="bg-black rounded d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <small class="text-muted">Img</small>
                                        </div>
                                        @endif
                                        <div>
                                            <div class="fw-bold">{{ $item->product->name }}</div>
                                            <small class="text-muted">{{ $item->product->slug }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ number_format($item->unit_price, 2, ',', ' ') }} €</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="fw-bold">{{ number_format($item->unit_price * $item->quantity, 2, ',', ' ') }} €</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-light border-bottom">
                <h5 class="mb-0">Résumé</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span>Sous-total :</span>
                    <span>{{ number_format($order->total, 2, ',', ' ') }} €</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Frais de port :</span>
                    <span>Gratuit</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4">
                    <strong>Total :</strong>
                    <strong class="fs-5">{{ number_format($order->total, 2, ',', ' ') }} €</strong>
                </div>

                <div class="card bg-light border-0 p-3 mb-3">
                    <h6 class="mb-2">Statut</h6>
                    <div>
                        @if($order->status === 'pending')
                        <span class="badge bg-warning fs-6">En attente de paiement</span>
                        @elseif($order->status === 'paid')
                        <span class="badge bg-success fs-6">Payée</span>
                        @elseif($order->status === 'shipped')
                        <span class="badge bg-info fs-6">Expédiée</span>
                        @elseif($order->status === 'delivered')
                        <span class="badge bg-primary fs-6">Livrée</span>
                        @else
                        <span class="badge bg-secondary fs-6">{{ ucfirst($order->status) }}</span>
                        @endif
                    </div>
                </div>

                <div class="card bg-light border-0 p-3">
                    <h6 class="mb-2">Livraison</h6>
                    <p class="mb-0 small">
                        <strong>{{ $order->user->name }}</strong><br>
                        Adresse de livraison<br>
                        Pas d'adresse enregistrée
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection