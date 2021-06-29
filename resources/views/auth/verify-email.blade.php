@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Vérifiez votre adresse e-mail') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                            </div>
                        @endif

                        {{ __('Avant de continuer, veuillez cliquer sur le lien de vérification que nous avons envoyer à votre adresse e-mail.') }}
                        {{ __('Si vous n\'avez pas reçu l\'e-mail') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        
                            @csrf
                            <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici pour le renvoyez') }}</button>
                            .
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
