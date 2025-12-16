@extends('layouts.layout')

@section('title')
Inscription
@endsection

@section('content')
<div class="logIn-User">
    <h2 class="mb-4">Inscription</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3 text-start">
            <label for="name" class="form-label">{{ __('Nom') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3 text-start">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Phone Number -->
        <div class="mb-3 text-start">
            <label for="phone_number" class="form-label">{{ __('Numéro de téléphone') }}</label>
            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="tel">
            @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3 text-start">
            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3 text-start">
            <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="text-decoration-none" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <button type="submit" class="btn btn-primary" style="background-color: #bf9b6e; border-color: #bf9b6e; color: #340604;">
                {{ __('S\'inscrire') }}
            </button>
        </div>
    </form>
</div>
@endsection
