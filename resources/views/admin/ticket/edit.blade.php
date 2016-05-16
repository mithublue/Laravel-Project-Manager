@extends('admin.default')
@section('content')
<div class="row">
    @if( have_permission('','','can_create_tickets') )
    <a class="btn" type="submit" href="{{ route('admin.tickets.create') }}">Create Ticket</a>
    @endif
    @if( have_permission('','','can_delete_tickets') )
    {{ Form::open(array( 'url' => route( 'admin.tickets.destroy', array('id' => $ticket->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
        {{ Form::submit('Delete This Ticket', array('class' => 'btn red')) }}
    {{ Form::close() }}
    @endif
    {{ Form::model( $ticket , array( 'url' => route( 'admin.tasks.update', $ticket->id ), 'method' => 'PUT' ) ) }}
    @include('admin.ticket._form')
    <div class="col s12">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop