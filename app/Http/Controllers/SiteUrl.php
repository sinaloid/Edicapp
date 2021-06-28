<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*A supprimer*/
use App\Models\Countries\{ Region, Country, Province, Commune };
use App\Models\EdicUser\User;
use App\Models\Datas\Data;
use App\Models\Datas\Infog\Infog;
/*use App\Gestion\Data as GData;
use App\Gestion\Budget\Budget as GBudget;
use App\Gestion\Budgetn\Budgetn as GBudgetn;
use App\Gestion\Infog\Infog as GInfog;
use App\Gestion\Infog\EtatCivil;
use App\Gestion\Infog\EtatCivil\EtatNombre;
use App\Gestion\Infog\EtatCivil\Observation;*/


class SiteUrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function test()
    {
        
             
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

    public function index()
    {
        return view('index');
    }

    public function actu(){

        return view('pages.news');
        
    }

    public function actuContent(){

        return view('pages.article');
        
    }

    public function datasInfo(){

        return view('pages.menu.minfo');
        
    }

    public function datasPcd(){

        return view('pages.menu.mpcd');
        
    }

    public function datasBudget(){

        return view('pages.menu.mbudget');
        
    }

    public function getBudget() {

        return view('pages.includes.budget');
    }

    public function getBudgetN() {

        return view('pages.includes.budgetn');
    }

    public function datasTdb(){

        return view('pages.menu.mtdb');
        
    }

    public function Compare(){

        return view('pages.compare');
        
    }
    public function datasCompare(){

        return view('pages.viewData');
        
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
    


}