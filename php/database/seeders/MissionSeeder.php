<?php

namespace Database\Seeders;

use App\Models\Mission;
use App\Models\Objective;
use App\Models\TerrainFeature;
use App\Models\TerrainTrait;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mission::factory()->count(10)
            ->hasAttached(
                Objective::factory()->count(random_int(1, 3)),
                ['primary' => random_int(0, 1)]
            )
            ->hasAttached(
                TerrainFeature::factory()->count(random_int(1, 6))
                    ->hasAttached(TerrainTrait::factory()),
                [
                    'x' => random_int(6, 33),
                    'y' => random_int(6, 40)
                ]
            )
            ->create();
    }
}
