<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function gamesAverage() {
        return $this->hasOne(Game::class)
            ->selectRaw('team_id, avg(okg) as avg_okg, avg(team_efficiency) as avg_team_efficiency, avg(white_index) as avg_white_index, avg(points) as avg_points')
            ->groupBy('team_id');
    }
}
