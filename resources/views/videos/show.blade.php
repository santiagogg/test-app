@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$video->title}}</h1>
            <p>file: <a href="{{Storage::url($video->file)}}">{{Storage::url($video->file)}}</a></p>
            <video width="600px" controls>
                <source src="{{Storage::url($video->file)}}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
    </div>
@endsection