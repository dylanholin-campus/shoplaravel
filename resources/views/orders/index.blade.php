@extends('layouts.app')

@section('title', 'Mes Commandes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Mes Commandes</h1>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if($orders->count() > 0)
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Articles</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y à H:i') }}</td>
                        <td>{{ number_format($order->total, 2, ',', ' ') }} €</td>
                        <td>
                            @if($order->status === 'pending')
                            <span class="badge bg-warning">En attente</span>
                            @elseif($order->status === 'paid')
                            <span class="badge bg-success">Payée</span>
                            @elseif($order->status === 'shipped')
                            <span class="badge bg-info">Expédiée</span>
                            @elseif($order->status === 'delivered')
                            <span class="badge bg-primary">Livrée</span>
                            @else
                            <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $order->orderItems->count() }} article(s)</td>
                        <td class="text-end">
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-light">Voir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <div class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-box-seam text-muted" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0l-7 3.5a.5.5 0 0 0 0 .9l7 3.5a.5.5 0 0 0 .372 0l7-3.5a.5.5 0 0 0 0-.9l-7-3.5zM15 4.239l-6.5 3.25L1 4.239M1 5.487l6.5 3.25 6.5-3.25M1 6.735l6.5 3.25 6.5-3.25l-6.5-3.25-6.5 3.25z" />
                </svg>
            </div>
            <h4 class="text-muted">Vous n'avez aucune commande</h4>
            <p class="mb-4">Découvrez nos produits et passez votre première commande !</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Voir les produits</a>
        </div>
        @endif
    </div>
</div>
@endsection