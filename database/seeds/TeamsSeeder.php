<?php

use App\Models\Game;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    protected $teams = [
        [
            'name' => 'Борцы. Северный десант',
            'city' => 'Сургут',
            'image_url' => 'https://i.ytimg.com/vi/nBLIKlCnFNM/maxresdefault.jpg',
            'rating' => 5,
            'games' => [
                [
                'season' => 2019,
                'tournament_stage' => 0.125,
                'okg' => 10.3,
                'white_index' => 9.8,
                'team_efficiency' => 0.49,
                'game_efficiency' => 0.37,
                'marfin' => 4.3,
                'points' => 11.7
                ]   
            ]
        ],

        [
            'name' => 'Селивановы',
            'city' => 'Ульяновск',
            'image_url' => 'https://i.ytimg.com/vi/UFj_rf66IIs/maxresdefault.jpg',
            'rating' => 4,
            'games' => [
                [
                'season' => 2019,
                'tournament_stage' => 0.125,
                'okg' => 6,
                'white_index' => 4.6,
                'team_efficiency' => 0.28,
                'game_efficiency' => 0.37,
                'marfin' => 4.3,
                'points' => 9.7
                ]   
            ]
        ],

        [
            'name' => 'Актеры',
            'city' => 'Санкт-Петербург',
            'image_url' => 'https://i.ytimg.com/vi/BzoirY803Uw/maxresdefault.jpg',
            'rating' => 4,
            'games' => [
                [
                'season' => 2019,
                'tournament_stage' => 0.125,
                'okg' => 4,
                'white_index' => 6.3,
                'team_efficiency' => 0.25,
                'game_efficiency' => 0.37,
                'marfin' => 4.3,
                'points' => 9.7
                ]   
            ]
        ]

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->teams as $team) {
            $seededTeam = Team::updateOrCreate(
                [
                    'name' => $team['name']
                ],
                [
                    'city' => $team['city'],
                    'image_url' => $team['image_url'],
                    'rating' => $team['rating']
                ]
            );

            foreach ($team['games'] as $game) {
                Game::updateOrCreate(
                    [
                        'team_id' => $seededTeam->id,
                        'season' => $game['season'],
                        'tournament_stage' => $game['tournament_stage']
                    ],
                    [
                        'okg' => $game['okg'],
                        'white_index' => $game['white_index'],
                        'team_efficiency' => $game['team_efficiency'],
                        'game_efficiency' => $game['game_efficiency'],
                        'marfin' => $game['marfin'],
                        'points' => $game['points']
                    ]
                );
            }


        }
    }
}
