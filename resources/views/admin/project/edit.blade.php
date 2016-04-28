@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::model( $project , array( 'url' => route( 'admin.projects.update', $project->id ), 'method' => 'PUT' ) ) }}
    @include('admin.project._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop