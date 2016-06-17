@extends('admin.default')
@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                @if( have_permission('','','can_create_tasks') )
                <a class="btn" type="submit" href="{{ route('admin.tasks.create') }}">Create Task</a>
                @endif
            </div>

        </div>
    </div>
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <ul class="collapsible popout" data-collapsible="accordion">
                 @foreach( $tasks as $task )
                    <li>
                      <div class="collapsible-header"><i class="fa fa-tasks"></i>{{ $task->title }}</div>
                      <div class="collapsible-body">
                        <p>{{ $task->description }}</p>
                        <div class="pl25 pb25">
                            @if( current_user_can('can_delete_tasks') )
                                    <div class="btn btn-default">{{ ucfirst($task->status) }}</div>
                                    @if( have_permission('','','can_view_task') )
                                    <a class="btn btn-success" type="submit" href="{{ route('admin.tasks.show',$task->id) }}">View</a>
                                    @endif
                                    @if( have_permission('','','can_edit_tasks') )
                                    <a class="btn btn-default" type="submit" href="{{ route('admin.tasks.edit',$task->id) }}">Edit</a>
                                    @endif
                                    @if( have_permission('','','can_delete_tasks') )
                                    {{ Form::open(array( 'url' => route( 'admin.tasks.destroy', array('id' => $task->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                        {{ Form::submit('Delete', array('class' => 'btn red')) }}
                                    {{ Form::close() }}
                                    @endif
                            @endif
                        </div>
                      </div>
                    </li>
                @endforeach
               </ul>
            </div>
        </div>
    </div>
</div>
@stop
