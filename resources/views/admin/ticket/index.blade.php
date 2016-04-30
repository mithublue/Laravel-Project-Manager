@extends('admin.default')
@section('content')
<div class="row">
     @foreach( $tasks as $task )
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ $task->title }}
                </div>
                <div class="panel-body">
                    <p>{{ $task->description }}</p>
                </div>
                <div class="panel-footer">
                    @if( current_user_can('can_delete_tasks') )

                            <span class="btn btn-default">{{ ucfirst($task->status) }}</span>
                            <a class="btn btn-success" type="submit" href="{{ route('admin.tasks.show',$task->id) }}">View</a>
                            <a class="btn btn-default" type="submit" href="{{ route('admin.tasks.edit',$task->id) }}">Edit</a>
                            {{ Form::open(array( 'url' => route( 'admin.tasks.destroy', array('id' => $task->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
