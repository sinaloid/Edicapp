<h4 class="col-12 font-weight-bolder text-center text-white text-uppercase sin-bg-3">Bilan d'execution année {{isset($dataCommune) ? $dataCommune['annee'] + 1 : ''}}</h4>
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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recetInvestN']->dotation_globale,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>103</th>
                <td>Subventions d'équipement</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recetInvestN']->subvention_equipement,0,",",".") : '' }} </td>
            </tr>
            <tr>
                <th>11</th>
                <td>Contribution propre/Réserves</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvestN']->contribution_propre,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>102</th>
                <td>Dotations liées aux compétences transférées</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvestN']->dotation_liee,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>60</th>
                <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvestN']->resultat_exercice,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>10/104</th>
                <td>Autres subventions d'équipement</td>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recetInvestN']->autre_dotation,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th></th>
                <th>Total</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recetInvestN']->dotation_globale
                + $dataCommune['recetInvestN']->subvention_equipement
                + $dataCommune['recetInvestN']->contribution_propre
                + $dataCommune['recetInvestN']->dotation_liee
                + $dataCommune['recetInvestN']->resultat_exercice
                + $dataCommune['recetInvestN']->autre_dotation,0,",",".") : '' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 font-weight-bolder text-center text-uppercase"> Recettes de fonctionnement</div>
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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->produit_exploitation,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>71 </th>
                <td>Produits domaniaux </td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->produit_domaniaux,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>72 </th>
                <td>Produits financiers </td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->produit_financier,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>73 </th>
                <td> Recouvrements et participations</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->recouvrement,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>74 </th>
                <td> Produits divers</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->produit_diver,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>75 </th>
                <td> Impôts taxes et contributions directes</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->impots_taxe_c_direct,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>76 </th>
                <td> Impôts et taxes indirects</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->impots_taxe_indirect,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>79 </th>
                <td> Produits exceptionnels</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->produit_exceptionnel,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>82 </th>
                <td> Produits antérieurs</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->produit_anterieur,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th></th>
                <th>Total</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['recetFonctN']->produit_exploitation
                + $dataCommune['recetFonctN']->produit_domaniaux 
                + $dataCommune['recetFonctN']->produit_financier
                + $dataCommune['recetFonctN']->recouvrement
                + $dataCommune['recetFonctN']->produit_diver
                + $dataCommune['recetFonctN']->impots_taxe_c_direct
                + $dataCommune['recetFonctN']->impots_taxe_indirect
                + $dataCommune['recetFonctN']->produit_exceptionnel
                + $dataCommune['recetFonctN']->produit_anterieur,0,",",".") : '' }}</td>
            </tr>
        </table>
    </div>
</div>

<p class="col-8 mt-3 mx-auto font-weight-bolder text-center text-white bg-danger text-uppercase ">Les dépenses</p>

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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensInvestN']->etude_recherche,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>21/211 </th>
                <td> Environnement</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensInvestN']->environnement,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>21/214+215+216+218 </th>
                <td>Équipement</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensInvestN']->equipement,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>23/232+235 </th>
                <td> Bâtiment</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensInvestN']->batiment,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>16 </th>
                <td> Emprunt</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensInvestN']->emprunt,0,",",".") : '' }}</td>
            </tr>
            <!--tr>
                <th># </th>
                <td> Autres investissements</td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensInvestN']->autre_investissement : '' }}</td>
            </tr-->
            <tr>
                <th></th>
                <th>Total</th>
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

<div class="row mt-3">
    <div class="col-12 font-weight-bolder text-center text-uppercase"> Dépenses de fonctionnement</div>
    <div class="col-12 table-responsive mt-2 px-0 " style="width : 400px">
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
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->sante,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>60/601+605+608 </th>
                <td>Appui scolaire</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->appui_scolaire,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>61/617 </th>
                <td> Sport & culture & jeunesse</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->sport_culture,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th> </th>
                <td>Eau assainissement enviro</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->eau_assainissement,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>64/640 </th>
                <td>Participation et prestation </td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->participation,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>67/674 </th>
                <td> Frais financier</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->frais_financier,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>63/6312 </th>
                <td>Réfection /entretien bâtiment </td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->refection_entretien,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>63/6317 </th>
                <td>Entretien véhicules & autres [services extérieurs] </td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->entretien_vehicule,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>65/650+655+658</th>
                <td>Salaires & Indemnités </td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->salaire_indemnite,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>66 </th>
                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->appui_fonctionnement,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>699</th>
                <td>Autres charges exceptionnels</td>
                <!-- cot -->
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->autres_charges_exceptionnel,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>83/831 </th>
                <td>Excédent / Prélèvement </td>
                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->exedent_prelevement,0,",",".") : '' }}</td>
            </tr>
            <tr>
                <th>#</th>
                <th>Total</th>
                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensFonctN']->sante
                + $dataCommune['depensFonctN']->appui_scolaire
                + $dataCommune['depensFonctN']->sport_culture
                + $dataCommune['depensFonctN']->eau_assainissement
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