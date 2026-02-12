@extends('layouts.app')

@section('title', 'Dashboard Admin - ShopLaravel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Dashboard Admin</h1>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Produits</h5>
                <p class="card-text">Gérer le catalogue des produits.</p>
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Gérer les produits</a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Catégories</h5>
                <p class="card-text">Gérer les catégories de produits.</p>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Gérer les catégories</a>
            </div>
        </div>
    </div>
</div>
@endsection