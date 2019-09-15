@extends('layouts.app')

@section('content')
<div class="flex flex-wrap -mx-4">
    <data-card :data="{{ json_encode($games) }}" card-title="Игры"></data-card>
    <data-card :data="{{ json_encode($teams) }}" card-title="Команды"></data-card>
    <data-card :data="{{ json_encode($results) }}" card-title="Результаты"></data-card>
    <data-card :data="{{ json_encode($videos) }}" card-title="Видео Статистика"></data-card>
</div>
@endsection