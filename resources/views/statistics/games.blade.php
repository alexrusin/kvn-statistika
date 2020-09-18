@extends('layouts.app')

@section('content')
    <h1 class="mt-4 text-lg font-semibold text-center text-gray-800 md:text-2xl">Результаты игр КВН</h1>
    <p class="mt-2 text-sm text-center md:text-base">Лучшие игры КВН определяются оценкой Марфина и общей эффективностью.  Для того, чтобы узнать как выступили команды в каждой из игр, нажмите на соответствующую игру КВН.<p>
    @foreach ($games as $season => $leagues)
        @php
        $sortedLeagues = $leagues->all();
        ksort($sortedLeagues);
        @endphp
        @foreach ($sortedLeagues as $key => $data)
        <h2 class="p-4 mt-4 font-bold text-center bg-gray-400 shadow text-l"> {{ $key == 1 ? 'Высшая лига КВН' : 'Премьер лига КВН' }} {{$season}} г.</h2>
        <statistics-games :games="{{json_encode($data)}}"></statistics-games>
        @endforeach
    @endforeach
@endsection