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
                                {{ $panel->status }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop