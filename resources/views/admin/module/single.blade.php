@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    @if( have_permission('','','can_view_tasklists') )
                    <a class="btn btn-info mb5" href="{{ route('admin.tasklists.module_tasklists',$module->id) }}">View Tasklists</a>
                    @endif
                    @if( have_permission('','','can_create_tasklists') )
                    <a class="btn btn-success" href="{{ route('admin.tasklists.create_module_tasklists',$module->id) }}">Creae Tasklist</a>
                    @endif
                    @if( have_permission('','','can_view_tasks') )
                    <a class="btn btn-warning mb5" href="{{ route('admin.modules.project_modules',$module->id) }}">View Tasks</a>
                    @endif
                    @if( have_permission('','','can_create_tasklists') )
                    <a class="btn btn-success mb5" href="{{ route('admin.modules.create_project_modules',$module->id) }}">Creae Task</a>
                    @endif
                    @if( have_permission('','','can_view_tickets') )
                    <a class="btn btn-warning mb5" href="{{ route('admin.tickets.module_tickets',$module->id) }}">View Tickets</a>
                    @endif
                    @if( have_permission('','','can_create_tickets') )
                    <a class="btn btn-info mb5" href="{{ route('admin.tickets.create_module_tickets',$module->id) }}">Create Ticket</a>
                    @endif
                    @if( have_permission('','','can_delete_modules') )
                    {{ Form::open(array( 'url' => route('admin.modules.destroy',$module->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                    <button class="btn btn-danger mb5" href="{{ route('admin.modules.destroy',$module->id) }}">Delete This Module</button>
                    {{ Form::close() }}
                    @endif
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                {{ $module->title }}
                            </div>
                            <div>
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
                        </div>
                        <div class="card-action">
                            <a href="href:" class="btn btn-default">{{ ucfirst($module->status) }}</a>
                            <span class="right"><a href="{{ route('admin.modules.edit', $module->id) }}">Edit</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop