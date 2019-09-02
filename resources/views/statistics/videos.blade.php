@extends('layouts.app')

@section('content')
<statistics-videos :videos="{{json_encode($videos)}}"></statistics-videos>
@endsection