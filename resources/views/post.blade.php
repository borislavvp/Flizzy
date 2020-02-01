@extends('layouts.blog-post')

@section('categories')
    <h3 style="color:#34a1eb">{{$post->category->name}}</h3>
@stop

@section('content')
    <!-- Blog Post -->
    <!-- Title -->
    <h1>{{$post->name}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>
    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>
    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo? $post->photo->file : 'http://placehol.it/20x700'}}" alt="">

    <hr>
    <!-- Post Content -->

    <p>{!! $post->content !!}</p>

    <hr>

    {{--<div id="disqus_thread"></div>--}}
    {{--<script>--}}

        {{--/**--}}
         {{--*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.--}}
         {{--*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/--}}
        {{--/*--}}
        {{--var disqus_config = function () {--}}
        {{--this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable--}}
        {{--this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable--}}
        {{--};--}}
        {{--*/--}}
        {{--(function() { // DON'T EDIT BELOW THIS LINE--}}
            {{--var d = document, s = d.createElement('script');--}}
            {{--s.src = 'https://codehacking-1wemkyljrb.disqus.com/embed.js';--}}
            {{--s.setAttribute('data-timestamp', +new Date());--}}
            {{--(d.head || d.body).appendChild(s);--}}
        {{--})();--}}
    {{--</script>--}}
    {{--<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>--}}
    {{--<script id="dsq-count-scr" src="//codehacking-1wemkyljrb.disqus.com/count.js" async></script>--}}

    @if(Session::has('comment_message'))

            {{session('comment_message')}}

    @elseif(Session::has('reply_message'))

             {{session('reply_message')}}

    @endif
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
                <div class="page-header">
                    <h3 class="reviews">Leave your comment</h3>
                </div>
                <div class="comment-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                        <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
                    </ul>
                    <div class="tab-content">
                        @if(Auth::check())
                            <div class="tab-pane" id="add-comment">
                                {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentController@createComment']) !!}
                                @include('includes.tinyeditor')
                                <input type="hidden" name="post_id" value="{{$post->id}}">

                                <div class="form-group">
                                    {!! Form::label('body', 'Comment:') !!}
                                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary btn-circle text-uppercase']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        @endif
                        <div class="tab-pane active" id="comments-logout">
                    @if(count($comments) > 0)

                        @foreach($comments as $comment)
                            <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle" src=" {{$comment->photo ? $comment->photo : 'http://placehold.it/400x400'}}"  alt="profile">
                                    </a>
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <h4 class="media-heading text-uppercase reviews">{{$comment->author}}</h4>
                                            <ul class="media-date text-uppercase reviews list-inline">
                                                <li class="dd">{{$comment->created_at->diffForHumans()}}</li>
                                            </ul>
                                            <p class="media-comment">
                                                {!! $comment->body  !!}
                                            </p>
                                            <div class="comment-reply-container">
                                                <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#{{$comment->id}}id"><span class="glyphicon glyphicon-comment"></span> {{count($comment->replies)}} replies</a>

                                                <button class="toggle-reply btn btn-info btn-circle text-uppercase pull-right"><span class="glyphicon glyphicon-share-alt">Reply</span></button>

                                                <div class="comment-reply col-sm-12">

                                                    {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}
                                                    <div class="form-group">

                                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                                        {!! Form::label('', '') !!}
                                                        {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::submit('SUBMIT', ['class'=>'btn btn-primary']) !!}
                                                    </div>
                                                    {!! Form::close() !!}

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="collapse" id="{{$comment->id}}id">
                                        <ul class="media-list">

                                    @if(count($comment->replies) > 0)

                                        @php
                                            {{$counter = $comment->replies->first()->id;}}
                                        @endphp

                                        @foreach($comment->replies as $reply)

                                            @if($reply->is_active == 1)

                                            <li class="media media-replied" id="{{$reply->id > $counter ? 'replied' : ''}}">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="{{$reply->photo ? $reply->photo : 'http://placehold.it/400x400'}}"  alt="profile">
                                                </a>
                                                <div class="media-body">
                                                    <div class="well well-lg">
                                                        <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span>{{$reply->author}}</h4>
                                                        <ul class="media-date text-uppercase reviews list-inline">
                                                            <li class="dd">{{$reply->created_at->diffForHumans()}}</li>
                                                        </ul>
                                                        <p class="media-comment">
                                                            {!! $reply->body!!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                        @endforeach

                                        </ul>
                                    </div>
                                    @else
                                    <div class="comment-reply-container">

                                        <div class="comment-reply col-sm-12">

                                            {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}
                                            <div class="form-group">

                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                                {!! Form::label('', '') !!}
                                                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::submit('SUBMIT', ['class'=>'btn btn-primary btn-circle text-uppercase']) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>

                                @endif
                            </li>
                        </ul>

                        @endforeach
                        @else
                            <h1 style="text-align: center">No comments</h1>
                        @endif
                        </div>
                    </div>
                </div>
        </div>

        @include('includes.form-error')
    </div>
@stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){

            $(this).next().slideToggle("slow");

        });

    </script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@stop

