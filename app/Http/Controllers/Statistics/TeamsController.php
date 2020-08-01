<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Team;

class TeamsController
{
    public function index()
    {
        $pageTitle = 'Команды КВН | КВН Статистика';
        $metaDescription = 'КВН Статистика - это квн сайт предоставляющций рейтинг команд а также результаты игр высшей и первой лиги квн';
        return view('statistics.teams', compact('pageTitle', 'metaDescription'));
    }

    public function getTeamsData()
    {
        $teams = Team::with('teamGamesAverage')
            ->take(500)
            ->get();
        return response($teams, 200);
    }
}
