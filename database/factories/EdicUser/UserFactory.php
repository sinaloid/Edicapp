<?php

namespace Database\Factories\EdicUser;

use App\Models\EdicUser\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstNameMale();
        return [
            'commune_id' => $this->faker->numberBetween($min = 1, $max = 18),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
