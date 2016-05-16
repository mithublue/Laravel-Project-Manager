@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                @foreach( $modules as $module )
                    <div class="col s12">
                        <div class="card blue-grey white-text">
                            <div class="card-content">
                                <div class="card-title">
                                    {{ $module->title }}
                                    <span class="badge white-text">{{ ucfirst($module->status) }}</span>
                                </div>
                                <div>
                                    <p>{{ $module->description }}</p>
                                </div>
                                <div class="card-action">
                                        @if( have_permission('','','can_view_modules') )
                                        <a class="btn btn-success" type="submit" href="{{ route('admin.modules.show',$module->id) }}">View</a>
                                        @endif
                                        @if( have_permission('','','can_edit_modules') )
                                        <a class="btn btn-default" type="submit" href="{{ route('admin.modules.edit',$module->id) }}">Edit</a>
                                        @endif
                                        @if( have_permission('','','can_delete_modules') )
                                        {{ Form::open(array( 'url' => route( 'admin.modules.destroy', array('id' => $module->id) ), 'method' => 'DELETE', 'class' => 'dinline' )) }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }}
                                        @endif
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop