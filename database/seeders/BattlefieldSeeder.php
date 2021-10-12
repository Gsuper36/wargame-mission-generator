<?php

namespace Database\Seeders;

use App\Models\Battlefield;
use Illuminate\Database\Seeder;

class BattlefieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Battlefield::factory()
            ->count(3)
            ->create();
    }
}
