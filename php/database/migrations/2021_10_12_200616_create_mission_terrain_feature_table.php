<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionTerrainFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_terrain_feature', function (Blueprint $table) {
            $table->integer('mission_id');
            $table->integer('terrain_feature_id');
            $table->integer('x');
            $table->integer('y');

            $table->index(['mission_id', 'terrain_feature_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_terrain_feature');
    }
}
