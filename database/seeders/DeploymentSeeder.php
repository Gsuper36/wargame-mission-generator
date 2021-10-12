<?php

namespace Database\Seeders;

use App\Models\Deployment;
use Illuminate\Database\Seeder;

class DeploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deployment::factory()
            ->count(5)
            ->create();
    }
}
