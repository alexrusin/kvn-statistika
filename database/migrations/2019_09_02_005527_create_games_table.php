<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedSmallInteger('season');
            $table->unsignedTinyInteger('division')->default(0);
            $table->unsignedDecimal('tournament_stage', 2);
            $table->unsignedDecimal('okg')->nullable();
            $table->unsignedSmallInteger('white_index')->nullable();
            $table->unsignedDecimal('efficiency', 2)->nullable();
            $table->unsignedTinyInteger('points');
            $table->timestamps();

            $table->unique(['team_id', 'season', 'tournament_stage']);

            $table->foreign('team_id')
                ->references('id')
                ->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
