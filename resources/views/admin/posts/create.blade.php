@extends('layouts.admin')

@section('content')
    @include('includes.tinyeditor')
    <h1>Create Post</h1>

        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Title:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',[''=>'Categories'] + $categories,null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Description:') !!}
                {!! Form::textarea('content',null, ['class'=>'form-control','rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
            </div>

            <div class='form-group'>
                {!! Form::submit('Create Post', ['class'=>'col-sm-6 btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    <div class="row">
        @include('includes.form-error')
    </div>
@stop