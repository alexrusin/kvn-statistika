@extends('layouts.app')

@section('content')
<result-form :select-data="{{json_encode($selectData)}}" :results="{{json_encode($results)}}"></result-form>
@endsection