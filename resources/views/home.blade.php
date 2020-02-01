@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 50px">
            <div class="row">
                    @if($posts)
                        @foreach($posts as $post)

                        <div class="col-sm-3" style="padding-bottom: 50px">
                            <div class="card">
                                <div class="embed-responsive embed-responsive-1by1">
                                    <img class="card-img-top img-fluid embed-responsive-item" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/300x150'}}" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{str_limit($post->name,10)}}</h5>
                                    <p class="card-text">{!! str_limit($post->content,50) !!}</p>
                                    <a href="{{route('home.post',$post->id)}}">Continue reading</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{$post->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h1>No posts available</h1>
                    @endif
                </div>
        </div>


    </div>
</div>
@endsection
{{--{{$post->photo ? $post->photo : 'http://placehold.it/100x100'}}--}}