<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Illuminate\Support\Facades\DB;

class TagController
{
    public function show($slug) 
    {
        $postTag = Tag::whereSlug($slug)->first();

        $postIds = DB::select("select post_id from wink_posts_tags where tag_id={$postTag->id}");
        $postIds = collect($postIds)->pluck('post_id');

        $postsPaginator = Post::whereIn('id', $postIds)
            ->wherePublished(true)
            ->orderBy('publish_date', 'desc')
            ->paginate(20);   

        // for some reason relation below does not work on production server
        // $postsPaginator = $postTag->posts()
        //     ->wherePublished(true)
        //     ->orderBy('publish_date', 'desc')
        //     ->paginate(20);
        
        return view('blog.tag', compact('postTag', 'postsPaginator'));
    }
}