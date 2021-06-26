<?php

namespace Database\Factories\Datas\Infog\Tables;

use App\Models\Datas\Infog\Tables\EtatCivil;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EtatCivilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EtatCivil::class;

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
