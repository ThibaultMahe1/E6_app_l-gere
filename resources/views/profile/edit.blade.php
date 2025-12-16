@extends('layouts.layout')

@section('title')
Mon Profil
@endsection

@section('content')
<div class="container py-4" style="margin-top: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <!-- Profile Information -->
            <div class="acceuil mb-4">
                <div class="separation mb-4">
                    <h3>{{ __('Informations du profil') }}</h3>
                </div>
                <div class="presentation">
                    <p class="text-muted mb-4">
                        {{ __("Mettez à jour les informations de votre profil et votre adresse email.") }}
                    </p>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nom') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-muted">
                                        {{ __('Votre adresse email n\'est pas vérifiée.') }}

                                        <button form="send-verification" class="btn btn-link p-0 align-baseline">
                                            {{ __('Cliquez ici pour renvoyer l\'email de vérification.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="text-success">
                                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse email.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <button type="submit" class="btn text-white" style="background-color: #bf9b6e;">{{ __('Sauvegarder') }}</button>

                            @if (session('status') === 'profile-updated')
                                <p class="text-success mb-0">{{ __('Sauvegardé.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Password -->
            <div class="acceuil mb-4">
                <div class="separation mb-4">
                    <h3>{{ __('Mettre à jour le mot de passe') }}</h3>
                </div>
                <div class="presentation">
                    <p class="text-muted mb-4">
                        {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
                    </p>

                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="update_password_current_password" class="form-label">{{ __('Mot de passe actuel') }}</label>
                            <input type="password" class="form-control" id="update_password_current_password" name="current_password" autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="update_password_password" class="form-label">{{ __('Nouveau mot de passe') }}</label>
                            <input type="password" class="form-control" id="update_password_password" name="password" autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                            <input type="password" class="form-control" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation', 'updatePassword')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <button type="submit" class="btn text-white" style="background-color: #bf9b6e;">{{ __('Sauvegarder') }}</button>

                            @if (session('status') === 'password-updated')
                                <p class="text-success mb-0">{{ __('Sauvegardé.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
