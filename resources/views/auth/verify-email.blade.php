@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-white py-5 px-5">
                <div class="">
                    <div class="">{{ __('Vérifiez votre adresse e-mail') }}</div>

                    <div class="">
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
