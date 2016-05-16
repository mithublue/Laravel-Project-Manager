@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::model( $module , array( 'url' => route( 'admin.modules.update', $module->id ), 'method' => 'PUT' ) ) }}
    @include('admin.module._form')
    <div class="col s12">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop