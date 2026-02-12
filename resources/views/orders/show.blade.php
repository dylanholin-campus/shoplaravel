@extends('layouts.app')

@section('title', 'Parchemin de quête #' . $order->id)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Parchemin #{{ $order->id }}</h1>
        <p class="text-muted mb-0">{{ $order->created_at->format('d/m/Y à H:i') }}</p>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Retour au journal</a>
</div>

<div class="row g-3">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-light border-bottom">
                <h5 class="mb-0">Reliques obtenues</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Artefact</th>
                                <th>Valeur unitaire</th>
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
                <h5 class="mb-0">Résumé de quête</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span>Butin :</span>
                    <span>{{ number_format($order->total, 2, ',', ' ') }} €</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Tribut des routes :</span>
                    <span>Offert par la Guilde</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4">
                    <strong>Total du butin :</strong>
                    <strong class="fs-5">{{ number_format($order->total, 2, ',', ' ') }} €</strong>
                </div>

                <div class="card bg-light border-0 p-3 mb-3">
                    <h6 class="mb-2">État du parchemin</h6>
                    <div>
                        @if($order->status === 'pending')
                        <span class="badge bg-warning fs-6">En attente du sceau</span>
                        @elseif($order->status === 'paid')
                        <span class="badge bg-success fs-6">Scellée</span>
                        @elseif($order->status === 'shipped')
                        <span class="badge bg-info fs-6">En route</span>
                        @elseif($order->status === 'delivered')
                        <span class="badge bg-primary fs-6">Remise au héros</span>
                        @else
                        <span class="badge bg-secondary fs-6">{{ ucfirst($order->status) }}</span>
                        @endif
                    </div>
                </div>

                <div class="card bg-light border-0 p-3">
                    <h6 class="mb-2">Messager impérial</h6>
                    <p class="mb-0 small">
                        <strong>{{ $order->user->name }}</strong><br>
                        Point de remise<br>
                        Aucune destination inscrite
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection