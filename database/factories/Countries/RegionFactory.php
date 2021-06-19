<?php

namespace Database\Factories\Countries;

use App\Models\Countries\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Region::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->city();
        return [
            'region_name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
