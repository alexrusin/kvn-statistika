@extends('layouts.app')

@section('content')
<game-form :select-data="{{json_encode($selectData)}}"></game-form>
@endsection