@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-800 my-2">
       {{$postTag->name}}
    </h1>
    <posts></posts>
@endsection