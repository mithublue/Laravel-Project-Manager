@extends('admin.default')
@section('content')
<div class="row">
    <div class="col s12">
        <a href="{{ route('admin.roles.create') }}" type="button" class="btn btn-default">Add Role</a>
    </div>
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">
                    Role
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="striped">
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
                                        @if( have_permission('','','can_view_role') )
                                        <a href="{{ route('admin.roles.show',array( 'id' => $role->id ) ) }}" class="btn btn-success">View</a>
                                        @endif
                                        @if( have_permission('','','can_edit_roles') )
                                        <a href="{{ route('admin.roles.edit',array( 'id' => $role->id ) ) }}" class="btn btn-primary">Edit</a>
                                        @endif
                                        @if( have_permission('','','can_delete_roles') )
                                        {{ Form::open(array( 'url' => route( 'admin.roles.destroy', array('id' => $role->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                            {{ Form::submit('Delete', array('class' => 'btn red')) }}
                                        {{ Form::close() }}
                                        @endif
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
</div>
@stop