@extends('layouts.app')

@section('css')
<link href="{{ asset('/css/table.css') }}" rel="stylesheet">
@stop

@section('content')

<!--div class="row"-->
<form class="row mb-3" action="{{ route('data.store') }}" method="post">
    @csrf
    <div class="col-sm-12 sin-bg-2">
        <div class="card-header">Configuration de la commune</div>
        <div class="form-group mt">
            <select class="form-control mt-1" id="country" name="country" required>
                <option value="">{{ __('-- Selectionnez votre pays --') }}</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}">
                    {{ $country->country_name }}</option>
                @endforeach
            </select>
            @error('pays')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="row p_region justify-content-between">
            <div class=" col-6 col-md ">
                <div class="form-group">
                    <select class="form-control " id="region" name="region" required>

                    </select>
                    @error('region')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6 col-md">
                <div class="form-group">
                    <select class="form-control " id="province" name="province" required>

                    </select>
                    @error('province')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="form-group">
                    <select class="form-control" id="commune" name="commune" required>

                    </select>
                    @error('commune')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="form-group">
                    <select class="form-control" id="commune4" name="annee" required>
                        <option value="">{{ __('-- Selectionnez l année --') }}</option>
                        @for($i = $annee; 2000<= $i; $i--) <option value="{{ $i}}">
                            {{ $i }}</option>
                            @endfor
                    </select>
                    @error('commune')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>

        </div>
        <div class="row">
            <div class="mx-auto">
                <button type="submit" class="btn sin-bg-3 my-1 font-weight-bold text-white">validé</button>
            </div>
        </div>
    </div>

</form>
<!--/div-->

<div class="row">
    <div class="card">
        <div class="card-header">
            Données de la commune
        </div>
        <div class="card-body">
            <p><span class="font-weight-bold">Pays:</span> {{ isset($dataCommune) ? $dataCommune["pays"] : 'null' }}</p>
            <p><span class="font-weight-bold">Region:</span> {{ isset($dataCommune) ? $dataCommune["region"] : 'null' }}
            </p>
            <p><span class="font-weight-bold">Province:</span>
                {{ isset($dataCommune) ? $dataCommune["province"] : 'null' }}</p>
            <p><span class="font-weight-bold">Commune:</span>
                {{ isset($dataCommune) ? $dataCommune["commune"] : 'null' }}</p>
            <p><span class="font-weight-bold">Année:</span> {{ isset($dataCommune) ? $dataCommune["annee"] : 'null' }}
            </p>
        </div>
        <div class="card-body">

            <form action="{{ route('data.update', isset($dataCommune) ? $dataCommune['data_id'] : 0) }}"
                enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase">Evolution du budget de la commune
                        les
                        trois années</div>
                    <div class="col-12 table-responsive mt-2 px-0">
                        <table class="table-sm table-hover mx-auto">
                            <tr>
                                <th class="sin-table-bg" colspan="5">Recettes</th>
                            <tr>
                            <tr>
                                <th>années</th>
                                <th><input type="text" name="recet_annee1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][0]->annee : '' }}"
                                        aria-describedby="nameHelp"></th>
                                <th><input type="text" name="recet_annee2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][1]->annee : '' }}"
                                        aria-describedby="nameHelp"></th>
                                <th><input type="text" name="recet_annee3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][2]->annee : '' }}"
                                        aria-describedby="nameHelp"></th>
                                <th><input type="text" name="recet_annee4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][3]->annee : '' }}"
                                        aria-describedby="nameHelp"></th>
                            <tr>
                            <tr>
                                <th>Fonctionnement</th>
                                <td><input type="text" name="recet_fonct1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][0]->fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="recet_fonct2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][1]->fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="recet_fonct3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][2]->fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="recet_fonct4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][3]->fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            <tr>
                            <tr>
                                <th>Investissement</th>
                                <td><input type="text" name="recet_invest1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][0]->investissement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="recet_invest2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][1]->investissement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="recet_invest3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][2]->investissement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="recet_invest4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][3]->investissement : '' }}"
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
                                <th><input type="text" name="depens_annee1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][0]->annee : '' }}"
                                        aria-describedby="nameHelp"></th>
                                <th><input type="text" name="depens_annee2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][1]->annee : '' }}"
                                        aria-describedby="nameHelp"></th>
                                <th><input type="text" name="depens_annee3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][2]->annee : '' }}"
                                        aria-describedby="nameHelp"></th>
                                <th><input type="text" name="depens_annee4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][3]->annee : '' }}"
                                        aria-describedby="nameHelp"></th>
                            <tr>
                            <tr>
                                <th>Fonctionnement</th>
                                <td><input type="text" name="depens_fonct1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][0]->fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="depens_fonct2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][1]->fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="depens_fonct3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][2]->fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="depens_fonct4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][3]->fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            <tr>
                            <tr>
                                <th>Investissement</th>
                                <td><input type="text" name="depens_invest1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][0]->investissement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="depens_invest2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][1]->investissement : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="depens_invest3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][2]->investissement : '' }}"
                                        aria-describedby="nameHelp"></tdinvestissement>
                                <td><input type="text" name="depens_invest4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depense'][3]->investissement : '' }}"
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase">Contribution des trois (03)
                        meilleurs
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
                                <td><input type="text" name="marche1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->marche : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="marche2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->marche : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="marche3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->marche : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Attendu</th>
                                <td><input type="text" name="m_attendu1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="m_attendu2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="m_attendu3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Contribution</th>
                                <td><input type="text" name="contribution1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="contribution2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="contribution3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->contribution : '' }}"
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Contribution des dix (10)
                        meilleurs
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
                                <td><input type="text" name="village1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][0]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][1]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][2]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][3]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village5" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][4]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village6" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][5]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village7" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][6]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village8" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][7]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village9" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][8]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="village10" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][9]->le_village : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Montant attendu</th>
                                <td><input type="text" name="attendu1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][0]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][1]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][2]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][3]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu5" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][4]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu6" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][5]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu7" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][6]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu8" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][7]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu9" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][8]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="attendu10" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][9]->attendu : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Montant mobilisé</th>
                                <td><input type="text" name="mobilise1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][0]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][1]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][2]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][3]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise5" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][4]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise6" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][5]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise7" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][6]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise8" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][7]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise9" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][8]->mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="mobilise10" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][9]->mobilise : '' }}"
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Contribution des autres
                        partenaires à
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
                                <td><input type="text" name="identite1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][0]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"> </td>
                                <td><input type="text" name="identite2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][1]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="identite3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][2]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="identite4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][3]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="identite5" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][4]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="identite6" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][5]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="identite7" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][6]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"> </td>
                                <td><input type="text" name="identite8" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][7]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="identite9" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][8]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"> </td>
                                <td><input type="text" name="identite10" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->identite_ptf : '' }}"
                                        aria-describedby="nameHelp"> </td>
                            </tr>
                            <tr>
                                <th>Evaluation contribution</th>
                                <td> <input type="text" name="evalut_contrib1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][0]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="evalut_contrib2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][1]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="evalut_contrib3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][2]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="evalut_contrib4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][3]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="evalut_contrib5" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][4]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="evalut_contrib6" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][5]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="evalut_contrib7" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][6]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="evalut_contrib8" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][7]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="evalut_contrib9" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][8]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="evalut_contrib10" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->evaluation_contribution : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Principales actions</th>
                                <td><input type="text" name="princ_action1" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action5" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action6" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action7" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action8" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action9" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action10" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}"
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
                                <td><input type="text" name="naissance_nombre" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->naissance_nombre : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="naissance_observation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->naissance_observation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Actes de naissances</th>
                                <td><input type="text" name="acte_de_naissance_nombre" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_nombre : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="acte_de_naissance_observation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_observation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Actes de décès</th>
                                <td><input type="text" name="acte_de_deces_nombre" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_nombre : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="acte_de_deces_observation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_observation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Mariages célébrés</th>
                                <td><input type="text" name="mariage_celebre_nombre" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_nombre : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="mariage_celebre_observation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_observation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Autres actes civils (divers)</th>
                                <td><input type="text" name="autre_acte_nombre" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="autre_acte_nombre_observation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre_observation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Vente de timbres (valeur)</th>
                                <td><input type="text" name="vente_timbre_nombre" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_nombre : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="vente_timbre_observation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_observation : '' }}"
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
                                <td> <input type="text" name="zone_habitation_parcelle_degagee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_degagee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_habitation_parcelle_attribuee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_habitation_parcelle_restante" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_restante : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Zone commerciale</th>
                                <td> <input type="text" name="zone_commerciale_parcelle_degagee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_commerciale_parcelle_attribuee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_commerciale_parcelle_restante" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Zone administrative</th>
                                <td> <input type="text" name="zone_administrative_parcelle_degagee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_degagee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_administrative_parcelle_attribuee"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_administrative_parcelle_restante"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_restante : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Autres....</th>
                                <td> <input type="text" name="zone_autre_parcelle_degagee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_degagee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_autre_parcelle_attribuee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_attribuee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_autre_parcelle_restante" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_restante : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <!--tr>
                                <th>Surfaces en ha ou en m<sup>2</sup></th>
                                <td> <input type="text" name="parcel_degag5" class="form-control" value="{{ isset($dataCommune) ? 'non null' : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="parcel_attribu5" class="form-control" value="{{ isset($dataCommune) ? 'non null' : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="parcel_rest5" class="form-control" value="{{ isset($dataCommune) ? 'non null' : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr-->
                        </table>
                    </div>
                </div>
                @php
                $img_carte_is_visible = true;
                $img_logo_is_visible = true;
                $img_autre_is_visible = true;
                if($dataCommune != null){
                ($dataCommune['ressourceImage'][0]->url != null) ? $img_carte_is_visible = false : $img_carte_is_visible
                = true;
                ($dataCommune['ressourceImage'][1]->url != null) ? $img_logo_is_visible = false : $img_logo_is_visible =
                true;
                ($dataCommune['ressourceImage'][2]->url != null) ? $img_autre_is_visible = false : $img_autre_is_visible
                = true;

                }
                @endphp
                <div class="row mt-3">
                    @if($img_carte_is_visible)
                    <div class="col-12 col-md-6 font-weight-bolder text-center text-uppercase">
                        <div class="custom-file mb-3">
                            <input type="file"
                                class="custom-file-input  @error('commune_img_carte') is-invalid @enderror"
                                id="commune_img_carte" name="commune_img_carte">
                            <label class="custom-file-label" for="customFile" style="font-size: 0.9em">Choisir carte de
                                la commune</label>
                            @error('commune_img_carte')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    @if($img_logo_is_visible)
                    <div class="col-12 col-md-6 font-weight-bolder text-center text-uppercase">
                        <div class="custom-file mb-3">
                            <input type="file"
                                class="custom-file-input  @error('commune_img_logo') is-invalid @enderror"
                                id="commune_img_logo" name="commune_img_logo">
                            <label class="custom-file-label" for="customFile" style="font-size: 0.9em">Choisir logo de
                                la commune</label>
                            @error('commune_img_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    @if($img_autre_is_visible)
                    <div class="col-12 font-weight-bolder text-center text-uppercase">
                        <div class="custom-file mb-3">
                            <input type="file"
                                class="custom-file-input  @error('commune_img_autre') is-invalid @enderror"
                                id="commune_img_autre" name="commune_img_autre">
                            <label class="custom-file-label" for="customFile" style="font-size: 0.9em">Autre image de la
                                commune</label>
                            @error('commune_img_autre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    @if(!$img_carte_is_visible)
                    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
                        <img class="img-fluid"
                            src="{{ isset($dataCommune) ? asset('/'.$dataCommune['ressourceImage'][0]->url) : ''  }}"
                            style="width:auto; max-height:250px" alt="img1" />
                        <a class="bg-danger font-weight-bold text-white btn delete"
                            href="{{ route('deleteImg',isset($dataCommune) ? $dataCommune['ressourceImage'][0]->id : '') }}">supprimer</a>
                    </div>
                    @endif
                    @if(!$img_logo_is_visible)
                    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
                        <img class="img-fluid"
                            src="{{ isset($dataCommune) ? asset('/'.$dataCommune['ressourceImage'][1]->url) : ''  }}"
                            style="width:auto; max-height:250px" alt="img1" />
                        <a class="bg-danger font-weight-bold text-white btn delete"
                            href="{{ route('deleteImg',isset($dataCommune) ? $dataCommune['ressourceImage'][1]->id : '') }}">supprimer</a>
                    </div>
                    @endif
                    @if(!$img_autre_is_visible)
                    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
                        <img class="img-fluid"
                            src="{{ isset($dataCommune) ? asset('/'.$dataCommune['ressourceImage'][2]->url) : ''  }}"
                            style="width:auto; max-height:250px" alt="img1" />
                        <a class="bg-danger font-weight-bold text-white btn delete"
                            href="{{ route('deleteImg',isset($dataCommune) ? $dataCommune['ressourceImage'][2]->id : '') }}">supprimer</a>
                    </div>
                    @endif
                </div>
                <script>
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
                </script>


                <h4 class="card-header bg-info text-white mt-3">PCD</h4>

                <div class="row">
                    <div class="col-12 font-weight-bolder text-center text-uppercase" style="color:#ff8043">Appréciation
                        de
                        l'exécution
                        du PCD de la commune / le PAIC</div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto">
                            <tr>
                                <th class="sin-table-bg">Date de Conception</th>
                                <th><input type="text" name="date_de_conception" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->date_de_conception  : '' }}"
                                        aria-describedby="nameHelp"></th>
                                <th class="sin-table-bg">Date d'expiration</th>
                                <td><input type="text" name="date_d_expiration" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->date_d_expiration  : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th class="sin-table-bg">Montant Total FCFA</th>
                                <td><input type="text" name="montant_total" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_total  : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <th class="sin-table-bg">Montant mobilisé (2018) FCFA</th>
                                <td><input type="text" name="montant_mobilise" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_mobilise  : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th class="sin-table-bg">Problème majeur (10 mots)</th>
                                <td><input type="text" name="probleme_majeur" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->probleme_majeur  : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <!--td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td-->
                            </tr>
                            <tr>
                                <th class="sin-table-bg">Perpectives (10 mots)</th>
                                <td><input type="text" name="perpective_dix_mot" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->perpective_dix_mot  : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <!--td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="nameHelp"></td-->
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 font-weight-bolder text-center text-uppercase" style="color:#ff8043">Donnez une
                        note
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
                                <th class="sin-table-bg">1 : Reformer les institutions et moderniser l'administration
                                </th>
                                <td> <input type="text" name="reforme_tres_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->reforme_tres_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="reforme_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->reforme_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="reforme_pas_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->reforme_pas_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th class="sin-table-bg">2 : Développer le capital humain</th>
                                <td> <input type="text" name="developper_tres_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->developper_tres_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="developper_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->developper_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="developper_pas_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->developper_pas_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th class="sin-table-bg">3 : Dynamiser les secteurs porteurs pour l'économie et les
                                    emplois
                                </th>
                                <td> <input type="text" name="dynamiser_tres_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_tres_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="dynamiser_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="dynamiser_pas_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_pas_satisfaisant : '' }}"
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
                                <th><input type="text" name="commentaire_appreciation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->commentaire_appreciation : '' }}"
                                        aria-describedby="nameHelp"></th>
                            </tr>
                        </table>
                    </div>
                </div>

                <h4 class="card-header bg-info text-white my-3">Budget</h4>

                <h4 class="col-12 font-weight-bolder text-center text-white text-uppercase sin-bg-3">Bilan d'execution
                    année {{ isset($dataCommune) ? $dataCommune["annee"] : 'null' }}</h4>
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
                                <td><input type="text" name="budget_recet_invest_dotation_globale" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>103 - 104</th>
                                <td>Subvention d'équipement</td>
                                <td><input type="text" name="budget_recet_invest_subvention_equipement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->subvention_equipement : '' }}"
                                        aria-describedby="nameHelp"> </td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <td>Contribution propre/Reserves</td>
                                <td> <input type="text" name="budget_recet_invest_contribution_propre"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->contribution_propre : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>102</th>
                                <td>Dotation liée aux compétences transférées</td>
                                <td> <input type="text" name="budget_recet_invest_dotation_liee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_liee : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>60</th>
                                <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                                <td> <input type="text" name="budget_recet_invest_resultat_exercice"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->resultat_exercice : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>10/104</th>
                                <td>Autres subventions d'équipement</td>
                                <td><input type="text" name="budget_recet_invest_autre_subvention" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->autre_subvention : '' }}"
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
                                <td><input type="text" name="budget_recet_fonct_produit_exploitation"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>71 </th>
                                <td>Produits domaniaux </td>
                                <td> <input type="text" name="budget_recet_fonct_produit_domaniaux" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_domaniaux : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>72 </th>
                                <td>Produits financiers </td>
                                <td> <input type="text" name="budget_recet_fonct_produit_financier" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_financier : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>73 </th>
                                <td> Recouvrements et participations</td>
                                <td> <input type="text" name="budget_recet_fonct_recouvrement" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->recouvrement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>74 </th>
                                <td> Produits divers</td>
                                <td> <input type="text" name="budget_recet_fonct_produit_diver" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_diver : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>75 </th>
                                <td> Impots taxes et contributions directes</td>
                                <td> <input type="text" name="budget_recet_fonct_impots_taxe_c_direct"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_c_direct : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>76 </th>
                                <td> Impots et taxes indirects</td>
                                <td> <input type="text" name="budget_recet_fonct_impots_taxe_indirect"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_indirect : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>79 </th>
                                <td> Produits exceptionnels</td>
                                <td> <input type="text" name="budget_recet_fonct_produit_exceptionnel"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exceptionnel : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>82 </th>
                                <td> Produits antérieurs</td>
                                <td> <input type="text" name="budget_recet_fonct_produit_anterieur" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_anterieur : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>73/735 </th>
                                <td>Autres dotations de transfert</td>
                                <td><input type="text" name="budget_recet_fonct_autres_dotations" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->autres_dotations : '' }}"
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
                                <td><input type="text" name="budget_depens_invest_etude_recherche" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->etude_recherche : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>21/211 </th>
                                <td> Environnement</td>
                                <td> <input type="text" name="budget_depens_invest_environnement" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->environnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>21/214+215+216+218 </th>
                                <td>Equipement</td>
                                <td> <input type="text" name="budget_depens_invest_equipement" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->equipement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>23/232+235 </th>
                                <td> Batiment</td>
                                <td> <input type="text" name="budget_depens_invest_batiment" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->batiment : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>16 </th>
                                <td> Emprunt</td>
                                <td> <input type="text" name="budget_depens_invest_emprunt" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->emprunt : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th># </th>
                                <td> Autres investissements</td>
                                <td> <input type="text" name="budget_depens_invest_autre_investissement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->autre_investissement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>60 </th>
                                <td>Déficit / Excédent d'investissement exer anté</td>
                                <td><input type="text" name="budget_depens_invest_deficit_excedent" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->deficit_excedent : '' }}"
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
                                <td><input type="text" name="budget_depens_fonct_sante" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->sante : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>60/601+605+608 </th>
                                <td>Appui scolaire</td>
                                <td> <input type="text" name="budget_depens_fonct_appui_scolaire" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->appui_scolaire : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>61/617 </th>
                                <td> Sport & culture & jeunesse</td>
                                <td> <input type="text" name="budget_depens_fonct_sport_culture" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->sport_culture : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>64/640 </th>
                                <td>Participation et prestation </td>
                                <td> <input type="text" name="budget_depens_fonct_participation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->participation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>67/674 </th>
                                <td> Frais financier</td>
                                <td> <input type="text" name="budget_depens_fonct_frais_financier" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->frais_financier : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>63/612 </th>
                                <td>Refection /entretien batiment </td>
                                <td> <input type="text" name="budget_depens_fonct_refection_entretien"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->refection_entretien : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>65/650+655+658</th>
                                <td>Salaire & Indemnités </td>
                                <td> <input type="text" name="budget_depens_fonct_salaire_indemnite"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->salaire_indemnite : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>63/1+17 </th>
                                <td>Entretien véhicule & autres [services extérieurs] </td>
                                <td> <input type="text" name="budget_depens_fonct_entretien_vehicule"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->entretien_vehicule : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>60/65/66 </th>
                                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                                <td> <input type="text" name="budget_depens_fonct_appui_fonctionnement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->appui_fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>83/831 </th>
                                <td>Excedent / Prélèvement </td>
                                <td> <input type="text" name="budget_depens_fonct_exedent_prelevement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->exedent_prelevement : '' }}"
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

                <h4 class="col-12 font-weight-bolder text-center text-white text-uppercase sin-bg-3">Bilan d'execution
                    année {{ isset($dataCommune) ? $dataCommune["annee"] + 1 : 'null' }}</h4>
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
                                <td><input type="text" name="budget_n_recet_invest_dotation_globale"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_globale : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>103 - 104</th>
                                <td>Subvention d'équipement</td>
                                <td><input type="text" name="budget_n_recet_invest_subvention_equipement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvestN']->subvention_equipement : '' }}"
                                        aria-describedby="nameHelp"> </td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <td>Contribution propre/Reserves</td>
                                <td> <input type="text" name="budget_n_recet_invest_contribution_propre"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvestN']->contribution_propre : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>102</th>
                                <td>Dotation liée aux compétences transférées</td>
                                <td> <input type="text" name="budget_n_recet_invest_dotation_liee" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_liee : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>60</th>
                                <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                                <td> <input type="text" name="budget_n_recet_invest_resultat_exercice"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvestN']->resultat_exercice : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>10/104</th>
                                <td>Autres Dotation de transfert</td>
                                <td><input type="text" name="budget_n_recet_invest_autre_dotation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvestN']->autre_dotation : '' }}"
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
                                <td><input type="text" name="budget_n_recet_fonct_produit_exploitation"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exploitation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>71 </th>
                                <td>Produits domaniaux </td>
                                <td> <input type="text" name="budget_n_recet_fonct_produit_domaniaux"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_domaniaux : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>72 </th>
                                <td>Produits financiers </td>
                                <td> <input type="text" name="budget_n_recet_fonct_produit_financier"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_financier : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>73 </th>
                                <td> Recouvrements et participations</td>
                                <td> <input type="text" name="budget_n_recet_fonct_recouvrement" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->recouvrement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>74 </th>
                                <td> Produits divers</td>
                                <td> <input type="text" name="budget_n_recet_fonct_produit_diver" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_diver : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>75 </th>
                                <td> Impots taxes et contributions directes</td>
                                <td> <input type="text" name="budget_n_recet_fonct_impots_taxe_c_direct"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_c_direct : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>76 </th>
                                <td> Impots et taxes indirects</td>
                                <td> <input type="text" name="budget_n_recet_fonct_impots_taxe_indirect"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_indirect : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>79 </th>
                                <td> Produits exceptionnels</td>
                                <td> <input type="text" name="budget_n_recet_fonct_produit_exceptionnel"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exceptionnel : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>82 </th>
                                <td> Produits antérieurs</td>
                                <td> <input type="text" name="budget_n_recet_fonct_produit_anterieur"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_anterieur : '' }}"
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
                                <td><input type="text" name="budget_n_depens_invest_etude_recherche"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->etude_recherche : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>21/211 </th>
                                <td> Environnement</td>
                                <td> <input type="text" name="budget_n_depens_invest_environnement" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->environnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>21/214+215+216+218 </th>
                                <td>Equipement</td>
                                <td> <input type="text" name="budget_n_depens_invest_equipement" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->equipement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>23/232+235 </th>
                                <td> Batiment</td>
                                <td> <input type="text" name="budget_n_depens_invest_batiment" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->batiment : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>16 </th>
                                <td> Emprunt</td>
                                <td> <input type="text" name="budget_n_depens_invest_emprunt" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->emprunt : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th># </th>
                                <td> Autres investissements</td>
                                <td> <input type="text" name="budget_n_depens_invest_autre_investissement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->autre_investissement : '' }}"
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
                                <td><input type="text" name="budget_n_depens_fonct_sante" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->sante : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>60/601+605+608 </th>
                                <td>Appui scolaire</td>
                                <td> <input type="text" name="budget_n_depens_fonct_appui_scolaire" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_scolaire : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>61/617 </th>
                                <td> Sport & culture & jeunesse</td>
                                <td> <input type="text" name="budget_n_depens_fonct_sport_culture" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->sport_culture : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th># </th>
                                <td>Eau assainissement enviro</td>
                                <td> <input type="text" name="budget_n_depens_fonct_eau_assainissement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->eau_assainissement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>64/640 </th>
                                <td>Participation et prestation </td>
                                <td> <input type="text" name="budget_n_depens_fonct_participation" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->participation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>67/674 </th>
                                <td> Frais financier</td>
                                <td> <input type="text" name="budget_n_depens_fonct_frais_financier"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->frais_financier : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>63/612 </th>
                                <td>Refection /entretien batiment </td>
                                <td> <input type="text" name="budget_n_depens_fonct_refection_entretien"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->refection_entretien : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>65/650+655+658</th>
                                <td>Salaire & Indemnités </td>
                                <td> <input type="text" name="budget_n_depens_fonct_salaire_indemnite"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->salaire_indemnite : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>63/1+17 </th>
                                <td>Entretien véhicule & autres [services extérieurs] </td>
                                <td> <input type="text" name="budget_n_depens_fonct_entretien_vehicule"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->entretien_vehicule : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>60/65/66 </th>
                                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                                <td> <input type="text" name="budget_n_depens_fonct_appui_fonctionnement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>83/831 </th>
                                <td>Excedent / Prélèvement </td>
                                <td> <input type="text" name="budget_n_depens_fonct_exedent_prelevement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->exedent_prelevement : '' }}"
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
                <div class="row">
                    <div class="mx-auto">
                        <button type="submit" class="btn sin-bg-3 mt-3 font-weight-bold text-white">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/country.js') }}"></script>

@endsection