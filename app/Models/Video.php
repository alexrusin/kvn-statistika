<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    protected $appends = ['display_name'];

    public function getDisplayNameAttribute()
    {
        return $this->title;
    }
}
