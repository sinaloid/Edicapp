<?php

namespace Database\Factories\Datas\BudgetN\Tables;

use App\Models\Datas\BudgetN\Tables\RecetFonctN;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecetFonctNFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecetFonctN::class;

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
