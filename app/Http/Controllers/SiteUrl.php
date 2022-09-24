<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*A supprimer*/
use App\Models\Countries\{ Region, Country, Province, Commune };
use App\Models\User;
//use App\Models\Datas\Data;
//use App\Models\Datas\Infog\Infog;
//use App\Models\Datas\Infog\Tables\TroisMeilleurs;
/*use App\Gestion\Data as GData;
use App\Gestion\Budget\Budget as GBudget;
use App\Gestion\Budgetn\Budgetn as GBudgetn;
use App\Gestion\Infog\Infog as GInfog;
use App\Gestion\Infog\EtatCivil;
use App\Gestion\Infog\EtatCivil\EtatNombre;
use App\Gestion\Infog\EtatCivil\Observation;*/
use Illuminate\Support\Str;

use App\Models\Datas\Data;
use App\Models\Datas\Infog\Infog;
use App\Models\Datas\Infog\Tables\{Recettes, Depenses, DixMeilleurs, DomaineCivil, EtatCivil, Partenaires, RessourceImage, TroisMeilleurs};
use App\Models\Datas\Pcd\Pcd;
use App\Models\Datas\Pcd\Tables\{Appreciation, Satisfaction};
use App\Models\Datas\Budget\Budget;
use App\Models\Datas\Budget\Tables\{DepensFonct, DepensInvest, RecetFonct, RecetInvest};
use App\Models\Datas\BudgetN\BudgetN;
use App\Models\Datas\BudgetN\Tables\{DepensFonctN, DepensInvestN, RecetFonctN, RecetInvestN};

use PDF;
use Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

//use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{

    public function __construct(String $routeOrigin, String $slug)
    {
        $this->slug = $slug;
    }

    public function view(): View
    {
        return view('excel_tdb', [
            'invoices' => [
                ["name" => $this->slug,
                "email" => "ilanis"],
                ["name" => "ounoid",
                "email" => "sinali"],
            ]
        ]);
    }
}

class SiteUrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
     /*public function pdf(){
        $countries = Country::all();
        //$pdf = PDF::loadView('', compact('countries'));
        $pdf = PDF::loadView('index', compact('countries'))
        ->setPaper('a4', 'landscape')
        ->setWarnings(false);
        //$pdf->save(storage_path().'_edic.pdf');
        //$pdf->save(public_path("storage/documents/edic.pdf"));
        return $pdf->download('edic.pdf');
     }*/
    
    public function index(Request $request)
    {
        $commune = isset($request->commune) ? $request->commune : '';
        $commune_id = Commune::where('commune_name',$commune)->first();
        $commune_id = isset($commune_id) ? $commune_id->id : null;
        $dataCommune = null;
        if(isset($commune_id)){
            $dataCommune = Data::where([
                ['commune_id', $commune_id],
                ['annee', $request->annee],
                ['terminer', 1]
            ])->first();
        }
        if( !isset($dataCommune)){
            $dataCommune = Data::where('terminer',1)->first();
            // message session data non trouver
        }
        $troisMeilleur = null;
        if(isset($dataCommune)){
            $dataCommune = Data::where('terminer',1)->get()->random(1)->first();
            $troisMeilleur = $dataCommune->infogs()->first()->troisMeilleurs()->get();
            //dd($troisMeilleur);
        }

        /*dd(
            Commune::all()->random(1)->first()->commune_name
        );*/
        //$marches = json_encode($troisMeilleur);
        return view('index', compact('troisMeilleur', 'dataCommune'));
    }

    public function actualites(){

        return view('actualites');
        
    }

    public function actualiteDetail(){

        return view('actualiteDetail');
        
    }

    
    public function datasInfo($slug = ''){
         $countries = Country::all();
         $data = Data::where('slug',$slug)->first();
         if($data != null){
            $dataCommune = $this->getDataCommune($data->id, 'datas.info'); 
         }else{
            $dataCommune = null; 
         }
        return view('pages.menu.minfo',compact('countries', 'dataCommune'));
        
    }

    public function datasPcd($slug = ''){
        $countries = Country::all();
         $data = Data::where('slug',$slug)->first();
         //dd($data);
         if($data != null){
            $dataCommune = $this->getDataCommune($data->id, 'datas.pcd');
         }else{
            $dataCommune = null; 
         }
        return view('pages.menu.mpcd',compact('countries', 'dataCommune'));
        
    }

    public function datasBudget($slug = ''){
        $countries = Country::all();
         $data = Data::where('slug',$slug)->first();
         //dd($data);
         if($data != null){
            $dataCommune = $this->getDataCommune($data->id, 'budget');
         }else{
            $dataCommune = null; 
         }
        return view('pages.menu.mbudget',compact('countries', 'dataCommune'));
        
    }

    public function getBudget($slug = '') {
        $countries = Country::all();
         $data = Data::where('slug',$slug)->first();
         //dd($data);
         if($data != null){
            $dataCommune = $this->getDataCommune($data->id, 'budget');
         }else{
            $dataCommune = null; 
         }

        return view('pages.includes.budget',compact('countries', 'dataCommune'));
    }

    public function getBudgetN($slug = '') {
        $countries = Country::all();
         $data = Data::where('slug',$slug)->first();
         //dd($data);
         if($data != null){
            $dataCommune = $this->getDataCommune($data->id, 'budgetn');
         }else{
            $dataCommune = null; 
         }

        return view('pages.includes.budgetn',compact('countries', 'dataCommune'));
    }

    public function datasTdb($tdbType='',$slug = ''){
        $countries = Country::all();
         $data = Data::where('slug',$slug)->first();
         if($slug === ''){
            $data = Data::where('slug',$tdbType)->first();  
         }
         //dd($data);
         if($data != null){
            $dataCommune = $this->getDataCommune($data->id, 'datas.tdb');
         }else{
            $dataCommune = null; 
         }

         return view('pages.menu.mtdb',compact('countries', 'dataCommune'));
         
        
        
    }

    public function Compare(){

        $countries = Country::all();
        return view('pages.compare', compact('countries'));
        
    }
    public function datasCompare(Request $request){

        $this->validate($request, [
            'commune_1' => 'required',
            'annee' => 'required'
        ]);
        $id_commune_1 = Commune::where('commune_name',$request->commune_1)->first();
        $id_commune_1 = isset($id_commune_1) ? $id_commune_1->id : null;

        $id_commune_2 = Commune::where('commune_name',$request->commune_2)->first();
        $id_commune_2 = isset($id_commune_2) ? $id_commune_2->id : null;

        $id_commune_3 = Commune::where('commune_name',$request->commune_3)->first();
        $id_commune_3 = isset($id_commune_3) ? $id_commune_3->id : null;

        $id_commune_4 = Commune::where('commune_name',$request->commune_4)->first();
        $id_commune_4 = isset($id_commune_4) ? $id_commune_4->id : null;

        $dataCompare = [
            /*"pays" => isset($request->country) ? Country::find($request->country)->country_name : '',
            "region" => isset($request->region) ? Region::find($request->region)->region_name : '',
            "region_2" => isset($request->region_2) ? Region::find($request->region_2)->region_name : '',
            "province" => isset($request->province) ? Province::find($request->province)->province_name : '',
            "province_2" => isset($request->province_2) ? Province::find($request->province_2)->province_name : '',*/
            "commune_1" => isset($id_commune_1) ? Commune::find($id_commune_1)->commune_name : '',
            "commune_2" => isset($id_commune_2) ? Commune::find($id_commune_2)->commune_name : '',
            "commune_3" => isset($id_commune_3) ? Commune::find($id_commune_3)->commune_name : '',
            "commune_4" => isset($id_commune_4) ? Commune::find($id_commune_4)->commune_name : '',
            "data_commune_1" => isset($id_commune_1) ? (Commune::find($id_commune_1)->data()->where('annee', $request->annee)->first() != null) ? Commune::find($id_commune_1)->data()->where('annee', $request->annee)->first()->slug : '' : '',
            "data_commune_2" => isset($id_commune_2) ? (Commune::find($id_commune_2)->data()->where('annee', $request->annee)->first() != null) ? Commune::find($id_commune_2)->data()->where('annee', $request->annee)->first()->slug : '' : '',
            "data_commune_3" => isset($id_commune_3) ? (Commune::find($id_commune_3)->data()->where('annee', $request->annee)->first() != null) ? Commune::find($id_commune_3)->data()->where('annee', $request->annee)->first()->slug : '' : '',
            "data_commune_4" => isset($id_commune_4) ? (Commune::find($id_commune_4)->data()->where('annee', $request->annee)->first() != null) ? Commune::find($id_commune_4)->data()->where('annee', $request->annee)->first()->slug : '' : '',
            "annee" => $request->annee
        ];

        //dd($dataCompare);


        return view('pages.viewData', compact('dataCompare'));
        
    }

    public function getDatasCompare($req){

        $request = json_decode($req);
        $response = [
            "id" => $request->id,
            "labels" => null,
            "name" => null,
            "commune_1" => null,
            "commune_2" => null,
            "commune_3" => null,
            "commune_4" => null,
            "data1" => null,
            "data2" => null,
            "data3" => null,
            "data4" => null,
        ];

        //Info g
        //recette fonct
        if($request->id == "recetteFonct"){

            
            $response['name'] = "Info G : Recettes de fonctionnement";
            if($request->slug1 != null){
                $labels = Data::where('slug',$request->slug1)->first()->infogs()->first()->recettes()->pluck('annee');
                $response['labels'] = $labels;

                $data1 = Data::where('slug',$request->slug1)->first()->infogs()->first()->recettes()->pluck('fonctionnement');
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                $labels = Data::where('slug',$request->slug2)->first()->infogs()->first()->recettes()->pluck('annee');
                $response['labels'] = $labels;

                $data2 = Data::where('slug',$request->slug2)->first()->infogs()->first()->recettes()->pluck('fonctionnement');
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                $labels = Data::where('slug',$request->slug3)->first()->infogs()->first()->recettes()->pluck('annee');
                $response['labels'] = $labels;

                $data3 = Data::where('slug',$request->slug3)->first()->infogs()->first()->recettes()->pluck('fonctionnement');
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                $labels = Data::where('slug',$request->slug4)->first()->infogs()->first()->recettes()->pluck('annee');
                $response['labels'] = $labels;

                $data4 = Data::where('slug',$request->slug4)->first()->infogs()->first()->recettes()->pluck('fonctionnement');
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }
        //recette Invest
        if($request->id == "recetteInvest"){

            
            $response['name'] = "Info G : Recettes d'investissement";
            if($request->slug1 != null){
                $labels = Data::where('slug',$request->slug1)->first()->infogs()->first()->recettes()->pluck('annee');
                $response['labels'] = $labels;

                $data1 = Data::where('slug',$request->slug1)->first()->infogs()->first()->recettes()->pluck('investissement');
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                $labels = Data::where('slug',$request->slug2)->first()->infogs()->first()->recettes()->pluck('annee');
                $response['labels'] = $labels;

                $data2 = Data::where('slug',$request->slug2)->first()->infogs()->first()->recettes()->pluck('investissement');
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                $labels = Data::where('slug',$request->slug3)->first()->infogs()->first()->recettes()->pluck('annee');
                $response['labels'] = $labels;

                $data3 = Data::where('slug',$request->slug3)->first()->infogs()->first()->recettes()->pluck('investissement');
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                $labels = Data::where('slug',$request->slug4)->first()->infogs()->first()->recettes()->pluck('annee');
                $response['labels'] = $labels;

                $data4 = Data::where('slug',$request->slug4)->first()->infogs()->first()->recettes()->pluck('investissement');
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        // depense invest
        if($request->id == "depenseFonct"){

            $response['name'] = "Info G : Dépenses de fonctionnement";
            if($request->slug1 != null){
                $labels = Data::where('slug',$request->slug1)->first()->infogs()->first()->depenses()->pluck('annee');
                $response['labels'] = $labels;

                $data1 = Data::where('slug',$request->slug1)->first()->infogs()->first()->depenses()->pluck('fonctionnement');
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                $labels = Data::where('slug',$request->slug2)->first()->infogs()->first()->depenses()->pluck('annee');
                $response['labels'] = $labels;

                $data2 = Data::where('slug',$request->slug2)->first()->infogs()->first()->depenses()->pluck('fonctionnement');
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                $labels = Data::where('slug',$request->slug3)->first()->infogs()->first()->depenses()->pluck('annee');
                $response['labels'] = $labels;

                $data3 = Data::where('slug',$request->slug3)->first()->infogs()->first()->depenses()->pluck('fonctionnement');
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                $labels = Data::where('slug',$request->slug4)->first()->infogs()->first()->depenses()->pluck('annee');
                $response['labels'] = $labels;

                $data4 = Data::where('slug',$request->slug4)->first()->infogs()->first()->depenses()->pluck('fonctionnement');
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }
        //depense Invest
        if($request->id == "depenseInvest"){

            $response['name'] = "Info G : Dépenses d'investissement";
            if($request->slug1 != null){
                $labels = Data::where('slug',$request->slug1)->first()->infogs()->first()->depenses()->pluck('annee');
                $response['labels'] = $labels;

                $data1 = Data::where('slug',$request->slug1)->first()->infogs()->first()->depenses()->pluck('investissement');
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                $labels = Data::where('slug',$request->slug2)->first()->infogs()->first()->depenses()->pluck('annee');
                $response['labels'] = $labels;

                $data2 = Data::where('slug',$request->slug2)->first()->infogs()->first()->depenses()->pluck('investissement');
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                $labels = Data::where('slug',$request->slug3)->first()->infogs()->first()->depenses()->pluck('annee');
                $response['labels'] = $labels;

                $data3 = Data::where('slug',$request->slug3)->first()->infogs()->first()->depenses()->pluck('investissement');
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                $labels = Data::where('slug',$request->slug4)->first()->infogs()->first()->depenses()->pluck('annee');
                $response['labels'] = $labels;

                $data4 = Data::where('slug',$request->slug4)->first()->infogs()->first()->depenses()->pluck('investissement');
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        //Trois meilleurs attendu
        if($request->id == "marchesAttendu"){

            $response['name'] = "Info G : Contribution des trois meilleurs marchés (attendu)";
            $response['labels'] = ['marché 1','marché 2','marché 3'];
            if($request->slug1 != null){

                $data1 = Data::where('slug',$request->slug1)->first()->infogs()->first()->troismeilleurs()->pluck('attendu');
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $data2 = Data::where('slug',$request->slug2)->first()->infogs()->first()->troismeilleurs()->pluck('attendu');
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $data3 = Data::where('slug',$request->slug3)->first()->infogs()->first()->troismeilleurs()->pluck('attendu');
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $data4 = Data::where('slug',$request->slug4)->first()->infogs()->first()->troismeilleurs()->pluck('attendu');
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        // Trois meilleurs mobilisé
        if($request->id == "marchesMobilise"){

            $response['name'] = "Info G : Contribution des trois meilleurs marchés (mobilisé)";
            $response['labels'] = ['marché 1','marché 2','marché 3'];
            if($request->slug1 != null){

                $data1 = Data::where('slug',$request->slug1)->first()->infogs()->first()->troismeilleurs()->pluck('contribution');
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $data2 = Data::where('slug',$request->slug2)->first()->infogs()->first()->troismeilleurs()->pluck('contribution');
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $data3 = Data::where('slug',$request->slug3)->first()->infogs()->first()->troismeilleurs()->pluck('contribution');
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $data4 = Data::where('slug',$request->slug4)->first()->infogs()->first()->troismeilleurs()->pluck('contribution');
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        //Dix meilleurs attendu
        if($request->id == "villagesAttendu"){

            $response['name'] = "Info G : Contribution des dix meilleurs villages (attendu)";
            $response['labels'] = ['village 1','village 2','village 3',
            'village 4','village 5','village 6','village 7','village 8','village 9','village 10',
            ];
            if($request->slug1 != null){

                $data1 = Data::where('slug',$request->slug1)->first()->infogs()->first()->dixmeilleurs()->pluck('attendu');
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $data2 = Data::where('slug',$request->slug2)->first()->infogs()->first()->dixmeilleurs()->pluck('attendu');
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $data3 = Data::where('slug',$request->slug3)->first()->infogs()->first()->dixmeilleurs()->pluck('attendu');
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $data4 = Data::where('slug',$request->slug4)->first()->infogs()->first()->dixmeilleurs()->pluck('attendu');
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        // dix meilleurs mobilisé
        if($request->id == "villagesMobilise"){

            $response['name'] = "Info G : Contribution des dix meilleurs villages (mobilisé)";
            $response['labels'] = ['village 1','village 2','village 3',
            'village 4','village 5','village 6','village 7','village 8','village 9','village 10',
            ];
            if($request->slug1 != null){

                $data1 = Data::where('slug',$request->slug1)->first()->infogs()->first()->dixmeilleurs()->pluck('mobilise');
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $data2 = Data::where('slug',$request->slug2)->first()->infogs()->first()->dixmeilleurs()->pluck('mobilise');
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $data3 = Data::where('slug',$request->slug3)->first()->infogs()->first()->dixmeilleurs()->pluck('mobilise');
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $data4 = Data::where('slug',$request->slug4)->first()->infogs()->first()->dixmeilleurs()->pluck('mobilise');
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        // etat civil
        if($request->id == "etatCivil"){
       
            $response['name'] = "Info G : Etat civil";
            $response['labels'] = ['naissances',
                'actes de naissances',
                'actes de décès',
                'mariages célébrés',
                'autres actes',
                //'vente de timbre'
            ];
            if($request->slug1 != null){

                $tmp = Data::where('slug',$request->slug1)->first()->infogs()->first()->etatcivils()->first();
                $data1 = [
                    $tmp->naissance_nombre,
                    $tmp->acte_de_naissance_nombre,
                    $tmp->acte_de_deces_nombre,
                    $tmp->mariage_celebre_nombre,
                    $tmp->autre_acte_nombre,
                    //$tmp->vente_timbre_nombre,
                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->infogs()->first()->etatcivils()->first();
                $data2 = [
                    $tmp->naissance_nombre,
                    $tmp->acte_de_naissance_nombre,
                    $tmp->acte_de_deces_nombre,
                    $tmp->mariage_celebre_nombre,
                    $tmp->autre_acte_nombre,
                    //$tmp->vente_timbre_nombre,
                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->infogs()->first()->etatcivils()->first();
                $data3 = [
                    $tmp->naissance_nombre,
                    $tmp->acte_de_naissance_nombre,
                    $tmp->acte_de_deces_nombre,
                    $tmp->mariage_celebre_nombre,
                    $tmp->autre_acte_nombre,
                    //$tmp->vente_timbre_nombre,
                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->infogs()->first()->etatcivils()->first();
                $data4 = [
                    $tmp->naissance_nombre,
                    $tmp->acte_de_naissance_nombre,
                    $tmp->acte_de_deces_nombre,
                    $tmp->mariage_celebre_nombre,
                    $tmp->autre_acte_nombre,
                    //$tmp->vente_timbre_nombre,
                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }
        //situation Domaniale
        if($request->id == "situationDomaniale"){
 
            $response['name'] = "Info G : Situation domaniale";
            $response['labels'] = ['Parcelles Dégagées',
                'Parcelles attribuées',
                'Parcelles restantes',
            ];
            if($request->slug1 != null){

                

                $tmp = Data::where('slug',$request->slug1)->first()->infogs()->first()->domainecivils()->first();
                $data1 = [
                     $tmp->zone_habitation_parcelle_degagee 
                    + $tmp->zone_commerciale_parcelle_degagee 
                    + $tmp->zone_administrative_parcelle_degagee 
                    + $tmp->zone_autre_parcelle_degagee,
                      $tmp->zone_habitation_parcelle_attribuee 
                    + $tmp->zone_commerciale_parcelle_attribuee 
                    + $tmp->zone_administrative_parcelle_attribuee 
                    + $tmp->zone_autre_parcelle_attribuee,
                      $tmp->zone_habitation_parcelle_restante 
                    + $tmp->zone_commerciale_parcelle_restante 
                    + $tmp->zone_administrative_parcelle_restante 
                    + $tmp->zone_autre_parcelle_restante 
                  
                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->infogs()->first()->domainecivils()->first();
                $data2 = [
                    $tmp->zone_habitation_parcelle_degagee 
                   + $tmp->zone_commerciale_parcelle_degagee 
                   + $tmp->zone_administrative_parcelle_degagee 
                   + $tmp->zone_autre_parcelle_degagee,
                     $tmp->zone_habitation_parcelle_attribuee 
                   + $tmp->zone_commerciale_parcelle_attribuee 
                   + $tmp->zone_administrative_parcelle_attribuee 
                   + $tmp->zone_autre_parcelle_attribuee,
                     $tmp->zone_habitation_parcelle_restante 
                   + $tmp->zone_commerciale_parcelle_restante 
                   + $tmp->zone_administrative_parcelle_restante 
                   + $tmp->zone_autre_parcelle_restante 
               ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->infogs()->first()->domainecivils()->first();
                $data3 = [
                    $tmp->zone_habitation_parcelle_degagee 
                   + $tmp->zone_commerciale_parcelle_degagee 
                   + $tmp->zone_administrative_parcelle_degagee 
                   + $tmp->zone_autre_parcelle_degagee,
                     $tmp->zone_habitation_parcelle_attribuee 
                   + $tmp->zone_commerciale_parcelle_attribuee 
                   + $tmp->zone_administrative_parcelle_attribuee 
                   + $tmp->zone_autre_parcelle_attribuee,
                     $tmp->zone_habitation_parcelle_restante 
                   + $tmp->zone_commerciale_parcelle_restante 
                   + $tmp->zone_administrative_parcelle_restante 
                   + $tmp->zone_autre_parcelle_restante  
               ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->infogs()->first()->domainecivils()->first();
                $data4 = [
                    $tmp->zone_habitation_parcelle_degagee 
                   + $tmp->zone_commerciale_parcelle_degagee 
                   + $tmp->zone_administrative_parcelle_degagee 
                   + $tmp->zone_autre_parcelle_degagee,
                     $tmp->zone_habitation_parcelle_attribuee 
                   + $tmp->zone_commerciale_parcelle_attribuee 
                   + $tmp->zone_administrative_parcelle_attribuee 
                   + $tmp->zone_autre_parcelle_attribuee,
                     $tmp->zone_habitation_parcelle_restante 
                   + $tmp->zone_commerciale_parcelle_restante 
                   + $tmp->zone_administrative_parcelle_restante 
                   + $tmp->zone_autre_parcelle_restante 
               ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }
        
        //Budget
        //recette invest
        if($request->id == "recetInves"){
 
            $response['name'] = "Budget ".$request->annee." : Recettes d'investissement";
            $response['labels'] = ['Dotation globale',
                'Subventions d’équipement',
                'Contribution propre/Réserves',
                'Dotations liées aux compétences transférées',
                'Résultats exercices ant. Excédent/déficit Inv Rep',
                'Autres subventions d’équipement',
            ];
            if($request->slug1 != null){

                $tmp = Data::where('slug',$request->slug1)->first()->budgets()->first()->recetinvests()->first();
                $data1 = [
                    $tmp->dotation_globale, 
                    $tmp->subvention_equipement, 
                    $tmp->contribution_propre, 
                    $tmp->dotation_liee,
                    $tmp->resultat_exercice, 
                    $tmp->autre_subvention,
                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->budgets()->first()->recetinvests()->first();
                $data2 = [
                    $tmp->dotation_globale, 
                    $tmp->subvention_equipement, 
                    $tmp->contribution_propre, 
                    $tmp->dotation_liee,
                    $tmp->resultat_exercice, 
                    $tmp->autre_subvention,
                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->budgets()->first()->recetinvests()->first();
                $data3 = [
                    $tmp->dotation_globale, 
                    $tmp->subvention_equipement, 
                    $tmp->contribution_propre, 
                    $tmp->dotation_liee,
                    $tmp->resultat_exercice, 
                    $tmp->autre_subvention,
                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->budgets()->first()->recetinvests()->first();
                $data4 = [
                    $tmp->dotation_globale, 
                    $tmp->subvention_equipement, 
                    $tmp->contribution_propre, 
                    $tmp->dotation_liee,
                    $tmp->resultat_exercice, 
                    $tmp->autre_subvention,
                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        //recette fonct
        if($request->id == "recetFonct"){
 
            $response['name'] = "Budget ".$request->annee." : Recettes de fonctionnement";
            $response['labels'] = ['Produits de l’exploitation',
                'Produits domaniaux',
                'Produits financiers',
                'Recouvrements et participations',
                'Produits divers',
                'Impôts taxes et contributions directes',
                'Impôts et taxes indirects',
                'Produits exceptionnels',
                'Produits antérieurs',
                'Autres dotations de transfert',
            ];

            if($request->slug1 != null){

                $tmp = Data::where('slug',$request->slug1)->first()->budgets()->first()->recetfoncts()->first();
                $data1 = [
                    $tmp->produit_exploitation, 
                    $tmp->produit_domaniaux, 
                    $tmp->produit_financier, 
                    $tmp->recouvrement,
                    $tmp->produit_diver, 
                    $tmp->impots_taxe_c_direct,
                    $tmp->impots_taxe_indirect,
                    $tmp->produit_exceptionnel,
                    $tmp->produit_anterieur,
                    $tmp->autres_dotations,
                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->budgets()->first()->recetfoncts()->first();
                $data2 = [
                    $tmp->produit_exploitation, 
                    $tmp->produit_domaniaux, 
                    $tmp->produit_financier, 
                    $tmp->recouvrement,
                    $tmp->produit_diver, 
                    $tmp->impots_taxe_c_direct,
                    $tmp->impots_taxe_indirect,
                    $tmp->produit_exceptionnel,
                    $tmp->produit_anterieur,
                    $tmp->autres_dotations,
                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->budgets()->first()->recetfoncts()->first();
                $data3 = [
                    $tmp->produit_exploitation, 
                    $tmp->produit_domaniaux, 
                    $tmp->produit_financier, 
                    $tmp->recouvrement,
                    $tmp->produit_diver, 
                    $tmp->impots_taxe_c_direct,
                    $tmp->impots_taxe_indirect,
                    $tmp->produit_exceptionnel,
                    $tmp->produit_anterieur,
                    $tmp->autres_dotations,
                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->budgets()->first()->recetfoncts()->first();
                $data4 = [
                    $tmp->produit_exploitation, 
                    $tmp->produit_domaniaux, 
                    $tmp->produit_financier, 
                    $tmp->recouvrement,
                    $tmp->produit_diver, 
                    $tmp->impots_taxe_c_direct,
                    $tmp->impots_taxe_indirect,
                    $tmp->produit_exceptionnel,
                    $tmp->produit_anterieur,
                    $tmp->autres_dotations,
                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }
        
        //depense invest
        if($request->id == "depensInvest"){
 
            $response['name'] = "Budget ".$request->annee." : Dépenses d'investissement";
            $response['labels'] = ['Études & Recherches',
                'Environnement',
                'Équipement',
                'Bâtiment',
                'Emprunt',
                '	Déficit / Excédent d’investissement exer anté',
            ];

            if($request->slug1 != null){
          
                $tmp = Data::where('slug',$request->slug1)->first()->budgets()->first()->depensInvests()->first();
                $data1 = [
                    $tmp->etude_recherche, 
                    $tmp->environnement, 
                    $tmp->equipement, 
                    $tmp->batiment,
                    $tmp->emprunt, 
                    $tmp->autre_investissement,
                    $tmp->deficit_excedent,
                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->budgets()->first()->depensInvests()->first();
                $data2 = [
                    $tmp->etude_recherche, 
                    $tmp->environnement, 
                    $tmp->equipement, 
                    $tmp->batiment,
                    $tmp->emprunt, 
                    $tmp->autre_investissement,
                    $tmp->deficit_excedent,
                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->budgets()->first()->depensInvests()->first();
                $data3 = [
                    $tmp->etude_recherche, 
                    $tmp->environnement, 
                    $tmp->equipement, 
                    $tmp->batiment,
                    $tmp->emprunt, 
                    $tmp->autre_investissement,
                    $tmp->deficit_excedent,
                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->budgets()->first()->depensInvests()->first();
                $data4 = [
                    $tmp->etude_recherche, 
                    $tmp->environnement, 
                    $tmp->equipement, 
                    $tmp->batiment,
                    $tmp->emprunt, 
                    $tmp->autre_investissement,
                    $tmp->deficit_excedent,
                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        //Depense fonct
        if($request->id == "depensFonct"){
 
            $response['name'] = "Budget ".$request->annee." : Dépenses de fonctionnement";
            $response['labels'] = ['Santé',
                'Appui scolaire',
                'Sport & culture & jeunesse',
                'Participation et prestation',
                'Frais financier',
                'Réfection /entretien bâtiment',
                'Salaires & Indemnités',
                'Entretien véhicules & autres',
                'Appui Fonctionnement /Autres dépenses ',
                'Autres charges exceptionnels',
                'Excédent / Prélèvement',
            ];

            if($request->slug1 != null){
               
                $tmp = Data::where('slug',$request->slug1)->first()->budgets()->first()->depensFoncts()->first();
                $data1 = [
                    $tmp->sante, 
                    $tmp->appui_scolaire, 
                    $tmp->sport_culture, 
                    $tmp->participation,
                    $tmp->frais_financier, 
                    $tmp->refection_entretien,
                    $tmp->salaire_indemnite,
                    $tmp->entretien_vehicule,
                    $tmp->appui_fonctionnement,
                    $tmp->exedent_prelevement,

                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->budgets()->first()->depensFoncts()->first();
                $data2 = [
                    $tmp->sante, 
                    $tmp->appui_scolaire, 
                    $tmp->sport_culture, 
                    $tmp->participation,
                    $tmp->frais_financier, 
                    $tmp->refection_entretien,
                    $tmp->salaire_indemnite,
                    $tmp->entretien_vehicule,
                    $tmp->appui_fonctionnement,
                    $tmp->exedent_prelevement,

                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->budgets()->first()->depensFoncts()->first();
                $data3 = [
                    $tmp->sante, 
                    $tmp->appui_scolaire, 
                    $tmp->sport_culture, 
                    $tmp->participation,
                    $tmp->frais_financier, 
                    $tmp->refection_entretien,
                    $tmp->salaire_indemnite,
                    $tmp->entretien_vehicule,
                    $tmp->appui_fonctionnement,
                    $tmp->exedent_prelevement,

                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->budgets()->first()->depensFoncts()->first();
                $data4 = [
                    $tmp->sante, 
                    $tmp->appui_scolaire, 
                    $tmp->sport_culture, 
                    $tmp->participation,
                    $tmp->frais_financier, 
                    $tmp->refection_entretien,
                    $tmp->salaire_indemnite,
                    $tmp->entretien_vehicule,
                    $tmp->appui_fonctionnement,
                    $tmp->exedent_prelevement,

                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        //Budget n+
        //recette invest
        if($request->id == "recetInvestn"){
 
            $response['name'] = "Budget n+ (".($request->annee + 1).") : Recettes d'investissement";
            $response['labels'] = ['Dotation globale',
                'Subventions d’équipement',
                'Contribution propre/Réserves',
                'Dotations liées aux compétences transférées',
                'Résultats exercices ant. Excédent/déficit Inv Rep',
                'Autres subventions d’équipement',
            ];
            if($request->slug1 != null){

                $tmp = Data::where('slug',$request->slug1)->first()->budgetns()->first()->recetinvestns()->first();
                $data1 = [
                    $tmp->dotation_globale, 
                    $tmp->subvention_equipement, 
                    $tmp->contribution_propre, 
                    $tmp->dotation_liee,
                    $tmp->resultat_exercice, 
                    $tmp->autre_subvention,
                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->budgetns()->first()->recetinvestns()->first();
                $data2 = [
                    $tmp->dotation_globale, 
                    $tmp->subvention_equipement, 
                    $tmp->contribution_propre, 
                    $tmp->dotation_liee,
                    $tmp->resultat_exercice, 
                    $tmp->autre_subvention,
                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->budgetns()->first()->recetinvestns()->first();
                $data3 = [
                    $tmp->dotation_globale, 
                    $tmp->subvention_equipement, 
                    $tmp->contribution_propre, 
                    $tmp->dotation_liee,
                    $tmp->resultat_exercice, 
                    $tmp->autre_subvention,
                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->budgetns()->first()->recetinvestns()->first();
                $data4 = [
                    $tmp->dotation_globale, 
                    $tmp->subvention_equipement, 
                    $tmp->contribution_propre, 
                    $tmp->dotation_liee,
                    $tmp->resultat_exercice, 
                    $tmp->autre_subvention,
                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        //recette fonct
        if($request->id == "recetFonctn"){
 
            $response['name'] = "Budget n+ (".($request->annee + 1).") : Recettes de fonctionnement";
            $response['labels'] = ['Produits de l’exploitation',
                'Produits domaniaux',
                'Produits financiers',
                'Recouvrements et participations',
                'Produits divers',
                'Impôts taxes et contributions directes',
                'Impôts et taxes indirects',
                'Produits exceptionnels',
                'Produits antérieurs',
                //'Autres dotations de transfert',
            ];

            if($request->slug1 != null){

                $tmp = Data::where('slug',$request->slug1)->first()->budgetns()->first()->recetfonctns()->first();
                $data1 = [
                    $tmp->produit_exploitation, 
                    $tmp->produit_domaniaux, 
                    $tmp->produit_financier, 
                    $tmp->recouvrement,
                    $tmp->produit_diver, 
                    $tmp->impots_taxe_c_direct,
                    $tmp->impots_taxe_indirect,
                    $tmp->produit_exceptionnel,
                    $tmp->produit_anterieur,
                    //$tmp->autres_dotations,
                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->budgetns()->first()->recetfonctns()->first();
                $data2 = [
                    $tmp->produit_exploitation, 
                    $tmp->produit_domaniaux, 
                    $tmp->produit_financier, 
                    $tmp->recouvrement,
                    $tmp->produit_diver, 
                    $tmp->impots_taxe_c_direct,
                    $tmp->impots_taxe_indirect,
                    $tmp->produit_exceptionnel,
                    $tmp->produit_anterieur,
                    //$tmp->autres_dotations,
                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->budgetns()->first()->recetfonctns()->first();
                $data3 = [
                    $tmp->produit_exploitation, 
                    $tmp->produit_domaniaux, 
                    $tmp->produit_financier, 
                    $tmp->recouvrement,
                    $tmp->produit_diver, 
                    $tmp->impots_taxe_c_direct,
                    $tmp->impots_taxe_indirect,
                    $tmp->produit_exceptionnel,
                    $tmp->produit_anterieur,
                   // $tmp->autres_dotations,
                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->budgetns()->first()->recetfonctns()->first();
                $data4 = [
                    $tmp->produit_exploitation, 
                    $tmp->produit_domaniaux, 
                    $tmp->produit_financier, 
                    $tmp->recouvrement,
                    $tmp->produit_diver, 
                    $tmp->impots_taxe_c_direct,
                    $tmp->impots_taxe_indirect,
                    $tmp->produit_exceptionnel,
                    $tmp->produit_anterieur,
                    //$tmp->autres_dotations,
                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }
        
        //depense invest
        if($request->id == "depensInvestn"){
 
            $response['name'] = "Budget n+ (".($request->annee + 1).") : Dépenses de d'investissement";
            $response['labels'] = ['Études & Recherches',
                'Environnement',
                'Équipement',
                'Bâtiment',
                'Emprunt',
                //'	Déficit / Excédent d’investissement exer anté',
            ];

            if($request->slug1 != null){
          
                $tmp = Data::where('slug',$request->slug1)->first()->budgetns()->first()->depensInvestns()->first();
                $data1 = [
                    $tmp->etude_recherche, 
                    $tmp->environnement, 
                    $tmp->equipement, 
                    $tmp->batiment,
                    $tmp->emprunt, 
                    $tmp->autre_investissement,
                   // $tmp->deficit_excedent,
                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->budgetns()->first()->depensInvestns()->first();
                $data2 = [
                    $tmp->etude_recherche, 
                    $tmp->environnement, 
                    $tmp->equipement, 
                    $tmp->batiment,
                    $tmp->emprunt, 
                    $tmp->autre_investissement,
                    //$tmp->deficit_excedent,
                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->budgetns()->first()->depensInvestns()->first();
                $data3 = [
                    $tmp->etude_recherche, 
                    $tmp->environnement, 
                    $tmp->equipement, 
                    $tmp->batiment,
                    $tmp->emprunt, 
                    $tmp->autre_investissement,
                    //$tmp->deficit_excedent,
                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->budgetns()->first()->depensInvestns()->first();
                $data4 = [
                    $tmp->etude_recherche, 
                    $tmp->environnement, 
                    $tmp->equipement, 
                    $tmp->batiment,
                    $tmp->emprunt, 
                    $tmp->autre_investissement,
                    //$tmp->deficit_excedent,
                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }

        //Depense fonct
        if($request->id == "depensFonctn"){
 
            $response['name'] = "Budget n+ (".($request->annee + 1).") : Dépenses de fonctionnement";
            $response['labels'] = ['Santé',
                'Appui scolaire',
                'Sport & culture & jeunesse',
                'Eau assainissement enviro',
                'Participation et prestation',
                'Frais financier',
                'Réfection /entretien bâtiment',
                'Salaires & Indemnités',
                'Entretien véhicules & autres',
                'Appui Fonctionnement /Autres dépenses ',
                //'Autres charges exceptionnels',
                'Excédent / Prélèvement',
            ];

            if($request->slug1 != null){
                
                $tmp = Data::where('slug',$request->slug1)->first()->budgetns()->first()->depensFonctns()->first();
                $data1 = [
                    $tmp->sante, 
                    $tmp->appui_scolaire, 
                    $tmp->sport_culture, 
                    $tmp->eau_assainissement, 
                    $tmp->participation,
                    $tmp->frais_financier, 
                    $tmp->refection_entretien,
                    $tmp->salaire_indemnite,
                    $tmp->entretien_vehicule,
                    $tmp->appui_fonctionnement,
                    $tmp->exedent_prelevement,

                ];
                $commune_1 = Data::where('slug',$request->slug1)->first()->commune()->first()->commune_name;
                $response['data1'] = $data1;
                $response['commune_1'] = $commune_1;
            }
            if($request->slug2 != null){
                 

                $tmp = Data::where('slug',$request->slug2)->first()->budgetns()->first()->depensFonctns()->first();
                $data2 = [
                    $tmp->sante, 
                    $tmp->appui_scolaire, 
                    $tmp->sport_culture, 
                    $tmp->eau_assainissement, 
                    $tmp->participation,
                    $tmp->frais_financier, 
                    $tmp->refection_entretien,
                    $tmp->salaire_indemnite,
                    $tmp->entretien_vehicule,
                    $tmp->appui_fonctionnement,
                    $tmp->exedent_prelevement,

                ];
                $commune_2 = Data::where('slug',$request->slug2)->first()->commune()->first()->commune_name;
                $response['data2'] = $data2;
                $response['commune_2'] = $commune_2;
            }
            if($request->slug3 != null){
                 

                $tmp = Data::where('slug',$request->slug3)->first()->budgetns()->first()->depensFonctns()->first();
                $data3 = [
                    $tmp->sante, 
                    $tmp->appui_scolaire, 
                    $tmp->sport_culture, 
                    $tmp->eau_assainissement, 
                    $tmp->participation,
                    $tmp->frais_financier, 
                    $tmp->refection_entretien,
                    $tmp->salaire_indemnite,
                    $tmp->entretien_vehicule,
                    $tmp->appui_fonctionnement,
                    $tmp->exedent_prelevement,

                ];
                $commune_3 = Data::where('slug',$request->slug3)->first()->commune()->first()->commune_name;
                $response['data3'] = $data3;
                $response['commune_3'] = $commune_3;
            }
            if($request->slug4 != null){
                 
                $tmp = Data::where('slug',$request->slug4)->first()->budgetns()->first()->depensFonctns()->first();
                $data4 = [
                    $tmp->sante, 
                    $tmp->appui_scolaire, 
                    $tmp->sport_culture, 
                    $tmp->eau_assainissement, 
                    $tmp->participation,
                    $tmp->frais_financier, 
                    $tmp->refection_entretien,
                    $tmp->salaire_indemnite,
                    $tmp->entretien_vehicule,
                    $tmp->appui_fonctionnement,
                    $tmp->exedent_prelevement,

                ];
                $commune_4 = Data::where('slug',$request->slug4)->first()->commune()->first()->commune_name;
                $response['data4'] = $data4;
                $response['commune_4'] = $commune_4;
            }
            return response()->json($response);
        }
        
        //$slug1 = 'ok good, slug1: '.$request->slug1;

        //return response()->json($slug1);
    }

    public function login(){

        return view('pages.login');
        
    }

    public function signup(){

        return view('pages.signup');
        
    }

    public function contact(){

        return view('pages.contact');
        
    }
    
    public function about(){

        return view('pages.about');
        
    }

    public function getCountryRegion($country_id){
        
        $regions = Country::find($country_id)->regions()->pluck('region_name','id');
        return response()->json($regions);
    }

    public function getCountryRegionProvince($region_id){
        
        $provinces = Region::find($region_id)->provinces()->pluck('province_name','id');
        return response()->json($provinces);
    }

    public function getCountryRegionProvinceCommune($province_id){
        
        $communes = Province::find($province_id)->communes()->pluck('commune_name','id');
        
        return response()->json($communes);
    }

    public function getCommune(Request $request){
        
        
        $query = $request->get('query');
          $filterResult = Commune::where('commune_name', 'LIKE', '%'. $query. '%')->get('commune_name');
          return response()->json($filterResult);
    }

    public function makePdf(Request $request){
       
        if(str_contains($request->hidden_url, 'planning')){
            $data = [
                "hidden_pcd" => $request->hidden_pcd,
                "hidden_recette" => $request->hidden_recette,
                "hidden_depense" => $request->hidden_depense,
                "hidden_bg_recett_fcntn" => $request->hidden_bg_recett_fcntn,
                "hidden_bg_depens_fcntn" => $request->hidden_bg_depens_fcntn,
                "hidden_resultat" => $request->hidden_resultat,
                "hidden_bg_recett_investn" => $request->hidden_bg_recett_investn,
                "hidden_bg_depens_investn" => $request->hidden_bg_depens_investn,
            ];
        }elseif(str_contains($request->hidden_url, 'global')){
            $data = [
                "hidden_pcd" => $request->hidden_pcd,
                "hidden_recette" => $request->hidden_recette,
                "hidden_depense" => $request->hidden_depense,
                "hidden_bg_recett_fcnt" => $request->hidden_bg_recett_fcnt,
                "hidden_bg_depens_fcnt" => $request->hidden_bg_depens_fcnt,
                "hidden_resultat" => $request->hidden_resultat,
                "hidden_bg_recett_invest" => $request->hidden_bg_recett_invest,
                "hidden_bg_depens_invest" => $request->hidden_bg_depens_invest,

                "hidden_bg_recett_fcntn" => $request->hidden_bg_recett_fcntn,
                "hidden_bg_depens_fcntn" => $request->hidden_bg_depens_fcntn,
                "hidden_bg_recett_investn" => $request->hidden_bg_recett_investn,
                "hidden_bg_depens_investn" => $request->hidden_bg_depens_investn,
            ];
        }else {
            $data = [
                "hidden_pcd" => $request->hidden_pcd,
                "hidden_recette" => $request->hidden_recette,
                "hidden_depense" => $request->hidden_depense,
                "hidden_bg_recett_fcnt" => $request->hidden_bg_recett_fcnt,
                "hidden_bg_depens_fcnt" => $request->hidden_bg_depens_fcnt,
                "hidden_resultat" => $request->hidden_resultat,
                "hidden_bg_recett_invest" => $request->hidden_bg_recett_invest,
                "hidden_bg_depens_invest" => $request->hidden_bg_depens_invest,
            ];
        }
        
        $input_data = Data::where('slug',$request->slug)->first();
         //dd($data);
         if($input_data != null){
            $dataCommune = $this->getDataCommune($input_data->id, 'datas.tdb');
         }else{
            $dataCommune = null; 
         }

        //dd($data);

        $file_name = 'google_chart.pdf';
        $qrcode = QrCode::size(200)->generate($request->hidden_url);
        //dd($qrcode);
        
        //$dataCommune = null;
        if(str_contains($request->hidden_url, 'planning')){
            $pdf =  PDF::loadView('pdf_tdbPlanning', compact('data','dataCommune', 'qrcode'))->setPaper('a1')->setOrientation('landscape');
        }elseif (str_contains($request->hidden_url, 'global')) {
            $pdf =  PDF::loadView('pdf_tdbGlobal', compact('data','dataCommune', 'qrcode'))->setPaper('a0')->setOrientation('landscape');
        }else {
            $pdf =  PDF::loadView('pdf_tdbBilan', compact('data','dataCommune', 'qrcode'))->setPaper('a1')->setOrientation('landscape');
        }
        
        $pdf->setOption('lowquality', true);
        $pdf->setOption('dpi', 600);
        $pdf->setOption('image-quality', 1200);
        $pdf->setOption('image-dpi', 1200);
        //$pdf->setOption('viewport-size', '5280x8024');
        $pdf->setOption('zoom', 1);
        //$pdf->setOption('page-size', 'a2');
        $pdf->setOption('page-height', 80);
       // $pdf->setOption('page-size', 'a2');
        //$pdf->setOption('minimum-font-size', 30);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('user-style-sheet', ''.public_path('/css/bootstrap.min4.css'));
        //$pdf->setOption('window-status', 'window.status');
         //return view('pdf_tdbGlobal', compact('data','dataCommune', 'qrcode'));
        //return $pdf->download($file_name, array("Attachment" => false));
        return $pdf->inline($file_name, array("Attachment" => false));
    }

    public function makeFileExporte(String $routeOrigin, String $file, String $slug){

        $users = [1,2,3,4,5,6,7,8];

        //return App::make('excel');
        if($file == "excel"){
            //return (new InvoicesExport($routeOrigin, $slug))->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            return Excel::download(new InvoicesExport($routeOrigin, $slug), 'donnee.xlsx',\Maatwebsite\Excel\Excel::XLSX);
        } elseif($file == 'pdf'){
            return Excel::download(new InvoicesExport($routeOrigin, $slug), 'donnee.xlsx',\Maatwebsite\Excel\Excel::XLSX);
            return Excel::download(new InvoicesExport($routeOrigin, $slug), 'donnee.pdf', \Maatwebsite\Excel\Excel::PDF);
        } elseif($file == 'csv'){
            return Excel::download(new InvoicesExport($routeOrigin, $slug), 'donnee.csv', \Maatwebsite\Excel\Excel::CSV);
        }else{
            return Excel::download(new InvoicesExport($routeOrigin, $slug), 'donnee.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }

        

    }

    public function test()
    {
        /*Pays*/
            
            $countries = ["Burkina Faso"];
            $this->countryConfig($countries, 226, 1);

        /*regions*/

            $regions = ["Boucle du Mouhoun","Cascades","Centre","Centre-Est","Centre-Nord","Centre-Ouest","Centre-Sud","Est","Hauts Bassins","Nord","Plateau Central","Sahel","Sud-Ouest"];
            $this->countryConfig($regions, 1, 2);

        /*Province */

            $mouhoune = ["Balé","Banwa","Kossi","Mouhoun","Nayala","Sourou"];
            $this->countryConfig($mouhoune, 1, 3);

            $cascades = ["Comoé","Léraba"];
            $this->countryConfig($cascades, 2, 3);

            $centre = ["Kadiogo"];
            $this->countryConfig($centre, 3, 3);

            $centreEst = ["Boulgou","Koulpélogo","Kouritenga"];
            $this->countryConfig($centreEst, 4, 3);

            $centreNord = [ "Bam","Namentenga","Sanmatenga"];
            $this->countryConfig($centreNord, 5, 3);

            $centreOuest = ["Boulkiemdé","Sanguié","Sissili","Ziro"];
            $this->countryConfig($centreOuest, 6, 3);

            $centreSud = ["Bazéga","Nahouri","Zoundwéogo"];
            $this->countryConfig($centreSud, 7, 3);

            $est = ["Gnagna","Gourma","Komandjoari","Kompienga","Tapoa"];
            $this->countryConfig($est, 8, 3);

            $haut = ["Houet","Kénédougou","Tuy"];
            $this->countryConfig($haut, 9, 3);

            $nord = ["Loroum","Passoré","Yatenga","Zondoma"];
            $this->countryConfig($nord, 10, 3);

            $plateau = ["Ganzourgou","Kourwéogo","Oubritenga"];
            $this->countryConfig($plateau, 11, 3);

            $sahel = ["Oudalan","Séno","Soum","Yagha"];
            $this->countryConfig($sahel, 12, 3);

            $sudOuest = ["Bougouriba","Ioba","Noumbiel","Poni"];
            $this->countryConfig($sudOuest, 13, 3);


        /*Commune*/
        /*1*/
            $bale = ["Bagassi","Bana","Boromo","Fara","Oury","Pâ","Pompoï","Poura","Siby","Yaho"];
            $this->countryConfig($bale, 1, 4);

            $banwa = ["Balavé","Kouka","Sami","Sanaba","Solenzo","Tansila"];
            $this->countryConfig($banwa, 2, 4);

            $kossi = ["Barani","Bomborokuy","Bourasso","Djibasso","Dokuy","Doumbala","Kombori","Madouba","Nouna","Sono"];
            $this->countryConfig($kossi, 3, 4);

            $mouhoun = ["Bondokuy","Dédougou","Douroula","Kona","Ouarkoye","Safané","Tchériba"];
            $this->countryConfig($mouhoun, 4, 4);

            $nayala = ["Gassan","Gossina","Kougny","Toma","Yaba","Yé"];
            $this->countryConfig($nayala, 5, 4);

            $Sourou = ["Di","Gomboro","Kassoum","Kiembara","Lanfièra","Lankoué","Toéni","Tougan"];
            $this->countryConfig($Sourou, 6, 4);

        /*2*/
            $Comoe = ["Banfora","Bérégadougou","Mangodara","Moussodougou","Niangoloko","Ouo","Sidéradougou","Soubakaniédougou","Tiéfora"];
            $this->countryConfig($Comoe, 7, 4);

            $Leraba = ["Dakoro","Douna","Kankalaba","Loumana","Niankorodougou","Ouéléni","Sindou","Wolonkoto"];
            $this->countryConfig($Leraba, 8, 4);

        /*3*/
            $Kadiogo = ["Komki-Ipala","Komsilga","Koubri","Ouagadougou","Pabré","Saaba","Tanghin-Dassouri"];
            $this->countryConfig($Kadiogo, 9, 4);

        /*4*/
            $Boulgou = ["Bagré","Bané","Béguédo","Bissiga","Bittou","Boussouma","Garango","Komtoèga","Niaogho","Tenkodogo","Zabré","Zoaga","Zonsé"];
            $this->countryConfig($Boulgou, 10, 4);

            $Koulpelogo = ["Comin-Yanga","Dourtenga","Lalgaye","Ouargaye","Sangha (Sanga)","Soudougui","Yargatenga","Yondé"];
            $this->countryConfig($Koulpelogo, 11, 4);

            $Kouritenga = ["Andemtenga","Baskouré","Dialgaye","Gounghin","Kando (Cando)","Koupéla","Pouytenga","Tensobentenga (Tansobentenga)","Yargo"];
            $this->countryConfig($Kouritenga, 12, 4);

        /*5*/
            $Bam = ["Bourzanga","Guibaré","Kongoussi","Nasséré","Rollo","Rouko","Sabcé","Tikaré","Zimtanga"];
            $this->countryConfig($Bam, 13, 4);

            $Namentenga = ["Boala","Boulsa","Bouroum","Dargo","Nagbingou","Tougouri","Yalgo","Zéguédéguin"];
            $this->countryConfig($Namentenga, 14, 4);

            $Sanmatenga = ["Barsalogho","Boussouma","Dablo","Kaya","Korsimoro","Mané","Namissiguima","Pensa","Pibaoré","Pissila","Ziga"];
            $this->countryConfig($Sanmatenga, 15, 4);

       /*6*/
            $Boulkiemde = ["Bingo","Imasgo","Kindi","Kokologho","Koudougou","Nandiala","Nanoro","Pella","Poa","Ramongo","Sabou","Siglé","Soaw","Sourgou","Thyou"];
            $this->countryConfig($Boulkiemde, 16, 4);

            $Sanguie = ["Dassa","Didyr","Godyr","Kordié","Kyon","Pouni","Réo","Ténado","Zamo","Zawara"];
            $this->countryConfig($Sanguie, 17, 4);

            $sissili = ["Biéha","Boura","Léo","Nébiélianayou","Niabouri","Silly","Tô"];
            $this->countryConfig($sissili, 18, 4);

            $ziro = ["Bakata","Bougnounou","Cassou","Dalo","Gao","Sapouy"];
            $this->countryConfig($ziro, 19, 4);

        /*7*/
            $Bazega = ["Doulougou","Gaongo","Ipelcé","Kayao","Kombissiri","Saponé","Toécé"];
            $this->countryConfig($Bazega, 20, 4);

            $Nahouri = ["Guiaro","Pô","Tiébélé","Zecco","Ziou"];
            $this->countryConfig($Nahouri, 21, 4);

            $Zoundweogo = ["Béré","Bindé","Gogo","Gomboussougou","Guiba","Manga","Nobéré"];
            $this->countryConfig($Zoundweogo, 22, 4);

        /*8*/
            $Gnagna = ["Bilanga","Bogandé","Coalla","Liptougou","Manni","Piéla","Thion"];
            $this->countryConfig($Gnagna, 23, 4);

            $Gourma = ["Diabo","Diapangou","Fada N’Gourma","Matiacoali","Tibga","Yamba"];
            $this->countryConfig($Gourma, 24, 4);

            $Komondjari = ["Bartiébougou","Foutouri","Gayéri"];
            $this->countryConfig($Komondjari, 25, 4);

            $Kompienga = ["Kompienga","Madjoari","Pama"];
            $this->countryConfig($Kompienga, 26, 4);

            $Tapoa = ["Botou","Diapaga","Kantchari","Logobou","Namounou","Partiaga","Tambaga","Tansarga"];
            $this->countryConfig($Tapoa, 27, 4);

        /*9*/
            $Houet = ["Bama","Bobo-Dioulasso","Dandé","Faramana","Fô","Karangasso-Sambla","Karangasso-Vigué","Koundougou","Léna","Padéma","Péni","Satiri","Toussiana"];
            $this->countryConfig($Houet, 28, 4);

            $Kenedougou = ["Banzon","Djigouéra","Kangala","Kayan","Koloko","Kourignon","Kourouma","Morolaba","N’dorola","Orodara","Samogohiri","Samorogouan","Sindo"];
            $this->countryConfig($Kenedougou, 29, 4);

            $Tuy = ["Békuy","Béréba","Boni","Founzan","Houndé","Koti","Koumbia"];
            $this->countryConfig($Tuy, 30, 4);

        /*10*/
            $Loroum = ["Banh","Ouindigui","Sollé","Titao"];
            $this->countryConfig($Loroum, 31, 4);

            $Passore = ["Arbollé","Bagaré","Bokin","Gomponsom","Kirsi","Lâ-Todin","Pilimpikou","Samba","Yako"];
            $this->countryConfig($Passore, 32, 4);

            $Yatenga = ["Barga","Kaïn","Kalsaka","Kossouka","Koumbri","Namissiguima","Ouahigouya","Oula","Rambo","Séguénéga","Tangaye","Thiou","Zogoré"];
            $this->countryConfig($Yatenga, 33, 4);

            $Zondoma = ["Bassi","Boussou","Gourcy","Léba","Tougo"];
            $this->countryConfig($Zondoma, 34, 4);

        /*11*/
            $Ganzourgou = ["Boudry","Kogho","Méguet","Mogtédo","Salogo","Zam","Zorgho","Zoungou"];
            $this->countryConfig($Ganzourgou, 35, 4);

            $Kourweogo = ["Boussé","Laye","Niou","Sourgoubila","Toéghin"];
            $this->countryConfig($Kourweogo, 36, 4);

            $Oubritenga = ["Absouya","Dapélogo","Loumbila","Nagréongo","Ourgou-Manèga","Ziniaré","Zitenga"];
            $this->countryConfig($Oubritenga, 37, 4);

        /*12*/
            $Oudalan = ["Déou","Gorom-Gorom","Markoye","Oursi","Tin-Akoff"];
            $this->countryConfig($Oudalan, 38, 4);

            $Seno = ["Bani","Dori","Falangountou","Gorgadji","Sampelga","Seytenga"];
            $this->countryConfig($Seno, 39, 4);

            $Soum = ["Arbinda","Baraboulé","Djibo","Diguel","Kelbo","Koutougou","Nassoumbou","Pobé-Mengao","Tongomayel"];
            $this->countryConfig($Soum, 40, 4);

            $Yagha = ["Boundoré","Mansila","Sebba","Solhan","Tankougounadié","Titabé"];
            $this->countryConfig($Yagha, 41, 4);

        /*13*/
            $Bougouriba = ["Bondigui","Diébougou","Dolo","Nioronioro","Tiankoura"];
            $this->countryConfig($Bougouriba, 42, 4);

            $Ioba = ["Dano","Dissin","Guéguéré","Koper","Niégo","Oronkua","Ouessa","Zambo"];
            $this->countryConfig($Ioba, 43, 4);
            
            $Noumbiel = ["Batié","Boussoukoula","Kpuéré","Legmoin","Midébdo"];
            $this->countryConfig($Noumbiel, 44, 4);

            $Poni = ["Bouroum-Bouroum","Bousséra","Djigoué","Gaoua","Gbomblora","Kampti","Loropéni","Malba","Nako","Périgban"];
            $this->countryConfig($Poni, 45, 4);



        
        
        
        
       /* $data = new GData();
        $data->id_data = 21;
        $data->slug = "str";
        $data->année = "2020";

        $budget = new GBudget();
        $budget->depenseInvest = 25555;
        $budget->recetInvest = 25555;
        $budget->depenseFonct = 25555;
        $budget->recetFonct = 25555;

        $budgetn = new GBudgetn();
        $budgetn->depenseInvestN = 25555;
        $budgetn->recetInvestN = 25555;
        $budgetn->depenseFonctN = 25555;
        $budgetn->recetFonctN = 25555;

       

        $infog = new GInfog();
        $infog->depense = 55555;
        $infog->dixMeilleur = 55555;
        $infog->domaineCivil = 55555;
        $infog->etatCivil = new EtatCivil();
        $infog->etatCivil->etatNombre = new EtatNombre();
        $infog->etatCivil->observation = new Observation();
        $infog->partenaire = 55555;
        $infog->recette = 55555;
        $infog->ressourceImage = 55555;
        $infog->troisMeilleur = 55555;
        
        $data->infog = $infog;
        $data->budget = $budget;
        $data->budgetn = $budgetn;
        $JsonObject = json_encode($data);
        
        dd(
            $JsonObject
        );*/
        return "OK";//view('test');
    }

    public function userRole(Request $request){
        //dd($request);
        $user = User::where('id', $request->id)->first();
        $user->role = $request->role;
        //dd($user->role);
        $user->save();

        return json_encode($user);

    }

    

    public function countryConfig($names, $id, $table){
        if($table == 1 ){
            /*Pays*/
            foreach($names as $name){
                Country::create(['country_name' => $name, 'indicatif' => $id, 'slug' => Str::slug($name)]);
                if($id == 226) $id = 225;
                if($id == 225) $id = 223;
            }
        }
        elseif($table == 2) {
            /*Region*/
            foreach($names as $name){
                Region::create(['region_name' => $name,'country_id' => $id,'slug' => Str::slug($name)]);
            }
        } elseif($table == 3){
            /*Province*/
            foreach($names as $name){
                Province::create(['province_name' => $name, 'region_id'=> $id, 'slug' => Str::slug($name)]);
            }
        } else {
            /*Commune */
            foreach($names as $name){
                Commune::create(['commune_name' => $name, 'province_id' => $id,'slug' => Str::slug($name)]);
            }
        }
    }

    public function getDataCommune($data_id, $routeName) {

        if($routeName == 'datas.info'){

            return [
                "data_id" => $data_id,
                "pays" => Data::find($data_id)->commune->province->region->country->country_name,
                "region" => Data::find($data_id)->commune->province->region->region_name,
                "province" => Data::find($data_id)->commune->province->province_name,
                "commune" => Data::find($data_id)->commune->commune_name,
                "annee" => Data::find($data_id)->annee,
                "slug" => Data::find($data_id)->slug,
    
                    "recette" => Data::find($data_id)->infogs()->first()->recettes()->get(),
                    "depense" => Data::find($data_id)->infogs()->first()->depenses()->get(),
                    "dixMeilleur" => Data::find($data_id)->infogs()->first()->dixMeilleurs()->get(),
                    "domaineCivil" => Data::find($data_id)->infogs()->first()->domaineCivils()->first(),
                    "etatCivil" => Data::find($data_id)->infogs()->first()->etatCivils()->first(),
                    "partenaire" => Data::find($data_id)->infogs()->first()->partenaires()->get(),
                    "ressourceImage" => Data::find($data_id)->infogs()->first()->ressourceImages()->get(),
                    "troisMeilleur" => Data::find($data_id)->infogs()->first()->troisMeilleurs()->get()
            ];

        }

        if($routeName == 'datas.pcd'){
            return [
                "data_id" => $data_id,
                "pays" => Data::find($data_id)->commune->province->region->country->country_name,
                "region" => Data::find($data_id)->commune->province->region->region_name,
                "province" => Data::find($data_id)->commune->province->province_name,
                "commune" => Data::find($data_id)->commune->commune_name,
                "annee" => Data::find($data_id)->annee,
                "slug" => Data::find($data_id)->slug,
    
                    "appreciation" => Data::find($data_id)->pcds()->first()->appreciations()->first(),
                    "satisfaction" => Data::find($data_id)->pcds()->first()->satisfactions()->first()
            ];
        }

        if($routeName == 'budget'){

            return [
                "data_id" => $data_id,
                "pays" => Data::find($data_id)->commune->province->region->country->country_name,
                "region" => Data::find($data_id)->commune->province->region->region_name,
                "province" => Data::find($data_id)->commune->province->province_name,
                "commune" => Data::find($data_id)->commune->commune_name,
                "annee" => Data::find($data_id)->annee,
                "slug" => Data::find($data_id)->slug,
    
    
                    "depensFonct" => Data::find($data_id)->budgets()->first()->depensFoncts()->first(),
                    "depensInvest" => Data::find($data_id)->budgets()->first()->depensInvests()->first(),
                    "recetFonct" => Data::find($data_id)->budgets()->first()->recetFoncts()->first(),
                    "recetInvest" => Data::find($data_id)->budgets()->first()->recetInvests()->first()
            ];
        }

        if($routeName == 'budgetn'){
            return [
                "data_id" => $data_id,
                "pays" => Data::find($data_id)->commune->province->region->country->country_name,
                "region" => Data::find($data_id)->commune->province->region->region_name,
                "province" => Data::find($data_id)->commune->province->province_name,
                "commune" => Data::find($data_id)->commune->commune_name,
                "annee" => Data::find($data_id)->annee,
                "slug" => Data::find($data_id)->slug,
    
                    "depensFonctN" => Data::find($data_id)->budgetns()->first()->depensFonctns()->first(),
                    "depensInvestN" => Data::find($data_id)->budgetns()->first()->depensInvestns()->first(),
                    "recetFonctN" => Data::find($data_id)->budgetns()->first()->recetFonctns()->first(),
                    "recetInvestN" => Data::find($data_id)->budgetns()->first()->recetInvestns()->first(),
                
            ];
        }

        if($routeName == 'datas.tdb'){
            return [
                "data_id" => $data_id,
                "pays" => Data::find($data_id)->commune->province->region->country->country_name,
                "region" => Data::find($data_id)->commune->province->region->region_name,
                "province" => Data::find($data_id)->commune->province->province_name,
                "commune" => Data::find($data_id)->commune->commune_name,
                "annee" => Data::find($data_id)->annee,
                "slug" => Data::find($data_id)->slug,

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


}