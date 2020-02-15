@extends('layouts.app')

@section('content')
    @foreach ($games as $season => $leagues)
        @php
        $sortedLeagues = $leagues->all();
        ksort($sortedLeagues);
        @endphp
        @foreach ($sortedLeagues as $key => $data)
        <p class="bg-white mt-4 p-4 text-l font-bold text-center"> {{ $key == 1 ? 'Высшая лига' : 'Премьер лига' }} {{$season}} г.</p>
        <statistics-games :games="{{json_encode($data)}}"></statistics-games>
        @endforeach
    @endforeach
@endsection