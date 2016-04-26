@extends('admin.default')
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> User {{ $user->first_name }} {{ $user->last_name }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        First Name :
                        <span class="pull-right text-muted small"><em>{{ $user->first_name }}</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        Last Name :
                        <span class="pull-right text-muted small"><em>{{ $user->last_name }}</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        Username :
                        <span class="pull-right text-muted small"><em>{{ $user->username }}</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        Email :
                        <span class="pull-right text-muted small"><em>{{ $user->email }}</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        Roles :
                        <span class="pull-right text-muted small"><em>
                        @foreach( $user->roles as $role )
                                {{ $role->name }}
                            @endforeach
                        </em>
                        </span>
                    </a>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
@stop