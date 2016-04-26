@extends('admin.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>
@stop