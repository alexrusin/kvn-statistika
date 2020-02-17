@extends('layouts.app')

@section('content')
<result-form :select-data="{{json_encode($selectData)}}"></result-form>
@endsection