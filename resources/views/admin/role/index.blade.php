@extends('admin.default')
@section('content')
<div class="row">
    <div class="col-lg-12 mb15">
        <a href="{{ route('admin.roles.create') }}" type="button" class="btn btn-default">Add Role</a>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Role
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $roles as $role )
                            <tr class="odd gradeX">
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('admin.roles.show',array( 'id' => $role->id ) ) }}" class="btn btn-success">View</a>
                                    <a href="{{ route('admin.roles.edit',array( 'id' => $role->id ) ) }}" class="btn btn-primary">Edit</a>
                                    {{ Form::open(array( 'url' => route( 'admin.roles.destroy', array('id' => $role->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
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