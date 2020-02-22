<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Game;

class GamesController
{
    public function index()
    {
        $games = Game::orderBy('season', 'desc')
            ->orderBy('marfin', 'desc')
            ->orderBy('efficiency', 'desc')
            ->take(200)
            ->get();
        $games = $games->groupBy([
            'season',
            function ($item) {
                return $item['division'];
            },
        ]);
        return view('statistics.games', compact('games'));
    }
}