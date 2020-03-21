<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;

class PostController
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return Post::wherePublished(true)
            ->orderBy('publish_date', 'desc')
            ->paginate(config('wink.posts_per_page'));
        } else {
            $tags = Tag::withCount('posts')->take(100)->get();
            return view('blog.index', compact('tags'));
        }        
    }

    public function show($slug) 
    {
        $post = Post::whereSlug($slug)->first();

        if (!$post) {
            return redirect('/page-not-found');
        }

        return view('blog.post', compact('post'));
    }
}