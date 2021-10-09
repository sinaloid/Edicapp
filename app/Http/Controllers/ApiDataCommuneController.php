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
        $country = $data[0];
        /*Infog */
        $depenses = $data[1]; 
        $recettes = $data[2];
        $marches = $data[3];
        $villages = $data[4];
        $partenairs = $data[5];
        $etatCivil = $data[6];
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
       


        //Country::create(['country_name' => json_encode($data), 'indicatif' => 1, 'slug' => json_encode($data[0])]);
        //dd($data[0]['data']['id_depense']);
        //dd($data[0]['data']['id_depense']);
        $message = $this->findOrCreateData($country);
        //dd($depensNInvests);
        if(1){
            return response()->json([
                "data" => $data,
                "status" => 200,
                "message" => $message
            ], 200);
        } else {
            return response()->json([
                "data" => $data,
                "status" => 400,
                "message" => $message
            ], 200);
        }
    }

    public function findOrCreateData($request){

        //dd($request);
        $request['id_commune'] = Commune::where('commune_name', $request['commune'])->first()->id;
        $data = Data::where([
            ['commune_id', $request['id_commune']],
            ['annee', $request['annee']],
            //['user_id', Auth::id()]
        ])->first();
            //dd($data);
        if($data == null) {
            $dataCommune = $this->newDataCommune($request);
            //dd($dataCommune);
            //$dataCommune = $this->getDataCommune($data->id);
            return "envoyé avec succès !";
        }else{
            //$dataCommune = $this->getDataCommune($data->id);
            return "échec d'envoi, les données existent déjâ!";
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
    public function update(Request $request, $id)
    {
        //
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

    public function newDataCommune($request){

        $data = new Data();
            $data->commune_id = $request['id_commune'];
            $data->user_id = 1; // Auth::id();
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

            //return $this->getDataCommune($data->id);
            
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
}
