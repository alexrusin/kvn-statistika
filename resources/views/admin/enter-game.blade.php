@extends('layouts.app')

@section('content')
<game-form :select-data="{{json_encode($selectData)}}" :games="{{json_encode($games)}}"></game-form>
@endsection