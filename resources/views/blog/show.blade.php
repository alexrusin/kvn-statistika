@extends('layouts.app')

@section('content')
    <post :entry="{{ json_encode($post) }}" class="mt-3"></post>
@endsection