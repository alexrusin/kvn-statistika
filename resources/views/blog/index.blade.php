@extends('layouts.app')

@section('content')
    <ul class="flex-wrap flex-1 flex mt-5">
        @foreach($tags as $tag)
            @if ($tag->posts_count > 0) 
                <li class="mr-2 mb-2">
                    <a href="{{'/blog/tags/' . $tag->slug}}" title="{{$tag->name}}" class="text-blue-500 hover:text-white hover:bg-blue-500 border border-blue-500 py-1 px-3 rounded block">{{$tag->name}}</a>
                </li>
            @endif
        @endforeach
    </ul>
    <posts></posts>
@endsection