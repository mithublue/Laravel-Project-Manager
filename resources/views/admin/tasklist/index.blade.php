@extends('admin.default')
@section('content')
<div class="row">
     @foreach( $tasklists as $tasklist )
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ $tasklist->title }}
                </div>
                <div class="panel-body">
                    <p>{{ $tasklist->description }}</p>
                </div>
                <div class="panel-footer">
                    @if( current_user_can('can_delete_tasklists') )

                            <span class="btn btn-default">{{ ucfirst($tasklist->status) }}</span>
                            <a class="btn btn-success" type="submit" href="{{ route('admin.tasklists.show',$tasklist->id) }}">View</a>
                            <a class="btn btn-default" type="submit" href="{{ route('admin.tasklists.edit',$tasklist->id) }}">Edit</a>
                            {{ Form::open(array( 'url' => route( 'admin.tasklists.destroy', array('id' => $tasklist->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
