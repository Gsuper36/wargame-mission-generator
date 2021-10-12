<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrainTraitFeature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrain_trait_feature', function (Blueprint $table) {
            $table->integer('terrain_feature_id');
            $table->integer('terrain_trait_id');

            $table->index(['terrain_feature_id', 'terrain_trait_id']);
            $table->unique(['terrain_feature_id', 'terrain_trait_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terrain_trait_feature');
    }
}
