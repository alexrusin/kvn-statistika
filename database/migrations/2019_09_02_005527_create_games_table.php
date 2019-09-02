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
            $table->unsignedDecimal('tournament_stage', 6, 3);
            $table->unsignedDecimal('okg', 6, 3)->nullable();
            $table->unsignedDecimal('white_index', 6, 3)->nullable();
            $table->unsignedDecimal('team_efficiency', 6, 3)->nullable();
            $table->unsignedDecimal('game_efficiency', 6, 3)->nullable();
            $table->unsignedDecimal('marfin', 6, 3)->nullable();
            $table->unsignedDecimal('points', 6, 3);
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
