@extends('layout.app')

@section('content')

    @if(isset($formTitle))
        <h3>{{$formTitle}}</h3>
    @endif

    {!! form($form) !!}
@endsection