@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::model( $task , array( 'url' => route( 'admin.tasks.update', $task->id ), 'method' => 'PUT' ) ) }}
    @include('admin.task._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop