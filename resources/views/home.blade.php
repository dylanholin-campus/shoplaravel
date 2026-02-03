@extends('layouts.app') <!-- On dit : "Utilise le moule app.blade.php" -->

@section('title', 'Accueil - Disney Design') 

@section('content')
<h1>Bienvenue chez {{ $shopData['nom_boutique'] }} !</h1>

<p>Nous avons actuellement <strong>{{ $shopData['nombre_produits'] }}</strong> créations.</p>

@if($shopData['est_ouvert'])
<div style="color: green; font-weight: bold;">🟢 La boutique est OUVERTE.</div>
@else
<div style="color: red; font-weight: bold;">🔴 La boutique est FERMÉE.</div>
@endif

<br>
<a href="{{ $url }}">Voir notre produit vedette</a>
@endsection