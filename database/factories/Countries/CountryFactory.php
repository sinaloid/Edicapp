<?php

namespace Database\Factories\Countries;

use App\Models\Countries\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->country();
        return [
            'country_name' => $name,
            'continent' => $this->faker->word(6, true),
            'indicatif' => $this->faker->numberBetween($min = 1, $max = 299),
            'slug' => Str::slug($name),
        ];
    }
}
