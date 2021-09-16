<div class="row">
    <div class="col-12 col-md-8 myform text-center text-edicp mt-3">
        <p><span>E</span>space de <span>d</span>ialogue et d'<span>i</span>nterpretation <span>c</span>ommunautaire</p>
        <p>Bilan d'action 2019 de la commune</p>
    </div>

    <div class="col-12 col-md-4 myform mt-3">
        <img class="img-fluid" src="{{ asset('/img/EDICApp_banier.png') }}" alt="banier edicapp">
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 font-weight-bolder text-center text-uppercase" style="color:#ff8043">Appréciation de l'exécution
        du PCD de la commune / le PAIC</div>
    <div class="col-12 mt-2 table-responsive px-0">
        <table class="table-sm table-hover mx-auto">
        <tr>
                <th class="sin-table-bg">Date de Conception</th>
                <th>{{ isset($dataCommune) ? $dataCommune['appreciation']->date_de_conception  : '' }}</th>
                <th class="sin-table-bg">Date d'expiration</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->date_d_expiration  : '' }}</td>
            </tr>
            <tr>
                <th class="sin-table-bg">Montant Total FCFA</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_total  : '' }}</td>
                <th class="sin-table-bg">Montant mobilisé FCFA</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_mobilise  : '' }}</td>
            </tr>
            <tr>
                <th class="sin-table-bg">Problème majeur (10 mots)</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->probleme_majeur  : '' }}</td>
                <!--td> </td>
                <td> </td-->
            </tr>
            <tr>
                <th class="sin-table-bg">Perpectives (10 mots)</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->perpective_dix_mot  : '' }}</td>
                <!--td> </td>
                <td> </td-->
            </tr>
            <tr>
                <td clospan="5">#</td>
            </tr>
            <tr>
                <th class="sin-table-bg">Perpectives/suggestions</th>
                <td colspan="3">{{ isset($dataCommune) ? $dataCommune['satisfaction']->commentaire_appreciation : '' }}</td>
            </tr>
        </table>
    </div>



    <div class="col-12 mt-3 p-0">
        <div class="card">
            <h4 class="card-header bg-info text-white">Appréciation du niveau d'exécution du PCD</h4>
            <div class="card-body">
                <div id="columnchart_values" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mt-3 p-0">
        <div class="card">
            <h4 class="card-header  bg-info text-white">Evolution des recettes 3 ans</h4>
            <div class="card-body">
                <div id="columnchart_values1" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mt-3 p-0">
        <div class="card">
            <h4 class="card-header  bg-info text-white">Evolution des dépenses 3 ans</h4>
            <div class="card-body">
                <div id="columnchart_values2" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 myform sin-bg-3 font-weight-bolder text-white text-center"> Bilan du fonctionnement</div>
    <div class="col-12 col-md-6 mt-3 p-0">
        <div class="card">
            <h4 class="card-header bg-info text-white">Recettes de fonctionnement</h4>
            <div class="card-body">
                <div class="table-responsive1" id="piechart" style="width:100%;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mt-3 p-0">
        <div class="card">
            <h4 class="card-header bg-info text-white">Dépenses de fonctionnement</h4>
            <div class="card-body">
                <div class="table-responsive1" id="piechart1" style="width:100%; "></div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3 table-responsive px-0">
        <div class="card">
            <table class="table-sm table-hover card-body">
                <tr>
                    <th class="sin-table-bg">#</th>
                    <th class="bg-success text-white">Recettes</th>
                    <th class="bg-danger text-white">Dépenses</th>
                <tr>
                <tr>
                    <th class="bg-info text-white">Total Fonctionnement</th>
                    <td>{{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation
                + $dataCommune['recetFonct']->produit_domaniaux
                + $dataCommune['recetFonct']->produit_financier
                + $dataCommune['recetFonct']->recouvrement
                + $dataCommune['recetFonct']->produit_diver 
                + $dataCommune['recetFonct']->impots_taxe_c_direct
                + $dataCommune['recetFonct']->impots_taxe_indirect
                + $dataCommune['recetFonct']->produit_exceptionnel
                + $dataCommune['recetFonct']->produit_anterieur  : '' }}</td>
                    <td>{{ isset($dataCommune) ? $dataCommune['depensFonct']->sante
                + $dataCommune['depensFonct']->appui_scolaire
                + $dataCommune['depensFonct']->sport_culture
                + $dataCommune['depensFonct']->participation
                + $dataCommune['depensFonct']->frais_financier
                + $dataCommune['depensFonct']->refection_entretien
                + $dataCommune['depensFonct']->salaire_indemnite
                + $dataCommune['depensFonct']->entretien_vehicule
                + $dataCommune['depensFonct']->appui_fonctionnement
                + $dataCommune['depensFonct']->exedent_prelevement : '' }}</td>

            </table>
        </div>
    </div>

    <div class="col-12 mt-3 table-responsive px-0">
        <div class="card">
            <table class="table-sm table-hover card-body">
                <tr>
                    <th class="sin-table-bg">#</th>
                    <th class="bg-success text-white">Recettes</th>
                    <th class="bg-danger text-white">Dépenses</th>
                <tr>
                <tr>
                    <th class="bg-info text-white">Total Investissements</th>
                    <td>{{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale
                + $dataCommune['recetInvest']->subvention_equipement
                + $dataCommune['recetInvest']->contribution_propre
                + $dataCommune['recetInvest']->dotation_liee
                + $dataCommune['recetInvest']->resultat_exercice : '' }}</td>
                    <td>{{ isset($dataCommune) ? $dataCommune['depensInvest']->etude_recherche
                + $dataCommune['depensInvest']->environnement
                + $dataCommune['depensInvest']->equipement
                + $dataCommune['depensInvest']->batiment
                + $dataCommune['depensInvest']->emprunt
                + $dataCommune['depensInvest']->autre_investissement
                + $dataCommune['depensInvest']->deficit_excedent : '' }}</td>

            </table>
        </div>
    </div>

