<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Tag;

class TagController
{
    public function show($slug) 
    {
        $postTag = Tag::whereSlug($slug)->first();

        $postsPaginator = $postTag->posts()
            ->wherePublished(true)
            ->orderBy('publish_date', 'desc')
            ->paginate(20);
        
        return view('blog.tag', compact('postTag', 'postsPaginator'));
    }
}