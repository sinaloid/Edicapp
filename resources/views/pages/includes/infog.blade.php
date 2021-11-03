<div class="row ">
    <div class="col-12 font-weight-bolder text-center text-uppercase">Évolution du budget de la commune les trois dernières années
    </div>
    <div class="col-12 table-responsive mt-2 px-0">
        <table class="table-sm table-hover mx-auto">
            <tr>
                <th class="sin-table-bg" colspan="5">Recettes</th>
            <tr>
            <tr>
                <th>années</th>
                <th>{{ isset($dataCommune) ? $dataCommune['recette'][0]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['recette'][1]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['recette'][2]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['recette'][3]->annee : '' }}</th>
            <tr>
            <tr>
                <th>Fonctionnement</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][0]->fonctionnement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][1]->fonctionnement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][2]->fonctionnement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][3]->fonctionnement,0,",",".") : '' }}</td>
            <tr>
            <tr>
                <th>Investissement</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][0]->investissement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][1]->investissement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][2]->investissement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recette'][3]->investissement,0,",",".") : '' }}</td>
            <tr>
            <tr>
                <th>Total</th>
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
                <th>années</th>
                <th>{{ isset($dataCommune) ? $dataCommune['recette'][0]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['recette'][1]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['recette'][2]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['recette'][3]->annee : '' }}</th>
            <tr>
        </table>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12 table-responsive px-0">
        <table class="table-sm table-hover mx-auto">
            <tr>
                <th class="sin-table-bg" colspan="5">Dépenses</th>
            <tr>
            <tr>
                <th>années</th>
                <th>{{ isset($dataCommune) ? $dataCommune['depense'][0]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['depense'][1]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['depense'][2]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['depense'][3]->annee : '' }}</th>
            <tr>
            <tr>
                <th>Fonctionnement</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][0]->fonctionnement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][1]->fonctionnement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][2]->fonctionnement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][3]->fonctionnement,0,",",".") : '' }}</td>
            <tr>
            <tr>
                <th>Investissement</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][0]->investissement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][1]->investissement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][2]->investissement,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][3]->investissement,0,",",".") : '' }}</td>
            <tr>
            <tr>
                <th>Total</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][0]->fonctionnement + $dataCommune['depense'][0]->investissement,0,",",".") : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][1]->fonctionnement + $dataCommune['depense'][1]->investissement,0,",",".") : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][2]->fonctionnement + $dataCommune['depense'][2]->investissement,0,",",".") : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depense'][3]->fonctionnement + $dataCommune['depense'][3]->investissement,0,",",".") : '' }}
                </td>
            <tr>
            <tr>
                <th>années</th>
                <th>{{ isset($dataCommune) ? $dataCommune['depense'][0]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['depense'][1]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['depense'][2]->annee : '' }}</th>
                <th>{{ isset($dataCommune) ? $dataCommune['depense'][3]->annee : '' }}</th>
            <tr>
        </table>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 font-weight-bolder text-center text-uppercase">Contribution des trois (03) meilleurs marchés
    </div>
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
                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][0]->marche : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][1]->marche : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['troisMeilleur'][2]->marche : '' }}</td>
            </tr>
            <tr>
                <th>Montant attendu</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][0]->attendu,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][1]->attendu,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][2]->attendu,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>Montant mobilisé</th>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][0]->contribution,0,",",".") : '' }}</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][1]->contribution,0,",",".") : '' }}</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['troisMeilleur'][2]->contribution,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>Taux (mobilisé / attendu)</th>
                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][0]->attendu != null && $dataCommune['troisMeilleur'][0]->attendu != 0) ? round($dataCommune['troisMeilleur'][0]->contribution *100 / $dataCommune['troisMeilleur'][0]->attendu, 2) . '%' : 0 : '' }}
                </td>
                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][1]->attendu != null && $dataCommune['troisMeilleur'][1]->attendu != 0) ? round($dataCommune['troisMeilleur'][1]->contribution *100 / $dataCommune['troisMeilleur'][1]->attendu, 2) . '%' : 0 : '' }}
                </td>
                <td>{{ isset($dataCommune) ? ($dataCommune['troisMeilleur'][2]->attendu != null && $dataCommune['troisMeilleur'][2]->attendu != 0) ? round($dataCommune['troisMeilleur'][2]->contribution *100 / $dataCommune['troisMeilleur'][2]->attendu, 2) . '%' : 0 : '' }}
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 font-weight-bolder text-center text-uppercase"> Contribution des dix (10) meilleurs villages
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

