@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::open(array( 'route' => 'admin.modules.store' ) ) }}
    @include('admin.module._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Save', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop