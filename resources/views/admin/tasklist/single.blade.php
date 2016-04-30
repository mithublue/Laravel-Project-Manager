@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a class="btn btn-info" href="{{ route('admin.tasklists.project_tasklists',$tasklist->id) }}">View Tasklists</a>
                            <a class="btn btn-success" href="{{ route('admin.tasklists.create_project_tasklists',$tasklist->id) }}">Creae Tasklist</a>

                            <a class="btn btn-warning" href="{{ route('admin.tasklists.project_tasklists',$tasklist->id) }}">View Tasks</a>
                            <a class="btn btn-success" href="{{ route('admin.tasks.create_tasklist_tasks',$tasklist->id) }}">Creae Task</a>

                            {{ Form::open(array( 'url' => route('admin.tasklists.destroy',$tasklist->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                            <button class="btn btn-danger" href="{{ route('admin.tasklists.destroy',$tasklist->id) }}">Delete This Tasklist</button>
                            {{ Form::close() }}

                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $tasklist->title }}
                        </div>
                        <div class="panel-body">
                            <p>{{ $tasklist->description }}</p>
                            <h4>Assigned to : </h4>
                            <ul>
                                <li>
                                    @foreach( $tasklist->assigned_users as $assigned_user )
                                        {{ $assigned_user->first_name }}
                                    @endforeach
                                </li>
                            </ul>

                        </div>
                        <div class="panel-footer">
                            <a href="href:" class="btn btn-default">{{ ucfirst($tasklist->status) }}</a>
                            <span class="right"><a href="{{ route('admin.tasklists.edit', $tasklist->id) }}">Edit</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop