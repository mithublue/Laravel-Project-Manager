@extends('admin.default')
@section('content')
<div class="row">
    {{ Form::open(array( 'route' => 'admin.users.store' ) ) }}
    @include('admin.user._form')
    <div class="col-sm-12 form-group">
        {{ Form::submit('Save', array('class'=> 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>
@stop