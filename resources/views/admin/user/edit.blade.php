@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::model( $user, array( 'url' => route( 'admin.users.update' , $user->id ), 'method' => 'PATCH' ) ) }}
    @include('admin.user._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Save', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop