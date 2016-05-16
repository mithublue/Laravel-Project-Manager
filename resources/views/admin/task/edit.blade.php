@extends('admin.default')
@section('content')
<div class="row">
@if( have_permission('','','can_view_tasks') )
<a class="btn" type="submit" href="{{ route('admin.tasks.index') }}">Task List</a>
@endif
@if( have_permission('','','can_create_tasks') )
<a class="btn" type="submit" href="{{ route('admin.tasks.create') }}">Create Task</a>
@endif
@if( have_permission('','','can_delete_tasks') )
{{ Form::open(array( 'url' => route('admin.tasks.destroy',$task->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
    <button class="btn red" href="{{ route('admin.tasks.destroy',$task->id) }}">Delete This task</button>
{{ Form::close() }}
@endif
    {{ Form::model( $task , array( 'url' => route( 'admin.tasks.update', $task->id ), 'method' => 'PUT' ) ) }}
    @include('admin.task._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop