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
                        <th class="sin-table-bg">Date de début</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->date_de_conception : '' }}</td>
                        <th class="sin-table-bg">Date de fin</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->date_d_expiration : '' }}</td>
                    </tr>
                    <tr>
                        <th class="sin-table-bg">Montant total</th>
                        <td>{{ isset($dataCommune) ? number_format($dataCommune['appreciation']->montant_total, 0, ',', '.') : '' }}
                        </td>
                        <th class="sin-table-bg">Montant mobilisé</th>
                        <td>{{ isset($dataCommune) ? number_format($dataCommune['appreciation']->montant_mobilise, 0, ',', '.') : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="sin-table-bg">Problèmes majeurs (en quelques mots)</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->probleme_majeur : '' }}</td>
                        <!--td> </td>
                <td> </td-->
                    </tr>
                    <tr>
                        <th class="sin-table-bg">Perspectives (en quelques mots)</th>
                        <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->perpective_dix_mot : '' }}</td>
                        <!--td> </td>
                <td> </td-->
                    </tr>
                </table>
            </div>

            <div class="col-xs-3">
                <div class="title text-center text-uppercase">Appréciation du niveau d'exécution
                    du PCD</div> <br>
                <img class="google" class="img-responsive " src="{{ $data['hidden_pcd'] }}"
                    style="height:100% !important" alt="">
            </div>
            <div class="col-xs-3">
                <div class="title text-center text-uppercase">Évolution des recettes 3 dernières années</div>
                <br>
                <img class="google" class="img-responsive " src="{{ $data['hidden_recette'] }}" alt="">
            </div>
            <div class="col-xs-3">
                <div class="title text-center text-uppercase">Évolution des dépenses 3 dernières années</div>
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
                                <img class="google" class="img-responsive"
                                    src="{{ $data['hidden_bg_recett_fcnt'] }}" alt="">
                            </div>
                            <div class="col-xs-6">
                                <img class="google" class="img-responsive"
                                    src="{{ $data['hidden_bg_depens_fcnt'] }}" alt="">
                            </div>
                            <div class="col-xs-6">
                                <br>
                                <h4 class="card-header title text-center text-uppercase bg-info text-white">Recettes
                                    de fonctionnement
                                </h4>
                            </div>
                            <div class="col-xs-6">
                                <br>
                                <h4 class="card-header title text-center text-uppercase bg-info text-white">Dépenses
                                    de fonctionnement
                                </h4>
                                <!-- ici -->
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12 mt-3 p-0 ">
                                    <div class="card">
                                        <table class="table table-bordered card-body">
                                            <tr>
                                                <th class="sin-table-bg">#</th>
                                                <th class="bg-success text-white">Recettes</th>
                                                <th class="bg-danger text-white">Dépenses</th>
                                            <tr>
                                            <tr>
                                                <th class="bg-info text-white">Total Fonctionnement</th>
                                                <td>{{ isset($dataCommune) ? number_format($dataCommune['recetFonct']->produit_exploitation + $dataCommune['recetFonct']->produit_domaniaux + $dataCommune['recetFonct']->produit_financier + $dataCommune['recetFonct']->recouvrement + $dataCommune['recetFonct']->produit_diver + $dataCommune['recetFonct']->impots_taxe_c_direct + $dataCommune['recetFonct']->impots_taxe_indirect + $dataCommune['recetFonct']->produit_exceptionnel + $dataCommune['recetFonct']->produit_anterieur, 0, ',', '.') : '' }}
                                                </td>
                                                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->sante + $dataCommune['depensFonct']->appui_scolaire + $dataCommune['depensFonct']->sport_culture + $dataCommune['depensFonct']->participation + $dataCommune['depensFonct']->frais_financier + $dataCommune['depensFonct']->refection_entretien + $dataCommune['depensFonct']->salaire_indemnite + $dataCommune['depensFonct']->entretien_vehicule + $dataCommune['depensFonct']->appui_fonctionnement + $dataCommune['depensFonct']->exedent_prelevement, 0, ',', '.') : '' }}
                                                </td>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 title text-center text-uppercase">Bilan de l'investissement
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
                        <div class="col-xs-12 p-0">
                            <div class="col-xs-12 mt-3 p-0 ">
                                <div class="card">
                                    <table class="table table-bordered card-body">
                                        <tr>
                                            <th class="sin-table-bg">#</th>
                                            <th class="bg-success text-white">Recettes</th>
                                            <th class="bg-danger text-white">Dépenses</th>
                                        <tr>
                                        <tr>
                                            <th class="bg-info text-white">Total Investissements</th>
                                            <td>{{ isset($dataCommune) ? number_format($dataCommune['recetInvest']->dotation_globale + $dataCommune['recetInvest']->subvention_equipement + $dataCommune['recetInvest']->contribution_propre + $dataCommune['recetInvest']->dotation_liee + $dataCommune['recetInvest']->resultat_exercice, 0, ',', '.') : '' }}</td>
                                            <td>{{ isset($dataCommune) ? number_format($dataCommune['depensInvest']->etude_recherche + $dataCommune['depensInvest']->environnement + $dataCommune['depensInvest']->equipement + $dataCommune['depensInvest']->batiment + $dataCommune['depensInvest']->emprunt + $dataCommune['depensInvest']->autre_investissement + $dataCommune['depensInvest']->deficit_excedent, 0, ',', '.') : '' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <div class="col-xs-8">
                <div class="col-xs-12 title text-center text-uppercase">Prévision du fonctionnement
                </div> <br> <br>
                <div class="row ">
                    <div class="col-xs-1  px-0"><img class="img-responsive" src="{{ public_path('/img/arg.png') }}"
                            style="width:100%;height:580px;max-height:580px" alt="image argent">
                    </div>
                    <div class="col-xs-11">
                        <div class="row">
                            <div class="col-xs-6">
                                <img class="google" class="img-responsive"
                                    src="{{ $data['hidden_bg_recett_fcntn'] }}" alt="">
                            </div>
                            <div class="col-xs-6">
                                <img class="google" class="img-responsive"
                                    src="{{ $data['hidden_bg_depens_fcntn'] }}" alt="">
                            </div>
                            <div class="col-xs-6">
                                <br>
                                <h4 class="card-header title text-center text-uppercase bg-info text-white">Recettes
                                    de fonctionnement
                                </h4>
                            </div>
                            <div class="col-xs-6">
                                <br>
                                <h4 class="card-header title text-center text-uppercase bg-info text-white">Dépenses
                                    de fonctionnement
                                </h4>
                                <!-- ici -->
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12 mt-3 p-0 ">
                                    <div class="card">
                                        <table class="table-sm table-hover card-body">
                                            <tr>
                                                <th class="sin-table-bg">#</th>
                                                <th class="bg-success text-white">Recettes</th>
                                                <th class="bg-danger text-white">Dépenses</th>
                                            <tr>
                                            <tr>
                                                <th class="bg-info text-white">Total Fonctionnement</th>
                                                <td>{{ isset($dataCommune) ? number_format($dataCommune['recetFonct']->produit_exploitation
                                            + $dataCommune['recetFonctN']->produit_domaniaux
                                            + $dataCommune['recetFonctN']->produit_financier
                                            + $dataCommune['recetFonctN']->recouvrement
                                            + $dataCommune['recetFonctN']->produit_diver 
                                            + $dataCommune['recetFonctN']->impots_taxe_c_direct
                                            + $dataCommune['recetFonctN']->impots_taxe_indirect
                                            + $dataCommune['recetFonctN']->produit_exceptionnel
                                            + $dataCommune['recetFonctN']->produit_anterieur,0,",",".")  : '' }}</td>
                                                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->sante
                                            + $dataCommune['depensFonctN']->appui_scolaire
                                            + $dataCommune['depensFonctN']->sport_culture
                                            + $dataCommune['depensFonctN']->participation
                                            + $dataCommune['depensFonctN']->frais_financier
                                            + $dataCommune['depensFonctN']->refection_entretien
                                            + $dataCommune['depensFonctN']->salaire_indemnite
                                            + $dataCommune['depensFonctN']->entretien_vehicule
                                            + $dataCommune['depensFonctN']->appui_fonctionnement
                                            + $dataCommune['depensFonctN']->exedent_prelevement,0,",",".") : '' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 title text-center text-uppercase">Prévision de l'investissement
                    </div>
                    <div class="col-xs-1 px-0"><img class="img-responsive" src="{{ public_path('/img/arg.png') }}"
                            style="width:100%;height:580px;max-height:580px" alt="image argent"></div>
                    <div class="col-xs-11">
                        <div class="col-xs-6">
                            <img class="google" src="{{ $data['hidden_bg_recett_investn'] }}" alt="">
                            <br>
                            <br>
                            <h4 class="card-header title text-center text-uppercase bg-info text-white">Recettes
                                d'investissement</h4>
                        </div>
                        <div class="col-xs-6">
                            <img class="google" src="{{ $data['hidden_bg_depens_investn'] }}" alt="">
                            <br>
                            <br>
                            <h4 class="card-header title text-center text-uppercase bg-info text-white">Depenses
                                d'investissement</h4>
                        </div>
                        <div class="col-xs-12 p-0">
                            <div class="col-xs-12 mt-3 p-0 ">
                                <div class="card">
                                    <table class="table-sm table-hover card-body">
                                        <tr>
                                            <th class="sin-table-bg">#</th>
                                            <th class="bg-success text-white">Recettes</th>
                                            <th class="bg-danger text-white">Dépenses</th>
                                        <tr>
                                        <tr>
                                            <th class="bg-info text-white">Total Investissements</th>
                                            <td>{{ isset($dataCommune) ? number_format($dataCommune['recetInvest']->dotation_globale
                                        + $dataCommune['recetInvestN']->subvention_equipement
                                        + $dataCommune['recetInvestN']->contribution_propre
                                        + $dataCommune['recetInvestN']->dotation_liee
                                        + $dataCommune['recetInvestN']->resultat_exercice,0,",",".") : '' }}</td>
                                            <td>{{ isset($dataCommune) ? number_format($dataCommune['depensInvestN']->etude_recherche
                                        + $dataCommune['depensInvestN']->environnement
                                        + $dataCommune['depensInvestN']->equipement
                                        + $dataCommune['depensInvestN']->batiment
                                        + $dataCommune['depensInvestN']->emprunt
                                        + $dataCommune['depensInvestN']->autre_investissement,0,",",".") : '' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
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
                        Situation domaniale</div>
                    <div class="col-xs-12 table-responsive px-0 ">
                        <table class="table">

                            <tr>
                                <th class="sin-table-bg"></th>
                                <th class="sin-table-bg">Nombre</th>
                                <th class="sin-table-bg">Observations (3 mots maximun)</th>
                            </tr>

                            <tr>
                                <th>Naissances</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->naissance_nombre, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->naissance_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Actes de naissances</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->acte_de_naissance_nombre, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Actes de décès</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->acte_de_deces_nombre, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Mariages célébrés</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->mariage_celebre_nombre, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Autres actes civils (divers)</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->autre_acte_nombre, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre_observation : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Timbres vendus</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->vente_timbre_nombre, 0, ',', '.') : '' }}
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
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_degagee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_restante, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Zone commerciale</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_commerciale_parcelle_restante, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Zone administrative</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_administrative_parcelle_degagee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_administrative_parcelle_restante, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Autres....</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_autre_parcelle_degagee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_autre_parcelle_attribuee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_autre_parcelle_restante, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Superficies en ha ou en m<sup>2</sup></th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_degagee + $dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee + $dataCommune['domaineCivil']->zone_administrative_parcelle_degagee + $dataCommune['domaineCivil']->zone_autre_parcelle_degagee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee + $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee + $dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee + $dataCommune['domaineCivil']->zone_autre_parcelle_attribuee, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_restante + $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante + $dataCommune['domaineCivil']->zone_administrative_parcelle_restante + $dataCommune['domaineCivil']->zone_autre_parcelle_restante, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-xs-12 title text-center text-uppercase">Contribution des trois (03) meilleurs
                        marchés</div>
                    <div class="col-xs-6 table-responsive px-0">
                        <table class="table">

                            <tr>
                                <th class="sin-table-bg"></th>
                                <th class="sin-table-bg">Marché 1</th>
                                <th class="sin-table-bg">Marché 2</th>
                                <th class="sin-table-bg">Marché 3</th>
                            </tr>

                            <tr>
                                <th>Nom du marché</th>
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->marche : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->marche : '' }}</td>
                                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->marche : '' }}</td>
                            </tr>
                            <tr>
                                <th>Montant attendu</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][0]->attendu, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][1]->attendu, 0, ',', '.') : '' }}
                                </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][2]->attendu, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Montant mobilisé</th>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][0]->contribution, 0, ',', '.') : '' }}
                                </td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][1]->contribution, 0, ',', '.') : '' }}
                                </td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][2]->contribution, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Taux (mobilisé / attendu)</th>
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
                        <h4 class="card-header bg-info text-white">Résultat de l'excercice</h4>
                        <img class="google" src="{{ $data['hidden_resultat'] }}" alt="">
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
                <div class="col-xs-12 title text-center text-uppercase"> Contribution des autres partenaires de la commune
                </div>
                <br>
                <div class="col-xs-11 table-responsive px-0">
                    <table class="table">

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
                            <th>Évaluation contribution</th>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][0]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][1]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][2]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][3]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][4]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][5]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][6]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][7]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][8]->evaluation_contribution,0,",",".") : '' }}</td>
                            <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][9]->evaluation_contribution,0,",",".") : '' }}</td>
                        </tr>
                        <tr>
                            <th>Principales actions</th>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][0]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][1]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][2]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][3]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][4]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][5]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][6]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][7]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][8]->principale_action : '' }}</td>
                            <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->principale_action : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="col-xs-12"></div>
                    <div class="col-xs-12 title text-center text-uppercase"> Contribution des dix (10) meilleurs villages
                        (toute contribution)</div>
                    <div class="col-xs-12 mt-2 px-0">

                        <table class="table">

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

                            <tr>
                                <th>Nom du village</th>
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
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][0]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][1]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][2]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][3]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][4]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][5]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][6]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][7]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][8]->attendu,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][9]->attendu,0,",",".") : '' }}</td>
                            </tr>
                            <tr>
                                <th>Montant mobilisé</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][0]->mobilise,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][1]->mobilise,0,",","."): '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][2]->mobilise,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][3]->mobilise,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][4]->mobilise,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][5]->mobilise,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][6]->mobilise,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][7]->mobilise,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][8]->mobilise,0,",",".") : '' }}</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][9]->mobilise,0,",",".") : '' }}</td>
                            </tr>
                            <tr>
                                <th>Taux (mobilisé / attendu)</th>
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


                <div class="col-xs-6">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title text-center text-uppercase">Évolution du Budget</div>


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
                                    <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][0]->fonctionnement + $dataCommune['recette'][0]->investissement,0,",",".") : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][1]->fonctionnement + $dataCommune['recette'][1]->investissement,0,",",".") : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][2]->fonctionnement + $dataCommune['recette'][2]->investissement,0,",",".") : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][3]->fonctionnement + $dataCommune['recette'][3]->investissement,0,",",".") : '' }}
                                    </td>
                                <tr>
                                <tr>
                                    <th>Total Dépenses</th>
                                    <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][0]->fonctionnement + $dataCommune['depense'][0]->investissement,0,",",".") : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][1]->fonctionnement + $dataCommune['depense'][1]->investissement,0,",",".") : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][2]->fonctionnement + $dataCommune['depense'][2]->investissement,0,",",".") : '' }}
                                    </td>
                                    <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][3]->fonctionnement + $dataCommune['depense'][3]->investissement,0,",",".") : '' }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12  text-center text-uppercase">
                    <span class="contrib">Ce Bilan a été réalisé avec la précieuse contribution
                        du #PAGOF sur financement de l'Agence Française de Développement </span>
                </div>
                

            </div>








        </div>
</body>

</html>
