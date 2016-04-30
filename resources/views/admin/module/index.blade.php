@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @foreach( $modules as $module )
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                {{ $module->title }}
                            </div>
                            <div class="panel-body">
                                <p>{{ $module->description }}</p>
                            </div>
                            <div class="panel-footer">
                                    @if( current_user_can('can_delete_projects') )

                                        <span class="btn btn-default">{{ ucfirst($module->status) }}</span>
                                        <a class="btn btn-success" type="submit" href="{{ route('admin.modules.show',$module->id) }}">View</a>
                                        <a class="btn btn-default" type="submit" href="{{ route('admin.modules.edit',$module->id) }}">Edit</a>
                                        {{ Form::open(array( 'url' => route( 'admin.modules.destroy', array('id' => $module->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop