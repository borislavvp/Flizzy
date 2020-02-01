@extends('layouts.admin')


@section('content')
    @include('includes.tinyeditor')

    <h1>Edit Post</h1>

    <div class="row">

        <div class="col-sm-3">
            @if(is_null($post->photo))
                <img src="http://placehold.it/400x400" alt="" class="img-responsive">
            @else
                <img src="{{$post->photo? $post->photo->file : 'http://placehol.it/20x700'}}" alt="" class="img-responsive">
            @endif

        </div>

        <div class="col-sm-9">

            {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Title:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',  $categories, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Description:') !!}
                {!! Form::textarea('content', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostController@destroy', $post->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="row">

        @include('includes.form-error')

    </div>

@stop