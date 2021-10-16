<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BattlefieldSeeder::class);
        $this->call(DeploymentSeeder::class);
        $this->call(MissionSeeder::class);
        $this->call(ObjectiveSeeder::class);
        $this->call(TwistSeeder::class);
        $this->call(TerrainFeatureSeeder::class);
    }
}
