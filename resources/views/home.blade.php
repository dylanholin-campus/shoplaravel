@extends('layouts.app')

@section('title', 'Accueil - ShopLaravel')

@section('content')
<div class="p-5 mb-4 bg-dark bg-opacity-25 rounded-3 shadow-sm text-center border border-secondary">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-white">Bienvenue chez {{ $shopData['nom_boutique'] }} !</h1>
        <p class="col-md-8 fs-4 mx-auto text-light">
            Découvrez nos créations uniques et industrielles. Nous avons actuellement <strong>{{ $shopData['nombre_produits'] }}</strong> créations disponibles en ligne.
        </p>

        <div class="my-4">
            @if($shopData['est_ouvert'])
            <div class="alert alert-success d-inline-block">🟢 La boutique est OUVERTE</div>
            @else
            <div class="alert alert-danger d-inline-block">🔴 La boutique est FERMÉE</div>
            @endif
        </div>

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4 gap-3">Voir tous nos produits</a>
            <a href="{{ $url }}" class="btn btn-outline-secondary btn-lg px-4">Voir notre produit vedette</a>
        </div>
    </div>
</div>
@endsection