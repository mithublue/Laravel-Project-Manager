@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ Form::open(array( 'url' => route('admin.tickets.destroy',$ticket->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                            <button class="btn btn-danger" href="{{ route('admin.tickets.destroy',$ticket->id) }}">Delete This ticket</button>
                            {{ Form::close() }}

                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $ticket->title }}
                        </div>
                        <div class="panel-body">
                            <p>{{ $ticket->description }}</p>
                        </div>
                        <div class="panel-footer">
                            <a href="href:" class="btn btn-default">{{ ucfirst($ticket->status) }}</a>
                            <span class="right"><a href="{{ route('admin.tickets.edit', $ticket->id) }}">Edit</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop