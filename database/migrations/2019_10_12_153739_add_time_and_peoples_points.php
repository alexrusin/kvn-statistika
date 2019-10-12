<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeAndPeoplesPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_games', function (Blueprint $table) {
            $table->unsignedDecimal('peoples_points', 6, 3)->nullable()->after('points');
            $table->smallInteger('time')->nullable()->after('peoples_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_games', function (Blueprint $table) {
            $table->dropColumn('peoples_points');
            $table->dropColumn('time');
        });
    }
}
