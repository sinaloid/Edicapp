<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*A supprimer*/
use App\Models\Countries\{ Region, Country, Province, Commune };
use App\Models\EdicUser\User;
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
        $dataCommune = Data::where([
            ['commune_id', $request->commune],
            ['annee', $request->annee],
            ['terminer', 1]
        ])->first();
        if($dataCommune == null){
            $dataCommune = Data::where('terminer',1)->first();
            // message session data non trouver
        }
        $countries = Country::all();
        $troisMeilleur = null;
        if($dataCommune != null){
            if(Data::where('terminer',1)->first() != null){
                
                $dataCommune = Data::where('terminer',1)->get()->random(1)->first();
                $troisMeilleur = $dataCommune->infogs()->first()->troisMeilleurs()->get();
                //dd($troisMeilleur);
            }
        }

        /*dd(
            Commune::all()->random(1)->first()->commune_name
        );*/
        //$marches = json_encode($troisMeilleur);
        return view('index', compact('countries','troisMeilleur', 'dataCommune'));
    }

    public function actu(){

        return view('pages.news');
        
    }

    public function actuContent(){

        return view('pages.article');
        
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

    public function datasTdb($slug = ''){
        $countries = Country::all();
         $data = Data::where('slug',$slug)->first();
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

        $dataCompare = [
            "pays" => Country::find($request->country)->country_name,
            "region" => Region::find($request->region)->region_name,
            "region_2" => Region::find($request->region_2)->region_name,
            "province" => Province::find($request->province)->province_name,
            "province_2" => Province::find($request->province_2)->province_name,
            "commune_1" => Commune::find($request->commune_1)->commune_name,
            "commune_2" => Commune::find($request->commune_2)->commune_name,
            "commune_3" => Commune::find($request->commune_3)->commune_name,
            "commune_4" => Commune::find($request->commune_4)->commune_name,
        ];

       // dd($dataCompare);


        return view('pages.viewData', compact('dataCompare'));
        
    }

    public function login(){

        return view('pages.login');
        
    }

    public function signup(){

        return view('pages.signup');
        
    }

    public function forum(){

        return view('pages.forum');
        
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

    public function getdata() {
        dd(Data::find(3)->pcds);
    }

    public function test()
    {
        /*Pays*/

            $countries = ["Burkina Faso", "Côte d'Ivoire", "Mali"];
            $this->countryConfig($countries, 226, 1);

        /*regions*/

            $regions = ["Boucle du Mouhoun","Cascades","Centre","Centre-Est","Centre-Nord","Centre-Oest","Centre-Sud","Est","Hauts Bassins","Nord","Plateau Central","Sahel","Sud-Ouest"];
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

            $est = ["Gnagna","Gourma","Komondjari (Komandjoari)","Kompienga","Tapoa"];
            $this->countryConfig($est, 8, 3);

            $haut = ["Houet","Kénédougou","Tuy (Tui)"];
            $this->countryConfig($haut, 9, 3);

            $nord = ["Loroum","Passoré","Yatenga","Zondoma"];
            $this->countryConfig($nord, 10, 3);

            $plateau = ["Ganzourgou","Kourwéogo","Oubritenga"];
            $this->countryConfig($plateau, 11, 3);

            $sahel = ["Oudalan","Séno","Soum","Yagha"];
            $this->countryConfig($sahel, 12, 3);

            $sudOuest = ["Bougouriba","Loba","Noumbiel","Poni"];
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

            $nayala = ["Gassan (ou Gassam)","Gossina","Kougny","Toma","Yaba","Yé"];
            $this->countryConfig($nayala, 5, 4);

            $Sourou = ["Di","Gomboro","Kassoum","Kiembara","Lanfièra (Lanfiéra)","Lankoué","Toéni","Tougan"];
            $this->countryConfig($Sourou, 6, 4);

        /*2*/
            $Comoe = ["Banfora","Bérégadougou","Mangodara","Moussodougou","Niangoloko","Ouo","Sidéradougou","Soubakaniédougou","Tiéfora"];
            $this->countryConfig($Comoe, 7, 4);

            $Leraba = ["Dakoro","Douna","Kankalaba","Loumana","Niankorodougou","Ouéléni","Sindou","Wolonkoto"];
            $this->countryConfig($Leraba, 8, 4);

        /*3*/
            $Kadiogo = ["Komki-Ipala","Komsilga","Koubri","Ouagadougou (Ouaga)","Pabré","Saaba","Tanghin-Dassouri"];
            $this->countryConfig($Kadiogo, 9, 4);

        /*4*/
            $Boulgou = ["Bagré","Bané","Béguédo","Bissiga","Bitou (Bittou)","Boussouma","Garango","Komtoèga","Niaogho (Niaogo)","Tenkodogo","Zabré","Zoaga","Zonsé"];
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

            $Nahouri = ["Guiaro","Pô (Po)","Tiébélé (Tiebele)","Zecco","Ziou (Zio)"];
            $this->countryConfig($Nahouri, 21, 4);

            $Zoundweogo = ["Béré (Bere)","Bindé (Binde)","Gogo","Gomboussougou (Gombousougou)","Guiba","Manga","Nobéré"];
            $this->countryConfig($Zoundweogo, 22, 4);

        /*8*/
            $Gnagna = ["Bilanga","Bogandé","Coalla","Liptougou","Manni (Mani)","Piéla","Thion"];
            $this->countryConfig($Gnagna, 23, 4);

            $Gourma = ["Diabo","Diapangou","Fada N’Gourma","Matiacoali","Tibga","Yamba"];
            $this->countryConfig($Gourma, 24, 4);

            $Komondjari = ["Bartiébougou (Batiébougou)","Foutouri","Gayéri"];
            $this->countryConfig($Komondjari, 25, 4);

            $Kompienga = ["Kompienga","Madjoari","Pama"];
            $this->countryConfig($Kompienga, 26, 4);

            $Tapoa = ["Botou","Diapaga","Kantchari","Logobou","Namounou","Partiaga","Tambaga","Tansarga"];
            $this->countryConfig($Tapoa, 27, 4);

        /*9*/
            $Houet = ["Bama","Bobo-Dioulasso","Dandé","Faramana","Fô","Karangasso-Sambla","Karangasso-Vigué","Koundougou","Léna","Padéma","Péni","Satiri","Toussiana"];
            $this->countryConfig($Houet, 28, 4);

            $Kenedougou = ["Banzon","Djigouéra","Kangala","Kayan","Koloko","Kourignon (Kourinion)","Kourouma","Morolaba","N’dorola","Orodara","Samogohiri (Samoghohiri)","Samorogouan","Sindo"];
            $this->countryConfig($Kenedougou, 29, 4);

            $Tuy = ["Bekuy","Béréba","Boni","Founzan","Houndé","Koti","Koumbia"];
            $this->countryConfig($Tuy, 30, 4);

        /*10*/
            $Loroum = ["Banh","Ouindigui","Sollé","Titao"];
            $this->countryConfig($Loroum, 31, 4);

            $Passore = ["Arbollé","Bagaré","Bokin","Gomponsom","Kirsi","Lâ-Todin","Pilimpikou","Samba","Yako"];
            $this->countryConfig($Passore, 32, 4);

            $Yatenga = ["Barga","Kaïn (Kain)","Kalsaga (Kalsaka)","Kossouka","Koumbri","Namissiguima","Ouahigouya","Oula","Rambo","Séguénéga","Tangaye","Thiou","Zogoré"];
            $this->countryConfig($Yatenga, 33, 4);

            $Zondoma = ["Bassi","Boussou","Gourcy","Léba","Tougo"];
            $this->countryConfig($Zondoma, 34, 4);

        /*11*/
            $Ganzourgou = ["Boudry","Kogho (Kogo)","Méguet","Mogtédo","Salogo","Zam","Zorgho","Zoungou"];
            $this->countryConfig($Ganzourgou, 35, 4);

            $Kourweogo = ["Boussé","Laye","Niou","Sourgoubila","Toéghin"];
            $this->countryConfig($Kourweogo, 36, 4);

            $Oubritenga = ["Absouya","Dapélogo","Loumbila","Nagréongo","Ourgou-Manèga","Ziniaré","Zitenga"];
            $this->countryConfig($Oubritenga, 37, 4);

        /*12*/
            $Oudalan = ["Déou","Gorom-Gorom (Gorom Gorom)","Markoye","Oursi","Tin-Akoff (Tin-Akof)"];
            $this->countryConfig($Oudalan, 38, 4);

            $Seno = ["Bani","Dori","Falangountou (Falagountou)","Gorgadji","Sampelga","Seytenga"];
            $this->countryConfig($Seno, 39, 4);

            $Soum = ["Arbinda (Aribinda)","Baraboulé","Djibo","Djiguel (Diguel)","Kelbo","Koutougou","Nassoumbou","Pobé-Mengao","Tongomaye"];
            $this->countryConfig($Soum, 40, 4);

            $Yagha = ["Boundoré","Mansila","Sébba (Sebba)","Solhan (Solan)","Tankougounadié","Titabé"];
            $this->countryConfig($Yagha, 41, 4);

        /*13*/
            $Bougouriba = ["Bondigui","Diébougou","Dolo","Iolonioro (Nioronioro)","Tiankoura"];
            $this->countryConfig($Bougouriba, 42, 4);

            $Loba = ["Dano","Dissin","Guéguéré","Koper","Niégo (Niego)","Oronkua","Ouessa","Zambo"];
            $this->countryConfig($Loba, 43, 4);
            
            $Noumbiel = ["Batié","Boussoukoula","Kpuéré (Kpueré)","Legmoin","Midébdo (Midebdo)"];
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
        return view('test');
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
                    "ressourceImage" => Data::find($data_id)->infogs()->first()->ressourceImages()->first(),
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
                    "ressourceImage" => Data::find($data_id)->infogs()->first()->ressourceImages()->first(),
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