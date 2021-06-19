<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*A supprimer*/
use App\Models\Countries\{ Region, Country, Province, Commune };
use App\Models\EdicUser\User;
use App\Models\Datas\Data;


class SiteUrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function test()
    {
        $pays = new Country();
        $pays->country_name = "Burkina";
        $pays->continent = "Afrique";
        $pays->indicatif = "226";
        $pays->slug = "burkina";
        /*foreach($comu as $co){
            $user = new User();
            $user->commune_id = $co->id;
            $user->name = $co->commune_name . " " .$co->id;
            $user->slug = $co->commune_name . "" .$co->id;
            $user->save();
        }*/
        /*$user = User::all();
        $i = 0;
        foreach(Data::all() as $data){
            $data->user_id = $user[$i];
            $i++;
        }*/
        dd(Country::all());
        /*Country::factory()
                        ->has(Region::factory()
                            ->has(Province::factory()
                                ->has(Commune::factory()->count(5))->count(4))->count(4))
                                                                                        ->count(10)->create();*/
        return view('test');
    }

    public function index()
    {
        return view('index');
    }

    public function actu(){

        return view('pages.news');
        
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

    public function datasCompare(){

        return view('pages.compare');
        
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
