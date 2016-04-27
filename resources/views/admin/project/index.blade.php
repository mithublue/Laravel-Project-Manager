@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @foreach( $projects as $project )
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                {{ $project->title }}
                            </div>
                            <div class="panel-body">
                                <p>{{ $project->description }}</p>
                            </div>
                            <div class="panel-footer">
                                {{ ucfirst($project->status) }}
                                @if( current_user_can('can_view_projects') )
                                    <span class="right"><a href="{{ route('admin.projects.show', $project->id) }}">View</a></span>
                                @endif
                                @if( current_user_can('can_edit_projects') )
                                    <span class="right"><a href="{{ route('admin.projects.edit', $project->id) }}">Edit</a></span>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop