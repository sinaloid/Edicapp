<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ public_path('/css/bootstrap.min3.3.6.css') }}">
    <link href="{{ public_path('/css/pdf.css') }}" rel="stylesheet">
    <link href="{{ public_path('1/css/sin.css') }}" rel="stylesheet">
    <link href="{{ public_path('1/css/table.css') }}" rel="stylesheet">

</head>

<body style="width: 4408px; height:2480px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-9  text-center text-edicp">
                <br>
                <br>
                <p><span>E</span>space de <span>d</span>ialogue et d'<span>i</span>nterpretation
                    <span>c</span>ommunautaire
                </p>
                <p>Bilan d'action {{ isset($dataCommune) ? $dataCommune['annee'] : '' }} de la commune</p>
            </div>

            <div class="col-xs-3 ">
                <img class="img-responsive" src="{{ public_path('/img/EDICApp_banier.png') }}" alt="banier edicapp">
            </div>
        </div>

        <div class="row">
            <br>
            <br>
            <div class="col-xs-3">
                <div class="title text-center text-uppercase">Informations générales sur le PCD
                </div>
                <br>

                <table class="table tb_pcd">
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

            <div class="col-xs-3">
                <div class="title text-center text-uppercase">Appréciation du niveau d'exécution
                    du PCD</div> <br>
                <img class="google" class="img-responsive " src="{{ $data['hidden_pcd'] }}" style="height:100% !important" alt="">
            </div>
            <div class="col-xs-3">
                <div class="title text-center text-uppercase">Evolution des recettes 3 ans</div>
                <br>
                <img class="google" class="img-responsive " src="{{ $data['hidden_recette'] }}" alt="">
            </div>
            <div class="col-xs-3">
                <div class="title text-center text-uppercase">Evolution des depenses 3 ans</div>
                <br>
                <img class="google" class="img-responsive " src="{{ $data['hidden_depense'] }}" alt="">
            </div>
        </div>

        <div class="row">
            <!-- Pie Chart -->
            <div class="col-xs-8">
                <div class="col-xs-12 title text-center text-uppercase">Bilan du fonctionnement
                </div> <br> <br>
                <div class="row ">
                    <div class="col-xs-1  px-0"><img class="img-responsive" src="{{ public_path('/img/arg.png') }}"
                            style="width:100%;height:580px;max-height:580px" alt="image argent">
                    </div>
                    <div class="col-xs-11">
                        <div class="row">
                            <div class="col-xs-6">
                                <img class="google" class="img-responsive" src="{{ $data['hidden_bg_recett_fcnt'] }}"
                                    alt="">
                            </div>
                            <div class="col-xs-6">
                                <img class="google" class="img-responsive" src="{{ $data['hidden_bg_depens_fnct'] }}"
                                    alt="">
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <br>
                                    <h4 class="card-header title text-center text-uppercase bg-info text-white">Recettes
                                        de fonctionnement
                                    </h4>
                                    <div class="col-xs-12 mt-3 table-responsive px-0">
                                        <div class="card">
                                            <table class="table table-bordered card-body">
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
                                    <br>
                                    <h4 class="card-header title text-center text-uppercase bg-info text-white">Dépenses
                                        de fonctionnement
                                    </h4>
                                    <div class="col-12 mt-3 table-responsive px-0">
                                        <div class="card">
                                            <table class="table table-bordered card-body">
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
                    <div class="col-xs-12 title text-center text-uppercase">Bilan d'investissement
                    </div>
                    <div class="col-xs-1 px-0"><img class="img-responsive" src="{{ public_path('/img/arg.png') }}"
                            style="width:100%;height:580px;max-height:580px" alt="image argent"></div>
                    <div class="col-xs-11">
                        <div class="col-xs-6">
                            <img class="google" src="{{ $data['hidden_bg_recett_invest'] }}" alt="">
                            <br>
                            <br>
                            <h4 class="card-header title text-center text-uppercase bg-info text-white">Recettes
                                d'investissement</h4>
                        </div>
                        <div class="col-xs-6">
                            <img class="google" src="{{ $data['hidden_bg_depens_invest'] }}" alt="">
                            <br>
                            <br>
                            <h4 class="card-header title text-center text-uppercase bg-info text-white">Depenses
                                d'investissement</h4>
                        </div>
                        @if ($dataCommune != null)
                            <div class="row justify-content-center mt-2">
                                @if ($dataCommune['ressourceImage'][0]->url != null)
                                    <div class="col-xs-4 col-md-4 font-weight-bolder text-center text-uppercase">
                                        <br>
                                        <br>
                                        <img class="img-fluid"
                                            src="{{ public_path('/' . $dataCommune['ressourceImage'][0]->url) }}"
                                            style="width:auto; max-height:400px" alt="img1" />
                                    </div>
                                @endif
                                @if ($dataCommune['ressourceImage'][1]->url != null)
                                    <div class="col-xs-4 col-md-4 font-weight-bolder text-center text-uppercase">
                                        <br>
                                        <br>
                                        <img class="img-fluid"
                                            src="{{ public_path('/' . $dataCommune['ressourceImage'][1]->url) }}"
                                            style="width:auto; max-height:400px" alt="img1" />
                                    </div>
                                @endif
                                @if ($dataCommune['ressourceImage'][2]->url != null)
                                    <div class="col-xs-4 col-md-4 font-weight-bolder text-center text-uppercase">
                                        <br>
                                        <br>
                                        <img class="img-fluid"
                                            src="{{ public_path('/' . $dataCommune['ressourceImage'][2]->url) }}"
                                            style="width:auto; max-height:400px" alt="img1" />
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>




            </div>
            <!-- Table -->
            <div class="col-xs-4">
                <div class="row mt-3">
                    <div class="col-xs-12 title text-center text-uppercase"> Etat civil et
                        domaine</div>
                    <div class="col-xs-12 table-responsive px-0 ">
                        <table class="table">

                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">Nombre</th>
                                <th class="sin-table-bg">Observations (3 mots maximun)</th>
                            </tr>

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
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Vente de timbres (valeur)</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_nombre : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_observation : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12 table-responsive px-0 ">
                        <table class="table">


                            <tr>
                                <th class="sin-table-bg align-middle" rowspan="2">Désignation / type d'usage</th>
                                <th class="sin-table-bg text-center" colspan="3">Nombre</th>
                            </tr>
                            <tr>
                                <th>Parcelles Dégagées</th>
                                <th>Parcelles attribuées</th>
                                <th> Parcelles restantes</th>
                            </tr>

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
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_degagee + $dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee + $dataCommune['domaineCivil']->zone_administrative_parcelle_degagee + $dataCommune['domaineCivil']->zone_autre_parcelle_degagee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee + $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee + $dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee + $dataCommune['domaineCivil']->zone_autre_parcelle_attribuee : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_restante + $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante + $dataCommune['domaineCivil']->zone_administrative_parcelle_restante + $dataCommune['domaineCivil']->zone_autre_parcelle_restante : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-xs-12 title text-center text-uppercase"> Contribution
                        des
                        trois (03) meilleurs marcher</div>
                    <div class="col-xs-6 table-responsive px-0">
                        <table class="table">

                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">1</th>
                                <th class="sin-table-bg">2</th>
                                <th class="sin-table-bg">3</th>
                            </tr>

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
                                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][0]->attendu != null && $dataCommune['troisMeilleur'][0]->attendu != 0 ? round(($dataCommune['troisMeilleur'][0]->contribution * 100) / $dataCommune['troisMeilleur'][0]->attendu, 2) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][1]->attendu != null && $dataCommune['troisMeilleur'][1]->attendu != 0 ? round(($dataCommune['troisMeilleur'][1]->contribution * 100) / $dataCommune['troisMeilleur'][1]->attendu, 2) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][2]->attendu != null && $dataCommune['troisMeilleur'][2]->attendu != 0 ? round(($dataCommune['troisMeilleur'][2]->contribution * 100) / $dataCommune['troisMeilleur'][2]->attendu, 2) . '%' : 0) : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12 ">
                        <h4 class="card-header bg-info text-white">Resultat de l'excercice</h4>
                        <img class="google" src="{{ $data['hidden_resultat'] }}"  alt="">
                    </div>
                </div>
                <br>
                <br>
                <div class="row mt-3">
                    <div class="col-xs-12 text-center">
                        <p>{{ $qrcode }} </p>
                    </div>
                </div>


                <!--img src="{{ $data['hidden_resultat'] }}" style="width:100%" alt="">
                <img src="{{ $data['hidden_bg_recett_invest'] }}" style="width:100%" alt="">
                <img src="{{ $data['hidden_bg_depens_invest'] }}" style="width:100%" alt=""-->
            </div>
        </div>
        <br>

        <!-- tableau restant-->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-12 title text-center text-uppercase"> Contribution des autres partenaires à la
                    commune
                </div>
                <br>
                <div class="col-xs-11 table-responsive px-0">
                    <table class="table">

                        <tr>
                            <th class="sin-table-bg">#</th>
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

                        <tr>
                            <th>Identité PTF</th>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][0]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][1]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][2]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][3]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][4]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][5]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][6]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][7]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][8]->identite_ptf : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->identite_ptf : '' }}</td>
                        </tr>
                        <tr>
                            <th>Evaluation contribution</th>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][0]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][1]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][2]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][3]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][4]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][5]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][6]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][7]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][8]->evaluation_contribution : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->evaluation_contribution : '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Principales actions</th>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][0]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][1]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][2]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][3]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][4]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][5]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][6]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][7]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][8]->principale_action : '' }}
                            </td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        
            <div class="row">
                <div class="col-xs-6">
               <div class="col-xs-12"></div>
                        <div class="col-xs-12 title text-center text-uppercase"> Contribution des dix (10)
                            meilleurs
                            villages
                            (toute contribution)</div>
                    <div class="col-xs-12 mt-2 px-0">
                        
                        
                        <table class="table">


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
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][0]->attendu != null && $dataCommune['dixMeilleur'][0]->attendu != 0 ? round(($dataCommune['dixMeilleur'][0]->mobilise * 100) / $dataCommune['dixMeilleur'][0]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][1]->attendu != null && $dataCommune['dixMeilleur'][1]->attendu != 0 ? round(($dataCommune['dixMeilleur'][1]->mobilise * 100) / $dataCommune['dixMeilleur'][1]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][2]->attendu != null && $dataCommune['dixMeilleur'][2]->attendu != 0 ? round(($dataCommune['dixMeilleur'][2]->mobilise * 100) / $dataCommune['dixMeilleur'][2]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][3]->attendu != null && $dataCommune['dixMeilleur'][3]->attendu != 0 ? round(($dataCommune['dixMeilleur'][3]->mobilise * 100) / $dataCommune['dixMeilleur'][3]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][4]->attendu != null && $dataCommune['dixMeilleur'][4]->attendu != 0 ? round(($dataCommune['dixMeilleur'][4]->mobilise * 100) / $dataCommune['dixMeilleur'][4]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][5]->attendu != null && $dataCommune['dixMeilleur'][5]->attendu != 0 ? round(($dataCommune['dixMeilleur'][5]->mobilise * 100) / $dataCommune['dixMeilleur'][5]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][6]->attendu != null && $dataCommune['dixMeilleur'][6]->attendu != 0 ? round(($dataCommune['dixMeilleur'][6]->mobilise * 100) / $dataCommune['dixMeilleur'][6]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][7]->attendu != null && $dataCommune['dixMeilleur'][7]->attendu != 0 ? round(($dataCommune['dixMeilleur'][7]->mobilise * 100) / $dataCommune['dixMeilleur'][7]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][8]->attendu != null && $dataCommune['dixMeilleur'][8]->attendu != 0 ? round(($dataCommune['dixMeilleur'][8]->mobilise * 100) / $dataCommune['dixMeilleur'][8]->attendu) . '%' : 0) : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][9]->attendu != null && $dataCommune['dixMeilleur'][9]->attendu != 0 ? round(($dataCommune['dixMeilleur'][9]->mobilise * 100) / $dataCommune['dixMeilleur'][9]->attendu) . '%' : 0) : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="col-xs-6">
                    <div class="col-xs-12">
                            <div class="col-xs-12 title text-center text-uppercase">Evolution du Budget</div>
                        

                        <div class="col-xs-12 mt-2 px-0">
                            <table class="table mx-auto">
                                <tr>
                                    <th class="sin-table-bg" colspan="5">Recettes / Dépenses</th>
                                </tr>
                                <tr>
                                    <th>années</th>
                                    <th>{{ isset($dataCommune) ? $dataCommune['recette'][0]->annee : '' }}</th>
                                    <th>{{ isset($dataCommune) ? $dataCommune['recette'][1]->annee : '' }}</th>
                                    <th>{{ isset($dataCommune) ? $dataCommune['recette'][2]->annee : '' }}</th>
                                    <th>{{ isset($dataCommune) ? $dataCommune['recette'][3]->annee : '' }}</th>
                                </tr>

                                <tr>
                                    <th>Total Recettes</th>
                                    <td>{{ isset($dataCommune) ? $dataCommune['recette'][0]->fonctionnement + $dataCommune['recette'][0]->investissement : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? $dataCommune['recette'][1]->fonctionnement + $dataCommune['recette'][1]->investissement : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? $dataCommune['recette'][2]->fonctionnement + $dataCommune['recette'][2]->investissement : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? $dataCommune['recette'][3]->fonctionnement + $dataCommune['recette'][3]->investissement : '' }}
                                    </td>
                                <tr>
                                <tr>
                                    <th>Total Dépenses</th>
                                    <td>{{ isset($dataCommune) ? $dataCommune['depense'][0]->fonctionnement + $dataCommune['depense'][0]->investissement : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? $dataCommune['depense'][1]->fonctionnement + $dataCommune['depense'][1]->investissement : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? $dataCommune['depense'][2]->fonctionnement + $dataCommune['depense'][2]->investissement : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? $dataCommune['depense'][3]->fonctionnement + $dataCommune['depense'][3]->investissement : '' }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12  text-center text-uppercase">
                    <span class="contrib">Ce Bilan à été réalisé avec la précieuse contribution
    du #PAGOF sur financement de l'Agence Française de Développement </span></div> 
<div class="col-xs-12"><br></div>
<div class="col-xs-12"><br></div>
<div class="col-xs-12"><br></div>
<div class="col-xs-12"><br></div>
<div class="col-xs-12"><br></div>

                <div class="row">
                    <div class="col-xs-1">
                        <div class="col-xs-12 title text-center text-uppercase">Budget</div>
                        <div class="col-xs-12 title text-center text-uppercase">
                            {{ isset($dataCommune) ? $dataCommune['annee'] : '' }}</div>
                    </div>
                    <div class="col-xs-4 px-0 ">
                        <div class="col-xs-12 title text-center text-uppercase"> Recettes d'investissement</div>
                        <table class="table">
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
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>103 - 104</th>
                                <td>Subvention d'équipement</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvest']->subvention_equipement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <td>Contribution propre/Reserves</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvest']->contribution_propre : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>102</th>
                                <td>Dotation liée aux compétences transférées</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_liee : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>60</th>
                                <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvest']->resultat_exercice : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>10/104</th>
                                <td>Autres subventions d'équipement</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvest']->autre_subvention : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale + $dataCommune['recetInvest']->subvention_equipement + $dataCommune['recetInvest']->contribution_propre + $dataCommune['recetInvest']->dotation_liee + $dataCommune['recetInvest']->resultat_exercice : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-2"></div>


                    <div class="col-xs-4 mt-2 px-0 ">
                        <div class="col-xs-12 title text-center text-uppercase"> Depenses d'investissement</div>
                        <table class="table table-hover mx-auto ">
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
                                <td>{{ isset($dataCommune) ? $dataCommune['depensInvest']->etude_recherche : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>21/211 </th>
                                <td> Environnement</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvest']->environnement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>21/214+215+216+218 </th>
                                <td>Equipement</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvest']->equipement : '' }}</td>
                            </tr>
                            <tr>
                                <th>23/232+235 </th>
                                <td> Batiment</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvest']->batiment : '' }}</td>
                            </tr>
                            <tr>
                                <th>16 </th>
                                <td> Emprunt</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvest']->emprunt : '' }}</td>
                            </tr>
                            <tr>
                                <th># </th>
                                <td> Autres investissements</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvest']->autre_investissement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>60 </th>
                                <td>Déficit / Excédent d'investissement exer anté</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['depensInvest']->deficit_excedent : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['depensInvest']->etude_recherche + $dataCommune['depensInvest']->environnement + $dataCommune['depensInvest']->equipement + $dataCommune['depensInvest']->batiment + $dataCommune['depensInvest']->emprunt + $dataCommune['depensInvest']->autre_investissement + $dataCommune['depensInvest']->deficit_excedent : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-4 px-0 ">
                        <div class="col-xs-12 title text-center text-uppercase"> Recettes de fonctionnement</div>
                        <table class="table">
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
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>71 </th>
                                <td>Produits domaniaux </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_domaniaux : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>72 </th>
                                <td>Produits financiers </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_financier : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>73 </th>
                                <td> Recouvrements et participations</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->recouvrement : '' }}</td>
                            </tr>
                            <tr>
                                <th>74 </th>
                                <td> Produits divers</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_diver : '' }}</td>
                            </tr>
                            <tr>
                                <th>75 </th>
                                <td> Impots taxes et contributions directes</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_c_direct : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>76 </th>
                                <td> Impots et taxes indirects</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_indirect : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>79 </th>
                                <td> Produits exceptionnels</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exceptionnel : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>82 </th>
                                <td> Produits antérieurs</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_anterieur : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>73/735 </th>
                                <td>Autres dotations de transfert</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->autres_dotations : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation + $dataCommune['recetFonct']->produit_domaniaux + $dataCommune['recetFonct']->produit_financier + $dataCommune['recetFonct']->recouvrement + $dataCommune['recetFonct']->produit_diver + $dataCommune['recetFonct']->impots_taxe_c_direct + $dataCommune['recetFonct']->impots_taxe_indirect + $dataCommune['recetFonct']->produit_exceptionnel + $dataCommune['recetFonct']->produit_anterieur : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4 mt-2 px-0 ">
                        <div class="col-xs-12 title text-center text-uppercase"> Depenses de fonctionnement</div>

                        <table class="table table-hover mx-auto ">
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
                                <td>{{ isset($dataCommune) ? $dataCommune['depensFonct']->sante : '' }}</td>
                            </tr>
                            <tr>
                                <th>60/601+605+608 </th>
                                <td>Appui scolaire</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->appui_scolaire : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>61/617 </th>
                                <td> Sport & culture & jeunesse</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->sport_culture : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>64/640 </th>
                                <td>Participation et prestation </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->participation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>67/674 </th>
                                <td> Frais financier</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->frais_financier : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>63/612 </th>
                                <td>Refection /entretien batiment </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->refection_entretien : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>65/650+655+658</th>
                                <td>Salaire & Indemnités </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->salaire_indemnite : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>63/1+17 </th>
                                <td>Entretien véhicule & autres [services extérieurs] </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->entretien_vehicule : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>60/65/66 </th>
                                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->appui_fonctionnement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>83/831 </th>
                                <td>Excedent / Prélèvement </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonct']->exedent_prelevement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['depensFonct']->sante + $dataCommune['depensFonct']->appui_scolaire + $dataCommune['depensFonct']->sport_culture + $dataCommune['depensFonct']->participation + $dataCommune['depensFonct']->frais_financier + $dataCommune['depensFonct']->refection_entretien + $dataCommune['depensFonct']->salaire_indemnite + $dataCommune['depensFonct']->entretien_vehicule + $dataCommune['depensFonct']->appui_fonctionnement + $dataCommune['depensFonct']->exedent_prelevement : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-1">
                        <div class="col-xs-12 title text-center text-uppercase">Budget N+</div>
                        <div class="col-xs-12 title text-center text-uppercase">
                            {{ isset($dataCommune) ? $dataCommune['annee'] + 1 : '' }}</div>
                    </div>
                    <div class="col-xs-4 px-0 ">
                        <div class="col-xs-12 title text-center text-uppercase"> Recettes d'investissement</div>
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
                                <td>{{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_globale : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>103 - 104</th>
                                <td>Subvention d'équipement</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['recetInvestN']->subvention_equipement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <td>Contribution propre/Reserves</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvestN']->contribution_propre : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>102</th>
                                <td>Dotation liée aux compétences transférées</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_liee : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>60</th>
                                <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetInvestN']->resultat_exercice : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>10/104</th>
                                <td>Autres Dotation de transfert</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['recetInvestN']->autre_dotation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_globale + $dataCommune['recetInvestN']->subvention_equipement + $dataCommune['recetInvestN']->contribution_propre + $dataCommune['recetInvestN']->dotation_liee + $dataCommune['recetInvestN']->resultat_exercice + $dataCommune['recetInvestN']->autre_dotation : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-2"></div>


                    <div class="col-xs-4 mt-2 px-0 ">
                        <div class="col-xs-12 title text-center text-uppercase"> Depenses d'investissement</div>
                        <table class="table table-hover mx-auto ">
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
                                <td>{{ isset($dataCommune) ? $dataCommune['depensInvestN']->etude_recherche : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>21/211 </th>
                                <td> Environnement</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvestN']->environnement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>21/214+215+216+218 </th>
                                <td>Equipement</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvestN']->equipement : '' }}</td>
                            </tr>
                            <tr>
                                <th>23/232+235 </th>
                                <td> Batiment</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvestN']->batiment : '' }}</td>
                            </tr>
                            <tr>
                                <th>16 </th>
                                <td> Emprunt</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvestN']->emprunt : '' }}</td>
                            </tr>
                            <tr>
                                <th># </th>
                                <td> Autres investissements</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvestN']->autre_investissement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['depensInvestN']->etude_recherche + $dataCommune['depensInvestN']->environnement + $dataCommune['depensInvestN']->equipement + $dataCommune['depensInvestN']->batiment + $dataCommune['depensInvestN']->emprunt + $dataCommune['depensInvestN']->autre_investissement : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-4 px-0 ">
                        <div class="col-xs-12 title text-center text-uppercase"> Recettes de fonctionnement</div>
                        <table class="table table-hover mx-auto ">
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
                                <td>{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exploitation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>71 </th>
                                <td>Produits domaniaux </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_domaniaux : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>72 </th>
                                <td>Produits financiers </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_financier : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>73 </th>
                                <td> Recouvrements et participations</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->recouvrement : '' }}</td>
                            </tr>
                            <tr>
                                <th>74 </th>
                                <td> Produits divers</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_diver : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>75 </th>
                                <td> Impots taxes et contributions directes</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_c_direct : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>76 </th>
                                <td> Impots et taxes indirects</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_indirect : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>79 </th>
                                <td> Produits exceptionnels</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exceptionnel : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>82 </th>
                                <td> Produits antérieurs</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_anterieur : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exploitation + $dataCommune['recetFonctN']->produit_domaniaux + $dataCommune['recetFonctN']->produit_financier + $dataCommune['recetFonctN']->recouvrement + $dataCommune['recetFonctN']->produit_diver + $dataCommune['recetFonctN']->impots_taxe_c_direct + $dataCommune['recetFonctN']->impots_taxe_indirect + $dataCommune['recetFonctN']->produit_exceptionnel + $dataCommune['recetFonctN']->produit_anterieur : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4 mt-2 px-0 ">
                        <div class="col-xs-12 title text-center text-uppercase"> Depenses de fonctionnement</div>

                        <table class="table mx-auto ">
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
                                <td>{{ isset($dataCommune) ? $dataCommune['depensFonctN']->sante : '' }}</td>
                            </tr>
                            <tr>
                                <th>60/601+605+608 </th>
                                <td>Appui scolaire</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_scolaire : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>61/617 </th>
                                <td> Sport & culture & jeunesse</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->sport_culture : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th># </th>
                                <td>Eau assainissement enviro</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->eau_assainissement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>64/640 </th>
                                <td>Participation et prestation </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->participation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>67/674 </th>
                                <td> Frais financier</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->frais_financier : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>63/612 </th>
                                <td>Refection /entretien batiment </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->refection_entretien : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>65/650+655+658</th>
                                <td>Salaire & Indemnités </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->salaire_indemnite : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>63/1+17 </th>
                                <td>Entretien véhicule & autres [services extérieurs] </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->entretien_vehicule : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>60/65/66 </th>
                                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_fonctionnement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>83/831 </th>
                                <td>Excedent / Prélèvement </td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->exedent_prelevement : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['depensFonctN']->sante + $dataCommune['depensFonctN']->appui_scolaire + $dataCommune['depensFonctN']->sport_culture + $dataCommune['depensFonctN']->eau_assainissement + $dataCommune['depensFonctN']->participation + $dataCommune['depensFonctN']->frais_financier + $dataCommune['depensFonctN']->refection_entretien + $dataCommune['depensFonctN']->salaire_indemnite + $dataCommune['depensFonctN']->entretien_vehicule + $dataCommune['depensFonctN']->appui_fonctionnement + $dataCommune['depensFonctN']->exedent_prelevement : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>








        </div>
</body>

</html>
