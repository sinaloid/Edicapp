<?php

namespace Database\Factories\Datas;

use App\Models\Datas\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Data::class;
    protected $i = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->i++;
        return [
            'annee' => $this->faker->word(),
            'commune_id' => $this->i,
        ];
    }
}
