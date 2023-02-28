@extends('layout.app')

@section('title')
    <title>Edic - Accueil</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
@endsection
@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12">
            <h1 class="title-bannier">Veille Citoyenne</h1>
            <p class="col-12 col-md-8 mx-auto text-center my-1">
                Participez à la résolution des problèmes locaux au Burkina Faso : signaler, visualiser et discuter sur EDIC
            </p>
        </div>
    </div>

    <div class="row my-5 bg-gray py-5">
        <div class="col-12 col-md-10 mx-auto ">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mx-auto">
                    <div class="d-flex justify-content-center">
                        <div class="n-circle d-flex align-items-center justify-content-center">
                            <span class="text-22"><i class="fa-solid fa-check"></i></span>
                        </div>
                    </div>
            <p class="text-center fw-bold text-22 my-5">Votre alerte a bien été envoyée.</p>

                    <div class="my-4 fw-normal">
                        <span class="fw-bold">Bonjour</span>,<br>
                        Nous avons bien reçu votre signalement de problème sur notre plateforme. Nous vous remercions pour
                        votre contribution à l'amélioration de notre communauté. Nous allons traiter votre signalement dans
                        les meilleurs délais et vous tiendrons informé(e) de l'avancement de la résolution du problème.<br>
                        <span class="fw-bold">Cordialement,<br>
                            L'équipe de veille citoyenne.
                        </span>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn btn-edic" href="{{route('veilleCitoyenne.index')}}">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
