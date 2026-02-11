@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="p-5 mb-4 bg-dark bg-opacity-25 rounded-3 shadow-sm text-center border border-secondary">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-white">
            Bienvenue chez {{ $shopData['nom_boutique'] }} !
        </h1>

        <p class="col-md-8 fs-4 mx-auto text-light">
            Découvrez nos créations uniques et industrielles. Nous avons actuellement
            <strong>{{ $shopData['nombre_produits'] }}</strong> créations disponibles en ligne.
        </p>

        <div class="my-4">
            @if($shopData['est_ouvert'])
            <div class="alert alert-success d-inline-block">🟢 La boutique est OUVERTE</div>
            @else
            <div class="alert alert-danger d-inline-block">🔴 La boutique est FERMÉE</div>
            @endif
        </div>

        <div class="d-flex flex-column align-items-center">
            @auth
            <div class="alert alert-info py-2 px-4 mb-4">
                Bonjour <strong>{{ auth()->user()->name }}</strong> ! Ravi de te revoir.
            </div>

            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4 gap-3">
                    Voir tous nos produits
                </a>
                <a href="{{ $url }}" class="btn btn-outline-light btn-lg px-4">
                    Voir notre produit vedette
                </a>
            </div>
            @else
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-3">
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">
                    Se connecter
                </a>
                @endif

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">
                    S'inscrire
                </a>
                @endif
            </div>

            <div>
                <span class="text-secondary align-middle">ou</span>
                <a href="{{ route('products.index') }}" class="btn btn-link text-decoration-none text-light fw-bold">
                    Visiter la boutique en invité
                </a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection