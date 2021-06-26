<?php

namespace Database\Factories\Datas\Pcd;

use App\Models\Datas\Pcd\Pcd;
use Illuminate\Database\Eloquent\Factories\Factory;

class PcdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pcd::class;

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
