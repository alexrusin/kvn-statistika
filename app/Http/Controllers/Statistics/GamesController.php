<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Game;

class GamesController
{
    public function index()
    {
        $games = Game::orderBy('marfin', 'desc')
            ->orderBy('efficiency', 'desc')
            ->take(200)
            ->get();
        return view('statistics.games', compact('games'));
    }
}