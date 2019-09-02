<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Team;

class TeamsController
{
    public function index()
    {
        $teams = Team::with('gamesAverage')
            ->take(100)
            ->get();
        return view('statistics.teams', compact('teams'));
    }
}
