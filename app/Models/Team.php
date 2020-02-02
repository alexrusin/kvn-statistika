<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    protected $appends = ['display_name'];

    public function teamGames()
    {
        return $this->hasMany(TeamGame::class);
    }

    public function teamGamesAverage() {
        return $this->hasOne(TeamGame::class)
            ->selectRaw('team_id, avg(okg) as avg_okg, avg(efficiency) as avg_efficiency, avg(white_index) as avg_white_index, avg(points) as avg_points, avg(peoples_points) as avg_peoples_points, avg(time) as avg_time')
            ->groupBy('team_id')
            ->orderBy('avg_okg', 'desc')
            ->orderBy('avg_efficiency', 'desc')
            ->withDefault();
    }

    public function getDisplayNameAttribute()
    {
        return $this->name . ',&nbsp;<span class="text-gray-500">г. ' . $this->city . '</span>';
    }
}
