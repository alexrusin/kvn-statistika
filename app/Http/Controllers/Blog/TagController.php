<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Tag;
use Illuminate\Http\Request;

class TagController
{
    public function show($slug, Request $request) 
    {
        $postTag = Tag::whereSlug($slug)->first();

        if($request->wantsJson()) {
            return $postTag->posts()
            ->wherePublished(true)
            ->orderBy('publish_date', 'desc')
            ->paginate(config('wink.posts_per_page'));
        } else {
            return view('blog.tag', compact('postTag'));
        }        
    }
}