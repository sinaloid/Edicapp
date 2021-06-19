<?php

namespace Database\Factories\Countries;

use App\Models\Countries\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProvinceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Province::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->city();
        return [
            'province_name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
