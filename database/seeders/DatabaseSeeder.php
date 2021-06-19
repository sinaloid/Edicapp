<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Countries\{ Region, Country, Province, Commune };
use App\Models\Datas\Data;
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

        Country::factory()
                        ->has(Region::factory()
                            ->has(Province::factory()
                                ->has(Commune::factory()
                                    ->has(User::factory()->has(Data::factory()->count(2))->count(2))->count(2))->count(2))->count(2))
                                                                                        ->count(2)->create();
                                                                                        //User::factory()->count(40);
    }
}
