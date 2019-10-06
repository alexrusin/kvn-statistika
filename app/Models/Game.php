<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    const HIGH_DIVISION = 1;
    const PREMIER_DIVISION = 2;
    const DIVISIONS = [
        self::HIGH_DIVISION => 'Высшая',
        self::PREMIER_DIVISION => 'Премьер'
    ];
    const TOURNAMENT_ROUNDS = [
        '0.125' => '1/8',
        '0.250' => '1/4',
        '0.500' => '1/2',
        '1.000' => 'Финал'
    ];
    const ROUND_STAGES = [
        1 => 'Первая',
        2 => 'Вторая',
        3 => 'Третья',
        4 => 'Четвертая'
    ];

    protected $appends = ['display_name'];

    protected $guarded = [];

    public function teamGames()
    {
        return $this->hasMany(TeamGame::class);
    }

    public function getDisplayNameAttribute()
    {   
        $name = '';

        if ($this->tournament_round != 1) {
            $name .= self::ROUND_STAGES[$this->round_stage];
            $name .= ' ';
        }

        $name .= self::TOURNAMENT_ROUNDS[(string) $this->tournament_round];
        $name .= ' ';
        
        $name .= $this->division == self::HIGH_DIVISION ? 'Высшей лиги' : 'Премьер лиги';
        $name .= ' ';

        $name .= $this->season . ' г.';

        return $name;
    }
}
