@extends('layouts.admin')

@section('content')

    <h1 class="pageHeading">Posts</h1>

    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

    @elseif(Session::has('updated_post'))

        <p class="bg-primary">{{session('updated_post')}}</p>

    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Photo</th>
            <th>Id</th>
            <th>Content</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Created at</th>
            <th>Updated at</th>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)

                <tr>
                    <td><a class="redirectStyle"  href="{{route('admin.posts.edit', $post->id)}}">{{$post->name}}</a></td>
                    <td><a href="{{route('home.post',$post->id)}}"><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" ></a></div></td>
                    <td>{{$post->id}}</td>
                    <td>{!! str_limit($post->content,15)  !!}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach

        @endif

        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@stop
