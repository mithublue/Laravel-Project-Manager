@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::model( $tasklist , array( 'url' => route( 'admin.tasklists.update', $tasklist->id ), 'method' => 'PUT' ) ) }}
    @include('admin.tasklist._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop