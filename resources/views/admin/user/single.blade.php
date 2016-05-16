@extends('admin.default')
@section('content')
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">
                    <i class="fa fa-user fa-fw"></i> User {{ $user->first_name }} {{ $user->last_name }}
                </div>
                <!-- /.panel-heading -->
                <div class="card-content">
                    <table class="striped">
                        <tr>
                            <td>First Name : </td>
                            <td>{{ $user->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name : </td>
                            <td>{{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Username : </td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td>Roles : </td>
                            <td>
                                @foreach( $user->roles as $role )
                                    {{ $role->name }}
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- /.panel-body -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
@stop