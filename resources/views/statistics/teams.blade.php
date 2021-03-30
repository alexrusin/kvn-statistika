@extends('layouts.app')

@section('content')
    <h1 class="mt-4 text-lg font-semibold text-center text-gray-800 md:text-2xl">Рейтинг команд КВН</h1>
    <p class="mt-2 text-sm text-center md:text-base">Для определения лучших команд КВН используются такие показатели как относительный коэффициент Гуликова, народная оценка и оценка жюри.  Статистические показатели команд можно сравнивать, нажимая на команды и кликая кнопку "Сравнить".  Сравнивать можно до трех команд одновременно.<p>
    <team-cards></team-cards>
@endsection