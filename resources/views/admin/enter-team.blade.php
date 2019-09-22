@extends('layouts.app')

@section('content')
<team-form :teams="{{json_encode($teams)}}"></team-form>
@endsection