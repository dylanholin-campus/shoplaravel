@extends('layouts.app')

@section('title', 'Détail catégorie (Admin) - ShopLaravel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">{{ $category->name }}</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Retour</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <p><strong>Slug :</strong> {{ $category->slug }}</p>
        <p><strong>Description :</strong> {{ $category->description ?: '—' }}</p>
    </div>
</div>
@endsection