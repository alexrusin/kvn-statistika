@extends('layouts.app')

@section('content')
<div class="flex flex-wrap -mx-4">
    <data-card :data="{{ json_encode($games) }}" card-title="Игры" form-link="{{route('admin.enter-data.games')}}"></data-card>
    <data-card :data="{{ json_encode($teams) }}" card-title="Команды" form-link="{{route('admin.enter-data.teams')}}"></data-card>
    <data-card :data="{{ json_encode($results) }}" card-title="Результаты" form-link="{{route('admin.enter-data.games')}}"></data-card>
    <data-card :data="{{ json_encode($videos) }}" card-title="Видео Статистика" form-link="{{route('admin.enter-data.games')}}"></data-card>
</div>
@endsection