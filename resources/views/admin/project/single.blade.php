@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if( have_permission('','','can_view_modules') )
                            <a class="btn" href="{{ route('admin.modules.project_modules',$project->id) }}">View Modules</a>
                            @endif
                            @if( have_permission('','','can_create_modules') )
                            <a class="btn" href="{{ route('admin.modules.create_project_modules',$project->id) }}">Creae Module</a>
                            @endif
                            @if( have_permission('','','can_view_tasklists') )
                            <a class="btn" href="{{ route('admin.tasklists.project_tasklists',$project->id) }}">View Tasklists</a>
                            @endif
                            @if( have_permission('','','can_create_tasklists') )
                            <a class="btn" href="{{ route('admin.tasklists.create_project_tasklists',$project->id) }}">Create Tasklists</a>
                            @endif
                            @if( have_permission('','','can_view_tickets') )
                            <a class="btn" href="{{ route('admin.tickets.project_tickets',$project->id) }}">View Tickets</a>
                            @endif
                            @if( have_permission('','','can_create_tickets') )
                            <a class="btn" href="{{ route('admin.tickets.create_project_tickets',$project->id) }}">Create Ticket</a>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                {{ $project->title }}
                                <span class="badge">{{ ucfirst($project->status) }}</span>
                            </div>
                            <div>
                                <p>{{ $project->description }}</p>
                            </div>
                            <div class="card-action">
                            @if( have_permission('','','can_edit_projects') )
                                <span class="right"><a href="{{ route('admin.projects.edit', $project->id) }}">Edit</a></span>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop