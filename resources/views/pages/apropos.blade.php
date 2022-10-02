@extends('layout.app')

@section('titlePage')
    <title>EDIC - À propos </title>
@stop

@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12" style="line-height:180%">
            <h1 class="title-bannier mb-4">À propos</h1>
            <p class="col-12 col-md-8 mx-auto text-Justify my-3">
                2019, 2020, 2021 et 2022 ont été consacrées à la réflexion et à l’accompagnement 
                des communes dans <strong class="txt-bold">la promotion des données ouvertes au Burkina Faso</strong>. Elles ont permis 
                de finaliser cette initiative ambitieuse de digitalisation et faciliteront <strong class="txt-bold">le partage des 
                données budgétaires en temps réel de toutes les communes avec tous les citoyens résidents 
                et non-résidents</strong>. Un géant pas des collectivités du Burkina dans la gouvernance ouverte dans 
                le cadre du <span class="txt-bold">PGO</span>. 
            </p>
            <p class="col-12 col-md-8 mx-auto text-Justif my-3">
                Ce projet n’aurait abouti que grâce aux précieuses contributions 
                de la <span class="txt-bold">Direction Générale des Collectivités Territoriales du Burkina, 
                des ONG Diakonia, Broederlijk Delen et Expertise France à travers le PAGOF</span>.
            </p>
            <p class="col-12 col-md-8 mx-auto text-Justif my-3 txt-bold">
                Qu’ils trouvent ici les sincères remerciements et reconnaissances de 
                l’AMR et de celles de la faitière des communes, l’AMBF.
            </p>
        </div>
        <div class="col-12 col-md-10 mx-auto mt-2 mb-3">
            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-inline-block mx-2">
                    <img width="100" src="{{asset('img/pt/bf.png')}}" alt="Burkina Faso" title="Etat du Burkina">
                </div>
                <div class="d-inline-block mx-2">
                    <img width="100" src="{{asset('img/pt/amr.png')}}" alt="AMR" title="Association Monde Rural">
                </div>
                <div class="d-inline-block mx-2">
                    <img width="100" src="{{asset('img/pt/diakonia.png')}}" alt="Diakonia" title="Organisation non gouvernementale (ONG)">
                </div>
                <div class="d-inline-block mx-2">
                    <img width="100" src="{{asset('img/pt/delen.png')}}" alt="Broederlijk Delen" title="Organisation non gouvernementale (ONG)">
                </div>
                <div class="d-inline-block mx-2">
                    <img width="100" src="{{asset('img/pt/expertise.png')}}" alt="Expertise France" title="Organisation non gouvernementale (ONG)">
                </div>
            </div>
        </div>
    </div>
@stop
