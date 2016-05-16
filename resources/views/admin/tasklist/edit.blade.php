@extends('admin.default')
@section('content')
<div class="row">
@if( have_permission('','','can_create_tasklists') )
<a class="btn btn-success" type="submit" href="{{ route('admin.tasklists.create') }}">Create Tasklist</a>
@endif
@if( have_permission('','','can_delete_tasklists') )
{{ Form::open(array( 'url' => route('admin.tasklists.destroy',$tasklist->id), 'method' => 'DELETE', 'class' => 'dinline' )) }}
<button class="btn red" href="{{ route('admin.tasklists.destroy',$tasklist->id) }}">Delete This Tasklist</button>
{{ Form::close() }}
@endif
    {{ Form::model( $tasklist , array( 'url' => route( 'admin.tasklists.update', $tasklist->id ), 'method' => 'PUT' ) ) }}
    @include('admin.tasklist._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop