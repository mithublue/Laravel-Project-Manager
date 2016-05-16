@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                @foreach( $projects as $project )
                    <div class="col s4">
                        <div class="card blue-grey">
                            <div class="card-content white-text">
                                <div class="card-title">
                                    {{ $project->title }}
                                    <span class="badge white-text">{{ ucfirst($project->status) }}</span>
                                </div>
                                <div>

                                         @if( have_permission('','','can_view_project') )
                                            <a class="btn mb5" type="submit" href="{{ route('admin.projects.show',$project->id) }}">View</a>
                                         @endif
                                         @if( have_permission('','','can_edit_projects') )
                                            <a class="btn mb5" type="submit" href="{{ route('admin.projects.edit',$project->id) }}">Edit</a>
                                         @endif
                                         @if( have_permission('','','can_delete_projects') )
                                            {{ Form::open(array( 'url' => route( 'admin.projects.destroy', array('id' => $project->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                                {{ Form::submit('Delete', array('class' => 'btn mb5')) }}
                                            {{ Form::close() }}
                                         @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop