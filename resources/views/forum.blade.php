@extends('layout.app')

@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12">
            <h1 class="title-bannier">Forum</h1>
            <p class="col-12 col-md-8 mx-auto text-center my-1">
                Bienvenue dans l'espace de visualisation des données budgétaires.
                Ici vous pourez visualiser, partager, télécharger, ou même
                réutiliser les données budgétaires en cour de visualisation.
            </p>
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
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            <div class="row">
              <div class="col-md-3">
                <div class="sticky">
                    <div class="sticky-inner">
                        <a class="btn btn-lg btn-block btn-success rounded-0 mb-3 bg-op-6 roboto-bold"
                            href="#">Poser une question</a>
                        <div class="bg-white text-sm">
                            <h4 class="px-3 py-4 m-0">Statistiques</h4>
                            <hr class="my-0" />
                            <div class="row text-center d-flex flex-row  mx-0">
                                <div class="col-6 text-center py-3 border-bottom border-right">
                                    <a class="d-block  font-weight-bold" href="#">58</a>
                                    Sujets
                                </div>
                                <div class="col-6 col text-center py-3 border-bottom mx-0">
                                    <a class="d-block  font-weight-bold" href="#">1.856</a>
                                    Messages
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-center py-3 border-right mx-0">
                                    <a class="d-block  font-weight-bold" href="#">300</a>
                                    Members
                                </div>
                                <div class="col-6 text-center py-3 mx-0">
                                    <a class="d-block  font-weight-bold" href="#">29</a>
                                    en ligne
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-9">
                  <form class="row p-0" action="">
                    <div class="col-lg-6">
                        <select name="cars" class="form-control mb-3">
                            <option selected>Filter par date</option>
                            <option value="volvo">Croissant</option>
                            <option value="fiat">Décroissant</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <select name="cars" class="form-control mb-3">
                            <option selected>Filter par commune</option>
                            <option value="volvo">Banfora</option>
                            <option value="fiat">Ouagadougou</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                  </form>
                    <div class="row">
                        
                        <div class="mx-auto py-3 px-3 mb-3">
                            @php
                                $data = [1,2,3,4,1,2,3,4,]
                            @endphp
                            @foreach ($data as $item)
                            <div class="row  bg-white align-items-center mt-2 p-2">
                                <div class="col-md-7 mb-3 mb-sm-0 border-radiuse-5">
                                    <h5>
                                        <a href="#" class="text-black">Drupal 8 quick starter guide</a>
                                    </h5>
                                    <p class="text-sm">
                                        <span class="op-6">Publié</span>
                                        <span class="text-black" href="#">il y a</span>
                                        <span class="op-6">20 minutes par</span>
                                        <span class="text-black" href="#"> KenyeW</span>
                                    </p>
                                    <div class="text-sm">
                                        <a class="text-black mr-2" href="#">#Bobo-Dioulasso</a>
                                    </div>
                                </div>
                                <div class="col-md-5 op-7">
                                    <div class="row text-center op-7">
                                        <div class="col px-1">
                                            <i class="ion-connection-bars icon-1x"></i>
                                            <span class="d-block text-sm">141 Votes</span>
                                        </div>
                                        <div class="col px-1">
                                            <i class="ion-ios-chatboxes-outline icon-1x"></i>
                                            <span class="d-block text-sm">122 Réponses</span>
                                        </div>
                                        <div class="col px-1">
                                            <i class="ion-ios-eye-outline icon-1x"></i>
                                            <span class="d-block text-sm">290 Vues</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
@endsection
