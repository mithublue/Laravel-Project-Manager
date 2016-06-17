@extends('admin.default')
@section('content')

  <div class="row">
        <div class="col s12">
            <div class="row">
                @foreach( $tasklists as $tasklist )
                    <div class="col s12">
                        @if( have_permission('','','can_create_tasklists') )
                        <a class="btn btn-success" type="submit" href="{{ route('admin.tasklists.create') }}">Create Tasklist</a>
                        @endif
                        <div class="card blue-grey">
                            <div class="card-content white-text">
                                <div class="card-title">
                                    {{ $tasklist->title }}
                                    <span class="badge white-text">{{ ucfirst($tasklist->status) }}</span>
                                </div>
                                <div>
                                    @if( have_permission('','','can_view_tasklist') )
                                    <a class="btn btn-success" type="submit" href="{{ route('admin.tasklists.show',$tasklist->id) }}">View</a>
                                    @endif
                                    @if( have_permission('','','can_edit_tasklists') )
                                    <a class="btn btn-default" type="submit" href="{{ route('admin.tasklists.edit',$tasklist->id) }}">Edit</a>
                                    @endif
                                    @if( have_permission('','','can_delete_tasklists') )
                                    {{ Form::open(array( 'url' => route( 'admin.tasklists.destroy', array('id' => $tasklist->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                        {{ Form::submit('Delete', array('class' => 'btn red')) }}
                                    {{ Form::close() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
