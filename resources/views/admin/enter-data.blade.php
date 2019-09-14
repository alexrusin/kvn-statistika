@extends('layouts.app')

@section('content')
<div class="flex flex-wrap -mx-4">
    <games-card games="games"></games-card>
    <teams-card teams="teams"></teams-card>
    <games-card games="games"></games-card>
    <games-card games="games"></games-card>
</div>
@endsection