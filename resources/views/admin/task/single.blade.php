@extends('admin.default')
@section('content')
    <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="col s12">
                        @if( have_permission('','','can_view_tasks') )
                        <a class="btn" type="submit" href="{{ route('admin.tasks.index') }}">Task List</a>
                        @endif
                        @if( have_permission('','','can_create_tasks') )
                        <a class="btn" type="submit" href="{{ route('admin.tasks.create') }}">Create Task</a>
                        @endif
                        @if( have_permission('','','can_edit_tasks') )
                        <a class="btn btn-default" type="submit" href="{{ route('admin.tasks.edit',$task->id) }}">Edit</a>
                        @endif
                        @if( have_permission('','','can_delete_tasks') )
                        {{ Form::open(array( 'url' => route('admin.tasks.destroy',$task->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                            <button class="btn red" href="{{ route('admin.tasks.destroy',$task->id) }}">Delete This task</button>
                        {{ Form::close() }}
                        @endif
                        <div class="card">
                            <div class="card-content">
                                <div class="card-title">
                                      {{ $task->title }}
                                    <span href="href:" class=" badge mr15">{{ ucfirst($task->status) }}</span>
                                </div>
                                <div>
                                    <p>{{ $task->description }}</p>
                                </div>
                                <div>
                                    <p>Assigned to : </p>
                                     @foreach( $task->assigned_users as $assigned_user )
                                        {{ $assigned_user->first_name }}
                                     @endforeach
                                </div>
                                <div class="card-action">
                                    <span class="right"><a href="{{ route('admin.tasks.edit', $task->id) }}">Edit</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@stop