<h4 class="col-12 font-weight-bolder text-center text-white text-uppercase sin-bg-3">Bilan d'execution année 2020</h4>
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
                <td>{{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_globale : '' }}</td>
            </tr>
            <tr>
                <th>103 - 104</th>
                <td>Subvention d'équipement</td>
                <td>{{ isset($dataCommune) ? $dataCommune['recetInvestN']->subvention_equipement : '' }} </td>
            </tr>
            <tr>
                <th>11</th>
                <td>Contribution propre/Reserves</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetInvestN']->contribution_propre : '' }}</td>
            </tr>
            <tr>
                <th>102</th>
                <td>Dotation liée aux compétences transférées</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_liee : '' }}</td>
            </tr>
            <tr>
                <th>60</th>
                <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetInvestN']->resultat_exercice : '' }}</td>
            </tr>
            <tr>
                <th>10/104</th>
                <td>Autres Dotation de transfert</td>
                <td>{{ isset($dataCommune) ? $dataCommune['recetInvestN']->autre_dotation : '' }}</td>
            </tr>
            <tr>
                <th>#</th>
                <th>Total</th>
                <td>{{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_globale
                + $dataCommune['recetInvestN']->subvention_equipement
                + $dataCommune['recetInvestN']->contribution_propre
                + $dataCommune['recetInvestN']->dotation_liee
                + $dataCommune['recetInvestN']->resultat_exercice
                + $dataCommune['recetInvestN']->autre_dotation : '' }}</td>
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
                    <th class="sin-table-bg">#</th>
                    <th class="sin-table-bg">#</th>
                    <th class="sin-table-bg">#</th>
                </tr>
            </thead>
            <tr>
                <th>70</th>
                <td>Produits de l’exploitation</td>
                <td>{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exploitation : '' }}</td>
            </tr>
            <tr>
                <th>71 </th>
                <td>Produits domaniaux </td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_domaniaux : '' }}</td>
            </tr>
            <tr>
                <th>72 </th>
                <td>Produits financiers </td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_financier : '' }}</td>
            </tr>
            <tr>
                <th>73 </th>
                <td> Recouvrements et participations</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->recouvrement : '' }}</td>
            </tr>
            <tr>
                <th>74 </th>
                <td> Produits divers</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_diver : '' }}</td>
            </tr>
            <tr>
                <th>75 </th>
                <td> Impots taxes et contributions directes</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_c_direct : '' }}</td>
            </tr>
            <tr>
                <th>76 </th>
                <td> Impots et taxes indirects</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_indirect : '' }}</td>
            </tr>
            <tr>
                <th>79 </th>
                <td> Produits exceptionnels</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exceptionnel : '' }}</td>
            </tr>
            <tr>
                <th>82 </th>
                <td> Produits antérieurs</td>
                <td> {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_anterieur : '' }}</td>
            </tr>
            <tr>
                <th>#</th>
                <th>Total</th>
                <td>{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exploitation
                + $dataCommune['recetFonctN']->produit_domaniaux 
                + $dataCommune['recetFonctN']->produit_financier
                + $dataCommune['recetFonctN']->recouvrement
                + $dataCommune['recetFonctN']->produit_diver
                + $dataCommune['recetFonctN']->impots_taxe_c_direct
                + $dataCommune['recetFonctN']->impots_taxe_indirect
                + $dataCommune['recetFonctN']->produit_exceptionnel
                + $dataCommune['recetFonctN']->produit_anterieur : '' }}</td>
            </tr>
        </table>
    </div>
</div>

<p class="col-8 mt-3 mx-auto font-weight-bolder text-center text-white bg-danger text-uppercase ">Les depenses</p>

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
                <td>{{ isset($dataCommune) ? $dataCommune['depensInvestN']->etude_recherche : '' }}</td>
            </tr>
            <tr>
                <th>21/211 </th>
                <td> Environnement</td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensInvestN']->environnement : '' }}</td>
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
                <td> {{ isset($dataCommune) ? $dataCommune['depensInvestN']->autre_investissement : '' }}</td>
            </tr>
            <tr>
                <th>#</th>
                <th>Total</th>
                <td>{{ isset($dataCommune) ? $dataCommune['depensInvestN']->etude_recherche
                + $dataCommune['depensInvestN']->environnement
                + $dataCommune['depensInvestN']->equipement
                + $dataCommune['depensInvestN']->batiment
                + $dataCommune['depensInvestN']->emprunt
                + $dataCommune['depensInvestN']->autre_investissement : '' }}</td>
            </tr>
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
                <td>{{ isset($dataCommune) ? $dataCommune['depensFonctN']->sante : '' }}</td>
            </tr>
            <tr>
                <th>60/601+605+608 </th>
                <td>Appui scolaire</td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_scolaire : '' }}</td>
            </tr>
            <tr>
                <th>61/617 </th>
                <td> Sport & culture & jeunesse</td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->sport_culture : '' }}</td>
            </tr>
            <tr>
                <th># </th>
                <td>Eau assainissement enviro</td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->eau_assainissement : '' }}</td>
            </tr>
            <tr>
                <th>64/640 </th>
                <td>Participation et prestation </td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->participation : '' }}</td>
            </tr>
            <tr>
                <th>67/674 </th>
                <td> Frais financier</td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->frais_financier : '' }}</td>
            </tr>
            <tr>
                <th>63/612 </th>
                <td>Refection /entretien batiment </td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->refection_entretien : '' }}</td>
            </tr>
            <tr>
                <th>65/650+655+658</th>
                <td>Salaire & Indemnités </td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->salaire_indemnite : '' }}</td>
            </tr>
            <tr>
                <th>63/1+17 </th>
                <td>Entretien véhicule & autres [services extérieurs] </td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->entretien_vehicule : '' }}</td>
            </tr>
            <tr>
                <th>60/65/66 </th>
                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_fonctionnement : '' }}</td>
            </tr>
            <tr>
                <th>83/831 </th>
                <td>Excedent / Prélèvement </td>
                <td> {{ isset($dataCommune) ? $dataCommune['depensFonctN']->exedent_prelevement : '' }}</td>
            </tr>
            <tr>
                <th>#</th>
                <th>Total</th>
                <td>{{ isset($dataCommune) ? $dataCommune['depensFonctN']->sante
                + $dataCommune['depensFonctN']->appui_scolaire
                + $dataCommune['depensFonctN']->sport_culture
                + $dataCommune['depensFonctN']->eau_assainissement
                + $dataCommune['depensFonctN']->participation
                + $dataCommune['depensFonctN']->frais_financier
                + $dataCommune['depensFonctN']->refection_entretien
                + $dataCommune['depensFonctN']->salaire_indemnite
                + $dataCommune['depensFonctN']->entretien_vehicule
                + $dataCommune['depensFonctN']->appui_fonctionnement
                + $dataCommune['depensFonctN']->exedent_prelevement : '' }}</td>
            </tr>
        </table>
    </div>
</div>