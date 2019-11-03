<?php

namespace App\Http\Controllers\Statistics;

use App\Models\TeamGame;

class TeamGamesController
{
    public function show($id)
    {
        $gameTeams = TeamGame::with(['team' => function($query) {
            $query->select('id', 'name');
        }])
            ->whereGameId($id)
            ->orderBy('okg', 'desc')
            ->orderBy('efficiency', 'desc')
            ->get();
        return response($gameTeams, 200);
    }
}
