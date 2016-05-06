@extends('admin.default')
@section('content')
<div class="row">
     @foreach( $tickets as $ticket )
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ $ticket->title }}
                </div>
                <div class="panel-body">
                    <p>{{ $ticket->description }}</p>
                </div>
                <div class="panel-footer">
                    @if( current_user_can('can_delete_tasks') )

                            <span class="btn btn-default">{{ ucfirst($ticket->status) }}</span>
                            <a class="btn btn-success" type="submit" href="{{ route('admin.tickets.show',$ticket->id) }}">View</a>
                            <a class="btn btn-default" type="submit" href="{{ route('admin.tickets.edit',$ticket->id) }}">Edit</a>
                            {{ Form::open(array( 'url' => route( 'admin.tickets.destroy', array('id' => $ticket->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
