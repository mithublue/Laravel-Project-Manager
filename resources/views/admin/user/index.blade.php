@extends('admin.default')
@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
        <div class="card-content">
        <div class="card-title">
                        Users
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $users as $user )
                                <tr class="odd gradeX">
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show',array( 'id' => $user->id ) ) }}" class="btn btn-success">View</a>
                                        <a href="{{ route('admin.users.edit',array( 'id' => $user->id ) ) }}" class="btn btn-primary">Edit</a>
                                        {{ Form::open(array( 'url' => route( 'admin.users.destroy', array('id' => $user->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.panel-body -->
        </div>

        </div>
    </div>
</div>
@stop