<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Countries\{ Region, Country, Province, Commune };
use App\Models\Datas\Data;
use App\Models\Datas\Infog\Infog;
use App\Models\Datas\Infog\Tables\{Recettes, Depenses, TroisMeilleurs, DixMeilleurs, Partenaires, EtatCivil, DomaineCivil};
use App\Models\Datas\Pcd\Pcd;
use App\Models\Datas\Pcd\Tables\{Appreciation, Satisfaction};
use App\Models\Datas\Budget\Budget;
use App\Models\Datas\Budget\Tables\{RecetInvest, DepensInvest, RecetFonct, DepensFonct};
use App\Models\Datas\BudgetN\BudgetN;
use App\Models\Datas\BudgetN\Tables\{RecetInvestN, DepensInvestN, RecetFonctN, DepensFonctN};



use App\Models\EdicUser\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //\App\Models\Region::factory(10)->create();
        /*Country::factory()
        ->has(Region::factory()->count(4))
        ->count(10)
        ->create();*/
        //Country::factory()->count(10)->create();
        //$ids = range(1, 3);
        
       Country::factory()
                        ->has(Region::factory()
                            ->has(Province::factory()
                                ->has(Commune::factory()
                                    ->has(User::factory()->count(1))->count(2))->count(2))->count(2))
                                                                                        ->count(2)->create();
            for($i=1 ; $i <= 16; $i++){
                Data::factory()->create(["commune_id" => $i, "user_id" => $i]);
                Infog::factory()->create(["data_id" => $i]);
                Recettes::factory()->create(["Infog_id" => $i]);
                Depenses::factory()->create(["Infog_id" => $i]);
                TroisMeilleurs::factory()->create(["Infog_id" => $i]);
                DixMeilleurs::factory()->create(["Infog_id" => $i]);
                Partenaires::factory()->create(["Infog_id" => $i]);
                EtatCivil::factory()->create(["Infog_id" => $i]);
                DomaineCivil::factory()->create(["Infog_id" => $i]);
        }

        for($i=1 ; $i <= 16; $i++){
            //Data::factory()->create(["commune_id" => $i, "user_id" => $i]);
            Pcd::factory()->create(["data_id" => $i]);
            Appreciation::factory()->create(["pcd_id" => $i]);
            Satisfaction::factory()->create(["pcd_id" => $i]);
            
    }

        for($i=1 ; $i <= 16; $i++){
            //Data::factory()->create(["commune_id" => $i, "user_id" => $i]);
            Budget::factory()->create(["data_id" => $i]);
            RecetInvest::factory()->create(["budget_id" => $i]);
            DepensInvest::factory()->create(["budget_id" => $i]);
            RecetFonct::factory()->create(["budget_id" => $i]);
            DepensFonct::factory()->create(["budget_id" => $i]);
        
        }

        for($i=1 ; $i <= 16; $i++){
            //Data::factory()->create(["commune_id" => $i, "user_id" => $i]);
            BudgetN::factory()->create(["data_id" => $i]);
            RecetInvestN::factory()->create(["budget_n_id" => $i]);
            DepensInvestN::factory()->create(["budget_n_id" => $i]);
            RecetFonctN::factory()->create(["budget_n_id" => $i]);
            DepensFonctN::factory()->create(["budget_n_id" => $i]);
        
        }

        
                                                                                        //User::factory()->count(40);*/
    }
}