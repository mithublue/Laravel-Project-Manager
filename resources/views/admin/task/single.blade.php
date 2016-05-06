@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ Form::open(array( 'url' => route('admin.tasks.destroy',$task->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                            <button class="btn btn-danger" href="{{ route('admin.tasks.destroy',$task->id) }}">Delete This task</button>
                            {{ Form::close() }}

                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $task->title }}
                        </div>
                        <div class="panel-body">
                            <p>{{ $task->description }}</p>
                            <h4>Assigned to : </h4>
                            <ul>
                                <li>
                                    @foreach( $task->assigned_users as $assigned_user )
                                        {{ $assigned_user->first_name }}
                                    @endforeach
                                </li>
                            </ul>

                        </div>
                        <div class="panel-footer">
                            <a href="href:" class="btn btn-default">{{ ucfirst($task->status) }}</a>
                            <span class="right"><a href="{{ route('admin.tasks.edit', $task->id) }}">Edit</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop