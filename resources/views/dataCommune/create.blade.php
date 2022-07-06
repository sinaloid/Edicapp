@extends('layout.app')
@section('css')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!--div class="row"-->
    <div class="row mx-auto py-3 px-2">
        <div class="col-sm-12 col-md-10 mx-auto">
            <form class="row mb-3 p-0" action="{{ route('data.store') }}" method="get">
                <div class="col-12 p-0">
                    <div class="form-group my-3 ">
                        <label for="commune"
                            class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">{{ __('Commune') }}</label>
                        <input type="text" class="form-control" id="commune" name="commune" placeholder="Ouagadougou"
                            autocomplete="off" required>

                        @error('commune')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="annee"
                            class="col-12 col-md-4 col-form-label @error('annee') is-invalid @enderror text-md-right">{{ __('Année') }}</label>
                        <select class="form-control m-0" id="annee" name="annee" required>
                            <option value="">{{ __('-- Sélectionnez l’année --') }}</option>
                            @for ($i = Date('Y'); 2000 <= $i; $i--)
                                <option value="{{ $i }}">
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
                <input type="hidden" name="viewName" value="{{ Route::currentRouteName() }}">
                <div class="col-12 mx-auto p-0">
                    <button type="submit" class="btn btn-edic font-weight-bold">Valider</button>
                    <a class="btn btn-edic" href="{{ '#' /*route('datas.cmp')*/ }}">Comparaison</a>
                    @if (Route::currentRouteName() == 'datas.tdb')
                        @if (str_contains(url()->current(), 'planning'))
                            <button class="btn btn-edic font-weight-bold" type="button" name="create_pdf"
                                id="create_pdf">Exporter Tdb Planning</button>
                        @elseif(str_contains(url()->current(), 'global'))
                            <button class="btn btn-edic font-weight-bold" type="button" name="create_pdf"
                                id="create_pdf">Exporter Tdb Global</button>
                        @else
                            <button class="btn btn-edic font-weight-bold" type="button" name="create_pdf"
                                id="create_pdf">Exporter Tdb Bilan</button>
                        @endif
                    @endif
                    <p class="my-3 p-0">
                        <strong>
                            <span class="badge bg-secondary">
                                #Commune:
                            </span>
                        </strong>
                        <small>
                            {{ isset($dataCommune) ? App\Models\Datas\Data::find($dataCommune['data_id'])->commune->commune_name : 'non sélectionnée' }}
                        </small>

                        <br>
                        <br>
                        <span class="d-inline-block ml-auto">Télécharger au format : </span>
                        <span class="badge bg-secondary">
                            <a class="text-white"
                                href="{{ route('make_file_exporte', ['' . Route::currentRouteName(), 'excel', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}">#
                                excel</a>
                        </span>
                        <span class="badge bg-secondary">
                            <a class="text-white"
                                href="{{ route('make_file_exporte', ['' . Route::currentRouteName(), 'pdf', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}">#
                                pdf</a>
                        </span>
                        <span class="badge bg-secondary">
                            <a class="text-white"
                                href="{{ route('make_file_exporte', ['' . Route::currentRouteName(), 'csv', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}">#
                                csv</a>
                        </span>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <!--/div-->

    <div class="row px-0 py-3 bg-white">
        <h2 class="col-12 col-md-10 mx-auto">
            Données de la commune
        </h2>
        <div class="col-12 col-md-10 mx-auto">
            <p><span class="font-weight-bold">Commune:</span>
                {{ isset($dataCommune) ? $dataCommune['commune'] : 'null' }}</p>
            <p><span class="font-weight-bold">Année:</span>
                {{ isset($dataCommune) ? $dataCommune['annee'] : 'null' }}
            </p>
        </div>
        <div class="col-12 col-md-10 mx-auto">
            <form class="row mb-3"
                action="{{ route('data.updateCommune', isset($dataCommune) ? $dataCommune['data_id'] : 0) }}"
                method="post">
                @csrf
                <div class="col-12 col-md-6">
                    <div class="form-group my-3 ">
                        <label for="superficie"
                            class="col-12 col-md-4 col-form-label @error('superficie') is-invalid @enderror text-md-right">{{ __('Superficie:') }}</label>
                        <input id="superficie" type="text" name="superficie" class="form-control d-inline-block w-50"
                            value="{{ isset($dataCommune) ? $dataCommune['superficie'] : '' }}">

                        @error('superficie')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group my-3 ">
                        <label for="total_population"
                            class="col-12 col-md-4 col-form-label @error('total_population') is-invalid @enderror text-md-right">{{ __('Population totale:') }}</label>
                        <input id="total_population" type="text" name="total_population"
                            class="form-control d-inline-block w-50"
                            value="{{ isset($dataCommune) ? $dataCommune['total_population'] : '' }}">

                        @error('total_population')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group my-3 ">
                        <label for="total_homme"
                            class="col-12 col-md-4 col-form-label @error('total_homme') is-invalid @enderror text-md-right">{{ __('Hommes:') }}</label>
                        <input id="total_homme" type="text" name="total_homme" class="form-control d-inline-block w-50"
                            value="{{ isset($dataCommune) ? $dataCommune['total_homme'] : '' }}">

                        @error('total_homme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group my-3 ">
                        <label id="total_femme" for="total_femme"
                            class="col-12 col-md-4 col-form-label @error('total_femme') is-invalid @enderror text-md-right">{{ __('Femmes:') }}</label>
                        <input type="text" name="total_femme" class="form-control d-inline-block w-50"
                            value="{{ isset($dataCommune) ? $dataCommune['total_femme'] : '' }}">
                        <input type="hidden" name="data_id_commune" class="form-control d-inline-block w-50"
                            value="{{ isset($dataCommune) ? $dataCommune['data_id'] : '' }}">
                        <input type="hidden" name="annee_commune" class="form-control d-inline-block w-50"
                            value="{{ isset($dataCommune) ? $dataCommune['annee'] : '' }}">

                        @error('total_homme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mx-auto">
                    <button type="submit" class="btn btn-edic my-1 font-weight-bold">Modifier</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row px-0">
        <div class="col-12 col-md-10 py-5 mx-auto">
            <form class="container-fluid"
                action="{{ route('data.update', isset($dataCommune) ? $dataCommune['data_id'] : 0) }}"
                enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                <h4 class="card-header bg-info text-white">Info G</h4>
                <!--Recette infog -->
                <div class="row ">
                    <div class="col-12 font-weight-bolder text-center text-uppercase">Évolution du budget de la commune
                        les trois dernières années</div>
                    <div class="col-12 table-responsive mt-2 px-0">
                        <table class="table-sm table-hover mx-auto">
                            <tr>
                                <th class="sin-table-bg" colspan="5">Recettes</th>
                            <tr>
                                @php
                                    if ($dataCommune) {
                                        if ($dataCommune['recette'][0]->annee == null) {
                                            $dataCommune['recette'][0]->annee = $dataCommune['annee'] - 2;
                                            $dataCommune['recette'][1]->annee = $dataCommune['annee'] - 1;
                                            $dataCommune['recette'][2]->annee = $dataCommune['annee'];
                                            $dataCommune['recette'][3]->annee = $dataCommune['annee'] + 1;
                                        }
                                    }
                                @endphp
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
                                <td><input type="hidden" type="text" name="recet_fonct4" class="form-control"
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
                                <td><input type="hidden" type="text" name="recet_invest4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recette'][3]->investissement : '' }}"
                                        aria-describedby="nameHelp"--></td>
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
                                @php
                                    if ($dataCommune) {
                                        if ($dataCommune['depense'][0]->annee == null) {
                                            $dataCommune['depense'][0]->annee = $dataCommune['annee'] - 2;
                                            $dataCommune['depense'][1]->annee = $dataCommune['annee'] - 1;
                                            $dataCommune['depense'][2]->annee = $dataCommune['annee'];
                                            $dataCommune['depense'][3]->annee = $dataCommune['annee'] + 1;
                                        }
                                    }
                                @endphp
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
                                <td><input type="hidden" type="text" name="depens_fonct4" class="form-control"
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
                                        aria-describedby="nameHelp"></td>
                                <td><input type="hidden" type="text" name="depens_invest4" class="form-control"
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
                        meilleurs marchés</div>
                    <div class="col-12 table-responsive mt-2 px-0">
                        <table class="table-sm table-hover mx-auto">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg"></th>
                                    <th class="sin-table-bg">Marché 1</th>
                                    <th class="sin-table-bg">Marché 2</th>
                                    <th class="sin-table-bg">Marché 3</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>Nom du marché</th>
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
                                <th>Montant attendu</th>
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
                                <th>Montant mobilisé</th>
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
                        meilleurs villages
                        (toute contribution)</div>
                    <div class="col-12 table-responsive mt-2 px-0">
                        <table class="table-sm table-hover">

                            <thead>
                                <tr>
                                    <th class="sin-table-bg"></th>
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
                                <th>Nom du village</th>
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
                        partenaires de la commune</div>
                    <div class="col-12 table-responsive mt-2 px-0">
                        <table class="table-sm table-hover ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg"></th>
                                    <th class="sin-table-bg">PTF 1</th>
                                    <th class="sin-table-bg">PTF 2 </th>
                                    <th class="sin-table-bg">PTF 3 </th>
                                    <th class="sin-table-bg">PTF 4 </th>
                                    <th class="sin-table-bg">PTF 5 </th>
                                    <th class="sin-table-bg">PTF 6 </th>
                                    <th class="sin-table-bg">PTF 7 </th>
                                    <th class="sin-table-bg">PTF 8 </th>
                                    <th class="sin-table-bg">PTF 9 </th>
                                    <th class="sin-table-bg">PTF 10</th>
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
                                <th>Évaluation contribution</th>
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
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][0]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action2" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][1]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action3" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][2]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action4" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][3]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action5" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][4]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action6" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][5]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action7" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][6]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action8" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][7]->principale_action : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td><input type="text" name="princ_action9" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['partenaire'][8]->principale_action : '' }}"
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase">ETAT CIVIL</div>
                    <div class="col-12 table-responsive mt-2 px-0">
                        <table class="table-sm table-hover mx-auto ">

                            <thead>
                                <tr>
                                    <th class="sin-table-bg"></th>
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
                                <th>Timbres vendus</th>
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
                        <div class="col-12 font-weight-bolder text-center text-uppercase">Situation domaniale</div>

                        <table class="table-sm table-hover mx-auto ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg align-middle" rowspan="2">Désignation / type d'usage
                                    </th>
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
                                <td> <input type="text" name="zone_commerciale_parcelle_attribuee"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="zone_commerciale_parcelle_restante" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>Zone administrative</th>
                                <td> <input type="text" name="zone_administrative_parcelle_degagee"
                                        class="form-control"
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
                    if ($dataCommune != null) {
                        $dataCommune['ressourceImage'][0]->url != null ? ($img_carte_is_visible = false) : ($img_carte_is_visible = true);
                        $dataCommune['ressourceImage'][1]->url != null ? ($img_logo_is_visible = false) : ($img_logo_is_visible = true);
                        $dataCommune['ressourceImage'][2]->url != null ? ($img_autre_is_visible = false) : ($img_autre_is_visible = true);
                    }
                @endphp
                <div class="row mt-3">
                    @if ($img_carte_is_visible)
                        <div class="col-12 col-md-6 font-weight-bolder text-center text-uppercase">
                            <div class="custom-file mb-3">
                                <input type="file"
                                    class="custom-file-input  @error('commune_img_carte') is-invalid @enderror"
                                    id="commune_img_carte" name="commune_img_carte">
                                <label class="custom-file-label" for="customFile" style="font-size: 0.9em">Choisir
                                    carte de
                                    la commune</label>
                                @error('commune_img_carte')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif
                    @if ($img_logo_is_visible)
                        <div class="col-12 col-md-6 font-weight-bolder text-center text-uppercase">
                            <div class="custom-file mb-3">
                                <input type="file"
                                    class="custom-file-input  @error('commune_img_logo') is-invalid @enderror"
                                    id="commune_img_logo" name="commune_img_logo">
                                <label class="custom-file-label" for="customFile" style="font-size: 0.9em">Choisir
                                    logo de
                                    la commune</label>
                                @error('commune_img_logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif
                    @if ($img_autre_is_visible)
                        <div class="col-12 font-weight-bolder text-center text-uppercase">
                            <div class="custom-file mb-3">
                                <input type="file"
                                    class="custom-file-input  @error('commune_img_autre') is-invalid @enderror"
                                    id="commune_img_autre" name="commune_img_autre">
                                <label class="custom-file-label" for="customFile" style="font-size: 0.9em">Autre
                                    image de la
                                    commune</label>
                                @error('commune_img_autre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    @if (!$img_carte_is_visible)
                        <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
                            <img class="img-fluid"
                                src="{{ isset($dataCommune) ? asset('/' . $dataCommune['ressourceImage'][0]->url) : '' }}"
                                style="width:auto; max-height:250px" alt="img1" />
                            <a class="bg-danger font-weight-bold text-white btn delete"
                                href="{{ route('deleteImg', isset($dataCommune) ? $dataCommune['ressourceImage'][0]->id : '') }}">supprimer</a>
                        </div>
                    @endif
                    @if (!$img_logo_is_visible)
                        <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
                            <img class="img-fluid"
                                src="{{ isset($dataCommune) ? asset('/' . $dataCommune['ressourceImage'][1]->url) : '' }}"
                                style="width:auto; max-height:250px" alt="img1" />
                            <a class="bg-danger font-weight-bold text-white btn delete"
                                href="{{ route('deleteImg', isset($dataCommune) ? $dataCommune['ressourceImage'][1]->id : '') }}">supprimer</a>
                        </div>
                    @endif
                    @if (!$img_autre_is_visible)
                        <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
                            <img class="img-fluid"
                                src="{{ isset($dataCommune) ? asset('/' . $dataCommune['ressourceImage'][2]->url) : '' }}"
                                style="width:auto; max-height:250px" alt="img1" />
                            <a class="bg-danger font-weight-bold text-white btn delete"
                                href="{{ route('deleteImg', isset($dataCommune) ? $dataCommune['ressourceImage'][2]->id : '') }}">supprimer</a>
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase" style="color:#ff8043">Évaluation
                        de l'exécution
                        du PCD de la commune</div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto">
                            <tr>
                                <th class="sin-table-bg">Date de début</th>
                                <th><input type="text" name="date_de_conception" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->date_de_conception : '' }}"
                                        aria-describedby="nameHelp"></th>
                                <th class="sin-table-bg">Date de fin</th>
                                <td><input type="text" name="date_d_expiration" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->date_d_expiration : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th class="sin-table-bg">Montant total</th>
                                <td><input type="text" name="montant_total" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_total : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <th class="sin-table-bg">Montant mobilisé</th>
                                <td><input type="text" name="montant_mobilise" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_mobilise : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th class="sin-table-bg">Problèmes majeurs (en quelques mots)</th>
                                <td><input type="text" name="probleme_majeur" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->probleme_majeur : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <!--td> <input type="text" name="name" class="form-control" id="name"
                                                aria-describedby="nameHelp"></td>
                                        <td> <input type="text" name="name" class="form-control" id="name"
                                                aria-describedby="nameHelp"></td-->
                            </tr>
                            <tr>
                                <th class="sin-table-bg">Perspectives (en quelques mots)</th>
                                <td><input type="text" name="perpective_dix_mot" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['appreciation']->perpective_dix_mot : '' }}"
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
                                <th class="sin-table-bg">1 : Consolider la résilience, la sécurité, la cohésion sociale
                                    et la paix :</th>
                                <td> <input type="text" name="consolider_resilience_tres_satisfaisant"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->consolider_resilience_tres_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="consolider_resilience_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->consolider_resilience_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="consolider_resilience_pas_satisfaisant"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->consolider_resilience_pas_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th class="sin-table-bg">2 : Approvondir les réformes institutionnelles et moderniser
                                    l’administration publique</th>
                                <td> <input type="text" name="approfondir_reforme_tres_satisfaisant"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->approfondir_reforme_tres_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="approfondir_reforme_satisfaisant" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->approfondir_reforme_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="approfondir_reforme_pas_satisfaisant"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->approfondir_reforme_pas_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th class="sin-table-bg">3 : Consolider le développement du capital humain et la
                                    solidarité nationale</th>
                                <td> <input type="text" name="consolider_developpement_tres_satisfaisant"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->consolider_developpement_tres_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="consolider_developpement_satisfaisant"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->consolider_developpement_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                                <td> <input type="text" name="consolider_developpement_pas_satisfaisant"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->consolider_developpement_pas_satisfaisant : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <th class="sin-table-bg">4 : Dynamiser les secteurs porteurs pour l’économie et les emplois
                            </th>
                            <td> <input type="text" name="dynamiser_secteurs_tres_satisfaisant" class="form-control"
                                    value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_secteurs_tres_satisfaisant : '' }}"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="dynamiser_secteurs_satisfaisant" class="form-control"
                                    value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_secteurs_satisfaisant : '' }}"
                                    aria-describedby="nameHelp"></td>
                            <td> <input type="text" name="dynamiser_secteurs_pas_satisfaisant" class="form-control"
                                    value="{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_secteurs_pas_satisfaisant : '' }}"
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

                <h4 class="col-12 font-weight-bolder text-center text-white text-uppercase sin-bg-3">Bilan d'exécution
                    année {{ isset($dataCommune) ? $dataCommune['annee'] : 'null' }}</h4>
                <p class="col-8 mx-auto font-weight-bolder text-center bg-success text-uppercase ">Les recettes</p>
                <div class="row mt-3">
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes d'investissement</div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>10 / 101</th>
                                <td>Dotation globale</td>
                                <td><input type="text" name="budget_recet_invest_dotation_globale"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>103</th>
                                <td>Subvention d'équipement</td>
                                <td><input type="text" name="budget_recet_invest_subvention_equipement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->subvention_equipement : '' }}"
                                        aria-describedby="nameHelp"> </td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <td>Contribution propre/Réserves</td>
                                <td> <input type="text" name="budget_recet_invest_contribution_propre"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvest']->contribution_propre : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>102</th>
                                <td>Dotations liées aux compétences transférées</td>
                                <td> <input type="text" name="budget_recet_invest_dotation_liee"
                                        class="form-control"
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
                                <td><input type="text" name="budget_recet_invest_autre_subvention"
                                        class="form-control"
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes de fonctionnement
                    </div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
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
                                <td> <input type="text" name="budget_recet_fonct_produit_domaniaux"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_domaniaux : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>72 </th>
                                <td>Produits financiers </td>
                                <td> <input type="text" name="budget_recet_fonct_produit_financier"
                                        class="form-control"
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
                                <td> <input type="text" name="budget_recet_fonct_produit_diver"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_diver : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>75 </th>
                                <td> Impôts taxes et contributions directes</td>
                                <td> <input type="text" name="budget_recet_fonct_impots_taxe_c_direct"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_c_direct : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>76 </th>
                                <td> Impôts et taxes indirects</td>
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
                                <td> <input type="text" name="budget_recet_fonct_produit_anterieur"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_anterieur : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>735 </th>
                                <td>Autres dotations de transfert</td>
                                <td><input type="text" name="budget_recet_fonct_autres_dotations"
                                        class="form-control"
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Dépenses d'investissement</div>
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
                                <td>Études & Recherches</td>
                                <td><input type="text" name="budget_depens_invest_etude_recherche"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->etude_recherche : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>21/211 </th>
                                <td> Environnement</td>
                                <td> <input type="text" name="budget_depens_invest_environnement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->environnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>21/214+215+216+218 </th>
                                <td>Équipement</td>
                                <td> <input type="text" name="budget_depens_invest_equipement" class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->equipement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>23/232+235 </th>
                                <td> Bâtiment</td>
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
                            <!--tr>
                                            <th># </th>
                                            <td> Autres investissements</td>
                                            <td> <input type="text" name="budget_depens_invest_autre_investissement"
                                                    class="form-control"
                                                    value="{{ isset($dataCommune) ? $dataCommune['depensInvest']->autre_investissement : '' }}"
                                                    aria-describedby="nameHelp"></td>
                                        </tr-->
                            <tr>
                                <th>60 </th>
                                <td>Déficit / Excédent d'investissement exer anté</td>
                                <td><input type="text" name="budget_depens_invest_deficit_excedent"
                                        class="form-control"
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Dépenses de fonctionnement
                    </div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
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
                                <td> <input type="text" name="budget_depens_fonct_appui_scolaire"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->appui_scolaire : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>61/617 </th>
                                <td> Sport & culture & jeunesse</td>
                                <td> <input type="text" name="budget_depens_fonct_sport_culture"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->sport_culture : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>64/640 </th>
                                <td>Participation et prestation </td>
                                <td> <input type="text" name="budget_depens_fonct_participation"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->participation : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>67/674 </th>
                                <td> Frais financier</td>
                                <td> <input type="text" name="budget_depens_fonct_frais_financier"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->frais_financier : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>63/6312 </th>
                                <td>Réfection /entretien bâtiment </td>
                                <td> <input type="text" name="budget_depens_fonct_refection_entretien"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->refection_entretien : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>65/650+655+658</th>
                                <td>Salaires & Indemnités </td>
                                <td> <input type="text" name="budget_depens_fonct_salaire_indemnite"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->salaire_indemnite : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>63/6317 </th>
                                <td>Entretien véhicules & autres [services extérieurs] </td>
                                <td> <input type="text" name="budget_depens_fonct_entretien_vehicule"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->entretien_vehicule : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>66 </th>
                                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                                <td> <input type="text" name="budget_depens_fonct_appui_fonctionnement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->appui_fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>699</th>
                                <td>Autres charges exceptionnels</td>
                                <td> <input type="text" name="budget_depens_fonct_autres_charges_exceptionnel"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonct']->autres_charges_exceptionnel : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>83/831 </th>
                                <td>Excédent / Prélèvement </td>
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

                <h4 class="col-12 font-weight-bolder text-center text-white text-uppercase sin-bg-3">Prévision de
                    l'année {{ isset($dataCommune) ? $dataCommune['annee'] + 1 : 'null' }}</h4>
                <p class="col-8 mx-auto font-weight-bolder text-center bg-success text-uppercase ">Les recettes</p>

                <div class="row mt-3">
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes d'investissement</div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto ">
                            <thead>
                                <tr>
                                <tr>
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
                                </tr>
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
                                <th>103</th>
                                <td>Subventions d'équipement</td>
                                <td><input type="text" name="budget_n_recet_invest_subvention_equipement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvestN']->subvention_equipement : '' }}"
                                        aria-describedby="nameHelp"> </td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <td>Contribution propre/Réserves</td>
                                <td> <input type="text" name="budget_n_recet_invest_contribution_propre"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetInvestN']->contribution_propre : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>102</th>
                                <td>Dotations liées aux compétences transférées</td>
                                <td> <input type="text" name="budget_n_recet_invest_dotation_liee"
                                        class="form-control"
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
                                <td>Autres subventions d'équipemen</td>
                                <td><input type="text" name="budget_n_recet_invest_autre_dotation"
                                        class="form-control"
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes de fonctionnement
                    </div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
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
                                <td> <input type="text" name="budget_n_recet_fonct_recouvrement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->recouvrement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>74 </th>
                                <td> Produits divers</td>
                                <td> <input type="text" name="budget_n_recet_fonct_produit_diver"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_diver : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>75 </th>
                                <td> Impôts taxes et contributions directes</td>
                                <td> <input type="text" name="budget_n_recet_fonct_impots_taxe_c_direct"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_c_direct : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>76 </th>
                                <td> Impôts et taxes indirects</td>
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Dépenses d'investissement</div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>13/132 </th>
                                <td>Études & Recherches</td>
                                <td><input type="text" name="budget_n_depens_invest_etude_recherche"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->etude_recherche : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>21/211 </th>
                                <td> Environnement</td>
                                <td> <input type="text" name="budget_n_depens_invest_environnement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->environnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>21/214+215+216+218 </th>
                                <td>Équipement</td>
                                <td> <input type="text" name="budget_n_depens_invest_equipement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->equipement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>23/232+235 </th>
                                <td> Bâtiment</td>
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
                            <!--tr>
                                            <th># </th>
                                            <td> Autres investissements</td>
                                            <td> <input type="text" name="budget_n_depens_invest_autre_investissement"
                                                    class="form-control"
                                                    value="{{ isset($dataCommune) ? $dataCommune['depensInvestN']->autre_investissement : '' }}"
                                                    aria-describedby="nameHelp"></td>
                                        </tr-->
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
                    <div class="col-12 font-weight-bolder text-center text-uppercase"> Dépenses de fonctionnement
                    </div>
                    <div class="col-12 table-responsive mt-2 px-0 ">
                        <table class="table-sm table-hover mx-auto ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
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
                                <td> <input type="text" name="budget_n_depens_fonct_appui_scolaire"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_scolaire : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>61/617 </th>
                                <td> Sport & culture & jeunesse</td>
                                <td> <input type="text" name="budget_n_depens_fonct_sport_culture"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->sport_culture : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th> </th>
                                <td>Eau assainissement enviro</td>
                                <td> <input type="text" name="budget_n_depens_fonct_eau_assainissement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->eau_assainissement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>64/640 </th>
                                <td>Participation et prestation </td>
                                <td> <input type="text" name="budget_n_depens_fonct_participation"
                                        class="form-control"
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
                                <th>63/6312 </th>
                                <td>Réfection /entretien bâtiment </td>
                                <td> <input type="text" name="budget_n_depens_fonct_refection_entretien"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->refection_entretien : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>63/6317 </th>
                                <td>Entretien véhicule & autres [services extérieurs] </td>
                                <td> <input type="text" name="budget_n_depens_fonct_entretien_vehicule"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->entretien_vehicule : '' }}"
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
                                <th>66 </th>
                                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                                <td> <input type="text" name="budget_n_depens_fonct_appui_fonctionnement"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_fonctionnement : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                            <tr>
                                <th>699</th>
                                <td>Autres charges exceptionnels</td>
                                <td> <input type="text" name="budget_n_depens_fonct_autres_charges_exceptionnel"
                                        class="form-control"
                                        value="{{ isset($dataCommune) ? $dataCommune['depensFonctN']->autres_charges_exceptionnel : '' }}"
                                        aria-describedby="nameHelp"></td>
                            </tr>
                            <tr>
                                <th>83/831 </th>
                                <td>Excédent / Prélèvement </td>
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
                    <div class="col-12 justify-content-center">
                        <input type="submit" class="btn btn-edic mt-3 mx-auto font-weight-bold"
                            value="Enregistrer" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
