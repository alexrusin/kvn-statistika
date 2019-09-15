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
            $table->unsignedSmallInteger('season');
            $table->unsignedTinyInteger('division')->default(1);
            $table->unsignedDecimal('tournament_round', 6, 3);
            $table->unsignedTinyInteger('round_stage');
            $table->unsignedDecimal('efficiency', 6, 3)->nullable();
            $table->unsignedDecimal('marfin', 6, 3)->nullable();
            $table->timestamps();

            $table->unique(['season', 'division', 'tournament_round', 'round_stage']);
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
