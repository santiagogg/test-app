@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>File size</th>
                    <th>Video Format</th>
                    <th>Bit rate</th>
                    <th>Actions</th>
                    @can('add-edit-video')
                    <th><a href="{{route('videos.create')}}" class="btn btn-sm btn-primary pull-right"
                           aria-label="Create">
                            Add a New Video <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    @endcan
                    </th>
                </tr>
                </thead>
                <tbody>
                @each('videos.tr_video_item', $videos, 'video')
                </tbody>
            </table>
            <div class="list-group">

            </div>
        </div>
    </div>

@endsection