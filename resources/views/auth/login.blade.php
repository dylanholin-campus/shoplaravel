@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-5">
        <div class="card shadow-sm border border-secondary">
            <div class="card-body p-4">
                <h1 class="h4 mb-4 text-center">Connexion</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            required
                            autocomplete="email"
                            autofocus>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required
                            autocomplete="current-password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Remember me --}}
                    <div class="mb-4 form-check">
                        <input
                            id="remember"
                            type="checkbox"
                            name="remember"
                            class="form-check-input"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="form-check-label">Se souvenir de moi</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Se connecter
                        </button>
                    </div>
                </form>

                <hr class="my-4">

                <p class="mb-0 text-center text-secondary">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}">Créer un compte</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection