

<div class="row pt-5">
    <div class="col-12 font-weight-bolder text-center text-uppercase mb-3 bg-white py-2">Évaluation de l'exécution
        du PCD de la commune</div><br>
    <div class="col-12 table-responsive mb-5 px-0">
        <table class="table-sm table-hover mx-auto">
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
            <tr>
                <td clospan="5">#</td>
            </tr>
            <tr>
                <th class="sin-table-bg">Commentaires</th>
                <td colspan="3">
                    {{ isset($dataCommune) ? $dataCommune['satisfaction']->commentaire_appreciation : '' }}
                </td>
            </tr>
        </table>
    </div>



    <div class="col-12 mb-5 p-0 bg-white">
        <div class="">
            <p class="txt-bold card-header sin-table-bg text-white">Appréciation du niveau d'exécution du PCD</p>
            <div class="card-body">
                <div id="columnchart_values" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mb-5 p-0 bg-white">
        <div class="">
            <p class="txt-bold card-header sin-table-bg text-white">Évolution des recettes des trois dernières années
            </p>
            <div class="card-body">
                <div id="columnchart_values1" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mb-5 p-0 bg-white">
        <div class="">
            <p class="txt-bold card-header  sin-table-bg text-white">Évolution des dépenses des trois dernières années
            </p>
            <div class="card-body">
                <div id="columnchart_values2" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3 font-weight-bolder text-center text-uppercase bg-white py-2"> Bilan du fonctionnement</div>
    <div class="col-12 col-md-6 mb-5  p-0 bg-white">
        <div class="">
            <p class="txt-bold card-header sin-table-bg text-white">Recettes de fonctionnement</p>
            <div class="card-body">
                <div class="table-responsive1" id="piechart" style="width:100%;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mb-5  p-0 bg-white">
        <div class="">
            <p class="txt-bold card-header sin-table-bg text-white">Dépenses de fonctionnement</p>
            <div class="card-body">
                <div class="table-responsive1" id="piechart1" style="width:100%; "></div>
            </div>
        </div>
    </div>

    <div class="col-12 mb-5 table-responsive px-0">
        <div>
            <table class="table-sm table-hover w-100">
                <tr>
                    <th class="sin-table-bg">#</th>
                    <th class="bg-success text-white">Recettes</th>
                    <th class="bg-danger text-white">Dépenses</th>
                <tr>
                <tr>
                    <th class="sin-table-bg text-white">Total Fonctionnement</th>
                    <td>{{ isset($dataCommune)
                        ? number_format(
                            $dataCommune['recetFonct']->produit_exploitation +
                                $dataCommune['recetFonct']->produit_domaniaux +
                                $dataCommune['recetFonct']->produit_financier +
                                $dataCommune['recetFonct']->recouvrement +
                                $dataCommune['recetFonct']->produit_diver +
                                $dataCommune['recetFonct']->impots_taxe_c_direct +
                                $dataCommune['recetFonct']->impots_taxe_indirect +
                                $dataCommune['recetFonct']->produit_exceptionnel +
                                $dataCommune['recetFonct']->produit_anterieur +
                                $dataCommune['recetFonct']->autres_dotations,
                            0,
                            ',',
                            '.',
                        )
                        : '' }}
                    </td>
                    <td>{{ isset($dataCommune)
                        ? number_format(
                            $dataCommune['depensFonct']->sante +
                                $dataCommune['depensFonct']->appui_scolaire +
                                $dataCommune['depensFonct']->sport_culture +
                                $dataCommune['depensFonct']->participation +
                                $dataCommune['depensFonct']->frais_financier +
                                $dataCommune['depensFonct']->refection_entretien +
                                $dataCommune['depensFonct']->salaire_indemnite +
                                $dataCommune['depensFonct']->entretien_vehicule +
                                $dataCommune['depensFonct']->appui_fonctionnement +
                                $dataCommune['depensFonct']->autres_charges_exceptionnel +
                                $dataCommune['depensFonct']->exedent_prelevement,
                            0,
                            ',',
                            '.',
                        )
                        : '' }}
                    </td>

            </table>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-12 mb-3 font-weight-bolder text-center text-uppercase bg-white py-2"> Bilan de l'investissement</div>
    <div class="col-12 col-md-6 mb-5  p-0 bg-white">
        <div class="">
            <p class="txt-bold card-header sin-table-bg text-white">Recettes d'investissement</p>
            <div class="card-body">
                <div class="table-responsive1" id="piechart2" style="width:100%;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mb-5  p-0 bg-white">
        <div class="">
            <p class="txt-bold card-header sin-table-bg text-white">Dépenses d'investissement</p>
            <div class="card-body">
                <div class="table-responsive1" id="piechart3" style="width:100%; "></div>
            </div>
        </div>
    </div>

    <div class="col-12 mb-5 table-responsive px-0">
        <div>
            <table class="table-sm table-hover w-100">
                <tr>
                    <th class="sin-table-bg">#</th>
                    <th class="bg-success text-white">Recettes</th>
                    <th class="bg-danger text-white">Dépenses</th>
                <tr>
                <tr>
                    <th class="sin-table-bg text-white">Total Investissements</th>
                    <td>{{ isset($dataCommune)
                        ? number_format(
                            $dataCommune['recetInvest']->dotation_globale +
                                $dataCommune['recetInvest']->subvention_equipement +
                                $dataCommune['recetInvest']->contribution_propre +
                                $dataCommune['recetInvest']->dotation_liee +
                                $dataCommune['recetInvest']->resultat_exercice +
                                $dataCommune['recetInvest']->autre_subvention,
                            0,
                            ',',
                            '.',
                        )
                        : '' }}
                    </td>
                    <td>{{ isset($dataCommune)
                        ? number_format(
                            $dataCommune['depensInvest']->etude_recherche +
                                $dataCommune['depensInvest']->environnement +
                                $dataCommune['depensInvest']->equipement +
                                $dataCommune['depensInvest']->batiment +
                                $dataCommune['depensInvest']->emprunt +
                                $dataCommune['depensInvest']->autre_investissement +
                                $dataCommune['depensInvest']->deficit_excedent,
                            0,
                            ',',
                            '.',
                        )
                        : '' }}
                    </td>

            </table>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12 mb-3 font-weight-bolder text-center text-uppercase bg-white py-2"> Etat civil</div>
    <div class="col-12 mb-5 table-responsive px-0 ">
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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->naissance_nombre, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->naissance_observation : '' }}</td>
            </tr>
            <tr>
                <th>Actes de naissances</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->acte_de_naissance_nombre, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_observation : '' }}</td>
            </tr>
            <tr>
                <th>Actes de décès</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->acte_de_deces_nombre, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_observation : '' }}</td>
            </tr>
            <tr>
                <th>Mariages célébrés</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->mariage_celebre_nombre, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_observation : '' }}</td>
            </tr>
            <tr>
                <th>Autres actes civils (divers)</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->autre_acte_nombre, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre_observation : '' }}</td>
            </tr>
            <tr>
                <th>Timbres vendus</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->vente_timbre_nombre, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_observation : '' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3 font-weight-bolder text-center text-uppercase bg-white py-2">Situation domaniale</div>
    <div class="col-12 mb-5 table-responsive px-0 ">
        <table class="table table-hover ">
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
                <td>{{ isset($dataCommune)
                    ? number_format(
                        $dataCommune['domaineCivil']->zone_habitation_parcelle_degagee +
                            $dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee +
                            $dataCommune['domaineCivil']->zone_administrative_parcelle_degagee +
                            $dataCommune['domaineCivil']->zone_autre_parcelle_degagee,
                        0,
                        ',',
                        '.',
                    )
                    : '' }}
                </td>
                <td>{{ isset($dataCommune)
                    ? number_format(
                        $dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee +
                            $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee +
                            $dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee +
                            $dataCommune['domaineCivil']->zone_autre_parcelle_attribuee,
                        0,
                        ',',
                        '.',
                    )
                    : '' }}
                </td>
                <td>{{ isset($dataCommune)
                    ? number_format(
                        $dataCommune['domaineCivil']->zone_habitation_parcelle_restante +
                            $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante +
                            $dataCommune['domaineCivil']->zone_administrative_parcelle_restante +
                            $dataCommune['domaineCivil']->zone_autre_parcelle_restante,
                        0,
                        ',',
                        '.',
                    )
                    : '' }}
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3 font-weight-bolder text-center text-uppercase bg-white py-2"> Contribution des trois (03)
        meilleurs marcher</div>
    <div class="col-12 mb-5 table-responsive px-0">
        <table class="table table-hover">
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

    <div class="col-12 mb-5  p-0 bg-white">
        <div class="">
            <p class="txt-bold card-header sin-table-bg text-white">Résultat de l'excercice</p>
            <div class="card-body">
                <div id="columnchart_values3" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12 mb-3 font-weight-bolder text-center text-uppercase bg-white py-2">Contribution des dix (10)
        meilleurs villages (toute
        contribution)</div>
    <div class="col-12 mb-5 table-responsive px-0">
        <table class="table table-hover">
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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][0]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][1]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][2]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][3]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][4]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][5]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][6]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][7]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][8]->attendu, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][9]->attendu, 0, ',', '.') : '' }}
                </td>
            </tr>
            <tr>
                <th>Montant mobilisé</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][0]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][1]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][2]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][3]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][4]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][5]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][6]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][7]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][8]->mobilise, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['dixMeilleur'][9]->mobilise, 0, ',', '.') : '' }}
                </td>
            </tr>
            <tr>
                <th>Taux (mobilisé / attendu)</th>
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

<div class="row">
    <div class="col-12 mb-3 font-weight-bolder text-center text-uppercase bg-white py-2">Contribution des autres
        partenaires de la commune
    </div>
    <div class="col-12 mb-5 table-responsive px-0">
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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][0]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][1]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][2]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][3]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][4]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][5]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][6]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][7]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][8]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['partenaire'][9]->evaluation_contribution, 0, ',', '.') : '' }}
                </td>
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

@if ($dataCommune != null)
    <div class="row justify-content-center ">
        @if ($dataCommune['ressourceImage'][0]->url != null)
            <div class="col-12 col-md-4 mb-5 font-weight-bolder text-center text-uppercase">
                <a href="{{ asset('/' . $dataCommune['ressourceImage'][0]->url) }}"><img class="img-fluid"
                        src="{{ asset('/' . $dataCommune['ressourceImage'][0]->url) }}"
                        style="width:auto; max-height:250px" alt="img1" /> </a>
            </div>
        @endif
        @if ($dataCommune['ressourceImage'][1]->url != null)
            <div class="col-12 col-md-4 mb-5 font-weight-bolder text-center text-uppercase">
                <a href="{{ asset('/' . $dataCommune['ressourceImage'][1]->url) }}"><img class="img-fluid"
                        src="{{ asset('/' . $dataCommune['ressourceImage'][1]->url) }}"
                        style="width:auto; max-height:250px" alt="img1" /> </a>
            </div>
        @endif
        @if ($dataCommune['ressourceImage'][2]->url != null)
            <div class="col-12 col-md-4 mb-5 font-weight-bolder text-center text-uppercase">
                <a href="{{ asset('/' . $dataCommune['ressourceImage'][2]->url) }}"><img class="img-fluid"
                        src="{{ asset('/' . $dataCommune['ressourceImage'][2]->url) }}"
                        style="width:auto; max-height:250px" alt="img1" /> </a>
            </div>
        @endif
    </div>
@endif

<div class="col-12 mb-3 txt-primary font-weight-bolder text-center bg-white py-2">Ce Bilan à été réalisé avec la précieuse contribution
    du #PAGOF sur financement de l'Agence Française de Développement </div>
<div class="col-12">
    <form id="make_pdf" action="{{ route('make_pdf') }}" method="post">
        @csrf
        <input type="hidden" name="hidden_pcd" id="hidden_pcd" />
        <input type="hidden" name="hidden_recette" id="hidden_recette" />
        <input type="hidden" name="hidden_depense" id="hidden_depense" />
        <input type="hidden" name="hidden_bg_recett_fcnt" id="hidden_bg_recett_fcnt" />
        <input type="hidden" name="hidden_bg_depens_fcnt" id="hidden_bg_depens_fnct" />
        <input type="hidden" name="hidden_resultat" id="hidden_resultat" />
        <input type="hidden" name="hidden_bg_recett_invest" id="hidden_bg_recett_invest" />
        <input type="hidden" name="hidden_bg_depens_invest" id="hidden_bg_depens_invest" />
        <input type="hidden" name="slug" id="hidden_slug"
            value="{{ isset($dataCommune) ? $dataCommune['slug'] : '' }}" />
        <input type="hidden" name="hidden_url" value="{{ url()->current() }}" />
        <!--button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Make PDF</button-->
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#create_pdf').click(function() {
            $('#hidden_html').val($('#testing').html());
            $('#make_pdf').submit();
        });
    })
</script>
