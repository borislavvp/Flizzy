@extends('layouts.admin')


@section('content')
    <div class="row">
        <h1>Categories</h1>

        <div class="col-sm-6">

            {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6 ']) !!}
            </div>
            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}


            <div class="form-group">
                {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    </div>
    <div class="col-sm-6" style="padding-top: 20px">
        @include('includes.form-error')
    </div>

@stop