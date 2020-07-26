@extends('layouts.app')

@section('content')
    <h1 class="mt-4 text-2xl font-semibold text-center text-gray-800">Рейтинг команд КВН</h1>
    <p class="mt-2 text-center">Для определения лучших команд КВН используются такие показатели как относительный коэффициент Гулкова, народная оценка и оценка жюри.  Статистические показатели команд можно сравнивать, нажимая на команды и кликая кнопку "Сравнить".  Сравнивать можно до трех команд одновременно.<p>
    <team-cards :teams="{{ json_encode($teams) }}"></team-cards>
@endsection