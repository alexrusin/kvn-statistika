@extends('layouts.app')

@section('content')
<video-form :videos="{{json_encode($videos)}}"></video-form>
@endsection