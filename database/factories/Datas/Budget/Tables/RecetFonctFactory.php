<?php

namespace Database\Factories\Datas\Budget\Tables;

use App\Models\Datas\Budget\Tables\RecetFonct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecetFonctFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecetFonct::class;

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
