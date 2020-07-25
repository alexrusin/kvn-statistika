@extends('layouts.app')

@section('content')
    <h1 class="mt-4 text-2xl font-semibold text-center text-gray-800">Рейтинг команд КВН</h1>
    <team-cards :teams="{{ json_encode($teams) }}"></team-cards>
@endsection