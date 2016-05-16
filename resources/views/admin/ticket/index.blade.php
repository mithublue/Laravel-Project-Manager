@extends('admin.default')
@section('content')
<div class="row">
     @foreach( $tickets as $ticket )
        <div class="col s12">
            @if( have_permission('','','can_create_tickets') )
            <a class="btn" type="submit" href="{{ route('admin.tickets.create') }}">Create Ticket</a>
            @endif
            <div class="card blue-grey white-text">
                <div class="card-content">
                    <div class="card-title">
                        {{ $ticket->title }}
                        <span class="badge white-text">{{ ucfirst($ticket->status) }}</span>
                    </div>
                    <div>
                        <p>{{ $ticket->description }}</p>
                    </div>
                    <div class="card-action">
                        @if( current_user_can('can_delete_tasks') )
                                @if( have_permission('','','can_view_ticket') )
                                <a class="btn btn-success" type="submit" href="{{ route('admin.tickets.show',$ticket->id) }}">View</a>
                                @endif
                                @if( have_permission('','','can_edit_tickets') )
                                <a class="btn btn-default" type="submit" href="{{ route('admin.tickets.edit',$ticket->id) }}">Edit</a>
                                @endif
                                @if( have_permission('','','can_delete_tickets') )
                                {{ Form::open(array( 'url' => route( 'admin.tickets.destroy', array('id' => $ticket->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                    {{ Form::submit('Delete', array('class' => 'btn red')) }}
                                {{ Form::close() }}
                                @endif
                        @endif
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
@stop
