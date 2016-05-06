<!-- resources/views/auth/login.blade.php -->

@extends('common')

@section('site_content')
    <div class="container">
        <div class="panel panel-default mt50">
            <div class="panel-heading">
                Login
            </div>
            <div class="panel-body">
                <div class="row">
                    {{ Form::open(array( 'route' => 'postLogin', 'method' => 'POST' ) ) }}
                    {!! csrf_field() !!}
                    <div class="col-sm-3 form-group">
                        {{ Form::label('username', 'Email') }}
                    </div>
                    <div class="col-sm-9 form-group">
                        {{ Form::text('username', old('email'), array( 'class' => 'form-control', 'placeholder' => 'Email Address' ) ) }}
                    </div>
                    <div class="col-sm-3 form-group">
                        {{ Form::label('password', 'Password') }}
                    </div>
                    <div class="col-sm-9 form-group">
                        {{ Form::password('password', array( 'class' => 'form-control', 'placeholder' => 'Password' ) ) }}
                    </div>
                    <div class="col-sm-9">
                        <label>
                            {{ Form::checkbox('remember', null ,  false, array( 'class' => 'form-group' ) ) }} Remember Me
                        </label>
                    </div>
                    <div class="col-sm-12 form-group">
                        {{ Form::submit('Login', array('class'=> 'btn btn-primary')) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop
