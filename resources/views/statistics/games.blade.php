@extends('layouts.app')

@section('content')
    <h1 class="mt-4 text-2xl font-semibold text-center text-gray-800">Результаты игр квн</h1>
    @foreach ($games as $season => $leagues)
        @php
        $sortedLeagues = $leagues->all();
        ksort($sortedLeagues);
        @endphp
        @foreach ($sortedLeagues as $key => $data)
        <h2 class="p-4 mt-4 font-bold text-center bg-white text-l"> {{ $key == 1 ? 'Высшая лига квн' : 'Премьер лига квн' }} {{$season}} г.</h2>
        <statistics-games :games="{{json_encode($data)}}"></statistics-games>
        @endforeach
    @endforeach
@endsection