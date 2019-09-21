<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Game;
use Illuminate\Database\QueryException;

class EnterGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selectData['seasons'] = [
            '2016' => '2016',
            '2017' => '2017',
            '2018' => '2018',
            '2019' => '2019',
        ];

        $selectData['divisions'] = Game::DIVISIONS;
        $selectData['rounds'] = Game::TOURNAMENT_ROUNDS;
        $selectData['stages'] = Game::ROUND_STAGES;

        $games = Game::take(100)
            ->orderBy('season', 'desc')
            ->orderBy('tournament_round', 'desc')
            ->orderBy('round_stage', 'desc')
            ->get();

        return view('admin.enter-game', compact('selectData', 'games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GameRequest $request)
    {
        try {
            $game = Game::create($request->all());
        } catch (QueryException $e) {
            return response(['message' => 'Такая игра уже существует', 'alertType' => 'danger'], 422);
        }
       

        return response(['message' => 'Игра сохранена', 'alertType' => 'success', 'game' => $game]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
       $count = $game->teamGames()->count();

       if ($count) {
         return response(['message' => 'У этой игры есть результаты. Удалите вначале результаты', 'alertType' => 'danger'], 400);
       }

       $game->delete();

       return response(['message' => 'Игра удалена', 'alertType' => 'success']);
    }
}
