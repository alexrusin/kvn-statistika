<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Team;
use App\Models\TeamGame;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
        // Cache::forget('teams-data');
        $teams = Cache::remember('teams-data', 1440, function () {
            return Team::with('teamGamesAverage')
            ->take(500)
            ->get()
            ->each(function($item) {
                $item->teamGamesAverage->setAppends([]);
            });
        });

        return response($teams, 200);
    }

    public function show(Team $team)
    {
        $pageTitle = "{$team->name} | КВН Статистика";
        $metaDescription = "Команда КВН {$team->name}";
        return view('statistics.team', compact('team', 'pageTitle', 'metaDescription'));
    }

    public function score($id)
    {
        $score = DB::select("SELECT count(*) as votes, avg(reviews.rating) as average from reviews left join teams on reviews.team_id = teams.id where team_id = {$id} group by team_id");

        return response($score, 200);
    }

    public function games($id)
    {
        $games = TeamGame::with(['game' => function($query) {
            $query->select('id', 'season', 'division', 'tournament_round', 'round_stage');
        }])
            ->select('id', 'team_id', 'game_id', 'okg', 'white_index', 'efficiency', 'points', 'time')
            ->whereTeamId($id)
            ->latest()
            ->get();        

        return response($games, 200);
    }
}
