<?php

namespace Database\Factories;

use App\Models\Twist;
use Illuminate\Database\Eloquent\Factories\Factory;

class TwistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Twist::class;

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
            'rules_text'  => $faker->text()
        ];
    }
}
