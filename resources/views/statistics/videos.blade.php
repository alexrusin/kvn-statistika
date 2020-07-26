@extends('layouts.app')

@section('content')
<h1 class="mt-4 text-2xl font-semibold text-center text-gray-800">Подборка видео КВН Статистики</h1>
<p class="mt-2 text-center">В данном разделе Вы можете найти видео YouTube канала КВН Статистика, которые ложаться в основу данного сайта.  Смотрите, поддерживайте лайками, подписывайтесь на канал! <p>
<statistics-videos :videos="{{json_encode($videos)}}"></statistics-videos>
@endsection