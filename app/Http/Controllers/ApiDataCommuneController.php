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
        Country::create(['country_name' => json_encode($data), 'indicatif' => 1, 'slug' => json_encode($data[0])]);
        //dd($data[0]['data']['id_depense']);
        //dd($data[0]['data']['id_depense']);
        return 'store';
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
}
