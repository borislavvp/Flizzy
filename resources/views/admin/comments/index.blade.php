@extends('layouts.admin')


@section('content')

    @if(count($comments) > 0)
        <h1>Comments</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Post</th>
                <th>Reply</th>
                <th>Body</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td><a class="redirectStyle" href="{{route('home.post',$comment->post_id)}}">View Post</a></td>
                    <td><a class="redirectStyle" href="{{route('admin.comment.replies.show',$comment->id)}}">View Replies</a></td>
                    <td>{!! $comment->body !!}</td>

                    <td>

                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentController@destroy', $comment->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}

                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>

    @else

        <h1 class="text-center">No Comments</h1>

    @endif

@stop