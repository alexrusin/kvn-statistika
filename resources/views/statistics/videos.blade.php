@extends('layouts.app')

@section('content')
<h1 class="mt-4 text-2xl font-semibold text-center text-gray-800">Подборка видео КВН Статистики</h1>
<statistics-videos :videos="{{json_encode($videos)}}"></statistics-videos>
@endsection