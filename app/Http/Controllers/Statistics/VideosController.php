<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Video;

class VideosController
{
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->take(200)->get();
        return view('statistics.videos', compact('videos'));
    }
}
