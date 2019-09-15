<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamGame extends Model
{
    protected $guarded = [];

    protected $appends = ['display_name'];

    public function team() 
    {
        return $this->belongsTo(Team::class);
    }

    public function game() 
    {
        return $this->belongsTo(Game::class);
    }

    public function getDisplayNameAttribute()
    {
        $name = $this->team->name;
        $name .= ' |&nbsp;';
        $name .= '<span class="text-gray-600">';
        $name .= 'Балл за игру: ' . round($this->points, 1);
        $name .= '</span>';

        return $name;
    }
}
