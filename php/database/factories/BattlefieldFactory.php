<?php

namespace Database\Factories;

use App\Models\Battlefield;
use Illuminate\Database\Eloquent\Factories\Factory;

class BattlefieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Battlefield::class;

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
            'width'       => random_int(30, 60),
            'height'      => random_int(30, 60),
            'power_level' => random_int(50, 100),
            'points'      => random_int(500, 2000)
        ];
    }
}
