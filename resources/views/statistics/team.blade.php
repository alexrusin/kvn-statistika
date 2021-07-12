@extends('layouts.app')

@section('content')
<img class="team-image" style="background-image: url({{$team->image_url}});" />
<div class="flex flex-wrap">
    <div class="w-full mt-4 mr-4 p-4 md:w-1/2 lg:w-1/3 rounded-lg shadow-lg bg-white">
        <div class="teamNameSection">
            <h1 class="mt-1 text-lg font-semibold leading-tight truncate">
                {{ $team->name }}
            </h1>
            <div class="flex items-baseline">
                <div class="text-xs font-semibold tracking-wide text-gray-600 uppercase truncate">
                    г. {{ $team->city }}
                </div>
            </div>
        </div>
        <div class="teamScoreSection mt-4 text-center">
            Оценка: 4,5 / 5,0 (9 голосов)
            <div class="flex justify-center mt-2">
                <button type="button" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-700">
                    Оценить
                </button>
            </div>
        </div>

    </div>
    <div>
        Many cards
    </div>
</div>

@endsection