<?php

namespace Database\Factories;

use App\Models\TerrainCategory;
use App\Models\TerrainFeature;
use App\Models\TerrainTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TerrainFeature::class;

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
            'description' => $faker->text(),
            'rules'       => $faker->text(),
            'rules_short' => $faker->text(50),
            'category_id' => TerrainCategory::factory()
        ];
    }
}
