@extends('layouts.app')

@section('content')
<h1 class="mt-4 text-lg font-semibold text-center text-gray-800 md:text-2xl">Подборка видео КВН Статистики</h1>
<p class="mt-2 text-sm text-center md:text-base">В данном разделе Вы можете найти видео <a class="text-blue-500" href="https://www.youtube.com/channel/UC2AynBYMiqc3yJ5MMNRICrQ" target="_blank">YouTube канала КВН Статистика</a>, которые ложаться в основу данного сайта.  Смотрите, поддерживайте лайками, подписывайтесь на канал! <p>
<statistics-videos :videos="{{json_encode($videos)}}"></statistics-videos>
@endsection