</div>

<div class="row mt-3">
    <div class="col-12 myform sin-bg-3 my-3 font-weight-bolder text-white text-center"> Etat civil et domaine</div>
    <div class="col-12 table-responsive px-0 ">
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
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->naissance_observation : '' }}</td>
            </tr>
            <tr>
                <th>Actes de naissances</th>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_nombre : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_observation : '' }}</td>
            </tr>
            <tr>
                <th>Actes de décès</th>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_nombre : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_observation : '' }}</td>
            </tr>
            <tr>
                <th>Mariages célébrés</th>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_nombre : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_observation : '' }}</td>
            </tr>
            <tr>
                <th>Autres actes civils (divers)</th>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre_observation : '' }}</td>
            </tr>
            <tr>
                <th>Vente de timbres (valeur)</th>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_nombre : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_observation : '' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="row mt-2">
    <div class="col-12 table-responsive px-0 ">
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
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_degagee : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_habitation_parcelle_restante : '' }}</td>
            </tr>
            <tr>
                <th>Zone commerciale</th>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante : '' }}</td>
            </tr>
            <tr>
                <th>Zone administrative</th>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_degagee : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_administrative_parcelle_restante : '' }}</td>
            </tr>
            <tr>
                <th>Autres....</th>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_degagee : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_attribuee : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['domaineCivil']->zone_autre_parcelle_restante : '' }}</td>
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
    <div class="col-12 myform sin-bg-3 my-2 font-weight-bolder text-white text-center"> Contribution des trois (03) meilleurs marcher</div>
    <div class="col-12 table-responsive px-0">
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
                <td> {{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->contribution : '' }}</td>
                <td> {{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->contribution : '' }}</td>
                <td> {{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->contribution : '' }}</td>
            </tr>
            <tr>
                <th>Taux</th>
                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][0]->attendu != null && $dataCommune['troisMeilleur'][0]->attendu != 0) ? round($dataCommune['troisMeilleur'][0]->contribution *100 / $dataCommune['troisMeilleur'][0]->attendu, 2) . '%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][1]->attendu != null && $dataCommune['troisMeilleur'][1]->attendu != 0) ? round($dataCommune['troisMeilleur'][1]->contribution *100 / $dataCommune['troisMeilleur'][1]->attendu, 2) . '%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][2]->attendu != null && $dataCommune['troisMeilleur'][2]->attendu != 0) ? round($dataCommune['troisMeilleur'][2]->contribution *100 / $dataCommune['troisMeilleur'][2]->attendu, 2) . '%' : 0 : '' }}</td>
            </tr>
        </table>
    </div>

    <div class="col-12 mt-2 p-0">
        <div class="card">
            <h4 class="card-header bg-info text-white">Resultat de l'excercice</h4>
            <div class="card-body">
                <div id="columnchart_values3" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-12 myform sin-bg-3 mt-2 font-weight-bolder text-white text-center"> Bilan du d'investissement</div>
    <div class="col-12 col-md-6 mt-2 p-0">
        <div class="card">
            <h4 class="card-header bg-info text-white">Recettes d'investissement</h4>
            <div class="card-body">
                <div class="table-responsive1" id="piechart2" style="width:100%;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mt-2 p-0">
        <div class="card">
            <h4 class="card-header bg-info text-white">Dépenses d'investissement</h4>
            <div class="card-body">
                <div class="table-responsive1" id="piechart3" style="width:100%; "></div>
            </div>
        </div>
    </div>

</div>

