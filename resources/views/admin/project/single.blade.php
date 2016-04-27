@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
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