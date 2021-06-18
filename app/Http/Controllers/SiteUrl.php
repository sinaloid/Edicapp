<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteUrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function test()
    {
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