<div class="row mt-2">
    <div class="col-12 myform sin-bg-3 my-2 font-weight-bolder text-white text-center">Contribution des dix (10) meilleurs villages (toute
        contribution)</div>
    <div class="col-12 table-responsive px-0">
        <table class="table table-hover">
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
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][0]->attendu !=null && $dataCommune['dixMeilleur'][0]->attendu !=0) ? round($dataCommune['dixMeilleur'][0]->mobilise * 100 / $dataCommune['dixMeilleur'][0]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][1]->attendu !=null && $dataCommune['dixMeilleur'][1]->attendu !=0) ? round($dataCommune['dixMeilleur'][1]->mobilise * 100 / $dataCommune['dixMeilleur'][1]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][2]->attendu !=null && $dataCommune['dixMeilleur'][2]->attendu !=0) ? round($dataCommune['dixMeilleur'][2]->mobilise * 100 / $dataCommune['dixMeilleur'][2]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][3]->attendu !=null && $dataCommune['dixMeilleur'][3]->attendu !=0) ? round($dataCommune['dixMeilleur'][3]->mobilise * 100 / $dataCommune['dixMeilleur'][3]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][4]->attendu !=null && $dataCommune['dixMeilleur'][4]->attendu !=0) ? round($dataCommune['dixMeilleur'][4]->mobilise * 100 / $dataCommune['dixMeilleur'][4]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][5]->attendu !=null && $dataCommune['dixMeilleur'][5]->attendu !=0) ? round($dataCommune['dixMeilleur'][5]->mobilise * 100 / $dataCommune['dixMeilleur'][5]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][6]->attendu !=null && $dataCommune['dixMeilleur'][6]->attendu !=0) ? round($dataCommune['dixMeilleur'][6]->mobilise * 100 / $dataCommune['dixMeilleur'][6]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][7]->attendu !=null && $dataCommune['dixMeilleur'][7]->attendu !=0) ? round($dataCommune['dixMeilleur'][7]->mobilise * 100 / $dataCommune['dixMeilleur'][7]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][8]->attendu !=null && $dataCommune['dixMeilleur'][8]->attendu !=0) ? round($dataCommune['dixMeilleur'][8]->mobilise * 100 / $dataCommune['dixMeilleur'][8]->attendu) .'%' : 0 : '' }}</td>
                <td>{{ isset($dataCommune) ? ($dataCommune['dixMeilleur'][9]->attendu !=null && $dataCommune['dixMeilleur'][9]->attendu !=0) ? round($dataCommune['dixMeilleur'][9]->mobilise * 100 / $dataCommune['dixMeilleur'][9]->attendu) .'%' : 0 : '' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="row mt-2">
    <div class="col-12 myform sin-bg-3 my-2 font-weight-bolder text-white text-center">Contribution des autres partenaires à la commune
    </div>
    <div class="col-12 table-responsive px-0">
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
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][0]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][1]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][2]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][3]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][4]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][5]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][6]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][7]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][8]->evaluation_contribution : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['partenaire'][9]->evaluation_contribution : '' }}</td>
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

@if($dataCommune != null)
 <div class="row justify-content-center mt-2">
    @if($dataCommune['ressourceImage'][0]->url != null)
    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
        <a class="col-sm-6" href="{{ asset('/'.$dataCommune['ressourceImage'][0]->url) }}"><img class="img-fluid" src="{{ asset('/'.$dataCommune['ressourceImage'][0]->url) }}"
            style="width:auto; max-height:250px" alt="img1" /> </a>
    </div>
    @endif
    @if($dataCommune['ressourceImage'][1]->url != null)
    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
        <a class="col-sm-6" href="{{ asset('/'.$dataCommune['ressourceImage'][1]->url) }}"><img class="img-fluid" src="{{ asset('/'.$dataCommune['ressourceImage'][1]->url) }}"
            style="width:auto; max-height:250px" alt="img1" /> </a>
    </div>
    @endif
    @if($dataCommune['ressourceImage'][2]->url != null)
    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
        <a class="col-sm-6" href="{{ asset('/'.$dataCommune['ressourceImage'][2]->url) }}"><img class="img-fluid" src="{{ asset('/'.$dataCommune['ressourceImage'][2]->url) }}"
            style="width:auto; max-height:250px" alt="img1" /> </a>
    </div>
    @endif
 </div>
+@endif

<div class="col-12 card-header font-weight-bold my-2 text-center">Ce Bilan à été réalisé avec la précieuse contribution
    du #PAGOF sur financement de l'Agence Française de Développement </div>
<div class="col-12">
    <form id="make_pdf" action="{{ route('make_pdf') }}" method="post">
        @csrf
        <input type="hidden" name="hidden_pcd" id="hidden_pcd" />
        <input type="hidden" name="hidden_recette" id="hidden_recette" />
        <input type="hidden" name="hidden_depense" id="hidden_depense" />
        <input type="hidden" name="hidden_bg_recett_fcnt" id="hidden_bg_recett_fcnt" />
        <input type="hidden" name="hidden_bg_depens_fnct" id="hidden_bg_depens_fnct" />
        <input type="hidden" name="hidden_resultat" id="hidden_resultat" />
        <input type="hidden" name="hidden_bg_recett_invest" id="hidden_bg_recett_invest" />
        <input type="hidden" name="hidden_bg_depens_invest" id="hidden_bg_depens_invest" />
        <input type="hidden" name="slug" id="hidden_slug" value="{{isset($dataCommune) ? $dataCommune['slug'] : ''}}" />
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