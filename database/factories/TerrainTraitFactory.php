<?php

namespace Database\Factories;

use App\Models\TerrainTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainTraitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TerrainTrait::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        return [
            'title'       => $faker->title(),
            'rules'       => $faker->text(),
            'rules_short' => $faker->text(50)
        ];
    }
}
