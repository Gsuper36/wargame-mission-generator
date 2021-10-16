<?php

namespace Database\Factories;

use App\Models\TerrainCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TerrainCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        return [
            'tilte'       => $faker->title(),
            'rules'       => $faker->text(),
            'rules_short' => $faker->text(50)
        ];
    }
}
