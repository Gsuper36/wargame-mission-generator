<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectiveMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objective_mission', function (Blueprint $table) {
            $table->integer('mission_id');
            $table->integer('objective_id');
            $table->boolean('primary')->default(false);

            $table->index(['mission_id', 'objective_id']);
            $table->unique(['mission_id', 'objective_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objective_mission');
    }
}
