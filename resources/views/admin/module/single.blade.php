@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a class="btn btn-info" href="{{ route('admin.tasklists.module_tasklists',$module->id) }}">View Tasklists</a>
                            <a class="btn btn-success" href="{{ route('admin.tasklists.create_module_tasklists',$module->id) }}">Creae Tasklist</a>

                            <a class="btn btn-warning" href="{{ route('admin.modules.project_modules',$module->id) }}">View Tasks</a>
                            <a class="btn btn-success" href="{{ route('admin.modules.create_project_modules',$module->id) }}">Creae Task</a>

                            {{ Form::open(array( 'url' => route('admin.modules.destroy',$module->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                            <button class="btn btn-danger" href="{{ route('admin.modules.destroy',$module->id) }}">Delete This Module</button>
                            {{ Form::close() }}

                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $module->title }}
                        </div>
                        <div class="panel-body">
                            <p>{{ $module->description }}</p>
                            <h4>Assigned to : </h4>
                            <ul>
                                <li>
                                    @foreach( $module->assigned_users as $assigned_user )
                                        {{ $assigned_user->first_name }}
                                    @endforeach
                                </li>
                            </ul>

                        </div>
                        <div class="panel-footer">
                            <a href="href:" class="btn btn-default">{{ ucfirst($module->status) }}</a>
                            <span class="right"><a href="{{ route('admin.modules.edit', $module->id) }}">Edit</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop