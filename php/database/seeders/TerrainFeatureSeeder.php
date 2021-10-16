<?php

namespace Database\Seeders;

use App\Models\TerrainFeature;
use App\Models\TerrainTrait;
use Illuminate\Database\Seeder;

class TerrainFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TerrainFeature::factory()->count(10)
            ->hasAttached(
                TerrainTrait::factory()->count(random_int(1, 3))
            )
            ->create();
    }
}
