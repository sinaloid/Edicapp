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
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>10 / 101</th>
                                <td>Dotation globale</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvest']->dotation_globale, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>103</th>
                                <td>Subventions d'équipement</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvest']->subvention_equipement, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <td>Contribution propre/Réserves</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvest']->contribution_propre, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>102</th>
                                <td>Dotations liées aux compétences transférées</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvest']->dotation_liee, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>60</th>
                                <td>Résultats exercices ant. Excédent/déficit Inv Rep</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvest']->resultat_exercice, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>10/104</th>
                                <td>Autres subventions d'équipement</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['recetInvest']->autre_subvention, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Total</th>
                                <td> {{isset($dataCommune) ? number_format($dataCommune['recetInvest']->dotation_globale + $dataCommune['recetInvest']->subvention_equipement + $dataCommune['recetInvest']->contribution_propre + $dataCommune['recetInvest']->dotation_liee + $dataCommune['recetInvest']->resultat_exercice, 0, ',', '.') : '' }}
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
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>13/132 </th>
                                <td>Études & Recherches</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensInvest']->etude_recherche, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>21/211 </th>
                                <td> Environnement</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensInvest']->environnement, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>21/214+215+216+218 </th>
                                <td>Équipement</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensInvest']->equipement, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>23/232+235 </th>
                                <td> Bâtiment</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensInvest']->batiment, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>16 </th>
                                <td> Emprunt</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensInvest']->emprunt, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <!--tr>
                                <th># </th>
                                <td> Autres investissements</td>
                                <td> {{ isset($dataCommune) ? $dataCommune['depensInvest']->autre_investissement : '' }}</td>
                            </tr-->
                            <tr>
                                <th>60 </th>
                                <td>Déficit / Excédent d'investissement exer anté</td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensInvest']->deficit_excedent, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Total</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensInvest']->etude_recherche + $dataCommune['depensInvest']->environnement + $dataCommune['depensInvest']->equipement + $dataCommune['depensInvest']->batiment + $dataCommune['depensInvest']->emprunt + $dataCommune['depensInvest']->autre_investissement + $dataCommune['depensInvest']->deficit_excedent, 0, ',', '.') : '' }}
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
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
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
                                    <th class="sin-table-bg">Codes</th>
                                    <th class="sin-table-bg">Libellés</th>
                                    <th class="sin-table-bg">Montants</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>60/600+603+604+607+608,63/631+633+634 </th>
                                <td>Santé </td>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->sante, 0, ',', '.') : '' }}</td>
                            </tr>
                            <tr>
                                <th>60/601+605+608 </th>
                                <td>Appui scolaire</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->appui_scolaire, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>61/617 </th>
                                <td> Sport & culture & jeunesse</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->sport_culture, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>64/640 </th>
                                <td>Participation et prestation </td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->participation, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>67/674 </th>
                                <td> Frais financier</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->frais_financier, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>63/6312 </th>
                                <td>Réfection /entretien bâtiment </td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->refection_entretien, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>63/6317 </th>
                                <td>Entretien véhicules & autres [services extérieurs] </td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->entretien_vehicule, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>65/650+655+658</th>
                                <td>Salaires & Indemnités </td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->salaire_indemnite, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>66</th>
                                <td> Appui Fonctionnement /Autres dépenses de fonctionnement</td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->appui_fonctionnement, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>699</th>
                                <td>Autres charges exceptionnels</td>
                                <!-- cot -->
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->autres_charges_exceptionnel, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>83/831 </th>
                                <td>Excédent / Prélèvement </td>
                                <td> {{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->exedent_prelevement, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Total</th>
                                <td>{{ isset($dataCommune) ? number_format($dataCommune['depensFonct']->sante + $dataCommune['depensFonct']->appui_scolaire + $dataCommune['depensFonct']->sport_culture + $dataCommune['depensFonct']->participation + $dataCommune['depensFonct']->frais_financier + $dataCommune['depensFonct']->refection_entretien + $dataCommune['depensFonct']->salaire_indemnite + $dataCommune['depensFonct']->entretien_vehicule + $dataCommune['depensFonct']->appui_fonctionnement + $dataCommune['depensFonct']->exedent_prelevement, 0, ',', '.') : '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
