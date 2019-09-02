<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function teamGames()
    {
        return $this->hasMany(TeamGame::class);
    }

    public function teamGamesAverage() {
        return $this->hasOne(TeamGame::class)
            ->selectRaw('team_id, avg(okg) as avg_okg, avg(efficiency) as avg_efficiency, avg(white_index) as avg_white_index, avg(points) as avg_points')
            ->groupBy('team_id');
    }
}
