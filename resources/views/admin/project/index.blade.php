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
                                @if( current_user_can('can_delete_projects') )

                                        <span class="btn btn-default">{{ ucfirst($project->status) }}</span>
                                        <a class="btn btn-success" type="submit" href="{{ route('admin.projects.show',$project->id) }}">View</a>
                                        <a class="btn btn-default" type="submit" href="{{ route('admin.projects.edit',$project->id) }}">Edit</a>
                                        {{ Form::open(array( 'url' => route( 'admin.projects.destroy', array('id' => $project->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop