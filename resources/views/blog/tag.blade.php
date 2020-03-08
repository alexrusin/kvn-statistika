@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-800 my-2">
        <a href="https://vk.com/useless_kvn" target="_blank">
            {{$postTag->name}}
        </a>
    </h1>
    <posts :posts-paginator="{{ json_encode($postsPaginator) }}"></posts>
@endsection