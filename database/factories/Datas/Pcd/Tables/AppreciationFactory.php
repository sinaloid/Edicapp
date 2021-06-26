<?php

namespace Database\Factories\Datas\Pcd\Tables;

use App\Models\Datas\Pcd\Tables\Appreciation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppreciationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appreciation::class;

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
