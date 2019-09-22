<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Models\Game;
use App\Models\Team;
use App\Models\TeamGame;
use Illuminate\Database\QueryException;

class EnterResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::take(200)
            ->get()
            ->pluck('display_name', 'id');
        
        $teams = Team::take(200)
            ->pluck('name', 'id');

        $selectData['games'] = $games;
        $selectData['teams'] = $teams;

        $results = TeamGame::with('team', 'game')
            ->take(200)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.enter-result', compact('results', 'selectData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultRequest $request)
    {
        try {
            $savedResult = TeamGame::create($request->all());
        } catch (QueryException $e) {
            return response(['message' => 'Такой результат уже существует', 'alertType' => 'danger'], 422);
        }

        $result = TeamGame::with('game', 'team')
            ->find($savedResult->id);
       

        return response(['message' => 'Игра сохранена', 'alertType' => 'success', 'result' => $result]);
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
    public function destroy(TeamGame $result)
    {
        $result->delete();

        return response(['message' => 'Результат удален', 'alertType' => 'success']);
    }
}
