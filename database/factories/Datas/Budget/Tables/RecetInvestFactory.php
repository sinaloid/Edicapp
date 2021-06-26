<?php

namespace Database\Factories\Datas\Budget\Tables;

use App\Models\Datas\Budget\Tables\RecetInvest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecetInvestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecetInvest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $year = $this->faker->year($max = 'now');
        return [
            'annee' => $year,
            'slug' => Str::slug($year),
        ];
    }
}
