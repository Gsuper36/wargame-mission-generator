<?php

namespace Database\Factories;

use App\Models\Battlefield;
use App\Models\Deployment;
use App\Models\Mission;
use App\Models\Objective;
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
            'title'       => $faker->title(),
            'description' => $faker->text(),
            'rules'       => $faker->text()
        ]; 
    }

    public function configure()
    {
        return $this->afterMaking(function (Mission $mission) {
            $mission->twist()->associate(
                Twist::factory()->create()
            );

            $mission->battlefield()->associate(
                Battlefield::factory()->create()
            );
            
            $mission->deployment()->associate(
                Deployment::factory()->create()
            );
        })->afterCreating(function (Mission $mission) {
            $mission->objectives()->saveMany(
                Objective::factory()
                    ->count(random_int(1, 3))
                    ->make()
            );
        });
    }
}
