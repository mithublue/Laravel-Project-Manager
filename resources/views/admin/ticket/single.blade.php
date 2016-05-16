@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    <div class="panel-body">
                        @if( have_permission('','','can_edit_tickets') )
                        <a class="btn btn-default" type="submit" href="{{ route('admin.tickets.edit',$ticket->id) }}">Edit</a>
                        @endif
                        @if( have_permission('','','can_delete_tickets') )
                        {{ Form::open(array( 'url' => route('admin.tickets.destroy',$ticket->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                        <button class="btn red" href="{{ route('admin.tickets.destroy',$ticket->id) }}">Delete This ticket</button>
                        {{ Form::close() }}
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                {{ $ticket->title }}
                            </div>
                            <div>
                                <p>{{ $ticket->description }}</p>
                            </div>
                            <div class="card-action">
                                <a href="href:" class="btn btn-default">{{ ucfirst($ticket->status) }}</a>
                                <span class="right"><a href="{{ route('admin.tickets.edit', $ticket->id) }}">Edit</a></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop