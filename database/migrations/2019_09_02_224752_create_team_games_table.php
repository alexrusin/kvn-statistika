<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_games', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('game_id');
            $table->unsignedDecimal('okg', 6, 3)->nullable();
            $table->unsignedDecimal('white_index', 6, 3)->nullable();
            $table->unsignedDecimal('efficiency', 6, 3)->nullable();
            $table->unsignedDecimal('points', 6, 3);
            $table->timestamps();

            $table->unique(['team_id', 'game_id']);

            $table->foreign('game_id')
                ->references('id')
                ->on('games');

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_games');
    }
}