<div class="row mt-3">
    <div class="col-12 font-weight-bolder text-center text-uppercase"> Contribution des autres partenaires de la commune
    </div>
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

<div class="row mt-3">
    <div class="col-12 font-weight-bolder text-center text-uppercase">ETAT CIVIL</div>
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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->naissance_nombre,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->naissance_observation : '' }}</td>
            </tr>
            <tr>
                <th>Actes de naissances</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->acte_de_naissance_nombre,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_naissance_observation : '' }}</td>
            </tr>
            <tr>
                <th>Actes de décès</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->acte_de_deces_nombre,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->acte_de_deces_observation : '' }}</td>
            </tr>
            <tr>
                <th>Mariages célébrés</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->mariage_celebre_nombre,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->mariage_celebre_observation : '' }}</td>
            </tr>
            <tr>
                <th>Autres actes civils (divers)</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->autre_acte_nombre,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->autre_acte_nombre_observation : '' }}</td>
            </tr>
            <tr>
                <th>Timbres vendus</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['etatCivil']->vente_timbre_nombre,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['etatCivil']->vente_timbre_observation : '' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="row mt-3">
<div class="col-12 font-weight-bolder text-center text-uppercase">Situation domaniale</div>
    <div class="col-12 table-responsive px-0 mt-2">
        <table class="table-sm table-hover mx-auto ">
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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_degagee,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee,0,",",".") : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_restante,0,",",".") : '' }}
                </td>
            </tr>
            <tr>
                <th>Zone commerciale</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee,0,",",".") : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee,0,",",".") : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_commerciale_parcelle_restante,0,",",".") : '' }}
                </td>
            </tr>
            <tr>
                <th>Zone administrative</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_administrative_parcelle_degagee,0,",",".") : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee,0,",",".") : '' }}
                </td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_administrative_parcelle_restante,0,",",".") : '' }}
                </td>
            </tr>
            <tr>
                <th>Autres....</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_autre_parcelle_degagee,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_autre_parcelle_attribuee,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_autre_parcelle_restante,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>Superficies en ha ou en m<sup>2</sup></th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_degagee 
                + $dataCommune['domaineCivil']->zone_commerciale_parcelle_degagee 
                + $dataCommune['domaineCivil']->zone_administrative_parcelle_degagee 
                + $dataCommune['domaineCivil']->zone_autre_parcelle_degagee,0,",",".") : '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_attribuee 
                + $dataCommune['domaineCivil']->zone_commerciale_parcelle_attribuee 
                + $dataCommune['domaineCivil']->zone_administrative_parcelle_attribuee 
                + $dataCommune['domaineCivil']->zone_autre_parcelle_attribuee,0,",","."): '' }}</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['domaineCivil']->zone_habitation_parcelle_restante 
                + $dataCommune['domaineCivil']->zone_commerciale_parcelle_restante 
                + $dataCommune['domaineCivil']->zone_administrative_parcelle_restante 
                + $dataCommune['domaineCivil']->zone_autre_parcelle_restante,0,",",".") : '' }}</td>
            </tr>
        </table>
    </div>
</div>

@if($dataCommune != null)
<div class="row justify-content-center mt-2">
    @if($dataCommune['ressourceImage'][0]->url != null)
    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
        <a href="{{ asset('/'.$dataCommune['ressourceImage'][0]->url) }}"><img class="img-fluid"
                src="{{ asset('/'.$dataCommune['ressourceImage'][0]->url) }}" style="width:auto; max-height:250px"
                alt="img1" /> </a>
    </div>
    @endif
    @if($dataCommune['ressourceImage'][1]->url != null)
    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
        <a href="{{ asset('/'.$dataCommune['ressourceImage'][1]->url) }}"><img class="img-fluid"
                src="{{ asset('/'.$dataCommune['ressourceImage'][1]->url) }}" style="width:auto; max-height:250px"
                alt="img1" /> </a>
    </div>
    @endif
    @if($dataCommune['ressourceImage'][2]->url != null)
    <div class="col-12 col-md-4 font-weight-bolder text-center text-uppercase">
        <a href="{{ asset('/'.$dataCommune['ressourceImage'][2]->url) }}"><img class="img-fluid"
                src="{{ asset('/'.$dataCommune['ressourceImage'][2]->url) }}" style="width:auto; max-height:250px"
                alt="img1" /> </a>
    </div>
    @endif
</div>
@endif