<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Team;

class TeamsController
{
    public function index()
    {
        $teams = Team::with('teamGamesAverage')
            ->take(200)
            ->get();
        return view('statistics.teams', compact('teams'));
    }
}
