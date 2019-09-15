<?php

namespace App\Http\Controllers\Admin;

use App\Models\Game;
use App\Models\Team;
use App\Models\TeamGame;
use App\Models\Video;

class EnterDataController
{
    public function index()
    {
        $games = Game::orderBy('division', 'asc')
            ->orderBy('season', 'desc')
            ->orderBy('tournament_round', 'desc')
            ->orderBy('round_stage', 'asc')
            ->take(5)
            ->get();
        $teams = Team::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $results = TeamGame::with('team')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $videos = Video::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.enter-data', compact('games', 'teams', 'videos', 'results'));
    }
}