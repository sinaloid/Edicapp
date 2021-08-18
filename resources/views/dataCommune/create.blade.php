@extends('layouts.app')

@section('css')
<link href="{{ asset('/css/table.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="card">
    <div class="card-header">
        Creation des données de la commune
    </div>
    <div class="card-body">
        <form action="{{ route('data.store') }}" method="post">
            @csrf
            <!--div class="form-group">
                <label for="name">Titre</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le titre de votre todo.</small>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" aria-describedby="nameHelp">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button-->
            <h4 class="card-header bg-info text-white">Info G</h4>
            <!--Recette infog -->
            <div class="row ">
                <div class="col-12 font-weight-bolder text-center text-uppercase">Evolution du budget de la commune les
                    trois années</div>
                <div class="col-12 table-responsive mt-2 px-0">
                    <table class="table-sm table-hover mx-auto">
                        <tr>
                            <th class="sin-table-bg" colspan="5">Recettes</th>
                        <tr>
                        <tr>
                            <th>années</th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                        <tr>
                        <tr>
                            <th>Fonctionnement</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        <tr>
                        <tr>
                            <th>Investissement</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        <tr>
                            <!--tr>
                            <th>Total</th>
                            <td>54590547</td>
                            <td>54590547</td>
                            <td>54590547</td>
                            <td> </td>
                        <tr>
                        <tr>
                            <th>années</th>
                            <th>2017</th>
                            <th>2018</th>
                            <th>2019</th>
                            <th>2020</th>
                        <tr-->
                    </table>
                </div>
            </div>
            <!-- Depense infog -->
            <div class="row mt-4">
                <div class="col-12 table-responsive px-0">
                    <table class="table-sm table-hover mx-auto">
                        <tr>
                            <th class="sin-table-bg" colspan="5">Dépenses</th>
                        <tr>
                        <tr>
                            <th>années</th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                        <tr>
                        <tr>
                            <th>Fonctionnement</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        <tr>
                        <tr>
                            <th>Investissement</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        <tr>
                            <!--tr>
                            <th>Total</th>
                            <td>54590547</td>
                            <td>54590547</td>
                            <td>54590547</td>
                            <td> </td>
                        <tr>
                        <tr>
                            <th>années</th>
                            <th>2017</th>
                            <th>2018</th>
                            <th>2019</th>
                            <th>2020</th>
                        <tr-->
                    </table>
                </div>
            </div>

            <!-- Trois meilleurs -->
            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase">Contribution des trois (03) meilleurs
                    marchés</div>
                <div class="col-12 table-responsive mt-2 px-0">
                    <table class="table-sm table-hover mx-auto">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">1</th>
                                <th class="sin-table-bg">2</th>
                                <th class="sin-table-bg">3</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>Marchés</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Attendu</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Contribution</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>Taux</th>
                            <td>0.00%</td>
                            <td>0.00%</td>
                            <td></td>
                        </tr-->
                    </table>
                </div>
            </div>

            <!-- Dix meilleurs -->
            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Contribution des dix (10) meilleurs
                    villages (toute contribution)</div>
                <div class="col-12 table-responsive mt-2 px-0">
                    <table class="table-sm table-hover">

                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">1 er</th>
                                <th class="sin-table-bg">2 ème</th>
                                <th class="sin-table-bg">3 ème</th>
                                <th class="sin-table-bg">4 ème</th>
                                <th class="sin-table-bg">5 ème</th>
                                <th class="sin-table-bg">6 ème</th>
                                <th class="sin-table-bg">7 ème</th>
                                <th class="sin-table-bg">8 ème</th>
                                <th class="sin-table-bg">9 ème</th>
                                <th class="sin-table-bg">10 ème</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>Le village</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Montant attendu</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Montant mobilisé</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>Taux mobilisation /Prévisions</th>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                        </tr-->
                    </table>
                </div>
            </div>

            <!-- Partenaire -->
            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Contribution des autres partenaires à
                    la commune</div>
                <div class="col-12 table-responsive mt-2 px-0">
                    <table class="table-sm table-hover ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">PRF 1</th>
                                <th class="sin-table-bg">PRF 2 </th>
                                <th class="sin-table-bg">PRF 3 </th>
                                <th class="sin-table-bg">PRF 4 </th>
                                <th class="sin-table-bg">PRF 5 </th>
                                <th class="sin-table-bg">PRF 6 </th>
                                <th class="sin-table-bg">PRF 7 </th>
                                <th class="sin-table-bg">PRF 8 </th>
                                <th class="sin-table-bg">PRF 9 </th>
                                <th class="sin-table-bg">PRF 10</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>Identité PTF</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"> </td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"> </td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"> </td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"> </td>
                        </tr>
                        <tr>
                            <th>Evaluation contribution</th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Principales actions</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Etat civil et domaine -->
            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase">ETAT CIVIL ET DOMAINE</div>
                <div class="col-12 table-responsive mt-2 px-0">
                    <table class="table-sm table-hover mx-auto ">

                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">Nombre</th>
                                <th class="sin-table-bg">Observations (3 mots maximun)</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>Naissances</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Actes de naissances</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Actes de décès</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Mariages célébrés</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Autres actes civils (divers)</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Vente de timbres (valeur)</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row ">
                <div class="col-12 table-responsive px-0 ">
                    <table class="table-sm table-hover mx-auto ">
                        <caption> </caption>
                        <thead>
                            <tr>
                                <th class="sin-table-bg align-middle" rowspan="2">Désignation / type d'usage</th>
                                <th class="sin-table-bg text-center" colspan="3">Nombre</th>
                            </tr>
                            <tr>
                                <th>Parcelles Dégagées</th>
                                <th>Parcelles attribuées</th>
                                <th> Parcelles restantes</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>Zone d'habitation</th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Zone commerciale</th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Zone administrative</th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Autres....</th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>Surfaces en ha ou en m<sup>2</sup></th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                    </table>
                </div>
            </div>


            <h4 class="card-header bg-info text-white mt-3">PCD</h4>

            <div class="row">
                <div class="col-12 font-weight-bolder text-center text-uppercase" style="color:#ff8043">Appréciation de
                    l'exécution
                    du PCD de la commune / le PAIC</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto">
                        <tr>
                            <th class="sin-table-bg">Date de Conception</th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                            <th class="sin-table-bg">Date d'expiration</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th class="sin-table-bg">Montant Total FCFA</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <th class="sin-table-bg">Montant mobilisé (2018) FCFA</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th class="sin-table-bg">Problème majeur (10 mots)</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th class="sin-table-bg">Perpectives (10 mots)</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase" style="color:#ff8043">Donnez une note
                    pour chaque
                    axe: 3 - 7 - 10</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto">
                        <thead>
                            <tr>
                                <th class="sin-table-bg" rowspan="2">Axes stratégiques</th>
                                <th class="sin-table-bg" colspan="3">Degré de satisfaction</th>
                            </tr>
                            <tr>
                                <th>Très satisfaisant</th>
                                <th>Satisfaisant</th>
                                <th> Pas Satisfaisant</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="sin-table-bg">1 : Reformer les institutions et moderniser l'administration</th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th class="sin-table-bg">2 : Développer le capital humain</th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th class="sin-table-bg">3 : Dynamiser les secteurs porteurs pour l'économie et les emplois
                            </th>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mt-3 notation">
                <div class="col-3 col-md-5 text-center text-secondary ">Notation: </div>
                <div class="col-9 col-md-7 text-center">
                    <p class="text-success">Très satisfaisant :<span class="mx-auto"> 10 / 10</span></p>
                    <p class="text-info">Satisfaisant :<span class="mx-auto"> 7 / 10</span></p>
                    <p class="text-danger">Pas satisfaisant :<span class="mx-auto"> 3 / 10</span></p>
                </div>
            </div>

            <div class="row ">
                <div class="col-12 table-responsive mt-2 px-0">
                    <table class="table-sm  mx-auto">
                        <tr>
                            <th class="sin-table-bg">Commentaire sur votre appéciation: en cinq mots</th>
                            <th><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></th>
                        </tr>
                    </table>
                </div>
            </div>

            <h4 class="card-header bg-info text-white my-3">Budget</h4>

            <h4 class="col-12 font-weight-bolder text-center text-white text-uppercase sin-bg-3">Bilan d'execution année
                2019</h4>
            <p class="col-8 mx-auto font-weight-bolder text-center bg-success text-uppercase ">Les recettes</p>
            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes d'investissement</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>10 / 101</th>
                            <td>Dotation globale</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>103 - 104</th>
                            <td>Subvention d'équipement</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"> </td>
                        </tr>
                        <tr>
                            <th>11</th>
                            <td>Contribution propre/Reserves</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>102</th>
                            <td>Dotation liée aux compétences transférées</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>60</th>
                            <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <th>10/104</th>
                            <td>Autres subventions d'équipement</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>#</th>
                            <th>Total</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr-->
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes de fonctionnement</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>70</th>
                            <td>Produits de l’exploitation</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>71 </th>
                            <td>Produits domaniaux </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>72 </th>
                            <td>Produits financiers </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>73 </th>
                            <td> Recouvrements et participations</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>74 </th>
                            <td> Produits divers</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>75 </th>
                            <td> Impots taxes et contributions directes</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>76 </th>
                            <td> Impots et taxes indirects</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>79 </th>
                            <td> Produits exceptionnels</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>82 </th>
                            <td> Produits antérieurs</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>73/735 </th>
                            <td>Autres dotations de transfert</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>#</th>
                            <th>Total</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr-->
                    </table>
                </div>
            </div>

            <p class="col-8 mt-3 mx-auto font-weight-bolder text-center text-white bg-danger text-uppercase ">Les
                depenses</p>

            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Depenses d'investissement</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>13/132 </th>
                            <td>Etudes & Recherche</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>21/211 </th>
                            <td> Environnement</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>21/214+215+216+218 </th>
                            <td>Equipement</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>23/232+235 </th>
                            <td> Batiment</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>16 </th>
                            <td> Emprunt</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th># </th>
                            <td> Autres investissements</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>60 </th>
                            <td>Déficit / Excédent d'investissement exer anté</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>#</th>
                            <th>Total</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr-->
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Depenses de fonctionnement</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>60/600+603+604+607+608,63/631+633+634 </th>
                            <td>Santé </td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>60/601+605+608 </th>
                            <td>Appui scolaire</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>61/617 </th>
                            <td> Sport & culture & jeunesse</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>64/640 </th>
                            <td>Participation et prestation </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>67/674 </th>
                            <td> Frais financier</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>63/612 </th>
                            <td>Refection /entretien batiment </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>65/650+655+658</th>
                            <td>Salaire & Indemnités </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>63/1+17 </th>
                            <td>Entretien véhicule & autres [services extérieurs] </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>60/65/66 </th>
                            <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>83/831 </th>
                            <td>Excedent / Prélèvement </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>#</th>
                            <th>Total</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr-->
                    </table>
                </div>
            </div>

            <h4 class="card-header bg-info text-white my-3">Budget n +</h4>

            <h4 class="col-12 font-weight-bolder text-center text-white text-uppercase sin-bg-3">Bilan d'execution année
                2020</h4>
            <p class="col-8 mx-auto font-weight-bolder text-center bg-success text-uppercase ">Les recettes</p>

            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes d'investissement</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>10 / 101</th>
                            <td>Dotation globale</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>103 - 104</th>
                            <td>Subvention d'équipement</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"> </td>
                        </tr>
                        <tr>
                            <th>11</th>
                            <td>Contribution propre/Reserves</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>102</th>
                            <td>Dotation liée aux compétences transférées</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>60</th>
                            <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>10/104</th>
                            <td>Autres Dotation de transfert</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>#</th>
                            <th>Total</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr-->
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes de fonctionnement</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>70</th>
                            <td>Produits de l’exploitation</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>71 </th>
                            <td>Produits domaniaux </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>72 </th>
                            <td>Produits financiers </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>73 </th>
                            <td> Recouvrements et participations</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>74 </th>
                            <td> Produits divers</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>75 </th>
                            <td> Impots taxes et contributions directes</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>76 </th>
                            <td> Impots et taxes indirects</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>79 </th>
                            <td> Produits exceptionnels</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>82 </th>
                            <td> Produits antérieurs</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>#</th>
                            <th>Total</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr-->
                    </table>
                </div>
            </div>

            <p class="col-8 mt-3 mx-auto font-weight-bolder text-center text-white bg-danger text-uppercase ">Les
                depenses</p>

            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Depenses d'investissement</div>
                <div class="col-12 table-responsive mt-2 px-0 ">
                    <table class="table-sm table-hover mx-auto ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>13/132 </th>
                            <td>Etudes & Recherche</td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>21/211 </th>
                            <td> Environnement</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>21/214+215+216+218 </th>
                            <td>Equipement</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>23/232+235 </th>
                            <td> Batiment</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>16 </th>
                            <td> Emprunt</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th># </th>
                            <td> Autres investissements</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>#</th>
                            <th>Total</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr-->
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 font-weight-bolder text-center text-uppercase"> Depenses de fonctionnement</div>
                <div class="col-12 table-responsive mt-2 px-0 " style="width : 400px">
                    <table class="table-sm table-hover mx-auto ">
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">#</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>60/600+603+604+607+608,63/631+633+634 </th>
                            <td>Santé </td>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>60/601+605+608 </th>
                            <td>Appui scolaire</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>61/617 </th>
                            <td> Sport & culture & jeunesse</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th># </th>
                            <td>Eau assainissement enviro</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>64/640 </th>
                            <td>Participation et prestation </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>67/674 </th>
                            <td> Frais financier</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>63/612 </th>
                            <td>Refection /entretien batiment </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>65/650+655+658</th>
                            <td>Salaire & Indemnités </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>63/1+17 </th>
                            <td>Entretien véhicule & autres [services extérieurs] </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>60/65/66 </th>
                            <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <tr>
                            <th>83/831 </th>
                            <td>Excedent / Prélèvement </td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr>
                        <!--tr>
                            <th>#</th>
                            <th>Total</th>
                            <td><input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                        </tr-->
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection