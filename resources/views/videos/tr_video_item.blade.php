<tr>
    <td>{{$video->title}}</td>
    <td>{{$video->duration}}</td>
    <td>{{$video->file_size}}</td>
    <td>{{$video->video_format}}</td>
    <td>{{$video->bit_rate}}</td>
    <td>
        <a href="{{route('videos.edit',$video->id)}}" class="btn btn-link" aria-label="Edit">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        |
        {!! Form::open(['method' => 'DELETE', 'style'=>'display:inline-block;' , 'route' => ['videos.destroy',$video->id]]) !!}
        <button type="submit" class="btn-link" aria-label="Delete">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
        {!! Form::close() !!}

        |
        <a class="btn btn-link" href="{{route('videos.metadata.edit',$video->id)}}"> Video Metadata</a>

    </td>
</tr>