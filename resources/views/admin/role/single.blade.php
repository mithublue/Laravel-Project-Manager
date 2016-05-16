@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">
                        {{ $role->name }}
                        </div>
                        <div class="row">
                        <div class="col s12">
                        @if( have_permission('','','can_view_roles') )
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-success">Role List</a>
                        @endif
                        @if( have_permission('','','can_create_roles') )
                        <a href="{{ route('admin.roles.create' ) }}" class="btn btn-success">Create</a>
                        @endif
                        @if( have_permission('','','can_edit_roles') )
                        <a href="{{ route('admin.roles.edit', $role->id ) }}" class="btn btn-success">Edit</a>
                        @endif
                        @if( have_permission('','','can_delete_roles') )
                        {{ Form::open(array( 'url' => route( 'admin.roles.destroy', array('id' => $role->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                            {{ Form::submit('Delete', array('class' => 'btn red')) }}
                        {{ Form::close() }}
                        @endif
                        </div>
                        @foreach( $role->caps as $key => $cap )
                            <div class="col s3">
                            {{ str_replace('_',' ',ucfirst($cap)) }}
                            </div>
                        @endforeach
                        </div>
                    </div>

                </div>
        </div>
    </div>


@stop