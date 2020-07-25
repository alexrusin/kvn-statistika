<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Team;

class TeamsController
{
    public function index()
    {
        $pageTitle = 'Команды КВН | КВН Статистика';
        $metaDescription = 'КВН Статистика - это квн сайт предоставляющций рейтинг команд а также результаты игр высшей и первой лиги квн';
        $teams = Team::with('teamGamesAverage')
            ->take(200)
            ->get();
        return view('statistics.teams', compact('teams', 'pageTitle', 'metaDescription'));
    }
}
