@extends('layouts.admin')


@section('content')

    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="row" style="padding-bottom: 50px">
        <div class="col-sm-9">

            {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

            {{--{{csrf_token()}}--}}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id',[''=>'Choose Option'] + $roles,null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::text('password',null, ['class'=>'form-control', 'placeholder' => 'Password','style'=>'-webkit-text-security: circle;']) !!}
            </div>

            <div class='form-group'>
                {!! Form::submit('Edit User', ['class'=>'col-sm-6 btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}

                <div class='form-group'>
                    {!! Form::submit('Delete User', ['class'=>'col-sm-6 btn btn-danger']) !!}
                </div>

            {!! Form::close() !!}

        </div>
    </div>
    <div class="row">
        @include('includes.form-error')
    </div>

@stop