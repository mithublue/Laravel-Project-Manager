@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::model( $role, array( 'url' => route( 'admin.roles.update', $role->id ), 'method' => 'put' ) ) }}
    @include('admin.role._form');
    <div class="col s12">
        {{ Form::submit('Save', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop