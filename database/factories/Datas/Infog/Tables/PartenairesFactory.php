<?php

namespace Database\Factories\Datas\Infog\Tables;

use App\Models\Datas\Infog\Tables\Partenaires;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartenairesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partenaires::class;

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
