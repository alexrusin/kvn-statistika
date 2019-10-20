@extends('layouts.app')

@section('content')
<statistics-games :games="{{json_encode($games)}}"></statistics-games>
@endsection