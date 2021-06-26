<?php

namespace Database\Factories\Datas\BudgetN;

use App\Models\Datas\BudgetN\BudgetN;
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetNFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BudgetN::class;

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
