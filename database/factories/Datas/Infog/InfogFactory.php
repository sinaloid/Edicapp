<?php

namespace Database\Factories\Datas\Infog;

use App\Models\Datas\Infog\Infog;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Infog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'annee' => $this->faker->word(),
        ];
    }
}
