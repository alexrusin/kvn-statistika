<?php

use App\Models\Game;
use App\Models\Team;
use App\Models\TeamGame;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    protected $game = [
        'division' => 1,
        'season' => 2019,
        'tournament_stage' => 0.125,
        'stage_game' => 1,
        'efficiency' => 0.357,
        'marfin' => 4.3,
    ];
    protected $teams = [
        [
            'name' => 'Борцы. Северный десант',
            'city' => 'Сургут',
            'image_url' => 'https://i.ytimg.com/vi/nBLIKlCnFNM/maxresdefault.jpg',
            'rating' => 5,
            'games' => [
                [
                'okg' => 10.3,
                'white_index' => 9.8,
                'efficiency' => 0.49,
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
                'okg' => 6,
                'white_index' => 4.6,
                'efficiency' => 0.28,
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
                'okg' => 4,
                'white_index' => 6.3,
                'efficiency' => 0.25,
                'points' => 9.7
                ]   
            ]
        ],

        [
            'name' => 'Планета Сочи',
            'city' => 'Сочи',
            'image_url' => 'https://i.ytimg.com/vi/-VgvjCgKR5Q/maxresdefault.jpg',
            'rating' => 4,
            'games' => [
                [
                'okg' => 3.1,
                'white_index' => 3.4,
                'efficiency' => 0.21,
                'points' => 10.4
                ]   
            ]
        ],

        [
            'name' => 'G-Drive',
            'city' => 'Новосибирск, Тюмень, Минск, Краснодар, Вязьма',
            'image_url' => 'https://i.ytimg.com/vi/IA4HlEOyLHM/maxresdefault.jpg',
            'rating' => 4,
            'games' => [
                [
                'okg' => 2.8,
                'white_index' => 3.7,
                'efficiency' => 0.41,
                'points' => 9.4
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
        $seededGame = Game::updateOrCreate([
            'division' => $this->game['division'],
            'season' => $this->game['season'],
            'tournament_stage' => $this->game['tournament_stage'],
            'stage_game' => $this->game['stage_game']
        ],
        [
            'efficiency' => $this->game['efficiency'],
            'marfin' => $this->game['marfin']
        ]);
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
                TeamGame::updateOrCreate(
                    [
                        'team_id' => $seededTeam->id,
                        'game_id' => $seededGame->id
                    ],
                    [
                        'okg' => $game['okg'],
                        'white_index' => $game['white_index'],
                        'efficiency' => $game['efficiency'],
                        'points' => $game['points']
                    ]
                );
            }


        }
    }
}
