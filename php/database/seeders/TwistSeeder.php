<?php

namespace Database\Seeders;

use App\Models\Twist;
use Illuminate\Database\Seeder;

class TwistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Twist::factory()
            ->count(10)
            ->create();
    }
}
