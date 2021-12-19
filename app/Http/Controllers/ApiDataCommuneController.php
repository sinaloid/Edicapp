<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Countries\{ Region, Country, Province, Commune };
use App\Models\Datas\Data;
use App\Models\Datas\Infog\Infog;
use App\Models\Datas\Infog\Tables\{Recettes, Depenses, DixMeilleurs, DomaineCivil, EtatCivil, Partenaires, RessourceImage, TroisMeilleurs};
use App\Models\Datas\Pcd\Pcd;
use App\Models\Datas\Pcd\Tables\{Appreciation, Satisfaction};
use App\Models\Datas\Budget\Budget;
use App\Models\Datas\Budget\Tables\{DepensFonct, DepensInvest, RecetFonct, RecetInvest};
use App\Models\Datas\BudgetN\BudgetN;
use App\Models\Datas\BudgetN\Tables\{DepensFonctN, DepensInvestN, RecetFonctN, RecetInvestN};

class ApiDataCommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'ok';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(json_decode($request->getContent(), true));
        $data = $request->all();
        //dd($data);
        $country = $data[0];

        //Country::create(['country_name' => json_encode($data), 'indicatif' => 1, 'slug' => json_encode($data[0])]);
        //dd($data[0]['data']['id_depense']);
        //dd($data[0]['data']['id_depense']);
        $user = $request->user();
        if($user->id != null){
            $response = $this->findOrCreateData($country, $user);
        }
        //dd($depensNInvests);
        if( $response['id'] != null ){
            $ok = $this->update($data, $response['id']);
            if($ok == 'ok'){
                return response()->json([
                    "data" => $data,
                    "status" => 200,
                    "message" => $response['message']
                ], 200);
            }
            return response()->json([
                "data" => $data,
                "status" => 200,
                "message" => "erreur d'envoi, vérifiez vos données !"
            ], 200);
        } else {
            return response()->json([
                "data" => $data,
                "status" => 400,
                "message" => $response['message']
            ], 200);
        }
    }

    public function findOrCreateData($request, $user){

        //dd($request);
        $request['id_commune'] = Commune::where('commune_name', $request['commune'])->first()->id;
        $data = Data::where([
            ['commune_id', $request['id_commune']],
            ['annee', $request['annee']],
            ['user_id', $user->id]
        ])->first();
            //dd($data);
        if($data == null) {
            $dataCommuneID = $this->newDataCommune($request, $user);
            //dd($dataCommuneID);
            //$dataCommune = $this->getDataCommune($data->id);
            return [
                "message" => "envoyé avec succès !",
                "id" => $dataCommuneID
            ];
        }else{
            //$dataCommune = $this->getDataCommune($data->id);
            return [
                "message" => "échec d'envoi, les données existent déjà !",
                "id" => null
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($data, $id)
    {
         

        $dataCommune = Data::find($id)->first();
        //dd($data, $dataCommune);
        

        if($data != null){

            /*Infog */
         $recettes = $data[1];
         $depenses = $data[2]; 
         $marches = $data[3];
         $villages = $data[4];
         $partenairs = $data[5];
         $etat_Civil = $data[6];
         $domaine = $data[7];
 
         /*pcd*/
         $appreciations = $data[8];
         $donneNotes = $data[9];
         
         /*budget */
         $recetFoncts = $data[10];
         $depensFoncts = $data[11];
         $recetInvests = $data[12];
         $depensInvests = $data[13];
         /*budget n */
         $recetNFoncts = $data[14];
         $depensNFoncts = $data[15];
         $recetNInvests = $data[16];
         $depensNInvests = $data[17];

            /*infog*/

            /*recette */
            $recettes_infogs = Data::find($id)->infogs()->first()->recettes()->get();
            $i = 0;
            foreach($recettes as $recette){
                Country::create(['country_name' => json_encode($recette), 'indicatif' => 1, 'slug' => 'ok']);
                $recettes_infogs[$i]->annee = $recette['annee'];
                $recettes_infogs[$i]->fonctionnement = $recette['fonctionnement'];
                $recettes_infogs[$i]->investissement = $recette['investissement'];
                $recettes_infogs[$i]->save();
                
                $i++;
                if($i == 4){
                    break;
                }
            }
            $i = 0;

            /*Depense */
            $depense_infogs = Data::find($id)->infogs()->first()->depenses()->get();
            foreach($depenses as $depense){
                $depense_infogs[$i]->annee = $depense['annee'];
                $depense_infogs[$i]->fonctionnement = $depense['fonctionnement'];
                $depense_infogs[$i]->investissement = $depense['investissement'];
                $depense_infogs[$i]->save();
                $i++;
                if($i == 4){
                    break;
                }
                
            }
            $i = 0;
            /*trois meilleurs */

            $troisMeilleur = Data::find($id)->infogs()->first()->troisMeilleurs()->get();
            foreach($marches as $marche){
                $troisMeilleur[$i]->marche = $marche['marche'];
                $troisMeilleur[$i]->attendu = $marche['attendu'];
                $troisMeilleur[$i]->contribution = $marche['contribution'];
                $troisMeilleur[$i]->save();
                $i++;
                if($i == 3){
                    break;
                }
                
            }
            $i = 0;

            /*Dix meilleurs village */

            $dixMeilleur = Data::find($id)->infogs()->first()->dixMeilleurs()->get();
            foreach($villages as $village){
                $dixMeilleur[$i]->le_village = $village['le_village'];
                $dixMeilleur[$i]->attendu = $village['attendu'];
                $dixMeilleur[$i]->mobilise = $village['mobilise'];
                $dixMeilleur[$i]->save();
                $i++;
                if($i == 10){
                    break;
                }
                
            }
            $i = 0;

            /*partenaire */

            $partenaires = Data::find($id)->infogs()->first()->partenaires()->get();
            foreach($partenairs as $partenair){
                $partenaires[$i]->identite_ptf = $partenair['identite_ptf'];
                $partenaires[$i]->evaluation_contribution = $partenair['evaluation_contribution'];
                $partenaires[$i]->principale_action = $partenair['principale_action'];
                $partenaires[$i]->save();
                $i++;
                if($i == 10){
                    break;
                }
                
            }
            $i = 0;
            

            /*Etat civil */

            $etatCivil = Data::find($id)->infogs()->first()->etatCivils()->first();
            
            $etatCivil->naissance_nombre = $etat_Civil[0]['naissance_nombre'];
            $etatCivil->acte_de_naissance_nombre = $etat_Civil[0]['acte_de_naissance_nombre'];
            $etatCivil->acte_de_deces_nombre = $etat_Civil[0]['acte_de_deces_nombre'];
            $etatCivil->mariage_celebre_nombre = $etat_Civil[0]['mariage_celebre_nombre'];
            $etatCivil->autre_acte_nombre = $etat_Civil[0]['autre_acte_nombre'];
            $etatCivil->vente_timbre_nombre = $etat_Civil[0]['vente_timbre_nombre'];

            $etatCivil->naissance_observation = $etat_Civil[0]['naissance_observation'];
            $etatCivil->acte_de_naissance_observation = $etat_Civil[0]['acte_de_naissance_observation'];
            $etatCivil->acte_de_deces_observation = $etat_Civil[0]['acte_de_deces_observation'];
            $etatCivil->mariage_celebre_observation = $etat_Civil[0]['mariage_celebre_observation'];
            $etatCivil->autre_acte_nombre_observation = $etat_Civil[0]['autre_acte_observation'];
            $etatCivil->vente_timbre_observation = $etat_Civil[0]['vente_timbre_observation'];

            $etatCivil->save();
            /*domaine civil */

            $domaineCivil = Data::find($id)->infogs()->first()->domaineCivils()->first();

            $domaineCivil->zone_habitation_parcelle_degagee = $domaine[0]['zone_habitation_parcelle_degagee'];
            $domaineCivil->zone_commerciale_parcelle_degagee = $domaine[0]['zone_commerciale_parcelle_degagee'];
            $domaineCivil->zone_administrative_parcelle_degagee = $domaine[0]['zone_administrative_parcelle_degagee'];
            $domaineCivil->zone_autre_parcelle_degagee = $domaine[0]['zone_autre_parcelle_degagee'];
            
            $domaineCivil->zone_habitation_parcelle_attribuee = $domaine[0]['zone_habitation_parcelle_attribuee'];
            $domaineCivil->zone_commerciale_parcelle_attribuee = $domaine[0]['zone_commerciale_parcelle_attribuee'];
            $domaineCivil->zone_administrative_parcelle_attribuee = $domaine[0]['zone_administrative_parcelle_attribuee'];
            $domaineCivil->zone_autre_parcelle_attribuee = $domaine[0]['zone_autre_parcelle_attribuee'];
            
            $domaineCivil->zone_habitation_parcelle_restante = $domaine[0]['zone_habitation_parcelle_restante'];
            $domaineCivil->zone_commerciale_parcelle_restante = $domaine[0]['zone_commerciale_parcelle_restante'];
            $domaineCivil->zone_administrative_parcelle_restante = $domaine[0]['zone_administrative_parcelle_restante'];
            $domaineCivil->zone_autre_parcelle_restante = $domaine[0]['zone_autre_parcelle_restante'];

            $domaineCivil->save();
            

            /*ressource image*/

            /*$ressourceImage = Data::find($id)->infogs()->first()->ressourceimages()->get();
            //dd($request);
            if($request->commune_img_carte != null){
                $ressourceImage[0]->url = $request->commune_img_carte->store(config('images.path'), 'public');
                $ressourceImage[0]->save();
            }
            if($request->commune_img_logo != null){
                $ressourceImage[1]->url = $request->commune_img_logo->store(config('images.path'), 'public');
                $ressourceImage[1]->save();
            }
            if($request->commune_img_logo != null){
                $ressourceImage[1]->url = $request->commune_img_logo->store(config('images.path'), 'public');
                $ressourceImage[1]->save();
            }
            if($request->commune_img_autre != null){
                $ressourceImage[2]->url = $request->commune_img_autre->store(config('images.path'), 'public');
                $ressourceImage[2]->save();
            }

            */




            /* Pcd */
            /* appreciation */
            
            $appreciation = Data::find($id)->pcds()->first()->appreciations()->first();

            $appreciation->date_de_conception = $appreciations[0]['date_de_conception'];
            $appreciation->date_d_expiration = $appreciations[0]['date_d_expiration'];
            $appreciation->montant_total = $appreciations[0]['montant_total'];
            $appreciation->montant_mobilise = $appreciations[0]['montant_mobilise'];
            $appreciation->probleme_majeur = $appreciations[0]['probleme_majeur'];
            $appreciation->perpective_dix_mot = $appreciations[0]['perpective_dix_mot'];

            $appreciation->save();
            
            /*satisfaction */

            $satisfaction = Data::find($id)->pcds()->first()->satisfactions()->first();

            $satisfaction->consolider_resilience_tres_satisfaisant = $donneNotes[0]['consolider_resilience_tres_satisfaisant'];
            $satisfaction->approfondir_reforme_tres_satisfaisant = $donneNotes[0]['approfondir_reforme_tres_satisfaisant'];
            $satisfaction->consolider_developpement_tres_satisfaisant = $donneNotes[0]['consolider_developpement_tres_satisfaisant'];
            $satisfaction->dynamiser_secteurs_tres_satisfaisant = $donneNotes[0]['dynamiser_secteurs_tres_satisfaisant'];

            $satisfaction->consolider_resilience_satisfaisant = $donneNotes[0]['consolider_resilience_satisfaisant'];
            $satisfaction->approfondir_reforme_satisfaisant = $donneNotes[0]['approfondir_reforme_satisfaisant'];
            $satisfaction->consolider_developpement_satisfaisant = $donneNotes[0]['consolider_developpement_satisfaisant'];
            $satisfaction->dynamiser_secteurs_satisfaisant = $donneNotes[0]['dynamiser_secteurs_satisfaisant'];

            $satisfaction->consolider_resilience_pas_satisfaisant = $donneNotes[0]['consolider_resilience_pas_satisfaisant'];
            $satisfaction->approfondir_reforme_pas_satisfaisant = $donneNotes[0]['approfondir_reforme_pas_satisfaisant'];
            $satisfaction->consolider_developpement_pas_satisfaisant = $donneNotes[0]['consolider_developpement_pas_satisfaisant'];
            $satisfaction->dynamiser_secteurs_pas_satisfaisant = $donneNotes[0]['dynamiser_secteurs_pas_satisfaisant'];
            $satisfaction->commentaire_appreciation = $donneNotes[0]['commenteaire_appreciation'];

            $satisfaction->save();
            
            /*Budget */
            /* recette invest */
            
            $recetInvest = Data::find($id)->budgets()->first()->recetInvests()->first();
            $recetInvest->dotation_globale = $recetInvests[0]['dotation_globale'];
            $recetInvest->subvention_equipement = $recetInvests[0]['subvention_equipement'];
            $recetInvest->contribution_propre = $recetInvests[0]['contribution_propre'];
            $recetInvest->dotation_liee = $recetInvests[0]['dotation_liee'];
            $recetInvest->resultat_exercice = $recetInvests[0]['resultat_exercice'];
            $recetInvest->autre_subvention = $recetInvests[0]['autre_subvention'];

            $recetInvest->save();

            /*recette fonct */

            $recetFonct = Data::find($id)->budgets()->first()->recetFoncts()->first();
            $recetFonct->produit_exploitation = $recetFoncts[0]['produit_exploitation'];
            $recetFonct->produit_domaniaux = $recetFoncts[0]['produit_domaniaux'];
            $recetFonct->produit_financier = $recetFoncts[0]['produit_financier'];
            $recetFonct->recouvrement = $recetFoncts[0]['recouvrement'];
            $recetFonct->produit_diver = $recetFoncts[0]['produit_diver'];
            $recetFonct->impots_taxe_c_direct = $recetFoncts[0]['impots_taxe_c_direct'];
            $recetFonct->impots_taxe_indirect = $recetFoncts[0]['impots_taxe_indirect'];
            $recetFonct->produit_exceptionnel = $recetFoncts[0]['produit_exceptionnel'];
            $recetFonct->produit_anterieur = $recetFoncts[0]['produit_anterieur'];
            $recetFonct->autres_dotations = $recetFoncts[0]['autres_dotations'];

            $recetFonct->save();

            /*depense invest */
            $depensInvest = Data::find($id)->budgets()->first()->depensInvests()->first();
            $depensInvest->etude_recherche = $depensInvests[0]['etude_recherche'];
            $depensInvest->environnement = $depensInvests[0]['environnement'];
            $depensInvest->equipement = $depensInvests[0]['equipement'];
            $depensInvest->batiment = $depensInvests[0]['batiment'];
            $depensInvest->emprunt = $depensInvests[0]['emprunt'];
            $depensInvest->autre_investissement = $depensInvests[0]['autre_investissement'];
            $depensInvest->deficit_excedent = $depensInvests[0]['deficit_excedent'];
            
            $depensInvest->save();

            /*depense fonct */
            $depensFonct = Data::find($id)->budgets()->first()->depensFoncts()->first();
            $depensFonct->sante = $depensFoncts[0]['sante'];
            $depensFonct->appui_scolaire = $depensFoncts[0]['appui_scolaire'];
            $depensFonct->sport_culture = $depensFoncts[0]['sport_culture'];
            $depensFonct->participation = $depensFoncts[0]['participation'];
            $depensFonct->frais_financier = $depensFoncts[0]['frais_financier'];
            $depensFonct->refection_entretien = $depensFoncts[0]['refection_entretien'];
            $depensFonct->salaire_indemnite = $depensFoncts[0]['salaire_indemnite'];
            $depensFonct->entretien_vehicule = $depensFoncts[0]['entretien_vehicule'];
            $depensFonct->appui_fonctionnement = $depensFoncts[0]['appui_fonctionnement'];
            $depensFonct->autres_charges_exceptionnel = $depensFoncts[0]['autres_charges_exceptionnel'];
            $depensFonct->exedent_prelevement = $depensFoncts[0]['exedent_prelevement'];

            $depensFonct->save();

            /*budget n*/
            //dd($satisfaction);
            /*recette invest*/
            $recetInvestN = Data::find($id)->budgetns()->first()->recetInvestns()->first();
            $recetInvestN->dotation_globale = $recetNInvests[0]['dotation_globale'];
            $recetInvestN->subvention_equipement = $recetNInvests[0]['subvention_equipement'];
            $recetInvestN->contribution_propre = $recetNInvests[0]['contribution_propre'];
            $recetInvestN->dotation_liee = $recetNInvests[0]['dotation_liee'];
            $recetInvestN->resultat_exercice = $recetNInvests[0]['resultat_exercice'];
            $recetInvestN->autre_dotation = $recetNInvests[0]['autre_dotation'];

            $recetInvestN->save();

            /*recette fonct*/
            $recetFonctN = Data::find($id)->budgetns()->first()->recetFonctns()->first();
            $recetFonctN->produit_exploitation = $recetNFoncts[0]['produit_exploitation'];
            $recetFonctN->produit_domaniaux = $recetNFoncts[0]['produit_domaniaux'];
            $recetFonctN->produit_financier = $recetNFoncts[0]['produit_financier'];
            $recetFonctN->recouvrement = $recetNFoncts[0]['recouvrement'];
            $recetFonctN->produit_diver = $recetNFoncts[0]['produit_diver'];
            $recetFonctN->impots_taxe_c_direct = $recetNFoncts[0]['impots_taxe_c_direct'];
            $recetFonctN->impots_taxe_indirect = $recetNFoncts[0]['impots_taxe_indirect'];
            $recetFonctN->produit_exceptionnel = $recetNFoncts[0]['produit_exceptionnel'];
            $recetFonctN->produit_anterieur = $recetNFoncts[0]['produit_anterieur'];

            $recetFonctN->save();

            /*depense invest*/
            $depensInvestN = Data::find($id)->budgetns()->first()->depensInvestns()->first();
            $depensInvestN->etude_recherche = $depensNInvests[0]['etude_recherche'];
            $depensInvestN->environnement = $depensNInvests[0]['environnement'];
            $depensInvestN->equipement = $depensNInvests[0]['equipement'];
            $depensInvestN->batiment = $depensNInvests[0]['batiment'];
            $depensInvestN->emprunt = $depensNInvests[0]['emprunt'];
            $depensInvestN->autre_investissement = $depensNInvests[0]['autre_investissement'];

            $depensInvestN->save();

            /*depense fonct*/
            $depensFonctN = Data::find($id)->budgetns()->first()->depensFonctns()->first();
            $depensFonctN->sante = $depensNFoncts[0]['sante'];
            $depensFonctN->appui_scolaire = $depensNFoncts[0]['appui_scolaire'];
            $depensFonctN->sport_culture = $depensNFoncts[0]['sport_culture'];
            $depensFonctN->eau_assainissement = $depensNFoncts[0]['eau_assainissement'];
            $depensFonctN->participation = $depensNFoncts[0]['participation'];
            $depensFonctN->frais_financier = $depensNFoncts[0]['frais_financier'];
            $depensFonctN->refection_entretien = $depensNFoncts[0]['refection_entretien'];
            $depensFonctN->salaire_indemnite = $depensNFoncts[0]['salaire_indemnite'];
            $depensFonctN->entretien_vehicule = $depensNFoncts[0]['entretien_vehicule'];
            $depensFonctN->appui_fonctionnement = $depensNFoncts[0]['appui_fonctionnement'];
            $depensFonctN->autres_charges_exceptionnel = $depensNFoncts[0]['autres_charges_exceptionnel'];
            $depensFonctN->exedent_prelevement = $depensNFoncts[0]['exedent_prelevement'];

            $depensFonctN->save();


        }

        return 'ok';
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function newDataCommune($request, $user){

        $data = new Data();
            $data->commune_id = $request['id_commune'];
            $data->user_id = $user->id; // Auth::id();
            $data->annee = $request['annee'];
            $data->slug = Str::slug(Str::random(10));
            $saveData = $data->save();
            //dd($data);
            if($saveData){
                /**Initialisation de la table infog */
                $infog = new Infog();
                $infog->data_id = $data->id;
                $saveInfog = $infog->save();
                    if($saveInfog){
                        
                        
                        $domaineCivil = new DomaineCivil();
                        $etatCivil = new EtatCivil();
                        
                        $ressourceImage = new RessourceImage();

                        for($i=0; $i <=3; $i++){
                            $recette = new Recettes();
                            $depense = new Depenses();

                            $recette->infog_id = $infog->id;
                            $depense->infog_id = $infog->id;

                            $recette->save();
                            $depense->save();

                            if($i < 3){
                                $troisMeilleur = new TroisMeilleurs();
                                $ressourceImage = new RessourceImage();
                                 
                                $ressourceImage->infog_id = $infog->id;
                                $troisMeilleur->infog_id = $infog->id;

                                $troisMeilleur->save();
                                $ressourceImage->save();

                            }
                        }

                        for($i=0; $i < 10; $i++){

                            $dixMeilleur = new DixMeilleurs();
                            $partenaire = new Partenaires();

                            $dixMeilleur->infog_id = $infog->id;
                            $partenaire->infog_id = $infog->id;

                            
                            $dixMeilleur->save();
                            $partenaire->save();


                        }
                        
                        
                        $domaineCivil->infog_id = $infog->id;
                        $etatCivil->infog_id = $infog->id;
                       

                        
                        $domaineCivil->save();
                        $etatCivil->save();
                       
                        
                    }
                /**Initialisation de la table Pcd */
                if($saveInfog){
                    $pcd = new Pcd();
                    $pcd->data_id = $data->id;
                    $savePcd = $pcd->save();

                        if($savePcd){
                            $appreciation = new Appreciation();
                            $satisfaction = new Satisfaction();

                            $appreciation->pcd_id = $pcd->id;
                            $satisfaction->pcd_id = $pcd->id;
                            
                            $appreciation->save();
                            $satisfaction->save();
                        }

                    

                    if($savePcd){
                        $budget = new Budget();
                        $budget->data_id = $data->id;
                        $saveBudget = $budget->save();

                            if($saveBudget){
                                $depensFonct = new DepensFonct();
                                $depensInvest = new DepensInvest();
                                $recetFonct = new RecetFonct();
                                $recetInvest = new RecetInvest();


                                $depensFonct->budget_id = $budget->id;
                                $depensInvest->budget_id = $budget->id;
                                $recetFonct->budget_id = $budget->id;
                                $recetInvest->budget_id = $budget->id;
                            
                                $depensFonct->save();
                                $depensInvest->save();
                                $recetFonct->save();
                                $recetInvest->save();
                            }

                        if($saveBudget){
                            $budgetN = new BudgetN();
                            $budgetN->data_id = $data->id;
                            $saveBudgetN = $budgetN->save();

                            if($saveBudgetN){
                                $depensFonctN = new DepensFonctN();
                                $depensInvestN = new DepensInvestN();
                                $recetFonctN = new RecetFonctN();
                                $recetInvestN = new RecetInvestN();


                                $depensFonctN->budget_n_id = $budgetN->id;
                                $depensInvestN->budget_n_id = $budgetN->id;
                                $recetFonctN->budget_n_id = $budgetN->id;
                                $recetInvestN->budget_n_id = $budgetN->id;
                            
                                $depensFonctN->save();
                                $depensInvestN->save();
                                $recetFonctN->save();
                                $recetInvestN->save();
                            }
                        }
                    }

                }

                
            }

            return $data->id;
    }
}
