@extends('admin.default')
@section('content')
    <div class="row">
        <div class="col s12">
            <h5>Choose project to see the tickets for</h5>
        </div>
        <div class="col s12">
            <div class="row">
                @foreach( $projects as $project )
                    <div class="col s4">
                        <div class="card blue-grey">
                            <div class="card-content white-text">
                                <div class="card-title">
                                    {{ $project->title }}
                                    <span class="badge white-text">{{ ucfirst($project->status) }}</span>
                                </div>
                                <div>
                                     @if( have_permission('','','can_view_tickets') )
                                         <a class="btn mb5" type="submit" href="{{ route('admin.tickets.project_tickets',$project->id) }}">View Tickets</a>
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