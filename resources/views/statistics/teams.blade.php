@extends('layouts.app')

@section('content')
    <team-cards :teams="{{ json_encode($teams) }}"></team-cards>
@endsection