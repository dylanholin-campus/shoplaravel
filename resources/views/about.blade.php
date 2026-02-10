@extends('layouts.app')

@section('title', 'À Propos - ShopLaravel')

@section('content')
<div class="row align-items-center">
    <div class="col-md-6">
        <h1 class="display-4 fw-bold mb-4">À propos de nous</h1>
        <p class="lead text-muted">Je suis un magicien, Designer Industriel basé peut-être à Berlin.</p>
        <p class="fs-5">Passionné par le design fonctionnel et minimaliste, ShopLaravel a pour mission de transformer des idées brutes en objets tangibles et élégants.</p>
        <a href="{{ route('products.index') }}" class="btn btn-outline-primary mt-3">Découvrir nos œuvres</a>
    </div>
    <div class="col-md-6 text-center">
        <!-- Placeholder image using Bootstrap classes -->
        <div class="bg-black p-5 rounded text-secondary d-flex align-items-center justify-content-center" style="height: 300px;">
            <h3>Image À Propos</h3>
        </div>
    </div>
</div>
@endsection