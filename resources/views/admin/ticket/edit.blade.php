@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::model( $ticket , array( 'url' => route( 'admin.tasks.update', $ticket->id ), 'method' => 'PUT' ) ) }}
    @include('admin.ticket._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop