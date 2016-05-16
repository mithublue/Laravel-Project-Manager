@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::model( $project , array( 'url' => route( 'admin.projects.update', $project->id ), 'method' => 'PUT', 'class' => 'col s12' ) ) }}
    @include('admin.project._form')
    <div class="col s12">
        {{ Form::submit('Update', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop