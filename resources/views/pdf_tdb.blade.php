<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ public_path('/css/bootstrap.min3.3.6.css') }}">
    <link href="{{ public_path('1/css/sin.css') }}" rel="stylesheet">
    <link href="{{ public_path('1/css/table.css') }}" rel="stylesheet">
    <style>
    div {
        font-weight: bold;
        font-size: 1.1em;
    }

    .title {
        font-weight: bold;
        font-size: 1.5em;
    }

    table {
        font-weight: bold;
        font-size: 0.9em;
    }

    @page {
        margin: 30px 0px 0px 0px !important;
        padding: 0px 0px 0px 0px !important;
    }

    .text-edicp {
        border-radius: 25px;
        border: 2px solid #ff8043
    }

    .text-edicp>p {
        text-transform: uppercase;
        color: #444444;
        font-weight: bold;
        font-size: 4.1em;

    }

    .text-edicp>p>span {
        color: #ff8043;
    }

    .text-edicp>p:last-child {
        color: #b87333;
    }
    </style>
</head>

<body style="width: 3408px; height:2480px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-9 col-md-8 text-center text-edicp">
                <p><span>E</span>space de <span>d</span>ialogue et d'<span>i</span>nterpretation
                    <span>c</span>ommunautaire
                </p>
                <p>Bilan d'action 2019 de la commune</p>
            </div>

            <div class="col-xs-3 col-md-4">
                <img class="img-responsive" src="{{ public_path('/img/EDICApp_banier.png') }}" alt="banier edicapp">
            </div>
        </div>

        <div class="row" style="height:350px">
            <div class="col-xs-3">
                <div class="title text-center text-uppercase" style="color:#ff8043">Informations générales sur le PCD
                </div>
                <div class="w-100 mt-2 px-0">

                </div>
                <table class="table-bordered table-hover">
                    <tr>
                        <th class="sin-table-bg">Date de Conception</th>
                        <th>{{ isset($dataCommune) ? $dataCommune['appreciation']->date_de_conception : '' }}</th>
                        <th class="sin-table-bg">Date d'expiration</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->date_d_expiration : '' }}</td>
                    </tr>
                    <tr>
                        <th class="sin-table-bg">Montant Total FCFA</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_total : '' }}</td>
                        <th class="sin-table-bg">Montant mobilisé FCFA</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_mobilise : '' }}</td>
                    </tr>
                    <tr>
                        <th class="sin-table-bg">Problème majeur (10 mots)</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->probleme_majeur : '' }}</td>
                        <!--td> </td>
                            <td> </td-->
                    </tr>
                    <tr>
                        <th class="sin-table-bg">Perpectives (10 mots)</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->perpective_dix_mot : '' }}</td>
                        <!--td> </td>
                            <td> </td-->
                    </tr>
                    <tr>
                        <td clospan="5">#</td>
                    </tr>
                    <tr>
                        <th class="sin-table-bg">Perpectives/suggestions</th>
                        <td colspan="3">
                            {{ isset($dataCommune) ? $dataCommune['satisfaction']->commentaire_appreciation : '' }}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-xs-3 ">
                <div class="title text-center text-uppercase" style="color:#ff8043">Appréciation du niveau d'exécution
                    du PCD</div>
                <img class="img-responsive " src="{{ $data['hidden_pcd'] }}" style="width:100%; height:100%" alt="">
            </div>
            <div class="col-xs-3 ">
                <div class="title text-center text-uppercase" style="color:#ff8043">Evolution des recettes 3 ans</div>
                <img class="img-responsive " src="{{ $data['hidden_recette'] }}" style="width:100%" alt="">
            </div>
            <div class="col-xs-3 ">
                <div class="title text-center text-uppercase" style="color:#ff8043">Evolution des depenses 3 ans</div>
                <img class="img-responsive " src="{{ $data['hidden_depense'] }}" style="width:100%" alt="">
            </div>
        </div>

        <div class="row">
            <!-- Pie Chart -->
            <div class="col-xs-8 bg-success1">
                <div class="col-xs-12 title text-center text-uppercase" style="color:#ff8043">Bilan du fonctionnement
                </div>
                <div class="row ">
                    <div class="col-xs-1 bg-success px-0"><img class="img-responsive"
                            src="{{ public_path('/img/arg.png') }}" style="width:100%;height:555px" alt="image argent">
                    </div>
                    <div class="col-xs-11 bg-success">
                        <div class="row bg-success">
                            <div class="col-xs-6">
                                <img class="img-responsive" src="{{ $data['hidden_bg_recett_fcnt'] }}"
                                    style="width:100%" alt="">
                            </div>
                            <div class="col-xs-6">
                                <img class="img-responsive" src="{{ $data['hidden_bg_depens_fnct'] }}"
                                    style="width:100%" alt="">
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="card-header text-center bg-info text-white">Recettes de fonctionnement
                                    </h4>
                                    <div class="col-xs-12 mt-3 table-responsive px-0">
                                        <div class="card">
                                            <table class="table table-hover card-body">
                                                <tr>
                                                    <th class="sin-table-bg">#</th>
                                                    <th class="bg-success text-white">Recettes</th>
                                                    <th class="bg-danger text-white">Dépenses</th>
                                                <tr>
                                                <tr>
                                                    <th class="bg-info text-white">Total Fonctionnement</th>
                                                    <td>{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation + $dataCommune['recetFonct']->produit_domaniaux + $dataCommune['recetFonct']->produit_financier + $dataCommune['recetFonct']->recouvrement + $dataCommune['recetFonct']->produit_diver + $dataCommune['recetFonct']->impots_taxe_c_direct + $dataCommune['recetFonct']->impots_taxe_indirect + $dataCommune['recetFonct']->produit_exceptionnel + $dataCommune['recetFonct']->produit_anterieur : '' }}
                                                    </td>
                                                    <td>{{ isset($dataCommune) ? $dataCommune['depensFonct']->sante + $dataCommune['depensFonct']->appui_scolaire + $dataCommune['depensFonct']->sport_culture + $dataCommune['depensFonct']->participation + $dataCommune['depensFonct']->frais_financier + $dataCommune['depensFonct']->refection_entretien + $dataCommune['depensFonct']->salaire_indemnite + $dataCommune['depensFonct']->entretien_vehicule + $dataCommune['depensFonct']->appui_fonctionnement + $dataCommune['depensFonct']->exedent_prelevement : '' }}
                                                    </td>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <h4 class="card-header text-center bg-info text-white">Dépenses de fonctionnement
                                    </h4>
                                    <div class="col-12 mt-3 table-responsive px-0">
                                        <div class="card">
                                            <table class="table table-hover card-body">
                                                <tr>
                                                    <th class="sin-table-bg">#</th>
                                                    <th class="bg-success text-white">Recettes</th>
                                                    <th class="bg-danger text-white">Dépenses</th>
                                                <tr>
                                                <tr>
                                                    <th class="bg-info text-white">Total Investissements</th>
                                                    <td>{{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale + $dataCommune['recetInvest']->subvention_equipement + $dataCommune['recetInvest']->contribution_propre + $dataCommune['recetInvest']->dotation_liee + $dataCommune['recetInvest']->resultat_exercice : '' }}
                                                    </td>
                                                    <td>{{ isset($dataCommune) ? $dataCommune['depensInvest']->etude_recherche + $dataCommune['depensInvest']->environnement + $dataCommune['depensInvest']->equipement + $dataCommune['depensInvest']->batiment + $dataCommune['depensInvest']->emprunt + $dataCommune['depensInvest']->autre_investissement + $dataCommune['depensInvest']->deficit_excedent : '' }}
                                                    </td>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 title text-center text-uppercase" style="color:#ff8043">Bilan d'investissement
                    </div>
                    <div class="col-xs-6">
                        <img src="{{ $data['hidden_bg_recett_invest'] }}" style="width:100%" alt="">
                        <h4 class="card-header text-center bg-info text-white">Recettes d'investissement</h4>
                    </div>
                    <div class="col-xs-6">
                        <img src="{{ $data['hidden_bg_depens_invest'] }}" style="width:100%" alt="">
                        <h4 class="card-header text-center bg-info text-white">Depenses d'investissement</h4>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <a class="col-xs-4" href="{{ asset('/img/img2.png') }}"><img class="img-responsive"
                            src="{{ public_path('/img/img2.png') }}" alt="img1" /></a>
                    <a class="col-xs-4 text-center" href="{{ asset('/img/img4.png') }}"><img class="img-responsive"
                            src="{{ public_path('/img/img4.png') }}" alt="img1" /></a>
                    <a class="col-xs-4" href="{{ asset('/img/img3.png') }}"><img class="img-responsive"
                            src="{{ public_path('/img/img3.png') }}" alt="img1" /></a>

                </div>



            </div>
            <!-- Table -->
            <div class="col-xs-4">
                <div class="row mt-3">
                    <div class="col-xs-12 myform sin-bg-3 my-3 font-weight-bolder text-white text-center"> Etat civil et
                        domaine</div>
                    <div class="col-xs-12 table-responsive px-0 ">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th class="sin-table-bg">#</th>
                                    <th class="sin-table-bg">Nombre</th>
                                    <th class="sin-table-bg">Observations (3 mots maximun)</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>Naissances</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->naissance_nombre : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->naissance_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Actes de naissances</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_nombre : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Actes de décès</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_nombre : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Mariages célébrés</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_nombre : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Autres actes civils (divers)</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Vente de timbres (valeur)</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_nombre : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_observation : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12 table-responsive px-0 ">
                        <table class="table table-hover ">
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
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_degagee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_restante : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Zone commerciale</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Zone administrative</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_degagee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_restante : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Autres....</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_degagee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_attribuee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_restante : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Surfaces en ha ou en m<sup>2</sup></th>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_degagee 
                                    + $dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee 
                                    + $dataCommune['domaineCivil']->zone_administrative_parcelle_degagee 
                                    + $dataCommune['domaineCivil']->zone_autre_parcelle_degagee : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee 
                                    + $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee 
                                    + $dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee 
                                    + $dataCommune['domaineCivil']->zone_autre_parcelle_attribuee: '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_restante 
                                    + $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante 
                                    + $dataCommune['domaineCivil']->zone_administrative_parcelle_restante 
                                    + $dataCommune['domaineCivil']->zone_autre_parcelle_restante : '' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-xs-12 myform sin-bg-3 my-2 font-weight-bolder text-white text-center"> Contribution
                        des
                        trois (03) meilleurs marcher</div>
                    <div class="col-xs-6 table-responsive px-0">
                        <table class="table table-hover">
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
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->marche : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->marche : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->marche : '' }}</td>
                            </tr>
                            <tr>
                                <th>Attendu</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->attendu : '' }}</td>
                            </tr>
                            <tr>
                                <th>Contribution</th>
                                <td> {{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->contribution : '' }}
                                </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->contribution : '' }}
                                </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->contribution : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Taux</th>
                                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][0]->attendu != null && $dataCommune['troisMeilleur'][0]->attendu != 0) ? round($dataCommune['troisMeilleur'][0]->contribution *100 / $dataCommune['troisMeilleur'][0]->attendu, 2) . '%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][1]->attendu != null && $dataCommune['troisMeilleur'][1]->attendu != 0) ? round($dataCommune['troisMeilleur'][1]->contribution *100 / $dataCommune['troisMeilleur'][1]->attendu, 2) . '%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][2]->attendu != null && $dataCommune['troisMeilleur'][2]->attendu != 0) ? round($dataCommune['troisMeilleur'][2]->contribution *100 / $dataCommune['troisMeilleur'][2]->attendu, 2) . '%' : 0 : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <h4 class="card-header bg-info text-white">Resultat de l'excercice</h4>
                        <img src="{{ $data['hidden_resultat'] }}" style="width:100%" alt="">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-xs-12 myform sin-bg-3 my-2 font-weight-bolder text-white text-center">Contribution des
                        dix (10) meilleurs villages (toute
                        contribution)</div>
                    <div class="col-xs-12 table-responsive px-0">
                        <table class="table table-condensed table-hover">
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
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][0]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][1]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][2]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][3]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][4]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][5]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][6]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][7]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][8]->le_village : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][9]->le_village : '' }}</td>
                            </tr>
                            <tr>
                                <th>Montant attendu</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][0]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][1]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][2]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][3]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][4]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][5]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][6]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][7]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][8]->attendu : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][9]->attendu : '' }}</td>
                            </tr>
                            <tr>
                                <th>Montant mobilisé</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][0]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][1]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][2]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][3]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][4]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][5]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][6]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][7]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][8]->mobilise : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['dixMeilleur'][9]->mobilise : '' }}</td>
                            </tr>
                            <tr>
                                <th>Taux mobilisation /Prévisions</th>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][0]->attendu !=null && $dataCommune['dixMeilleur'][0]->attendu !=0) ? round($dataCommune['dixMeilleur'][0]->mobilise * 100 / $dataCommune['dixMeilleur'][0]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][1]->attendu !=null && $dataCommune['dixMeilleur'][1]->attendu !=0) ? round($dataCommune['dixMeilleur'][1]->mobilise * 100 / $dataCommune['dixMeilleur'][1]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][2]->attendu !=null && $dataCommune['dixMeilleur'][2]->attendu !=0) ? round($dataCommune['dixMeilleur'][2]->mobilise * 100 / $dataCommune['dixMeilleur'][2]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][3]->attendu !=null && $dataCommune['dixMeilleur'][3]->attendu !=0) ? round($dataCommune['dixMeilleur'][3]->mobilise * 100 / $dataCommune['dixMeilleur'][3]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][4]->attendu !=null && $dataCommune['dixMeilleur'][4]->attendu !=0) ? round($dataCommune['dixMeilleur'][4]->mobilise * 100 / $dataCommune['dixMeilleur'][4]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][5]->attendu !=null && $dataCommune['dixMeilleur'][5]->attendu !=0) ? round($dataCommune['dixMeilleur'][5]->mobilise * 100 / $dataCommune['dixMeilleur'][5]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][6]->attendu !=null && $dataCommune['dixMeilleur'][6]->attendu !=0) ? round($dataCommune['dixMeilleur'][6]->mobilise * 100 / $dataCommune['dixMeilleur'][6]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][7]->attendu !=null && $dataCommune['dixMeilleur'][7]->attendu !=0) ? round($dataCommune['dixMeilleur'][7]->mobilise * 100 / $dataCommune['dixMeilleur'][7]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][8]->attendu !=null && $dataCommune['dixMeilleur'][8]->attendu !=0) ? round($dataCommune['dixMeilleur'][8]->mobilise * 100 / $dataCommune['dixMeilleur'][8]->attendu) .'%' : 0 : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][9]->attendu !=null && $dataCommune['dixMeilleur'][9]->attendu !=0) ? round($dataCommune['dixMeilleur'][9]->mobilise * 100 / $dataCommune['dixMeilleur'][9]->attendu) .'%' : 0 : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!--img src="{{ $data['hidden_resultat'] }}" style="width:100%" alt="">
                <img src="{{ $data['hidden_bg_recett_invest'] }}" style="width:100%" alt="">
                <img src="{{ $data['hidden_bg_depens_invest'] }}" style="width:100%" alt=""-->
            </div>
        </div>







    </div>
</body>

</html>