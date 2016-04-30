@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="{{ route('admin.modules.project_modules',$project->id) }}">View Modules</a>
                            <a href="{{ route('admin.modules.create_project_modules',$project->id) }}">Creae Module</a>

                            <a href="{{ route('admin.tasklists.project_tasklists',$project->id) }}">View Tasklists</a>
                            <a href="{{ route('admin.tasklists.create_project_tasklists',$project->id) }}">Create Tasklists</a>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $project->title }}
                        </div>
                        <div class="panel-body">
                            <p>{{ $project->description }}</p>
                        </div>
                        <div class="panel-footer">
                            {{ ucfirst($project->status) }}
                            <span class="right"><a href="{{ route('admin.projects.edit', $project->id) }}">Edit</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop