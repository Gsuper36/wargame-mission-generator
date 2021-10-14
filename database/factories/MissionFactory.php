<?php

namespace Database\Factories;

use App\Models\Battlefield;
use App\Models\Deployment;
use App\Models\Mission;
use App\Models\Objective;
use App\Models\TerrainFeature;
use App\Models\Twist;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        return [
            'title'          => $faker->title(),
            'description'    => $faker->text(),
            'rules'          => $faker->text(),
            'twist_id'       => Twist::factory(),
            'battlefield_id' => Battlefield::factory(),
            'deployment_id'  => Deployment::factory(),
        ]; 
    }
}
