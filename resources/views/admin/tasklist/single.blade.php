@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    @if( have_permission('','','can_edit_tasks') )
                    <a class="btn btn-default" type="submit" href="{{ route('admin.tasklists.edit',$tasklist->id) }}">Edit</a>
                    @endif
                    @if( have_permission('','','can_view_tasks') )
                    <a class="btn btn-warning" href="{{ route('admin.tasks.tasklist_tasks',$tasklist->id) }}">View Tasks</a>
                    @endif
                    @if( have_permission('','','can_create_tasks') )
                    <a class="btn btn-success" href="{{ route('admin.tasks.create_tasklist_tasks',$tasklist->id) }}">Create Task</a>
                    @endif
                    @if( have_permission('','','can_create_tasklists') )
                    <a class="btn btn-success" type="submit" href="{{ route('admin.tasklists.create') }}">Create Tasklist</a>
                    @endif
                    @if( have_permission('','','can_delete_tasklists') )
                    {{ Form::open(array( 'url' => route('admin.tasklists.destroy',$tasklist->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                    <button class="btn red" href="{{ route('admin.tasklists.destroy',$tasklist->id) }}">Delete This Tasklist</button>
                    {{ Form::close() }}
                    @endif
                    <div class="card">
                        <div class="">
                            <div class="card-content">
                                <div class="card-title">
                                    {{ $tasklist->title }}
                                    <span href="href:" class=" badge mr15">{{ ucfirst($tasklist->status) }}</span>
                                </div>
                                <div>
                                    <p>{{ $tasklist->description }}</p>
                                </div>
                                <div>
                                    <p>Assigned to : </p>
                                    @foreach( $tasklist->assigned_users as $assigned_user )
                                        <span class="mr15">{{ $assigned_user->first_name }}</span>
                                    @endforeach
                                </div>
                                <div class="card-action">
                                    <span class="right"><a href="{{ route('admin.tasklists.edit', $tasklist->id) }}">Edit</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop