@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(isset($formTitle))
                <h3>{{$formTitle}}</h3>
            @endif

            {!! form($form) !!}
        </div>
    </div>
@endsection