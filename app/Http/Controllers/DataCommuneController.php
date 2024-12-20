<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use App\Http\Requests\DataCommuneRequest;
use Illuminate\Support\Facades\Storage;
use Session;

class DataCommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $annee = date('Y');
        $dataCommune = null; //$this->getDataCommune(0);
        return view('dataCommune.create', compact('countries','annee', 'dataCommune'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataCommune = null;
        $request->commune = Commune::where('commune_name',$request->commune)->first()->id;
        //dd($commune_id);
        $data = Data::where([
            ['commune_id', $request->commune],
            ['annee', $request->annee],
            ['user_id', Auth::id()]
        ])->first();

        if($data == null) {
            if(auth()->user()->commune_id == $request->commune || auth()->user()->role =='admin' ){
                $dataCommune = $this->newDataCommune($request);
                Session::flash('autorisé',"Vous pouvez commencer à insérer les nouvelles données de la commune.");
            }else{
                Session::flash('non-autorisé',"Vous n'êtes pas autorisé à créer les données d'une commune différente du vôtre.");
                //return back();
            }
            //$dataCommune = $this->getDataCommune($data->id);
            
        }else{
            $dataCommune = $this->getDataCommune($data->id);
            Session::flash('récupéré',"Vous pouvez commencer à modifier les données de la commune.");

            
        }
        
        $countries = Country::all();
        $annee = date('Y');
        return view('dataCommune.create', compact('countries','annee', 'dataCommune'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $countries = Country::all();
        $annee = date('Y');
        $dataCommune = $this->getDataCommune($id);
        return view('dataCommune.create', compact('countries','annee', 'dataCommune'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $annee = date('Y');
        $dataCommune = $this->getDataCommune($id);
        return view('dataCommune.create', compact('countries','annee', 'dataCommune'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataCommuneRequest $request, $id)
    {
       
        if(Data::find($id) == null){
            $dataCommune = null;
            $countries = Country::all();
            $annee = date('Y');
            return view('dataCommune.create', compact('countries','annee', 'dataCommune'));
        }

        $data = Data::find($id)->first();

        

        if($request != null){

            /*infog*/

            /*recette */
            $recettes_infogs = Data::find($id)->infogs()->first()->recettes()->get();
            $recettes_infogs[0]->annee = $request->recet_annee1;
            $recettes_infogs[1]->annee = $request->recet_annee2;
            $recettes_infogs[2]->annee = $request->recet_annee3;
            $recettes_infogs[3]->annee = $request->recet_annee4;
            
            $recettes_infogs[0]->fonctionnement = $request->recet_fonct1;
            $recettes_infogs[1]->fonctionnement = $request->recet_fonct2;
            $recettes_infogs[2]->fonctionnement = $request->recet_fonct3;
            $recettes_infogs[3]->fonctionnement = $request->recet_fonct4;

            $recettes_infogs[0]->investissement = $request->recet_invest1;
            $recettes_infogs[1]->investissement = $request->recet_invest2;
            $recettes_infogs[2]->investissement = $request->recet_invest3;
            $recettes_infogs[3]->investissement = $request->recet_invest4;

            $recettes_infogs[0]->save();
            $recettes_infogs[1]->save();
            $recettes_infogs[2]->save();
            $recettes_infogs[3]->save();

            /*Depense */
            $depense_infogs = Data::find($id)->infogs()->first()->depenses()->get();
            $depense_infogs[0]->annee = $request->depens_annee1;
            $depense_infogs[1]->annee = $request->depens_annee2;
            $depense_infogs[2]->annee = $request->depens_annee3;
            $depense_infogs[3]->annee = $request->depens_annee4;
            
            $depense_infogs[0]->fonctionnement = $request->depens_fonct1;
            $depense_infogs[1]->fonctionnement = $request->depens_fonct2;
            $depense_infogs[2]->fonctionnement = $request->depens_fonct3;
            $depense_infogs[3]->fonctionnement = $request->depens_fonct4;

            $depense_infogs[0]->investissement = $request->depens_invest1;
            $depense_infogs[1]->investissement = $request->depens_invest2;
            $depense_infogs[2]->investissement = $request->depens_invest3;
            $depense_infogs[3]->investissement = $request->depens_invest4;

            $depense_infogs[0]->save();
            $depense_infogs[1]->save();
            $depense_infogs[2]->save();
            $depense_infogs[3]->save();

            /*trois meilleurs */

            $troisMeilleur = Data::find($id)->infogs()->first()->troisMeilleurs()->get();

            $troisMeilleur[0]->marche = $request->marche1;
            $troisMeilleur[1]->marche = $request->marche2;
            $troisMeilleur[2]->marche = $request->marche3;

            $troisMeilleur[0]->attendu = $request->m_attendu1;
            $troisMeilleur[1]->attendu = $request->m_attendu2;
            $troisMeilleur[2]->attendu = $request->m_attendu3;

            $troisMeilleur[0]->contribution = $request->contribution1;
            $troisMeilleur[1]->contribution = $request->contribution2;
            $troisMeilleur[2]->contribution = $request->contribution3;

            $troisMeilleur[0]->save();
            $troisMeilleur[1]->save();
            $troisMeilleur[2]->save();

            /*Dix meilleurs village */

            $dixMeilleur = Data::find($id)->infogs()->first()->dixMeilleurs()->get();

            $dixMeilleur[0]->le_village = $request->village1;
            $dixMeilleur[1]->le_village = $request->village2;
            $dixMeilleur[2]->le_village = $request->village3;
            $dixMeilleur[3]->le_village = $request->village4;
            $dixMeilleur[4]->le_village = $request->village5;
            $dixMeilleur[5]->le_village = $request->village6;
            $dixMeilleur[6]->le_village = $request->village7;
            $dixMeilleur[7]->le_village = $request->village8;
            $dixMeilleur[8]->le_village = $request->village9;
            $dixMeilleur[9]->le_village = $request->village10;

            $dixMeilleur[0]->attendu = $request->attendu1;
            $dixMeilleur[1]->attendu = $request->attendu2;
            $dixMeilleur[2]->attendu = $request->attendu3;
            $dixMeilleur[3]->attendu = $request->attendu4;
            $dixMeilleur[4]->attendu = $request->attendu5;
            $dixMeilleur[5]->attendu = $request->attendu6;
            $dixMeilleur[6]->attendu = $request->attendu7;
            $dixMeilleur[7]->attendu = $request->attendu8;
            $dixMeilleur[8]->attendu = $request->attendu9;
            $dixMeilleur[9]->attendu = $request->attendu10;

            $dixMeilleur[0]->mobilise = $request->mobilise1;
            $dixMeilleur[1]->mobilise = $request->mobilise2;
            $dixMeilleur[2]->mobilise = $request->mobilise3;
            $dixMeilleur[3]->mobilise = $request->mobilise4;
            $dixMeilleur[4]->mobilise = $request->mobilise5;
            $dixMeilleur[5]->mobilise = $request->mobilise6;
            $dixMeilleur[6]->mobilise = $request->mobilise7;
            $dixMeilleur[7]->mobilise = $request->mobilise8;
            $dixMeilleur[8]->mobilise = $request->mobilise9;
            $dixMeilleur[9]->mobilise = $request->mobilise10;

            $dixMeilleur[0]->save();
            $dixMeilleur[1]->save();
            $dixMeilleur[2]->save();
            $dixMeilleur[3]->save();
            $dixMeilleur[4]->save();
            $dixMeilleur[5]->save();
            $dixMeilleur[6]->save();
            $dixMeilleur[7]->save();
            $dixMeilleur[8]->save();
            $dixMeilleur[9]->save();

            /*partenaire */

            $partenaire = Data::find($id)->infogs()->first()->partenaires()->get();

            $partenaire[0]->identite_ptf = $request->identite1;
            $partenaire[1]->identite_ptf = $request->identite2;
            $partenaire[2]->identite_ptf = $request->identite3;
            $partenaire[3]->identite_ptf = $request->identite4;
            $partenaire[4]->identite_ptf = $request->identite5;
            $partenaire[5]->identite_ptf = $request->identite6;
            $partenaire[6]->identite_ptf = $request->identite7;
            $partenaire[7]->identite_ptf = $request->identite8;
            $partenaire[8]->identite_ptf = $request->identite9;
            $partenaire[9]->identite_ptf = $request->identite10;

            $partenaire[0]->evaluation_contribution = $request->evalut_contrib1;
            $partenaire[1]->evaluation_contribution = $request->evalut_contrib2;
            $partenaire[2]->evaluation_contribution = $request->evalut_contrib3;
            $partenaire[3]->evaluation_contribution = $request->evalut_contrib4;
            $partenaire[4]->evaluation_contribution = $request->evalut_contrib5;
            $partenaire[5]->evaluation_contribution = $request->evalut_contrib6;
            $partenaire[6]->evaluation_contribution = $request->evalut_contrib7;
            $partenaire[7]->evaluation_contribution = $request->evalut_contrib8;
            $partenaire[8]->evaluation_contribution = $request->evalut_contrib9;
            $partenaire[9]->evaluation_contribution = $request->evalut_contrib10;

            $partenaire[0]->principale_action = $request->princ_action1;
            $partenaire[1]->principale_action = $request->princ_action2;
            $partenaire[2]->principale_action = $request->princ_action3;
            $partenaire[3]->principale_action = $request->princ_action4;
            $partenaire[4]->principale_action = $request->princ_action5;
            $partenaire[5]->principale_action = $request->princ_action6;
            $partenaire[6]->principale_action = $request->princ_action7;
            $partenaire[7]->principale_action = $request->princ_action8;
            $partenaire[8]->principale_action = $request->princ_action9;
            $partenaire[9]->principale_action = $request->princ_action10;

            $partenaire[0]->save();
            $partenaire[1]->save();
            $partenaire[2]->save();
            $partenaire[3]->save();
            $partenaire[4]->save();
            $partenaire[5]->save();
            $partenaire[6]->save();
            $partenaire[7]->save();
            $partenaire[8]->save();
            $partenaire[9]->save();

            /*Etat civil */

            $etatCivil = Data::find($id)->infogs()->first()->etatCivils()->first();

            $etatCivil->naissance_nombre = $request->naissance_nombre;
            $etatCivil->acte_de_naissance_nombre = $request->acte_de_naissance_nombre;
            $etatCivil->acte_de_deces_nombre = $request->acte_de_deces_nombre;
            $etatCivil->mariage_celebre_nombre = $request->mariage_celebre_nombre;
            $etatCivil->autre_acte_nombre = $request->autre_acte_nombre;
            $etatCivil->vente_timbre_nombre = $request->vente_timbre_nombre;

            $etatCivil->naissance_observation = $request->naissance_observation;
            $etatCivil->acte_de_naissance_observation = $request->acte_de_naissance_observation;
            $etatCivil->acte_de_deces_observation = $request->acte_de_deces_observation;
            $etatCivil->mariage_celebre_observation = $request->mariage_celebre_observation;
            $etatCivil->autre_acte_nombre_observation = $request->autre_acte_nombre_observation;
            $etatCivil->vente_timbre_observation = $request->vente_timbre_observation;

            $etatCivil->save();

            /*domaine civil */

            $domaineCivil = Data::find($id)->infogs()->first()->domaineCivils()->first();

            $domaineCivil->zone_habitation_parcelle_degagee = $request->zone_habitation_parcelle_degagee;
            $domaineCivil->zone_commerciale_parcelle_degagee = $request->zone_commerciale_parcelle_degagee;
            $domaineCivil->zone_administrative_parcelle_degagee = $request->zone_administrative_parcelle_degagee;
            $domaineCivil->zone_autre_parcelle_degagee = $request->zone_autre_parcelle_degagee;
            
            $domaineCivil->zone_habitation_parcelle_attribuee = $request->zone_habitation_parcelle_attribuee;
            $domaineCivil->zone_commerciale_parcelle_attribuee = $request->zone_commerciale_parcelle_attribuee;
            $domaineCivil->zone_administrative_parcelle_attribuee = $request->zone_administrative_parcelle_attribuee;
            $domaineCivil->zone_autre_parcelle_attribuee = $request->zone_autre_parcelle_attribuee;
            
            $domaineCivil->zone_habitation_parcelle_restante = $request->zone_habitation_parcelle_restante;
            $domaineCivil->zone_commerciale_parcelle_restante = $request->zone_commerciale_parcelle_restante;
            $domaineCivil->zone_administrative_parcelle_restante = $request->zone_administrative_parcelle_restante;
            $domaineCivil->zone_autre_parcelle_restante = $request->zone_autre_parcelle_restante;

            $domaineCivil->save();

            /*ressource image*/

            $ressourceImage = Data::find($id)->infogs()->first()->ressourceimages()->get();
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




            /* Pcd */
            /* appreciation */

            $appreciation = Data::find($id)->pcds()->first()->appreciations()->first();

            $appreciation->date_de_conception = $request->date_de_conception;
            $appreciation->date_d_expiration = $request->date_d_expiration;
            $appreciation->montant_total = $request->montant_total;
            $appreciation->montant_mobilise = $request->montant_mobilise;
            $appreciation->probleme_majeur = $request->probleme_majeur;
            $appreciation->perpective_dix_mot = $request->perpective_dix_mot;

            $appreciation->save();

            /*satisfaction */

            $satisfaction = Data::find($id)->pcds()->first()->satisfactions()->first();

            $satisfaction->consolider_resilience_tres_satisfaisant = $request->consolider_resilience_tres_satisfaisant;
            $satisfaction->approfondir_reforme_tres_satisfaisant = $request->approfondir_reforme_tres_satisfaisant;
            $satisfaction->consolider_developpement_tres_satisfaisant = $request->consolider_developpement_tres_satisfaisant;
            $satisfaction->dynamiser_secteurs_tres_satisfaisant = $request->dynamiser_secteurs_tres_satisfaisant;

            $satisfaction->consolider_resilience_satisfaisant = $request->consolider_resilience_satisfaisant;
            $satisfaction->approfondir_reforme_satisfaisant = $request->approfondir_reforme_satisfaisant;
            $satisfaction->consolider_developpement_satisfaisant = $request->consolider_developpement_satisfaisant;
            $satisfaction->dynamiser_secteurs_satisfaisant = $request->dynamiser_secteurs_satisfaisant;

            $satisfaction->consolider_resilience_pas_satisfaisant = $request->consolider_resilience_pas_satisfaisant;
            $satisfaction->approfondir_reforme_pas_satisfaisant = $request->approfondir_reforme_pas_satisfaisant;
            $satisfaction->consolider_developpement_pas_satisfaisant = $request->consolider_developpement_pas_satisfaisant;
            $satisfaction->dynamiser_secteurs_pas_satisfaisant = $request->dynamiser_secteurs_pas_satisfaisant;
            $satisfaction->commentaire_appreciation = $request->commentaire_appreciation;

            $satisfaction->save();

            /*Budget */
            /* recette invest */
            
            $recetInvest = Data::find($id)->budgets()->first()->recetInvests()->first();
            $recetInvest->dotation_globale = $request->budget_recet_invest_dotation_globale;
            $recetInvest->subvention_equipement = $request->budget_recet_invest_subvention_equipement;
            $recetInvest->contribution_propre = $request->budget_recet_invest_contribution_propre;
            $recetInvest->dotation_liee = $request->budget_recet_invest_dotation_liee;
            $recetInvest->resultat_exercice = $request->budget_recet_invest_resultat_exercice;
            $recetInvest->autre_subvention = $request->budget_recet_invest_autre_subvention;

            $recetInvest->save();

            /*recette fonct */

            $recetFonct = Data::find($id)->budgets()->first()->recetFoncts()->first();
            $recetFonct->produit_exploitation = $request->budget_recet_fonct_produit_exploitation;
            $recetFonct->produit_domaniaux = $request->budget_recet_fonct_produit_domaniaux;
            $recetFonct->produit_financier = $request->budget_recet_fonct_produit_financier;
            $recetFonct->recouvrement = $request->budget_recet_fonct_recouvrement;
            $recetFonct->produit_diver = $request->budget_recet_fonct_produit_diver;
            $recetFonct->impots_taxe_c_direct = $request->budget_recet_fonct_impots_taxe_c_direct;
            $recetFonct->impots_taxe_indirect = $request->budget_recet_fonct_impots_taxe_indirect;
            $recetFonct->produit_exceptionnel = $request->budget_recet_fonct_produit_exceptionnel;
            $recetFonct->produit_anterieur = $request->budget_recet_fonct_produit_anterieur;
            $recetFonct->autres_dotations = $request->budget_recet_fonct_autres_dotations;

            $recetFonct->save();

            /*depense invest */
            $depensInvest = Data::find($id)->budgets()->first()->depensInvests()->first();
            $depensInvest->etude_recherche = $request->budget_depens_invest_etude_recherche;
            $depensInvest->environnement = $request->budget_depens_invest_environnement;
            $depensInvest->equipement = $request->budget_depens_invest_equipement;
            $depensInvest->batiment = $request->budget_depens_invest_batiment;
            $depensInvest->emprunt = $request->budget_depens_invest_emprunt;
            //$depensInvest->autre_investissement = $request->budget_depens_invest_autre_investissement;
            $depensInvest->deficit_excedent = $request->budget_depens_invest_deficit_excedent;
            
            $depensInvest->save();

            /*depense fonct */
            $depensFonct = Data::find($id)->budgets()->first()->depensFoncts()->first();
            $depensFonct->sante = $request->budget_depens_fonct_sante;
            $depensFonct->appui_scolaire = $request->budget_depens_fonct_appui_scolaire;
            $depensFonct->sport_culture = $request->budget_depens_fonct_sport_culture;
            $depensFonct->participation = $request->budget_depens_fonct_participation;
            $depensFonct->frais_financier = $request->budget_depens_fonct_frais_financier;
            $depensFonct->refection_entretien = $request->budget_depens_fonct_refection_entretien;
            $depensFonct->salaire_indemnite = $request->budget_depens_fonct_salaire_indemnite;
            $depensFonct->entretien_vehicule = $request->budget_depens_fonct_entretien_vehicule;
            $depensFonct->appui_fonctionnement = $request->budget_depens_fonct_appui_fonctionnement;
            $depensFonct->autres_charges_exceptionnel = $request->budget_depens_fonct_autres_charges_exceptionnel;
            $depensFonct->exedent_prelevement = $request->budget_depens_fonct_exedent_prelevement;

            $depensFonct->save();

            /*budget n*/

            /*recette invest*/
            $recetInvestN = Data::find($id)->budgetns()->first()->recetInvestns()->first();
            $recetInvestN->dotation_globale = $request->budget_n_recet_invest_dotation_globale;
            $recetInvestN->subvention_equipement = $request->budget_n_recet_invest_subvention_equipement;
            $recetInvestN->contribution_propre = $request->budget_n_recet_invest_contribution_propre;
            $recetInvestN->dotation_liee = $request->budget_n_recet_invest_dotation_liee;
            $recetInvestN->resultat_exercice = $request->budget_n_recet_invest_resultat_exercice;
            $recetInvestN->autre_dotation = $request->budget_n_recet_invest_autre_dotation;

            $recetInvestN->save();

            /*recette fonct*/
            $recetFonctN = Data::find($id)->budgetns()->first()->recetFonctns()->first();
            $recetFonctN->produit_exploitation = $request->budget_n_recet_fonct_produit_exploitation;
            $recetFonctN->produit_domaniaux = $request->budget_n_recet_fonct_produit_domaniaux;
            $recetFonctN->produit_financier = $request->budget_n_recet_fonct_produit_financier;
            $recetFonctN->recouvrement = $request->budget_n_recet_fonct_recouvrement;
            $recetFonctN->produit_diver = $request->budget_n_recet_fonct_produit_diver;
            $recetFonctN->impots_taxe_c_direct = $request->budget_n_recet_fonct_impots_taxe_c_direct;
            $recetFonctN->impots_taxe_indirect = $request->budget_n_recet_fonct_impots_taxe_indirect;
            $recetFonctN->produit_exceptionnel = $request->budget_n_recet_fonct_produit_exceptionnel;
            $recetFonctN->produit_anterieur = $request->budget_n_recet_fonct_produit_anterieur;

            $recetFonctN->save();

            /*depense invest*/
            $depensInvestN = Data::find($id)->budgetns()->first()->depensInvestns()->first();
            $depensInvestN->etude_recherche = $request->budget_n_depens_invest_etude_recherche;
            $depensInvestN->environnement = $request->budget_n_depens_invest_environnement;
            $depensInvestN->equipement = $request->budget_n_depens_invest_equipement;
            $depensInvestN->batiment = $request->budget_n_depens_invest_batiment;
            $depensInvestN->emprunt = $request->budget_n_depens_invest_emprunt;
            //$depensInvestN->autre_investissement = $request->budget_n_depens_invest_autre_investissement;

            $depensInvestN->save();

            /*depense fonct*/
            $depensFonctN = Data::find($id)->budgetns()->first()->depensFonctns()->first();
            $depensFonctN->sante = $request->budget_n_depens_fonct_sante;
            $depensFonctN->appui_scolaire = $request->budget_n_depens_fonct_appui_scolaire;
            $depensFonctN->sport_culture = $request->budget_n_depens_fonct_sport_culture;
            $depensFonctN->eau_assainissement = $request->budget_n_depens_fonct_eau_assainissement;
            $depensFonctN->participation = $request->budget_n_depens_fonct_participation;
            $depensFonctN->frais_financier = $request->budget_n_depens_fonct_frais_financier;
            $depensFonctN->refection_entretien = $request->budget_n_depens_fonct_refection_entretien;
            $depensFonctN->salaire_indemnite = $request->budget_n_depens_fonct_salaire_indemnite;
            $depensFonctN->entretien_vehicule = $request->budget_n_depens_fonct_entretien_vehicule;
            $depensFonctN->appui_fonctionnement = $request->budget_n_depens_fonct_appui_fonctionnement;
            $depensFonctN->autres_charges_exceptionnel = $request->budget_n_depens_fonct_autres_charges_exceptionnel;
            $depensFonctN->exedent_prelevement = $request->budget_n_depens_fonct_exedent_prelevement;

            $depensFonctN->save();


        }

        if($data == null) {

            //dd('data null');
            //$dataCommune = $this->newDataCommune($request);
            //$dataCommune = $this->getDataCommune($data->id);
            
        }else{
            $dataCommune = $this->getDataCommune($id);
            
        }
        
        Session::flash('enregistrer',"Les données ont été très bien enregistrer.");
        $countries = Country::all();
        $annee = date('Y');
        return view('dataCommune.create', compact('countries','annee', 'dataCommune'));
        
    }

    public function updateCommune(Request $request, $id) {
       
        $dataCommune = null;
        $data = Data::where([
            ['id', $request->data_id_commune],
            ['annee', $request->annee_commune],
            ['user_id', Auth::id()]
        ])->first();

        
        if($data != null){
            $data->commune->superficie = $request->superficie;
            $data->commune->total_population = $request->total_population;
            $data->commune->total_homme = $request->total_homme;
            $data->commune->total_femme = $request->total_femme;
            $data->commune->save();

            if($id != 0){
                $dataCommune = $this->getDataCommune($id);

            }
        }

        //Session::flash('enregistrer',"Les données ont été très bien enregistrer.");
        $countries = Country::all();
        $annee = date('Y');
        return view('dataCommune.create', compact('countries','annee', 'dataCommune'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        $ressourceImages = Data::find($data->id)->infogs()->first()->ressourceImages()->get();
        //dd($ressourceImages);
        foreach($ressourceImages as $rImage){
            $this->deleteImg($rImage->id);
        }
        $data->delete();
        Session::flash('supprimer',"Les données ont bien été supprimées.");
        return back();
    }

    public function h_list(){
        dd('hello');
        return view('historique');
    }

    public function terminer(Data $data) {
        if($data->terminer == 0){
            $data->terminer = 1;
            Session::flash('terminer',"La modification ou insertion des données est bien désactivé.");
            //notify()->success('La modification ou insertion des données est bien désactivé.');
        }else{
            $data->terminer = 0;
            if($data->publier != 0){
                $data->publier = 0;
            }
            Session::flash('non-terminer',"La modification ou insertion des données est bien activé.");
        }
        $data->save();
        return back();
    }

    public function publier(Data $data) {
        if($data->publier == 0){
            if($data->terminer != 0){
                $data->publier = 1;
                Session::flash('publier',"Les données ont bien été publier.");
            }else{
                Session::flash('non-terminer',"La modification ou insertion des données n'est pas encore terminée.");
            }
        }else{
            $data->publier = 0;
            Session::flash('non-publier',"Publication des données annulées.");
        }
        $data->save();
        return back();
    }

        public function deleteImg($id=''){


            $ressourceImage = RessourceImage::where('id',$id)->first();
            if($ressourceImage != null){
                $url = $ressourceImage->url;
                $ressourceImage->url = null;
                $ressourceImage->save();
                Storage::disk('public')->delete($url);
            }
            //Storage::delete();

            //dd($ressourceImage);
            return back();
        }
    public function datasView(Request $request) {

        $countries = Country::all();
        $annee = date('Y');
        $routeName = $request->viewName;
        $id_commune = Commune::where('commune_name', $request->commune)->first();
        $id_commune = isset($request->commune) ? $id_commune->id : '';
        //dd($id_commune);
        $data = Data::where([
            ['commune_id', $id_commune],
            ['annee', $request->annee],
            ['terminer', 1]
        ])->first();
        $slug = 'null';
           if($data != null){
               $slug = $data->slug;
           }

        if($routeName == 'datas.info')
        {
            return redirect()->route('datas.info',$slug);
            
        }

        if($routeName == 'datas.pcd')
        {
            
            return redirect()->route('datas.pcd',$slug);
            
        }

        if($routeName == 'datas.bg')
        {
            return redirect()->route('datas.bg',$slug);
            
        }
        
        if($routeName == 'datas.tdb')
        {
            return redirect()->route('datas.tdb',$slug);
            
        }
       
        //return back()->with(compact('dataCommune'));
    }


    public function newDataCommune(Request $request){

        $data = new Data();
            $data->commune_id = $request->commune;
            $data->user_id = Auth::id();
            $data->annee = $request->annee;
            $data->slug = Str::slug(Str::random(10));
            $saveData = $data->save();

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

            return $this->getDataCommune($data->id);
            
            /*dd(
                //$save,
                $data->id,
                'Commune null: create is ok !',
                $data->user_id,
                $request->country,
                $request->region,
                $request->province,
                $data->commune_id,
                $data->annee,
                $data->slug
            );*/
    }

    public function getDataCommune($data_id) {
        /*dd(
            'Commune non null',
            $data_id,
            [
                "pays" => Data::find($data_id)->commune->province->region->country->country_name,
                "region" => Data::find($data_id)->commune->province->region->region_name,
                "province" => Data::find($data_id)->commune->province->province_name,
                "commune" => Data::find($data_id)->commune->commune_name,
                "depense" => Data::find($data_id)->infogs()->first()->depenses()->get(),
                "dixMeilleur" => Data::find($data_id)->infogs()->first()->dixMeilleurs()->get(),
                "domaineCivil" => Data::find($data_id)->infogs()->first()->domaineCivils()->first(),
                "etatCivil" => Data::find($data_id)->infogs()->first()->etatCivils()->first(),
                "partenaire" => Data::find($data_id)->infogs()->first()->partenaires()->get(),
                "recette" => Data::find($data_id)->infogs()->first()->recettes()->get(),
                "ressourceImage" => Data::find($data_id)->infogs()->first()->ressourceImages()->first(),
                "troisMeilleur" => Data::find($data_id)->infogs()->first()->troisMeilleurs()->get(),

                "appreciation" => Data::find($data_id)->pcds()->first()->appreciations()->first(),
                "satisfaction" => Data::find($data_id)->pcds()->first()->satisfactions()->first(),

                "satisfaction" => Data::find($data_id)->pcds()->first()->satisfactions()->first(),

                "depensFonct" => Data::find($data_id)->budgets()->first()->depensFoncts()->first(),
                "depensInvest" => Data::find($data_id)->budgets()->first()->depensInvests()->first(),
                "recetFonct" => Data::find($data_id)->budgets()->first()->recetFoncts()->first(),
                "recetInvest" => Data::find($data_id)->budgets()->first()->recetInvests()->first(),

                "depensFonctN" => Data::find($data_id)->budgetns()->first()->depensFonctns()->first(),
                "depensInvestN" => Data::find($data_id)->budgetns()->first()->depensInvestns()->first(),
                "recetFonctN" => Data::find($data_id)->budgetns()->first()->recetFonctns()->first(),
                "recetInvestN" => Data::find($data_id)->budgetns()->first()->recetInvestns()->first(),

                

                
                
            ]
        );*/

        /*if($data_id == 0) {
            return [
                "pays" => 'null',
                "region" => 'null',
                "province" => 'null',
                "commune" => 'null',
                "annee" => 'null'
            ];
        }*/
        return [
            "data_id" => $data_id,
            "pays" => Data::find($data_id)->commune->province->region->country->country_name,
            "region" => Data::find($data_id)->commune->province->region->region_name,
            "province" => Data::find($data_id)->commune->province->province_name,
            "commune" => Data::find($data_id)->commune->commune_name,
            "superficie" => Data::find($data_id)->commune->superficie,
            "total_population" => Data::find($data_id)->commune->total_population,
            "total_homme" => Data::find($data_id)->commune->total_homme,
            "total_femme" => Data::find($data_id)->commune->total_femme,
            "annee" => Data::find($data_id)->annee,
            "slug" =>  Data::find($data_id)->slug,

                "recette" => Data::find($data_id)->infogs()->first()->recettes()->get(),
                "depense" => Data::find($data_id)->infogs()->first()->depenses()->get(),
                "dixMeilleur" => Data::find($data_id)->infogs()->first()->dixMeilleurs()->get(),
                "domaineCivil" => Data::find($data_id)->infogs()->first()->domaineCivils()->first(),
                "etatCivil" => Data::find($data_id)->infogs()->first()->etatCivils()->first(),
                "partenaire" => Data::find($data_id)->infogs()->first()->partenaires()->get(),
                "ressourceImage" => Data::find($data_id)->infogs()->first()->ressourceImages()->get(),
                "troisMeilleur" => Data::find($data_id)->infogs()->first()->troisMeilleurs()->get(),

                "appreciation" => Data::find($data_id)->pcds()->first()->appreciations()->first(),
                "satisfaction" => Data::find($data_id)->pcds()->first()->satisfactions()->first(),

                //"satisfaction" => Data::find($data_id)->pcds()->first()->satisfactions()->first(),

                "depensFonct" => Data::find($data_id)->budgets()->first()->depensFoncts()->first(),
                "depensInvest" => Data::find($data_id)->budgets()->first()->depensInvests()->first(),
                "recetFonct" => Data::find($data_id)->budgets()->first()->recetFoncts()->first(),
                "recetInvest" => Data::find($data_id)->budgets()->first()->recetInvests()->first(),

                "depensFonctN" => Data::find($data_id)->budgetns()->first()->depensFonctns()->first(),
                "depensInvestN" => Data::find($data_id)->budgetns()->first()->depensInvestns()->first(),
                "recetFonctN" => Data::find($data_id)->budgetns()->first()->recetFonctns()->first(),
                "recetInvestN" => Data::find($data_id)->budgetns()->first()->recetInvestns()->first(),
            
        ];
    }
}
