@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="p-5 mb-4 bg-dark bg-opacity-25 rounded-3 shadow-sm text-center border border-secondary">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-white">
            Bienvenue au Grand Marché de {{ $shopData['nom_boutique'] }}
        </h1>

        <p class="col-md-8 fs-4 mx-auto text-light">
            Armes, reliques et curiosités forgées à travers les provinces.
            <strong>{{ $shopData['nombre_produits'] }}</strong> artefacts attendent votre prochaine quête.
        </p>

        <div class="my-4">
            @if($shopData['est_ouvert'])
            <div class="alert alert-success d-inline-block">🟢 Les portes de l'échoppe sont ouvertes</div>
            @else
            <div class="alert alert-danger d-inline-block">🔴 Les portes de l'échoppe sont scellées</div>
            @endif
        </div>

        <div class="d-flex flex-column align-items-center">
            @auth
            <div class="alert alert-info py-2 px-4 mb-4">
                Salutations, <strong>{{ auth()->user()->name }}</strong>. Une nouvelle quête vous attend.
            </div>

            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4 gap-3">
                    Parcourir les échoppes
                </a>
                <a href="{{ $url }}" class="btn btn-outline-light btn-lg px-4">
                    Contempler la relique vedette
                </a>
            </div>
            @else
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-3">
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">
                    Rejoindre la Guilde
                </a>
                @endif

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">
                    Prêter Serment
                </a>
                @endif
            </div>

            <div>
                <span class="text-secondary align-middle">ou</span>
                <a href="{{ route('products.index') }}" class="btn btn-link text-decoration-none text-light fw-bold">
                    Entrer en voyageur
                </a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection