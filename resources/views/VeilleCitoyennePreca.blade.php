@extends('layout.app')
@section('title')
    <title>Edic - Actualités</title>
@endsection
@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12">
            <h1 class="title-bannier">Veille Citoyenne du PRéCA</h1>
            <p class="col-12 col-md-8 mx-auto text-justify my-1">
                Le Projet de Résilience et de Compétitivité Agricole (PRéCA) est un programme ambitieux lancé en 2020 et
                prévu pour durer jusqu'en 2025. Son objectif principal est de soutenir la production agricole en améliorant
                l'infrastructure, en soutenant les producteurs et en facilitant l'accès aux marchés. Le projet se concentre
                sur des domaines clés tels que l'aménagement hydro-agricole, l'entrepreneuriat agricole et le désenclavement
                des grandes zones de production. <br>
                L'Association Monde Rural (AMR), en tant que partenaire facilitateur, joue un rôle crucial dans ce projet
                grâce à sa plate-forme de veille citoyenne qui permet la collecte et la diffusion d'informations et de
                témoignages de tous les acteurs impliqués dans la mise en œuvre du projet. En rassemblant ces données, AMR
                aide à garantir la transparence, à faciliter la communication entre les parties prenantes et à promouvoir
                une gouvernance participative. <br>
                Grâce à cette plate-forme, les agriculteurs, les autorités locales et les autres acteurs peuvent partager
                leurs expériences, leurs défis et leurs succès, créant ainsi un environnement collaboratif et informé. Cela
                permet non seulement d'améliorer l'efficacité du projet, mais aussi de renforcer la confiance et la
                coopération entre tous les participants.
            </p>
        </div>
        <div class="col-12 col-md-10 mx-auto mb-3">
            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-inline-block mt-3 mx-2">
                    <img width="100" src="{{asset('img/pt/preca.jpeg')}}" alt="PRéCA" title="PRéCA">
                </div>
                <div class="d-inline-block mt-3 mx-2">
                    <img width="100" src="{{asset('img/pt/banque_mondiale.jpeg')}}" alt="Banque Mondaile" title="Banque Mondaile">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form class="col-10 col-md-8 col-lg-6 mx-auto mt-3" action="#">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Rechercher une actualité" />
                <div class="input-group-append">
                    <input class="input-group-text mx-1 btn-edic" type="submit" value="Rechercher" />
                </div>
            </div>
        </form>
    </div>
    <div class="row"></div>

    <div class="row mb-5">
        <div class="col-12 col-md-10 col-lg-9 mx-auto d-flex flex-wrap">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-6 row-cols-lg-3 g-1">
                    @foreach ($datas as $data)
                        <div class="col mt-3">
                            <div class="card mx-auto">
                                <!--img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053" alt="Img Card" /-->
                                <img src="{{ $data->image }}" alt="Img Card" />
                                <div class="card-body">
                                    <span class="card-detail">Commune</span>
                                    <span
                                        class="card-detail">{{ $data->user()->first()->commune()->first()->commune_name }}</span>
                                    <div class="card-title">
                                        {{ $data->titre }}
                                    </div>
                                    <p class="mb-2">
                                        {{ $data->resumer }}
                                    </p>
                                    <a href="{{ route('precaVeilleDetail', $data['slug']) }}"
                                        class="btn btn-sm btn-edic d-inline-block ml-auto">
                                        Lire plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
